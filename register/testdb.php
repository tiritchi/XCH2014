<DOCTYPE html>
<?php
	try 
	{
		$bdd = new mysql_connect('mysql:host=localhost;dbname=test', 'root', 'raspberry');
	} 
	catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
		echo '<p> erreur DB</p>'
	} 
		// Si tout va bien, on peut continuer

		// On récupère tout le contenu de la table jeux_video
	$reponse = $bdd->query('SELECT * FROM jeux_video');

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