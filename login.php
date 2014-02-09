<!DOCTYPE HTML>
<html>

<?php
    $password_correct = $hash; /* Le hash stocké précédemment */
    $hasher = new PasswordHash(8, FALSE);
    $check = $hasher->CheckPassword($password, $password_correct);
     
    if ($check) {
     echo "Password correct!";
    }
    else {
     echo 'Password incorrect...<br/>';
    }
?>

//<?php 
//        $password = "test";
//        $hasher = new PasswordHash(8, FALSE);
//        $hash = $hasher->HashPassword($password);
//        echo $hash;
//    ?>

</html>

