<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
</head>
<?php
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'raspberry');
		echo '<p> connected to DB</p>';
	} 
	catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
		echo '<p> erreur DB</p>';
	}

	if (isset($_POST['password']) AND $_POST['password'] == "test")
	{
		echo '<p> good password</p>';
		$nom = $_POST['Lname'];
		$prenom =$_POST['Fname'];
		$email =$_POST['Email'];
		$phone = $_POST['Phone'];
		$sexe = $_POST['sexe'];
		$psswd = $_POST['user_psswd'];
		$date = '';

		$req = $bdd->prepare('INSERT INTO users (fname,lname,mail,phone,sexe,password,date) VALUES (:prenom,:nom,:email,:phone,:sexe,:psswd,:date)');
		$req->execute(array(
		    'nom' => $nom,
		    'prenom' => $prenom,
		    'email' => $email,
		    'phone' => $phone,
		    'sexe' => $sexe,
		    'date'=>$date,
		    'psswd'=>$psswd
	    ));
	}
	else
	{
		echo '<p> wrong password</p>';
	}
?>
</html>