<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <link rel="icon" type="image/png" href="ressources/favicon.png" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/css/bootstrap-select.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/extend/css/jasny-bootstrap.min.css">

    <!-- 3.0 -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!--script type="text/javascript" src="bootstrap/js/jquery.min.js"></script-->
    <script type="text/javascript" src="bootstrap/extend/js/jasny-bootstrap.min.js"></script>

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
	<div class="row">
		<div class="col-lg-6">
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
							<div class="input-group">
							    <span class="input-group-addon">School</span>
							    <select class="selectpicker" name="School">
									<option>ENSEA</option>
									<option>EISTI</option>
									<option>UCP</option>
									<option>EBI</option>
									<option>ISTOM</option>
									<option>ESSEC</option>
									<option>ITIN</option>
									<option>IUFM</option>
									<option>COE</option>
									<option>ILEPS</option>
									<option>ENSAPC</option>
									<option>ESCIA</option>
									<option>EPMI</option>
								</select>
							</div><br/>

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
							    <span class="input-group-addon">Birthday</span>
				    			<select class="selectpicker show-tick" title='DD' name="Bd_d">
									<option>01</option>
									<option>02</option>
									<option>03</option>
									<option>04</option>
									<option>05</option>
									<option>06</option>
									<option>07</option>
									<option>08</option>
									<option>09</option>
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
				    			<select class="selectpicker show-tick" title='MM' name="Bd_m">
									<option>01</option>
									<option>02</option>
									<option>03</option>
									<option>04</option>
									<option>05</option>
									<option>06</option>
									<option>07</option>
									<option>08</option>
									<option>09</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>

								</select>
				    			<select class="selectpicker show-tick" title='YY' name="Bd_y">
									<option>1997</option>
									<option>1996</option>
									<option>1995</option>
									<option>1994</option>
									<option>1993</option>
									<option>1992</option>
									<option>1991</option>
									<option>1990</option>
									<option>1989</option>
									<option>1988</option>
									<option>1987</option>
									<option>1986</option>
									<option>1985</option>
									<option>1984</option>
									<option>1983</option>
									<option>1982</option>
									<option>1981</option>
									<option>1980</option>
								</select>
							</div><br/>

							<!-- Text input-->
							<div class="input-group">
							    <img src="ressources/profile_resized.jpg" class="img-thumbnail"></img>
							    <span class="input-group-addon">Position </span>
				    			<select class="selectpicker" multiple data-selected-text-format="count>3" title='Position 0/5' name="place">
									<option>A1</option>
									<option>A2</option>
									<option>A3</option>
									<option>A4</option>
									<option>A5</option>
									<option>A6</option>
									<option>A7</option>
									<option>A8</option>
									<option>A9</option>
									<option>A10</option>
									<option>A11</option>
									<option>A12</option>
									<option>B1</option>
									<option>B2</option>
									<option>B3</option>
									<option>B4</option>
									<option>B5</option>
									<option>B6</option>
									<option>B7</option>
									<option>B8</option>
									<option>B9</option>
									<option>B10</option>
									<option>B11</option>
									<option>B12</option>
									<option>C1</option>
									<option>C2</option>
									<option>C3</option>
									<option>C4</option>
									<option>C5</option>
									<option>C6</option>
									<option>C7</option>
									<option>C8</option>
									<option>C9</option>
									<option>C10</option>
									<option>C11</option>
									<option>C12</option>
									<option>D1</option>
									<option>D2</option>
									<option>D3</option>
									<option>D4</option>
									<option>D5</option>
									<option>D6</option>
									<option>D7</option>
									<option>D8</option>
									<option>D9</option>
									<option>D10</option>
									<option>D11</option>
									<option>D12</option>
									<option>E1</option>
									<option>E2</option>
									<option>E3</option>
									<option>E4</option>
									<option>E5</option>
									<option>E6</option>
									<option>E7</option>
									<option>E8</option>
									<option>E9</option>
									<option>E10</option>
									<option>E11</option>
									<option>E12</option>
									<option>F1</option>
									<option>F2</option>
									<option>F3</option>
									<option>F4</option>
									<option>F5</option>
									<option>F6</option>
									<option>F7</option>
									<option>F8</option>
									<option>F9</option>
									<option>F10</option>
									<option>F11</option>
									<option>F12</option>
									<option>G1</option>
									<option>G2</option>
									<option>G3</option>
									<option>G4</option>
									<option>G5</option>
									<option>G6</option>
									<option>G7</option>
									<option>G8</option>
									<option>G9</option>
									<option>G10</option>
									<option>G11</option>
									<option>G12</option>
								</select>
								Please select your 5 most visited place
							</div><br/>

							<!-- Text input-->
							<div class="input-group">
							    <span class="input-group-addon">Address</span>
							    <input id="Adress" name="Adress_a" placeholder="Adress" class="form-control" required="" type="text">
							    <input id="Adress" name="Adress_pc" placeholder="Post code" class="form-control" required="" type="text">
							    <input id="Adress" name="Adress_c" placeholder="City" class="form-control" required="" type="text">
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
							    <span class="input-group-addon">Sex</span>
							    <select class="selectpicker show-tick" name="Sexe">
									<option>Male</option>
									<option>Female</option>
								</select>
							</div><br/>

	                        <script type="text/javascript">
	                        $(document).ready(function() {
	                            $('#upload').bind("click",function() 
	                            { 
	                                var imgVal = $('#uploadfile').val(); 
	                                if(imgVal=='') 
	                                { 
	                                    alert("empty input file"); 
	                                    return false; 
	                                } 
	                            }); 
	                        });
	                        </script> 
	                        
	                        <div class="fileinput fileinput-new" data-provides="fileinput">
	                            <span class="btn btn-default btn-file"><span class="fileinput-new">Upload your profile picture</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
	                            <span class="fileinput-filename"></span>
	                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
	                        </div><br />
	                        
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
		<div class="col-lg-6">
			<div class="thumnail">
				<img data-src="ressources/map.jpg" alt="...">
			</div>
		</div>
	</div>
</body>
</html>
