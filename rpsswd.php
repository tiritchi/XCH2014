//link with /include/register/reset_psswd.php
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
			<div class="col-md-3">
				<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading">Réinitialisation de mot passe</div>
					<form class="form-horizontal" action="reset_psswd.php" method="post">
						<div>
							<div class="input-group">
								<span class="input-group-addon">Email</span>
								<input id="subject" name="m" type="text" class="form-control" placeholder="">
							</div>
							<div class="input-group">
								<span class="input-group-addon">Nouveau mot de passe</span>
								<input id="subject" name="p" type="text" class="form-control" placeholder="">
							</div>
							<div class="modal-footer">
								<input type="hidden" name="c" value=$_GET['c']>
								<input type="hidden" name="a" value=$_GET['a']>
					        	<button id="Submit" value="SUBMIT" type="submit" class="btn btn-primary"> Go ! </button>	
						    </div>
						</div>
					</form>
				</div>
			</div>
		</body>