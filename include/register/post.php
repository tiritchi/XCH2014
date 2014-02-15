<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <?php require('include/lib/PasswordHash.php'); ?>
    <?php require('include/lib/functions.php');?>
</head>
<?php
	$bdd=db_init();
	
	$row_count = '0';
	$stmt = $bdd->prepare('SELECT mail FROM users WHERE mail=?');
	$stmt->execute(array($_POST['Email']));
	$row_count = $stmt->rowCount();
	if($row_count>=1)
	{
		echo '
			<div class="alert alert-warning">
  				<strong>Warning!</strong> Vous êtes déjà inscrit ! redirection sur la page d\'accueil dans 2 sec
			</div>';
        echo '<meta http-equiv="refresh" content="2; url=.">';
	}
	elseif (isset($_POST['password']) AND $_POST['password'] == "test" AND $row_count==0)
	{	
		if ($_FILES['profile']['error'] > 0) $erreur = "Erreur lors du transfert";
		if ($_FILES['profile']['size'] > 409600) $erreur = "Le fichier est trop gros";

		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$extension_upload = strtolower(  substr(  strrchr($_FILES['profile']['name'], '.')  ,1)  );
		echo $extension_upload;
		if ( !in_array($extension_upload,$extensions_valides) ) echo "Extension incorrecte";

		$image_sizes = getimagesize($_FILES['profile']['tmp_name']);
		if ($image_sizes[0] > '170' OR $image_sizes[1] > '180') $erreur = "Image trop grande";

		//Créer un dossier 'fichiers/1/'
		mkdir('ressources/1/', 0777, true);
		 
		//Créer un identifiant difficile à deviner
		$nom = md5(uniqid(rand(), true));

		$nom = "avatars/{$_POST['Nn']}.{$extension_upload}";
		$resultat = move_uploaded_file($_FILES['profile']['tmp_name'],$nom);
		if ($resultat) echo "Transfert réussi";

		echo $_POST['place'];
//	    register($bdd,$_POST['userpsswd'],$_POST['Lname'],$_POST['Fname'],$_POST['Email'],$_POST['Phone'],$_POST['School'],$_POST['Sexe'],$_POST['Adress_a'],$_POST['Adress_pc'],$_POST['Adress_c'],$_POST['Bd_y'],$_POST['Bd_m'],$_POST['Bd_d'],$_POST['Nn'],$_POST['pos1'],$_POST['pos2'],$_POST['pos3'],$_POST['pos4'],$_POST['pos5']);
   		echo '
   			<div class="alert alert-success">
  				<strong>Successful signup ! thanks</strong> <br>
  				redirection sur la page d\'accueil dans quelques secondes ...
			</div>';
        echo '<meta http-equiv="refresh" content="10; url=.">'; 
	}
	else
	{
		echo '<p> wrong password</p>';
		echo 'vous n\'êtes pas autorisé à vous inscrire';
	}
?>
</html>