<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/css/bootstrap-select.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-select.css">

    <!-- 3.0 -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(window).on('load', function () {
        	$('.selectpicker').selectpicker({
                'selectedText': 'cat',
                'width':'auto'
            });

        });
    </script>
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
				    <input id="Last name" name="Lname" placeholder="Last name" class="form-control" required="" type="text">
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
					<div class="row">
					    <span class="input-group-addon">Birthday</span>
						<div class="input-group">
			    			<select class="selectpicker show-tick" multiple title='DD' name="Bd_d">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
								<option>13</option>
								<option>14</option>
								<option>15</option>
								<option>16</option>
								<option>17</option>
								<option>18</option>
								<option>19</option>
								<option>20</option>
								<option>21</option>
								<option>22</option>
								<option>23</option>
								<option>24</option>
								<option>25</option>
								<option>26</option>
								<option>27</option>
								<option>28</option>
								<option>29</option>
								<option>30</option>
								<option>31</option>
							</select>
			    			<select class="selectpicker show-tick" multiple title='MM' name="Bd_m">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>

							</select>
			    			<select class="selectpicker show-tick" multiple title='YY' name="BD_y">
								<option>97</option>
								<option>96</option>
								<option>95</option>
								<option>94</option>
								<option>93</option>
								<option>92</option>
								<option>91</option>
								<option>90</option>
								<option>89</option>
								<option>88</option>
								<option>87</option>
								<option>86</option>
								<option>85</option>
								<option>84</option>
								<option>83</option>
								<option>82</option>
								<option>81</option>
								<option>80</option>
							</select>
						</div>
					</div>
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
				    <span class="input-group-addon">eMail</span>
				    <input id="Email" name="Email" placeholder="example@example.com" class="form-control" required="" type="text">
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
				    <span class="input-group-addon">Phone N°</span>
				    <input id="Phone N°" name="Phone" placeholder="XXXXXXXXXX" class="form-control" required="" type="text">
				</div><br/>

				<!-- Text input-->
				<div class="input-group">
				    <span class="input-group-addon">Nickname</span>
				    <input id="Nickname" name="Nn" placeholder="Nickname" class="form-control" required="" type="text">
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

				<div class="input-group">
				    <span class="input-group-addon">School</span>
				    <select class="selectpicker" name="school">
						<option>ENSEA</option>
						<option>EISTI</option>
						<option>FAC</option>
						<option>EBI</option>
						<option>ISTOM</option>
						<option>ESSEC</option>
						<option>OSTEO</option>
						<option>EPMI</option>
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
