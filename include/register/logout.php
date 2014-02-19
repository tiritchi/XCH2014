<?php
session_start();
 
// Suppression des variables de session et de la session
session_destroy();
 
// Suppression des cookies de connexion automatique
//setcookie('login', '');
//setcookie('pass_hache', '');
//session.cookie_lifetime == 0;
echo'session fermé';
header('Location: .'); 
?>
