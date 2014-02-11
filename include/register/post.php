<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <?php require('include/lib/PasswordHash.php'); ?>
</head>
<?php
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'raspberry');
//		echo '<p> connected to DB</p>';
	} 
	catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
		echo '<p> erreur DB</p>';
	}
	
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

		$nom = $_POST['Lname'];
		$prenom =$_POST['Fname'];
		$email =$_POST['Email'];
		$phone = $_POST['Phone'];
		$school = $_POST['School'];
		$sexe = $_POST['Sexe'];
		$adress = $_POST['Adress_a']."-".$_POST['Adress_pc']."-".$_POST['Adress_c'];
		$date = $_POST['Bd_y']."-".$_POST['Bd_m']."-".$_POST['Bd_d'];
		$nick = $_POST['Nn'];
		$psswd = $hash;


		//envoie des informations à la DB

		$req = $bdd->prepare('INSERT INTO users (fname,lname,school,mail,phone,sexe,adresse,date_naissance,pseudo,psswd,reg_date) VALUES (:prenom,:nom,:ecole,:email,:phone,:sexe,:adresse,:date_n,:pseudo,:psswd,NOW())');
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
		    'psswd'=>$psswd
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