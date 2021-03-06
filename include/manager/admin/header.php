<!DOCTYPE html>
		<html lang="en">
		<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1" name="viewport"></meta>
		<link rel="icon" type="image/png" href="ressources/favicon.png" />
		<title>Admin Board</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <style type="text/css">
            body { padding-top: 50px; }
        	.btn-toolbar {text-align:center;}

			.marge {
				margin-left: 5em;
			}

        </style>
		<?php require('include/lib/functions.php'); ?> 
		</head>
		<body>
	        <div id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">

	            <div class="container">
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>
	                    <a class="navbar-brand" href="admin">XCH 2014</a>
	                </div>

	                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                    <ul class="nav navbar-nav">
	                        <li><a href="" data-toggle="modal" data-toggle="modal" data-target="#mail">Mail</a></li>
	                        <li><a href="contrat">Gestionnaire de contrats</a></li>
	                        <li class="dropdown">
	                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Inscriptions<b class="caret"></b></a>
	                            <?php                             
		                            $monfichier = fopen('include/lib/register.txt', 'r+');
		                            $var = fgets($monfichier); 
		                            fclose($monfichier);
		                            $monfichier2 = fopen('include/lib/game.txt', 'r+');
		                            $var2 = fgets($monfichier2); 
		                            fclose($monfichier2);
		                        ?>
	                            <ul class="dropdown-menu btn-toolbar">
	                                <li><a href="game.php?action=register&do=1"><?php if($var==1){ echo'<i class="glyphicon glyphicon-ok pull-left"></i>';}?>Ouvrir</a></li>
	                                <li><a href="game.php?action=register&do=0"><?php if($var==0){ echo'<i class="glyphicon glyphicon-ok pull-left"></i>';}?>Fermer</a></li>
	                            </ul>
	                        </li>
	                        <li class="dropdown">
	                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Gestionnaire de jeu<b class="caret"></b></a>
	                            <ul class="dropdown-menu btn-toolbar">
	                                <li><a href="game.php?action=game&do=0"><?php if($var2==0){ echo'<i class="glyphicon glyphicon-ok pull-left"></i>';}?>Arret</a></li>
	                                <li><a href="game.php?action=game&do=1"><?php if($var2==1){ echo'<i class="glyphicon glyphicon-ok pull-left"></i>';}?>Phase 1</a></li>
	                                <li><a href="game.php?action=game&do=2"><?php if($var2==2){ echo'<i class="glyphicon glyphicon-ok pull-left"></i>';}?>Phase 2</a></li>
	                                <li><a href="game.php?action=game&do=3"><?php if($var2==3){ echo'<i class="glyphicon glyphicon-ok pull-left"></i>';}?>Phase 3</a></li>
	                                <li class="divider"></li>
	                                <li><a href="game.php?action=game&do=dl" class="list-group-item list-group-item-info">Sauvegarde jeu</a></li>
	                                <li><a href="game.php?action=score&do=flush" class="list-group-item list-group-item-danger">/!\ Réinitialiser scores /!\</a></li>
	                                <li><a href="game.php?action=game&do=flush" class="list-group-item list-group-item-danger">/!\ Réinitialiser scores & contrats /!\</a></li>
	                            </ul>
	                        </li>
	                    </ul>
	                    <ul class="nav navbar-nav navbar-right">
	                    	<li class="dropdown">
	                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['user']?>		<b class="caret"></b></a>
	                            <ul class="dropdown-menu btn-toolbar">
	                                <li><a href="logout"><i class="glyphicon glyphicon-log-out "></i>Log out</a></li>
	                            </ul>
	                        </li>
	                    </ul>

	                </div>
	            </div>
	        </div>
	        <!-- Modal -->
			<form class="form-horizontal" action="mailer" method="post">
				<div class="modal fade" id="mail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
				    	<div class="modal-content">
			    		
				    		<div class="modal-header">
				        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        		<h4 class="modal-title" id="myModalLabel">Send a mail</h4>
				    		</div>
				    		<div class="modal-body">
								<div class="input-group">
									<span class="input-group-addon">To</span>
									<input id="to" name="to" type="text" class="form-control" placeholder="Nickname" value="prout">
								</div>
								<div class="input-group">
									<span class="input-group-addon">subject</span>
									<input id="subject" name="subject" type="text" class="form-control" placeholder="subject">
								</div>
								<div class="input-group">
								    <textarea id="body" name="body" rows="5" style="width:485px"></textarea>
								</div>
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
					        	<button id="Submit" value="SUBMIT" type="submit" class="btn btn-primary"> Send <i class="glyphicon glyphicon-send"></i></button>	
						    </div>
					    </div>
					</div>
				</div>
			</form>
			
