<!DOCTYPE html>
		<html lang="en">
		<head>
		<meta charset="UTF-8">
		<title>Admin Board</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <style type="text/css">
            .bs-example{
                margin: 20px;
            }
        </style>
		</head>
		<body>
			<div class="jumbotron">

			    <div class="bs-example">
			        <nav id="myNavbar" class="navbar navbar-default" role="navigation">

			            <div class="container">
			                <div class="navbar-header">
			                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			                        <span class="sr-only">Toggle navigation</span>
			                        <span class="icon-bar"></span>
			                        <span class="icon-bar"></span>
			                        <span class="icon-bar"></span>
			                    </button>
			                </div>

			                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			                    <ul class="nav navbar-nav">
			                        <li><a href="index.php?page=admin">Tableau de Bord</a></li>
			                        <li><a href="#">Profile  <span class="badge">42</span></a></li>
			                        <li class="dropdown">
			                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Messages <span class="badge">42</span><b class="caret"></b></a>
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
			                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-user"></span><?php echo "  ".$_SESSION['user']?> <b class="caret"></b></a>
			                            <ul class="dropdown-menu">
			                                <li><a href="#">Action</a></li>
			                                <li><a href="#">Another action</a></li>
			                                <li class="divider"></li>
			                                <li><a href="logout">Log out</a></li>
			                            </ul>
			                        </li>

			                    </ul>


			                </div>
			            </div>
			        </nav>
			    </div>