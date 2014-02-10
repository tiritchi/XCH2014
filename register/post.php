<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <?php require('../lib/PasswordHash.php'); ?>
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
		
		//hashage du password
		$password = $_POST['userpsswd'];
        $hasher = new PasswordHash(8, FALSE);
        $hash = $hasher->HashPassword($password);
        //password hashé


		echo '<p> good password</p>';
		$group ='';
		$nom = $_POST['Lname'];
		$prenom =$_POST['Fname'];
		$email =$_POST['Email'];
		$phone = $_POST['Phone'];
		$sexe = $_POST['sexe'];
		$psswd = $hash;
//		$date = NOW();

		//envoie des informations à la DB

		$req = $bdd->prepare('INSERT INTO users (group,fname,lname,mail,phone,sexe,psswd,reg_date) VALUES (:group,:prenom,:nom,:email,:phone,:sexe,:psswd,NOW())');
		$req->execute(array(
			'group'=>$group,
		    'nom' => $nom,
		    'prenom' => $prenom,
		    'email' => $email,
		    'phone' => $phone,
		    'sexe' => $sexe,
		    'psswd'=>$psswd
//		    'date'=>$date

	    ));
	}
	else
	{
		echo '<p> wrong password</p>';
	}
?>
</html>