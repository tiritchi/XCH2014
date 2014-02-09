<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../signin.css"></link>
<!--    <script type="text/javascript" src="bootstrap-select.js"></script>
    <link rel="stylesheet2" type="text/css" href="bootstrap-select.css">
    <script type="text/javascript">
        $(window).on('load', function () {

            $('.selectpicker').selectpicker({
                'selectedText': 'cat'
            });

            // $('.selectpicker').selectpicker('hide');
        });
    </script>
-->    
</head>

<body>
	<div class="col-lg-4 col-lg-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
   				 <h3 class="panel-title">Formulaire d'inscription</h3>
  			</div>
  			<div class="panel-body">
  				<form class="form-horizontal" action="post.php" method="post">
				<fieldset>

				<!-- Text input-->
				<div class="input-group">
					<span class="input-group-addon">First name</span>
				    <input id="First name" name="First name" placeholder="First name" class="form-control" required="" type="text">
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
				    <span class="input-group-addon">Last name</span>
				    <input id="Last name" name="Last name" placeholder="Last_name" class="form-control" required="" type="text">
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
				    <span class="input-group-addon">eMail</span>
				    <input id="Email" name="Email" placeholder="example@example.com" class="form-control" required="" type="text">
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
				    <span class="input-group-addon">Phone N°</span>
				    <input id="Phone N°" name="Phone N°" placeholder="06XXXXXXXX" class="form-control" required="" type="text">
				</div><br/>

				<!-- Select Basic -->
				<div class="input-group">
				    <span class="input-group-addon">Sexe</span>
				    <select class="selectpicker">
						<option> Male</option>
						<option> Female</option>
					</select>
				</div><br/>

				<!-- Button -->
				<div class="row">
					<div>
						<input id="password" name="password" placeholder="Password" class="form-control" required="" type="text"> 
					</div>
					<div class="input-group">
						<button id="Submit" name="Submit" class="btn btn-primary">Submit</button>
					</div>
				</div>

				</fieldset>
				</form>
  			</div>
		</div>
	</div>
</body>
</html>
