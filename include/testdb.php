<!DOCTYPE html>
<head>
	<title>test db</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="signin.css"></link> 
    <?php require('lib/events.php'); ?>  
</head>
<?php
	$bdd=db_init();
//	$bdd->exec('INSERT INTO users (fname,lname,mail,phone,sexe,date) VALUES (\'test\',\'test2\',\'aa@.com\',\'62065206\',\'Male\',\'\')');
//	echo '<p> inserted</p>';

?>
<html>
<body>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Panel heading</div>

		<!-- Table -->
		<table class="table">
			<thead>
				<TR> 
					<TH> Jeu </TH> 
					<TH> Possesseur </TH> 
					<TH> Prix </TH> 
					<TH> Commentaires </TH> 
				</TR>
			</thead>
			<tbody> 
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
				</tbody>
		</table>
	</div>

	<p>
		test
	</p>
</body>
</html>