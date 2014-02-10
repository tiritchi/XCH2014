    <?php
	$grant = true;
    /* session_start();  */// ici on continue la session
    if ((isset($_SESSION['user'])) && ($_SESSION['pseudo'] != ''))
    {
	return $grant= true;
    // la session est bien active, et la personne est bien connectée ...
    // on affiche ici le contenu de la page
    }
    else
    {
    // aie, quelqu'un tente de contourner mon système sans passer par le formulaire de connexion !
    //echo '<p>Vous n\'etes pas connecte,<br/> Veuillez vous connectez pour avoir acces à cette page</p>';
	return $grant= false;
//	exit(); // par cette commande, on coupe l'exécution de la page
    }
    ?>