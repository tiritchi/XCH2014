<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.html");
   }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../signin.css"></link>
</head>

<body>
<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Formulaire d'inscription</h3>
  	</div>
  	<div class="panel-body">
  		<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Register</legend>

<!-- Text input-->
<div class="input-group">
  <div class="controls">
  	<span class="input-group-addon">First name</span>
    <input id="First name" name="First name" placeholder="First name" class="form-control" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="input-group">
        <span class="input-group-addon"></span>
        <input type="text" class="form-control" placeholder="Username">
</div>
<div class="input-group">
  <div class="controls">
    <span class="input-group-addon">Last name</span>
    <input id="Last name" name="Last name" placeholder="Last name" class="form-control" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="input-group">
  <div class="controls">
    <span class="input-group-addon">@</span>
    <input id="Email" name="Email" placeholder="example@example.com" class="form-control" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="input-group">
  <div class="controls">
    <span class="input-group-addon">Phone N°</span>
    <input id="Phone N°" name="Phone N°" placeholder="06XXXXXXXX" class="form-control" required="" type="text">
    
  </div>
</div>

<!-- Select Basic -->
<div class="input-group">
  <div class="controls">
    <span class="input-group-addon">Sexe</span>
    <select id="Sexe" name="Sexe" class="input-small">
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="input-group">
  <label class="control-label" for="Submit">Submit</label>
  <div class="controls">
    <button id="Submit" name="Submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>
  	</div>
</div>
</body>
</html>
