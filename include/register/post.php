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
		//
		//la partie grisée correspond à l'upload d'image qui à été désactivée dans cette version de site
		//

		//test des caractéristiques de l'image
		//if ($_FILES['profile']['error'] > 0){
		//	$erreur = array("Erreur lors du transfert");
		//} 
		//if ($_FILES['profile']['size'] > 409600){
		//	array_push($erreur, "Le fichier est trop gros") ;
		//} 
		//$extensions_valides = array( 'jpg' , 'jpeg' );
		//$extension_upload = strtolower(  substr(  strrchr($_FILES['profile']['name'], '.')  ,1)  );
		//if ( !in_array($extension_upload,$extensions_valides) ){
		//	array_push($erreur, "extension invalide") ;
		//} 
		//$image_sizes = getimagesize($_FILES['profile']['tmp_name']);
		//if ($image_sizes[0] > 170 OR $image_sizes[1] > 180){
		//	array_push($erreur ,"Image trop grande");
		//}

		//Créer un dossier 'fichiers/1/'
		//mkdir('ressources/1/', 0777, true);
		 
		//test si erreur annule l'inscription
		//if($erreur==NULL){
		//	$nom = "ressources/1/{$_POST['Nn']}.{$extension_upload}";
		//	$resultat = move_uploaded_file($_FILES['profile']['tmp_name'],$nom);

		    register($bdd,$_POST['userpsswd'],$_POST['Lname'],$_POST['Fname'],$_POST['Email'],$_POST['Phone'],$_POST['School'],$_POST['Sexe'],$_POST['Adress_a'],$_POST['Adress_pc'],$_POST['Adress_c'],$_POST['Bd_y'],$_POST['Bd_m'],$_POST['Bd_d'],$_POST['Nn'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5']);
   			echo '
   				<div class="alert alert-success">
  					<strong>Successful signup ! thanks</strong> <br>
  					redirection sur la page d\'accueil dans quelques secondes ...
				</div>';
        	echo '<meta http-equiv="refresh" content="10; url=.">';

		//}
		//else{
		//	foreach ($erreur as $er) {
		//		echo $er;
		//	}
		}

 
	}
	else
	{
		echo '<p> wrong password</p>';
		echo 'vous n\'êtes pas autorisé à vous inscrire';
	}
?>
</html>