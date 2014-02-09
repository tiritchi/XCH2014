<!DOCTYPE HTML>
<html>
<head>
		<meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
        <title>logging in ../title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="signin.css"></link>
        <?php require('lib/PasswordHash.php'); ?>
</head>
<?php
	echo 'test';
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
	$user = $_POST['email'];
	$psswd= $_POST['password'];
	$req=$bdd->query('SELECT psswd FROM users WHERE mail=/'$user/'');
	echo '<p> DB reached</p>';
	if($req==NULL)
	{
		echo '<p> Vous n\'êtes pas inscrit</p>';
	}
	else
	{
		$password_correct = $req['psswd']; /* Le hash stocké précédemment */
        $hasher = new PasswordHash(8, FALSE);
        $check = $hasher->CheckPassword($psswd, $password_correct);
         
        if ($check) {
         echo "Password correct!";
        }
        else {
         echo 'Password incorrect...<br/>';
        }
	}
?>
</html>