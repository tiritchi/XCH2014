<!DOCTYPE html>
		<html lang="en">
		<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1" name="viewport"></meta>
		<title>Admin Board</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <style type="text/css">
            body { padding-top: 50px; }
        <?php require('include/lib/functions.php'); ?>  
        </style>
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
	                        <li><a href="#">Home</a></li>
	                        <li><a href="#">Profile</a></li>
	                        <li><a href="#" data-toggle="dropdown" data-toggle="modal" data-target="#mail">Mail</b></a></li>
	                        
	                    </ul>
	                    <ul class="nav navbar-nav navbar-right">
	                        <li class="dropdown">
	                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $_SESSION['user']?> <b class="caret"></b></a>
	                            <ul class="dropdown-menu">
	                                <li><a href="#">Settings<span class="glyphicon glyphicon-cog pull-right"></span></a></li>
	                                <li class="divider"></li>
	                                <li><a href="logout">Log out<span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
	                            </ul>
	                        </li>
	                    </ul>

	                </div>
	            </div>
	        </div>

    		<!-- Modal -->
			<div class="modal fade" id="mail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <input class="form-control" type="text" placeholder="Enter target number here..."></input> 
			      </div>
			      <div class="modal-footer">
                    <div class="input-group">
                       
                          <span class="input-group-btn">
                          <button class="btn btn-default" type="button">Submit</button>
                       </span>
                    </div>
                  </div>
			    </div>
			  </div>
			</div>