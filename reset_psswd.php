<!DOCTYPE html>
		<html lang="en">
		<head>
		<meta charset="UTF-8">
		</head>

<?php
	include 'include/lib/functions.php';
	include 'include/lib/PasswordHash.php';

	if(isset($_GET['a']) && isset($_GET['m']) && isset($_GET['c'])){
		$res=reset_password($_GET['a'],$_GET['p'],$_GET['m'],$_GET['c']);
		
		if($res==TRUE){
			echo 'votre mot de passe à bien été modifié';
		}
		else{
			echo 'echec';
		}
	}
?>