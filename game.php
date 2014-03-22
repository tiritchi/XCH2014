<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='TRUE')
    {
    	if(isset($_GET['action']) && $_GET['action'] != "" && isset($_GET['do']) && $_GET['do'] != ""){
	    	if($_GET['action']=="register"){
				$monfichier = fopen('include/lib/register.txt', 'r+');
				 
				$var = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
				fseek($monfichier, 0); // On remet le curseur au début du fichier
				fputs($monfichier, $_GET['do']); // On écrit le nouveau nombre de pages vues			 
				fclose($monfichier);
			}
			elseif($_GET['action']=="game"){
				$monfichier = fopen('include/lib/game.txt', 'r+');
				 
				$var = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
				fseek($monfichier, 0); // On remet le curseur au début du fichier
				fputs($monfichier, $_GET['do']); // On écrit le nouveau nombre de pages vues			 
				fclose($monfichier);
			}
			elseif ($_GET['action']=="score") {
				require('include/lib/functions.php');
				$bdd=db_init();
				$bdd->exec("UPDATE XCH14_users SET score=0");
			}
		}
		echo '<meta http-equiv="refresh" content="0; url=admin">';
    }
elseif(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='FALSE')
    {               
        echo '<meta http-equiv="refresh" content="0; url=board">';    
    }
else{
		echo '<meta http-equiv="refresh" content="0; url=.">'; 
	}
?>
