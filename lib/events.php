<?php
	global $bdd;
	function db_init()
	{
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
	}
?>