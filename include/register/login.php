<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['connected']=FALSE;
$_SESSION['admin']=FALSE;
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
//	echo 'test';
	$bdd=db_init();
	$mail = "'".$_POST['email']."'";
	$psswd= $_POST['password'];
	$stat=$bdd->prepare('SELECT * FROM users WHERE mail=:mail');
	$stat->execute(array(
		'mail'=>$mail
		));
	$rcount=$stat->rowCount();
	
//	echo '<p> DB reached</p>';
	if(!$rcount==1)
	{
		echo '<p> Vous n êtes pas inscrit</p>';
		echo 'redirection sur la page d\'accueil dans 2 sec';
        echo '<meta http-equiv="refresh" content="2; url=.">';
	}
	else
	{
//		echo $req['psswd'];
		$req=$stat->fetch();
		$password_correct = $req['psswd']; /* Le hash stocké précédemment */
                $hasher = new PasswordHash(8, FALSE);
                $check = $hasher->CheckPassword($psswd, $password_correct);
         
                if ($check) {
                        $_SESSION['user'] = substr($req['pseudo'],1,(strlen($req['pseudo'])-2));
                	$_SESSION['connected']=TRUE;
                        $_SESSION['user_id'] = $req['id'];
//                	echo "Redirecting ... ";
                	if($req['group']=="admin")
                	{
                		$_SESSION['admin']=TRUE;
                		echo '<meta http-equiv="refresh" content="0; url=admin">';
                	}
                	else if($req['group']=="user")
                	{
        				echo '<meta http-equiv="refresh" content="0; url=board">';
                	}
                	else
                	{
                		echo 'erreur';
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