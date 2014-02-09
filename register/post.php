<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
</head>
<?php
	if (isset($_POST['password']) and $_POST['password']=="test")
	{
		<body>    
			<p>Bonjour !</p>

			<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo htmlspecialchars($_POST['Last_name']); ?> !</p>

			<p>Si tu veux changer de prénom, <a href="register2.php">clique ici</a> pour revenir à la page formulaire.php.</p>
		</body>
	}
?>
</html>