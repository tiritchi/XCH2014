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
	$bdd = exec('INSERT INTO users(fname,lname,mail,phone,sexe,date) VALUES(\'test\',\'test\',\'test\',\'test\',\'3232\',\'test\',\'\')');
?>
<html>
<body>
	<p>
		test
	</p>
</body>
</html>