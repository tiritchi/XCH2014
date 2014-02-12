<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <?php require('include/lib/PasswordHash.php'); ?>
    <?php require('include/lib/functions.php');?>
</head>
<?php
	$bdd=db_init();
	
	$row_count = '0';
	$stmt = $bdd->prepare('SELECT mail FROM users WHERE mail=?');
	$stmt->execute(array($_POST['Email']));
	$row_count = $stmt->rowCount();
	if($row_count>=1)
	{
		echo '
			<div class="alert alert-warning">
  				<strong>Warning!</strong> Vous êtes déjà inscrit ! redirection sur la page d\'accueil dans 2 sec
			</div>';
        echo '<meta http-equiv="refresh" content="2; url=.">';
	}
	elseif (isset($_POST['password']) AND $_POST['password'] == "test" AND $row_count==0)
	{	
		//hashage du password
		$password = $_POST['userpsswd'];
        $hasher = new PasswordHash(8, FALSE);
        $hash = $hasher->HashPassword($password);
        //password hashé

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


		//envoie des informations à la DB

		$req = $bdd->prepare('INSERT INTO users (fname,lname,school,mail,phone,sexe,adresse,date_naissance,pseudo,psswd,user_no,reg_date) VALUES (:prenom,:nom,:ecole,:email,:phone,:sexe,:adresse,:date_n,:pseudo,:psswd,:ucode,NOW())');
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
		    'ucode'=>$ucode
	    ));
   		echo '
   			<div class="alert alert-success">
  				<strong>Successful signup ! thanks</strong> <br>
  				redirection sur la page d\'accueil dans quelques secondes ...
			</div>';
        echo '<meta http-equiv="refresh" content="10; url=.">'; 
	}
	else
	{
		echo '<p> wrong password</p>';
		echo 'vous n\'êtes pas autorisé à vous inscrire';
	}
?>
</html>