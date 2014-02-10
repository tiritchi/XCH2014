<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!DOCTYPE HTML>
<head>
	<title>Board</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
</head>
<html>
	<p> <?php echo $_SESSION['user']; ?> </p>
</html>