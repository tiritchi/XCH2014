<?php

	$bdd=NULL;

	function db_init(){//initialise l'accès à la base de donnée et renvoie la ref vers l'objet créé 
		global $bdd;
		try 
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'raspberry');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch (Exception $e) 
		{
			die('Erreur : ' . $e->getMessage());
			echo '<p> erreur DB</p>';
		}
		return $bdd;
	}

	function get_user_info($bdd,$user_id){ // get_user_info(ref base de donnée, clef primaire table users)  Cette fonction renvoi un tableau (array) contenant dans l'orde le pseudo, prénom, nom, école, mail, sexe, date de naissance, téléphone, adresse, identifiant 
		if($user_id=="all"){
			$req=$bdd->query("SELECT * FROM users ORDER by pseudo ASC");
			return $req;
		}
		else{
			$req=$bdd->prepare('SELECT * FROM users WHERE id=?');
			$req->execute(array($user_id));
			$donnees = $req->fetch();
			$tab = array(substr($donnees['pseudo'],1,(strlen($donnees['pseudo'])-2)),substr($donnees['fname'],1,(strlen($donnees['fname'])-2)),substr($donnees['lname'],1,(strlen($donnees['lname'])-2)),substr($donnees['school'],1,(strlen($donnees['school'])-2)),substr($donnees['mail'],1,(strlen($donnees['mail'])-2)),substr($donnees['sexe'],1,(strlen($donnees['sexe'])-2)),$donnees['date_naissance'],"0".$donnees['phone'],substr($donnees['adresse'],1,(strlen($donnees['adresse'])-2)),$donnees['user_no']);
			return $tab; 
		}
	}

	function add_user_event($bdd,$user_id,$event,$infos){
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

	function mark_as_read($bdd,$id){
		$req=$bdd->prepare('UPDATE users_event SET r = 1 WHERE id=:id');
		$req->execute(array(
			':id'=>$id
			));
		return 0;
	}

	function get_contracts($bdd,$user_id){//get_contracts(ref base de donnée, clef primaire table users) cette fonction renvoie un tableau 2D (array(array())) chaque ligne correspond à un contrat et les colonnes sont clef primaire contrat, contrat honoré (0,1), 'clef primaire user cible', numéro de contrat, date d'expiration du contrat   accès via $tableau[ligne][colonne]
		$tab=array();
		$req=$bdd->prepare('SELECT * FROM contracts WHERE user_id=?');
		$req->execute(array($user_id));

		while ($donnees = $req->fetch())
		{
			$ar=array($donnees['id'],$donnees['complete'],$donnees['target_id'],$donnees['contract_no'],$donnees['exp_date']);
			array_push($tab,$ar); //array($donnees['id'],$donnees['complete'],$donnees['target_id'],$donnees['contract_no'],$donnees['exp_date'])
		}

		return $tab;
	}

	function create_contract($bdd,$user_id,$target_id,$exp_date){ //create_contract(ref bdd, clef primaire du joueur concerné, clef primaire du joueur cible, date d'expiration du contrat (YYYY-MM-DD)) rajoute un contrat dans la table contrats et renvoie le numéro de contrat
		$req=$bdd->query("SELECT user_no FROM users WHERE id=$target_id");
		$target_no=$req->fetch();
		$req->closeCursor();
		srand();
		$cno='X'.rand(10000,99999).'C'.$target_id.'H14'.rand(10,99);
		$uid = intval($user_id);
		$tid = intval($target_id);
		$req = $bdd->prepare('INSERT INTO contracts (contract_no,user_id,target_id,target_no,complete,exp_date,start_date) VALUES (?,?,?,?,?,?,NOW())');
		$req->execute(array($cno,$user_id,$target_id,$target_no['user_no'],'0',$exp_date));
		return $cno;
	}

	function mark_as_complete ($bdd,$contract_id){// mark_as_complete(ref bdd, clef primaire du contrat) marque à 1 le champ 'complete' et renvoie true ou false si l'action à été effectuée
		try 
		{
			$req=$bdd->exec("UPDATE contracts SET complete ='1' WHERE id=$contract_id");
			//$req->execute(array('1',$contract_id));
		}
		catch (Exception $e) 
		{
			die('Erreur : ' . $e->getMessage());
			return FALSE;
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
				$s_code='XX';
				break;
		}
		$u_code.=substr($Sexe,0,-(strlen($Sexe)-1));
		$u_code.=rand(100,999);
		$u_code.=substr((string)$Phone,-2);
		$u_code.='XCH14';
		return $u_code;
	}

	function send_mail($ident,$pass,$user_id,$to_user_pseudo,$subject,$body){
		require 'include/lib/phpmailer/PHPMailerAutoload.php';
		if($subject==NULL){
			$subject='test';
		}
		$bdd=db_init();
		$sql = 'SELECT mail,pseudo FROM users WHERE pseudo=:pseudo';
		$req = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$req->execute(array(':pseudo' => '\''.$to_user_pseudo.'\''));
		$data=$req->fetch();
		//echo $data['mail'].'<br>'.$data['pseudo'];
		$req2=$bdd->query("SELECT mail,pseudo FROM users WHERE id='".$user_id."'");
		$data2=$req2->fetch();
		$to_mail=substr($data['mail'],1,(strlen($data['mail'])-2));
		$reply_mail=substr($data2['mail'],1,(strlen($data2['mail'])-2));
		//echo $data['mail'].'<br>'.$data['pseudo'];
		//echo $data2['mail'].'<br>'.$data2['pseudo'];
		$mail = new PHPMailer;
		
		$mail->isSMTP();                 
		$mail->Host = 'smtp2.ensea.fr';  
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';                              
		$mail->AuthType='PLAIN';
		$mail->Username = $ident;                            
		$mail->Password = $pass;
		$mail->Port = 587;
		//$mail->SMTPDebug=true;

		$mail->From = 'XCH2014@ensea.fr';
		$mail->FromName = $data2['pseudo'];
		$mail->addAddress($to_mail);  // Add a recipient $mail->addAddress('ellen@example.com');
		$mail->addReplyTo($reply_mail);
		//$mail->addBCC('XCH2014@ensea.fr');

		$mail->WordWrap = 50;                                
		$mail->isHTML(true);                                  

		$mail->Subject = $subject;
		$mail->Body    = $body;
		$mail->AltBody = $body;

		if(!$mail->send()) {
		   return 'Mailer Error: ' . $mail->ErrorInfo;
		}
		return SUCCESS;
	}

	function register($bdd,$psswd,$lname,$fname,$email,$phone,$school,$sex,$addA,$addB,$addC,$bd_y,$bd_m,$bd_d,$nn,$pos1,$pos2,$pos3,$pos4,$pos5){
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
		$phone = intval($_POST['Phone']);
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
		//envoie des informations à la DB

		$req = $bdd->prepare('INSERT INTO users (fname,lname,school,mail,phone,sexe,adresse,date_naissance,pseudo,psswd,user_no,position,confirmation_code,confirmed,reg_date) VALUES (:prenom,:nom,:ecole,:email,:phone,:sexe,:adresse,:date_n,:pseudo,:psswd,:ucode,:pos,:conf,:stat,NOW())');
		$req->execute(array(
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
		    'stat'=>''
	    ));
	}
?>