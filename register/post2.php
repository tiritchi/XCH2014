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
			$bdd = exec('INSERT INTO users(id,fname,lname,mail,phone,sexe,date) VALUES(\'\',\'test\',\'test\',\'test\',\'test\',\'test\',\'\')');

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