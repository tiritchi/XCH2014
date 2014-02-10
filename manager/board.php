<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!DOCTYPE HTML>
<head>
	<title>Board</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../signin.css"></link> 
</head>
<html>
	<nav class="navbar navbar-inverse" role="navigation">
		<p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link"><?php echo $_SESSION['user']?></a></p>
	</nav>
	<div class="jumbotron">
		<h1>Hello, world!</h1>
		<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
		<div class="dropdown">
			<a data-toggle="dropdown" href="#">Dropdown trigger</a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			    <li><a href="#">Action</a></li>
			    <li><a href="#">Another action</a></li>
			    <li><a href="#">Something else here</a></li>
		  	</ul>
		</div>

	</div>

	<script src="../bootstrap/js/bootstrap.min.js"></script>
</html>