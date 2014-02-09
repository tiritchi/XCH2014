<!DOCTYPE html>
<head>
	<title>test db</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
</head>
<?php
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'raspberry');
		echo '<p> connected to DB</p>';
	} 
	catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
		echo '<p> erreur DB</p>';
	} 
		// Si tout va bien, on peut continuer
	$nom = "test";
	$possesseur ="test";
	$console ="test";
	$prix = "52";
	$nbre_joueurs_max = "52";
	$commentaires = "test";

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

	$reponse = $bdd->query('SELECT * FROM jeux_video WHERE possesseur="test" ');

		// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
	?>
	    <p>
		    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
		    Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
		    Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
		    <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
		</p>
		<?php
	}

	$reponse->closeCursor(); // Termine le traitement de la requête
?>
<html>
<body>
	<p>
		test
	</p>
</body>
</html>