<!DOCTYPE html>
		<html lang="en">
		<head>
		<meta charset="UTF-8">
		</head>

<?php
	include 'include/lib/functions.php';
	include 'include/lib/PasswordHash.php';

	if(isset($_POST['a']) && isset($_POST['m']) && isset($_POST['c'])){
		$res=reset_password($_POST['a'],$_POST['p'],$_GET['m'],$_POST['c']);
		
		if($_POST['a']==send){
			if($res==TRUE){
				echo 'Mail envoyé';
				echo '<meta http-equiv="refresh" content="0; url=admin">';
			}
		}
		else{
			if($res==TRUE){
			echo 'votre mot de passe à bien été modifié';
			}
			else{
				echo 'echec';
			}
		}
	}
?>