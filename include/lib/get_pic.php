<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='FALSE')
	{
		if(isset($_GET['pseudo']) && $_GET['pseudo'] != ""){
			$file = '../../ressources/1/'.$_GET['pseudo'].'.jpg';
			$type = 'image/jpeg';
			header('Content-Type:'.$type);
			header('Content-Length: ' . filesize($file));
			readfile($file);
		}
	}
		
?>
