<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
</head>
<?php
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'raspberry');
		echo '<p> connected to DB</p>';

		if (isset($_POST['password']) AND $_POST['password'] == "test")
		{
			echo '<p> good password</p>';
			//$bdd = exec('INSERT INTO users(id,fname,lname,mail,phone,sexe,date) VALUES(\'\',\'test\',\'test\',\'test\',\'test\',\'test\',\'\')');
			$nom = "test2";
			$possesseur ="test2";
			$console ="test2";
			$prix = "522";
			$nbre_joueurs_max = "522";
			$commentaires = "test2";

				// On récupère tout le contenu de la table jeux_video
			$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
			$req->execute(array(
			    'nom' => $nom,
			    'possesseur' => $possesseur,
			    'console' => $console,
			    'prix' => $prix,
			    'nbre_joueurs_max' => $nbre_joueurs_max,
			    'commentaires' => $commentaires
		    ));
		}
		else
		{
			echo '<p> wrong password</p>';
		}
	} 
	catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
		echo '<p> erreur DB</p>';
	}
?>
</html>