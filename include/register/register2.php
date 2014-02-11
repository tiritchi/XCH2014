<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="signin.css"></link>   
</head>

<body>
	<div class="col-lg-4 col-lg-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<ul class="pager">
					<li class="previous"><a href=".">&larr; ACCUEIL</a></li>
					<li class="next"><h2 class="panel-title">Formulaire d'inscription</h2></li>
				</ul>				
  			</div>
  			<div class="panel-body">
  				<form class="form-horizontal" action="post" method="post">
				<fieldset>

				<!-- Text input-->
				<div class="input-group">
					<span class="input-group-addon">First name</span>
				    <input id="First name" name="Fname" placeholder="First name" class="form-control" required="" type="text">
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
				    <span class="input-group-addon">Last name</span>
				    <input id="Last name" name="Lname" placeholder="Last_name" class="form-control" required="" type="text">
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
				    <span class="input-group-addon">eMail</span>
				    <input id="Email" name="Email" placeholder="example@example.com" class="form-control" required="" type="text">
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
				    <span class="input-group-addon">Phone N°</span>
				    <input id="Phone N°" name="Phone" placeholder="06XXXXXXXX" class="form-control" required="" type="text">
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
				    <span class="input-group-addon">Password</span>
				    <input type="password" id="userpsswd" name="userpsswd" placeholder="password" class="form-control" required="">
				</div><br/>

				<!-- Select Basic -->
				<div class="input-group">
				    <span class="input-group-addon">Sexe</span>
				    <select class="selectpicker" name="sexe">
						<option>Male</option>
						<option>Female</option>
					</select>
				</div><br/>

				<!-- Button -->
				<div class="row">
					<div class ="col-lg-6 col-xs-6 col-lg-offset-3 col-xs-offset-3">
						<div class="input-group">
							<input type="password" id="password" name="password" placeholder="password" class="form-control" required=""> 
						</div>
					</div>
					<div >
						<div class="input-group">
							<button id="Submit" name="Submit" class="btn btn-primary">Submit</button>
						</div>
					</div >
				</div>

				</fieldset>
				</form>
  			</div>
		</div>
	</div>
</body>
</html>
