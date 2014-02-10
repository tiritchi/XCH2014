<!DOCTYPE html>
<head>
	<title>test db</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../signin.css"></link>   
</head>
<?php
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'raspberry');
		echo '<p> connected to DB test</p>';
	} 
	catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
		echo '<p> erreur DB</p>';
	} 
//	$bdd->exec('INSERT INTO users (fname,lname,mail,phone,sexe,date) VALUES (\'test\',\'test2\',\'aa@.com\',\'62065206\',\'Male\',\'\')');
//	echo '<p> inserted</p>';

?>
<html>
<body>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Panel heading</div>
		<div class="panel-body">
			<p>...</p>
		</div>

		<!-- Table -->
		<table class="table">
			<TR> 
				<TH> Jeu </TH> 
				<TH> Possesseur </TH> 
				<TH> Prix </TH> 
				<TH> Commentaires </TH> 
			</TR> 
		    <?php 
		    	$reponse = $bdd->query('SELECT * FROM jeux_video WHERE console=\'PC\'');
		    	while ($donnees = $reponse->fetch())
				{
				?>
					<TR> 
						<TD> <?php echo $donnees['nom'];?> </TD> 
						<TD> <?php echo $donnees['possesseur'];?> </TD> 
						<TD> <?php echo $donnees['prix'];?> </TD> 
						<TD> <?php echo $donnees['commentaires'];?> </TD> 
					</TR> 
				<?php
				}
					$reponse->closeCursor(); // Termine le traitement de la requête

				?>
		</table>
	</div>

	<p>
		test
	</p>
</body>
</html>