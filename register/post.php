<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
</head>
<?php
	$fname=$_POST['Fname'];
	$lname=$_POST['Lname'];
	$phone=$_POST['Phone'];
	$email=$_POST['Email'];
	$sexe=$_POST['sexe'];
	 
	if (isset($_POST['password']) AND $_POST['password'] == "test")
	{
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

		$req = $bdd->prepare('INSERT INTO users(id,fname,lname,mail,phone,sexe,date) VALUES('',:nom, :prenom,:mail,:tel,:sexe,'')');
		$req = execute(array(
			'prenom' => $fname;
			'nom'=> $lname;
			'tel' => $phone;
			'mail' => $email;
			'sexe' => $sexe;
			));
		$reponse = $bdd->query('SELECT * FROM users');

		while ($donnees = $reponse->fetch())
		{
		?>
		    <p>
		    	<?php echo $donnees['fname']; ?><br/>
		    	<?php echo $donnees['lname']; ?><br/>
		    	<?php echo $donnees['mail']; ?><br/>
		    	<?php echo $donnees['phone']; ?><br/>
		    	<?php echo $donnees['sexe']; ?><br/><br/>
			</p>
			<?php
		}

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