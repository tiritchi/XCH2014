<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE')
	{
		if(isset($_GET['code']) && $_GET['code'] != ""){
			$code=$_GET['code'];
			if(!file_exists('ressources/1/'.$code.'.jpg')){
				$code='profile_resized';
				$file = 'ressources/1/'.$code.'.jpg';
				$type = 'image/jpeg';
				header('Content-Type:'.$type);
				header('Content-Length: ' . filesize($file));
				readfile($file);
			}
			else{
				$file = 'ressources/1/'.$code.'.jpg';
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
