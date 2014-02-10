<!DOCTYPE html>
		<html lang="en">
		<head>
		<meta charset="UTF-8">
		<title>Board</title>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
		<style type="text/css">
			.bs-example{
		    	margin: 20px;
		    }
		</style>
		</head>
		<body>
			<div class="page-header">
			    <div class="bs-example">
			        <nav id="myNavbar" class="navbar navbar-inverse" role="navigation">

			            <div class="container">
			                <div class="navbar-header">
			                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			                        <span class="sr-only">Toggle navigation</span>
			                        <span class="icon-bar"></span>
			                        <span class="icon-bar"></span>
			                        <span class="icon-bar"></span>
			                    </button>
			                    <a class="navbar-brand" href="#">Brand</a>
			                </div>

			                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			                    <ul class="nav navbar-nav">
			                        <li><a href="#">Home</a></li>
			                        <li><a href="#">Profile</a></li>
			                        <li class="dropdown">
			                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Messages <b class="caret"></b></a>
			                            <ul class="dropdown-menu">
			                                <li><a href="#">Inbox</a></li>
			                                <li><a href="#">Drafts</a></li>
			                                <li><a href="#">Sent Items</a></li>
			                                <li class="divider"></li>
			                                <li><a href="#">Trash</a></li>
			                            </ul>
			                        </li>
			                    </ul>
			                    <ul class="nav navbar-nav navbar-right">
			                        <li class="dropdown">
			                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $_SESSION['user']?> <b class="caret"></b></a>
			                            <ul class="dropdown-menu">
			                                <li><a href="#">Action</a></li>
			                                <li><a href="#">Another action</a></li>
			                                <li class="divider"></li>
			                                <li><a href="index.php?page=logout">Log out</a></li>
			                            </ul>
			                        </li>
			                    </ul>
			                    <span class="glyphicon glyphicon-user"></span>

			                </div>
			            </div>
			        </nav>
			    </div>
			</div>