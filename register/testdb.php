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
		echo '<p> connected to DB test</p>';
		
		$bdd->exec("INSERT INTO users(fname,lname,mail,phone,sexe,date) VALUES('test','test,'aa@aa.com','0621849218','Male','')");
		$reponse = $bdd->query('SELECT * FROM users');
		while($donnees = $reponse->fetch())
		{
			?>
			<p>
		    	<?php echo $donnees['fname']; ?><br/>;
		    	<?php echo $donnees['lname']; ?><br/>;
		    	<?php echo $donnees['mail']; ?><br/>;
		    	<?php echo $donnees['phone']; ?><br/>;
		    	<?php echo $donnees['sexe']; ?><br/><br/>;
			</p>
			<?php
		}
		$reponse -> closeCursor();
		?>

		echo '<p>l utilisateur a ete rajouté</p>';
	} 
	catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
		echo '<p> erreur DB</p>';
	} 

?>
<html>
<body>
	<p>
		test
	</p>
</body>
</html>