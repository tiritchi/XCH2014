<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='FALSE')
	{
		$pseudo=$_GET['pseudo'];
		if(isset($_GET['pseudo']) && $_GET['pseudo'] != ""){
			if(!file_exists($pseudo.'.jpg')){
				$pseudo='profil_resized';
			}
			else{
				$file = 'ressources/1/'.$pseudo.'.jpg';
				$type = 'image/jpeg';
				header('Content-Type:'.$type);
				header('Content-Length: ' . filesize($file));
				readfile($file);
			}
		}
		else{
			echo 'petit malin c\'est pas par ici l\'entrée'; 
		}
		
	}
		
?>
