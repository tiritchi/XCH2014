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
		$req=$bdd->prepare('SELECT * FROM users WHERE id=?');
		$req->execute(array($user_id));
		$donnees = $req->fetch();
		$tab = array(substr($donnees['pseudo'],1,(strlen($donnees['pseudo'])-2)),substr($donnees['fname'],1,(strlen($donnees['fname'])-2)),substr($donnees['lname'],1,(strlen($donnees['lname'])-2)),substr($donnees['school'],1,(strlen($donnees['school'])-2)),substr($donnees['mail'],1,(strlen($donnees['mail'])-2)),substr($donnees['sexe'],1,(strlen($donnees['sexe'])-2)),$donnees['date_naissance'],"0".$donnees['phone'],substr($donnees['adresse'],1,(strlen($donnees['adresse'])-2)),$donnees['user_no']);
		return $tab; 
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

	function send_mail($ident,$pass,$user,$to_user_id,$subject,$body){
		require 'include/lib/phpmailer/PHPMailerAutoload.php';
		$bdd=db_init();
		$req=$bdd->query("SELECT mail FROM users WHERE id='".$to_user_id."'");
		$data=$req->fetch();
		$sender=substr($data['mail'],1,(strlen($data['mail'])-2));
		echo $data['mail'].'<br>'.$sender.'<br>';
		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $ident;                            // SMTP username
		$mail->Password = $pass;                           // SMTP password
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->SMTPDebug = 1;                            // Enable encryption, 'ssl' also accepted

		$mail->From = $user;
		$mail->FromName = $user;
		$mail->addAddress($sender);  // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		$mail->addReplyTo($sender);
		//$mail->addCC('tiritchi@gmail.com');
		//$mail->addBCC('bcc@example.com');

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		//$mail->addAttachment('/var/www/XCH2014/testmail.php');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $body;
		$mail->AltBody = $body;

		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}

		echo 'Message has been sent';

	}
?>