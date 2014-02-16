<?php
 
if (isset($_GET['code']) && $_GET['code'] != "" && isset($_GET['mail']) && $_GET['mail'] != "" )
{
	require ('include/lib/functions.php');
	$stat=confirm_account($_GET['mail'],$_GET['code']);
	if($stat=='TRUE'){
		echo 'Your account is confirmed<br/> You can now login in your personnal account threw the home page <br/>';
		echo 'redirection sur la page d\'accueil dans 5 sec<br/>';
        echo '<meta http-equiv="refresh" content="5; url=.">';
	}
	else{
		echo $stat;
	}

}