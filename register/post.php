<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
</head>
<?php 
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'raspberry');
	} 
	catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
		echo '<p> erreur DB</p>'
	} 
	
	if (isset($_POST['password']) AND $_POST['password'] == "test")
	{
	?>
		<body>    
			<p>Bonjour !</p>

			<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo htmlspecialchars($_POST['Last_name']); ?> !</p>

			<p>Si tu veux changer de prénom, <a href="register2.php">clique ici</a> pour revenir à la page formulaire.php.</p>
		</body>
		<?php
	}
	else 
	{
		echo '<p>wrong password</p>';
	}
?>
</html>