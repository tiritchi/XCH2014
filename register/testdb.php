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
//	$bdd = exec('INSERT INTO users(id,fname,lname,mail,phone,sexe,date) VALUES('','','','','','','')');
?>
<html>
<body>
	<p>
		test
	</p>
</body>
</html>