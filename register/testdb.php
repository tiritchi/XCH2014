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
		
		$req=$bdd->prepare('INSERT INTO users(fname,lname,mail,phone,sexe,date) VALUES(:prenom,:nom,:mail,:tel,:sexe,'')');
		$req->execute(array(
			'prenom' = "test";
			'nom' = "test";
			'tel' = "0621849218";
			'mail' = "aaa@mail.com";
			'sexe' = "Male";
			));
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