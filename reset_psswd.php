<?php
	include 'include/lib/functions.php';

	$res=reset_password($_GET['p'],$_GET['m'],$_GET['c']);

	if($res==TRUE){
		echo 'votre mot de passe à bien été modifié';
	}
	else{
		echo 'echec';
	}
?>