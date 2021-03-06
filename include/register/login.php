<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['connected']=NULL;
$_SESSION['admin']=NULL;
$_SESSION['user']=NULL;
$_SESSION['user_id']=NULL;
?>
<!DOCTYPE HTML>
<html>
<head>
		<meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
        <title>logging in ..</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="signin.css"></link>
        <?php require('include/lib/PasswordHash.php'); ?>
        <?php require('include/lib/functions.php');?>
</head>
<?php

	$bdd=db_init();
	$mail = "'".$_POST['email']."'";
	$psswd= $_POST['password'];
	$stat=$bdd->prepare('SELECT * FROM XCH14_users WHERE mail=:mail');
	$stat->execute(array(
		'mail'=>$mail
		));
	$rcount=$stat->rowCount();
	

	if(!$rcount==1)
	{
		echo '<p> Vous n êtes pas inscrit</p>';
		echo 'redirection sur la page d\'accueil dans 2 sec';
        echo '<meta http-equiv="refresh" content="2; url=.">';
	}
	else
	{
		$req=$stat->fetch();
		$password_correct = $req['psswd']; /* Le hash stocké précédemment */
                $hasher = new PasswordHash(8, FALSE);
                $check = $hasher->CheckPassword($psswd, $password_correct);
         
                if ($check) {
                        if($req['confirmed']=='1'){
                                $_SESSION['user'] = substr($req['pseudo'],1,(strlen($req['pseudo'])-2));
                        	$_SESSION['connected']='TRUE';
                                $_SESSION['user_id'] = $req['id'];
                        	if($req['group']=="admin")
                        	{
                        		$_SESSION['admin']='TRUE';
                        		echo '<meta http-equiv="refresh" content="0; url=admin">';
                        	}
                        	else if($req['group']=="user")
                        	{
                                        $_SESSION['admin']='FALSE';
                			echo '<meta http-equiv="refresh" content="0; url=board">';
                        	}
                        	else
                        	{
                        		echo 'erreur<br/>';
                                        echo 'redirection sur la page d\'accueil dans 2 sec';
                        		echo '<meta http-equiv="refresh" content="2; url=.">';
                        	}
                        }
                        else{
                                echo 'Merci de confirmer votre compte avant de pouvoir accéder à cette page<br/>';
                                echo 'redirection sur la page d\'accueil dans 2 sec';
                                echo '<meta http-equiv="refresh" content="2; url=.">';
                        }
                }
                else {
                session_destroy();
                echo 'Password incorrect...<br/>';
                echo 'redirection sur la page d\'accueil dans 2 sec';
                echo '<meta http-equiv="refresh" content="2; url=.">'; 
                }
	}
?>
</html>