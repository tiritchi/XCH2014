<!DOCTYPE html>
<head>
	<title>test db/title>
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
				<TH> Titre A1 </TH> 
				<TH> Titre A2 </TH> 
				<TH> Titre A3 </TH> 
				<TH> Titre A4 </TH> 
			</TR> 
		    <?php 
		    	$reponse = $bdd->query('SELECT * FROM jeux_video WHERE console=\'PC\'');
		    	while ($donnees = $reponse->fetch())
				{
				?>
					<TR> 
						<TH> Titre B1 </TH> 
						<TD> Valeur B2 </TD> 
						<TD> Valeur B3 </TD> 
						<TD> Valeur B4 </TD> 
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