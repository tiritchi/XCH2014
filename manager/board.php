<?php
session_start(); // On démarre la session AVANT toute chose
?>
<?php 
	include("../access.php");
	if($grant==true)
	{
		echo $_SESSION['user'];
		echo file_get_contents('board_main.php');
	}
	else
	{
		echo '<meta http-equiv="refresh" content="2; url=../xTremCergyHunting.php">';
	}
?>



	
