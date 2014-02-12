<?php

	$bdd=NULL;

	function db_init()
	{
		global $bdd;
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
		return $bdd;
	}

	function add_user_event()
	{
		return 0;
	}

	function mark_as_read()
	{
		return 0;
	}
?>