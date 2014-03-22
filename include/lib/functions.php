<?php
	require 'include/lib/config.php';
	$bdd=NULL;

	function db_init(){//initialise l'accès à la base de donnée et renvoie la ref vers l'objet créé 
		global $bdd;
		global $ident_bdd;
		global $pass_bdd;
		global $base_bdd;
		
		try 
		{
			$bdd = new PDO('mysql:host=localhost;dbname='.$base_bdd.'', $ident_bdd, $pass_bdd);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch (Exception $e) 
		{
            echo '<p> erreur DB</p>';
			die('Erreur : ' . $e->getMessage());

		}
		return $bdd;
	}

	function get_user_info(PDO $bdd,$user_id){ // get_user_info(ref base de donnée, clef primaire table users)  Cette fonction renvoi un tableau (array) contenant dans l'orde le pseudo, prénom, nom, école, mail, sexe, date de naissance, téléphone, adresse, identifiant, score
		if($user_id=="all"){
			$req=$bdd->query('SELECT * FROM XCH14_users WHERE `group`=\'user\' ORDER by pseudo ASC');
			return $req;
		}
		else{
			$req=$bdd->prepare('SELECT * FROM XCH14_users WHERE id=?');
			$req->execute(array($user_id));
			$donnees = $req->fetch();
			$tab = array(substr($donnees['pseudo'],1,(strlen($donnees['pseudo'])-2)),substr($donnees['fname'],1,(strlen($donnees['fname'])-2)),substr($donnees['lname'],1,(strlen($donnees['lname'])-2)),substr($donnees['school'],1,(strlen($donnees['school'])-2)),substr($donnees['mail'],1,(strlen($donnees['mail'])-2)),substr($donnees['sexe'],1,(strlen($donnees['sexe'])-2)),$donnees['date_naissance'],$donnees['phone'],substr($donnees['adresse'],1,(strlen($donnees['adresse'])-2)),$donnees['user_no'],$donnees['score']);
			return $tab; 
		}
	}

	function add_user_event(PDO $bdd,$user_id,$event,$infos){
		$uid = intval($user_id);
		$eventtmp = $bdd->quote($event);
		$inf = $bdd->quote($infos);
		$req = $bdd->prepare("INSERT INTO users_event (users_id,event,infos,r) VALUES (:uid,:event,:infos,:r)");
		$req->execute(array(
		    'uid'=>$uid,
		    'event'=>$eventtmp,
		    'infos'=>$inf,
		    ':r'=>0
	    ));
		return 0;
	}

	function mark_as_read(PDO $bdd,$id){
		$req=$bdd->prepare('UPDATE users_event SET r = 1 WHERE id=:id');
		$req->execute(array(
			':id'=>$id
			));
		return 0;
	}

	function get_contracts(PDO $bdd,$user_id){//get_contracts(ref base de donnée, clef primaire table users) cette fonction renvoie un tableau 2D (array(array())) chaque ligne correspond à un contrat et les colonnes sont clef primaire contrat, contrat honoré (0,1), 'clef primaire user cible', numéro de contrat, date d'expiration du contrat   accès via $tableau[ligne][colonne]
		$tab=array();
		if($user_id=="all"){
			$req=$bdd->query('SELECT * FROM XCH14_contracts');
		}
		else{
			$req=$bdd->prepare('SELECT * FROM XCH14_contracts WHERE user_id=?');
			$req->execute(array($user_id));
		}
		while ($donnees = $req->fetch())
		{
			$ar=array($donnees['user_id'],$donnees['complete'],$donnees['target_id'],$donnees['contract_no'],$donnees['exp_date']);
			array_push($tab,$ar); //array($donnees['id'],$donnees['complete'],$donnees['target_id'],$donnees['contract_no'],$donnees['exp_date'])
		}

		return $tab;
	}

	function create_contract(PDO $bdd,$user_id,$target_id,$exp_date){ //create_contract(ref bdd, clef primaire du joueur concerné, clef primaire du joueur cible, date d'expiration du contrat (YYYY-MM-DD)) rajoute un contrat dans la table contrats et renvoie le numéro de contrat
		$req=$bdd->query("SELECT user_no,position,school FROM XCH14_users WHERE id=$target_id");
		$data=$req->fetch();
		$target_no=$data['user_no'];
		$pos=$data['position'];
		$school=substr($data['school'],1,strlen($data['school'])-2);
		$req->closeCursor();
		srand();
		$cno='X'.rand(10000,99999).'C'.$target_id.'H14'.rand(10,99);
		$uid = intval($user_id);
		$tid = intval($target_id);
		$req = $bdd->prepare('INSERT INTO XCH14_contracts (contract_no,user_id,target_id,target_no,position,school,complete,exp_date,start_date) VALUES (?,?,?,?,?,?,?,?,NOW())');
		$req->execute(array($cno,$user_id,$target_id,$target_no,$pos,$school,'0',$exp_date));
		return $cno;
	}

	function delete_contract(PDO $bdd,$cno){
		$req=$bdd->prepare("DELETE FROM XCH14_contracts WHERE contract_no=?");
		$req->execute(array($cno));
	}

	function mark_as_complete (PDO $bdd,$contract_id){// mark_as_complete(ref bdd, clef primaire du contrat) marque à 1 le champ 'complete' et renvoie true ou false si l'action à été effectuée
		try 
		{
			$req=$bdd->exec("UPDATE XCH14_contracts SET complete ='1' WHERE id=$contract_id");
			//$req->execute(array('1',$contract_id));
		}
		catch (Exception $e) 
		{
			die('Erreur : ' . $e->getMessage());
		}
		return TRUE; 
	}

	function gen_user_code($School,$Sexe,$Phone){// génère l'identifiant unique d'un utilisateur sous la forme (ecole*2,sexe,rdm()*3,2 dernier tel, XCH14)
		srand();
		switch ($School) {
			case 'UCP':
				$u_code='01';
				break;
			case 'IUFM':
				$u_code='02';
				break;
			case 'EISTI':
				$u_code='03';
				break;
			case 'ENSEA':
				$u_code='04';
				break;
			case 'ESSEC':
				$u_code='05';
				break;
			case 'ESCIA':
				$u_code='06';
				break;
			case 'ENSAPC':
				$u_code='07';
				break;
			case 'ITIN':
				$u_code='08';
				break;
			case 'EBI':
				$u_code='09';
				break;
			case 'EPMI':
				$u_code='10';
				break;
			case 'ISTOM':
				$u_code='11';
				break;
			case 'ILEPS':
				$u_code='12';
				break;
			case 'COE':
				$u_code='13';
				break;
			default:
				$u_code='XX';
				break;
		}
		$u_code.=substr($Sexe,0,-(strlen($Sexe)-1));
		$u_code.=rand(100,999);
		$u_code.=substr((string)$Phone,-2);
		$u_code.='XCH14';
		return $u_code;
	}

	function send_mail($user_id,$direct_mail,$to_user_pseudo,$subject,$body){
		global $ident_mail;
		global $pass_mail;
		global $game_mail;
		

		require 'include/lib/phpmailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;
		
		$mail->CharSet = 'UTF-8';
		$mail->isSMTP();                 
		$mail->Host = 'smtp2.ensea.fr';  
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';                              
		$mail->AuthType='PLAIN';
		$mail->Username = $ident_mail;                            
		$mail->Password = $pass_mail;
		$mail->Port = 587;
		//$mail->SMTPDebug=true;


		$bdd=db_init();
		if($user_id==NULL){
			$mail->FromName = 'Webmaster';
			$reply_mail=$game_mail;
		}
		else{
			$req2=$bdd->query("SELECT mail,pseudo FROM XCH14_users WHERE id='".$user_id."'");
			$data2=$req2->fetch();
			$mail->FromName = substr($data2['pseudo'],1,(strlen($data2['pseudo'])-2));
			$reply_mail=substr($data2['mail'],1,(strlen($data2['mail'])-2));
		}
		

		if($to_user_pseudo=='all'){
			$req=$bdd->query('SELECT mail,pseudo FROM XCH14_users');
			while($data=$req->fetch()){
				$mail->addBCC(substr($data['mail'],1,(strlen($data['mail'])-2)));
			}
			$to_mail=substr($data2['mail'],1,(strlen($data2['mail'])-2));
		}
		elseif($to_user_pseudo==NULL){
			if($direct_mail==NULL){
				$to_mail=$game_mail;
				$mail->addCC(substr($data2['mail'],1,(strlen($data2['mail'])-2)));
			}
			else{
				$to_mail=$direct_mail;
			}
		}
		else{
			$sql = 'SELECT mail,pseudo FROM XCH14_users WHERE pseudo=:pseudo';
			$req = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$req->execute(array(':pseudo' => '\''.$to_user_pseudo.'\''));
			$data=$req->fetch();
			$to_mail=substr($data['mail'],1,(strlen($data['mail'])-2));
			$mail->addCC($game_mail);
		}

		

		

		$mail->From = $game_mail;
		$mail->addAddress($to_mail);  // Add a recipient $mail->addAddress('ellen@example.com');
		$mail->addReplyTo($reply_mail);
		$mail->WordWrap = 50;                                
		$mail->isHTML(true);                                  

		$mail->Subject = $subject;
		$mail->Body    = $body;
		$mail->AltBody = $body;

		if(!$mail->send()) {
		   return 'Mailer Error: ' . $mail->ErrorInfo;
		}
		return 'sent';
	}

	function register(PDO $bdd,$psswd,$lname,$fname,$email,$phone,$school,$sex,$addA,$addB,$addC,$bd_y,$bd_m,$bd_d,$nn,$pos1,$pos2,$pos3,$pos4,$pos5){
		srand();

		//hashage du password
		$password = $_POST['userpsswd'];
        $hasher = new PasswordHash(8, FALSE);
        $hash = $hasher->HashPassword($password);
        //password hashé

        //préparation des données
		$nom = $bdd->quote($_POST['Lname']);
		$prenom =$bdd->quote($_POST['Fname']);
		$email =$bdd->quote($_POST['Email']);
		$phone = '0'.intval($_POST['Phone']);
		$school = $bdd->quote($_POST['School']);
		$sexe = $bdd->quote($_POST['Sexe']);
		$adress = $bdd->quote($_POST['Adress_a']."-".$_POST['Adress_pc']."-".$_POST['Adress_c']);
		$date = $_POST['Bd_y']."-".$_POST['Bd_m']."-".$_POST['Bd_d'];
		$nick = $bdd->quote($_POST['Nn']);
		$psswd = $hash;
		$ucode = gen_user_code($_POST['School'],$_POST['Sexe'],$_POST['Phone']);
		$position = $pos1."-".$pos2."-".$pos3."-".$pos4."-".$pos5;

		//génération du code de confirmation 
		$alfa='abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
		$confirmation_code=substr(str_shuffle($alfa),0,30);

		$req = $bdd->prepare('INSERT INTO XCH14_users (alive,fname,lname,school,mail,phone,sexe,adresse,date_naissance,pseudo,psswd,user_no,position,confirmation_code,confirmed,score,reg_date) VALUES (:alive,:prenom,:nom,:ecole,:email,:phone,:sexe,:adresse,:date_n,:pseudo,:psswd,:ucode,:pos,:conf,:stat,:score,NOW())');
		$req->execute(array(
			'alive'=>'1',
		    'nom' => $nom,
		    'prenom' => $prenom,
		    'email' => $email,
		    'phone' => $phone,
		    'ecole'=> $school,
		    'sexe' => $sexe,
		    'adresse'=>$adress,
		    'date_n'=>$date,
		    'pseudo'=>$nick,
		    'psswd'=>$psswd,
		    'ucode'=>$ucode,
		    'pos'=>$position,
		    'conf'=>$confirmation_code,
		    'score'=>'0',
		    'stat'=>'0'
	    ));

		$sent=send_conf_code($_POST['Email'],$confirmation_code);
		echo $sent;
		return $ucode;
	}

	function send_conf_code($to_user_mail,$confirmation_code){
		global $url;
		$subject='Confirmation code';
		$body='Please confirm your account : <br/>your confirmation code :'.$confirmation_code.'<br/>Please Follow this link to confirm your account>><a href="'.$url.'confirm.php?mail='.$to_user_mail.'&code='.$confirmation_code.'">'.$url.'confirm.php?mail='.$to_user_mail.'&code='.$confirmation_code.'<a/><br/><br/> Thanks for your registration, Have a good game !';

		$status=send_mail(NULL,$to_user_mail,NULL,$subject,$body);
		if($status=='sent'){
			return 'confirmation code has been sent to your email';
		}
		else{
			return $status;
		}
	}

	function confirm_account($mail,$code){
		$bdd=db_init();
		$sql='SELECT id,confirmation_code FROM XCH14_users WHERE mail=:mail';
		$req = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$req->execute(array(':mail' => '\''.$mail.'\''));
		$data=$req->fetch();
		if($data['confirmation_code']==$code){
			$req2=$bdd->exec("UPDATE XCH14_users SET confirmed='1' WHERE id='".$data['id']."'");
			return 'TRUE';
		}
		else{
			$err="mail and confirmation code does not match";
			return $err;
		}

	}

	function get_alives(){
		$bdd=db_init();
		$req=$bdd->query('SELECT alive FROM XCH14_users WHERE `group`="user"AND `confirmed`="1"');
		$alive='0';
		$all='0';
		while ($data=$req->fetch()){
			$all++;
			if($data['alive']=='1'){
				$alive++;
			}
		}
		$retrn=array($all,$alive);
		return $retrn;
	}

	function get_hs(){
		$bdd=db_init();
		$req=$bdd->query('SELECT pseudo,score FROM XCH14_users WHERE `group`="user" AND `confirmed`="1" ORDER BY score DESC');
		$arr=array();
		while($data=$req->fetch()){
			if($data['score']!=0){
				array_push($arr, array(substr($data['pseudo'], 1,strlen($data['pseudo'])-2),$data['score']));
			}
		}
		$taille=count($arr);


		if($taille<5){
			return $arr;
		}
		else{
			return array_slice($arr, $taille-5);
		}
	}
?>