<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['user']=NULL;
$_SESSION['connected']=FALSE;
?>
<!DOCTYPE HTML>
<html>
<head>
		<meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
        <title>logging in ..</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="signin.css"></link>
        <?php require('lib/PasswordHash.php'); ?>
</head>
<?php
//	echo 'test';
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'raspberry');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//		echo '<p> connected to DB</p>';
	} 
	catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
		echo '<p> erreur DB</p>';
	}
	$user = $_POST['email'];
	$psswd= $_POST['password'];
	$stat=$bdd->prepare('SELECT * FROM users WHERE mail=:mail');
	$stat->execute(array(
		'mail'=>$user
		));
	$rcount=$stat->rowCount();
	
//	echo '<p> DB reached</p>';
	if(!$rcount==1)
	{
		echo '<p> Vous n êtes pas inscrit</p>';
		echo 'redirection sur la page d\'accueil dans 2 sec';
        echo '<meta http-equiv="refresh" content="2; url=xTremCergyHunting.php">';
	}
	else
	{
//		echo $req['psswd'];
		$req=$stat->fetch();
		$password_correct = $req['psswd']; /* Le hash stocké précédemment */
        $hasher = new PasswordHash(8, FALSE);
        $check = $hasher->CheckPassword($psswd, $password_correct);
         
        if ($check) {
        	$_SESSION['user']=$_POST['email'];
        	$_SESSION['connected']=TRUE;
        	echo "Redirecting ... ";
        	if($req['group']=="admin")
        	{
        		echo '<meta http-equiv="refresh" content="1; url=manager/admin_board.php">';
        	}
        	else if($req['group']=="user")
        	{
				echo '<meta http-equiv="refresh" content="1; url=manager/board.php">';
        	}
        	else
        	{
        		echo 'erreur';
        		echo '<meta http-equiv="refresh" content="2; url=xTremCergyHunting.php">';
        	}
        }
        else {
        session_destroy();
        echo 'Password incorrect...<br/>';
        echo 'redirection sur la page d\'accueil dans 2 sec';
        echo '<meta http-equiv="refresh" content="2; url=xTremCergyHunting.php">'; 
        }
	}
?>
</html>