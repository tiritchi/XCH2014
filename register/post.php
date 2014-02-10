<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../signin.css"></link>
    <?php require('../lib/PasswordHash.php'); ?>
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
	$stmt = $bdd->query('SELECT mail FROM users WHERE mail=\''$_POST['Email']'\'');
	$row_count = $stmt->rowCount();

	if($row_count==1)
	{
		echo '
			<div class="alert alert-warning">
  				<a href="../xTremCergyHunting.php" class="alert-link">Vous êtes déjà inscrit</a>
			</div>';
		echo 'redirection sur la page d\'accueil dans 2 sec';
        echo '<meta http-equiv="refresh" content="10; url=../xTremCergyHunting.php">';
	}
	elseif (isset($_POST['password']) AND $_POST['password'] == "test" AND $row_count==0)
	{	
		echo $row_count;
		//hashage du password
		$password = $_POST['userpsswd'];
        $hasher = new PasswordHash(8, FALSE);
        $hash = $hasher->HashPassword($password);
        //password hashé

		$nom = $_POST['Lname'];
		$prenom =$_POST['Fname'];
		$email =$_POST['Email'];
		$phone = $_POST['Phone'];
		$sexe = $_POST['sexe'];
		$psswd = $hash;


		//envoie des informations à la DB

		$req = $bdd->prepare('INSERT INTO users (fname,lname,mail,phone,sexe,psswd,reg_date) VALUES (:prenom,:nom,:email,:phone,:sexe,:psswd,NOW())');
		$req->execute(array(
		    'nom' => $nom,
		    'prenom' => $prenom,
		    'email' => $email,
		    'phone' => $phone,
		    'sexe' => $sexe,
		    'psswd'=>$psswd
	    ));
   		echo '
   			<div class="alert alert-success">
  				<a href="../xTremCergyHunting.php" class="alert-link">Successful signup ! thanks</a>
			</div>';
		echo 'redirection sur la page d\'accueil dans quelques secondes ...';
        echo '<meta http-equiv="refresh" content="10; url=../xTremCergyHunting.php">'; 
	}
	else
	{
		echo '<p> wrong password</p>';
	}
?>
</html>