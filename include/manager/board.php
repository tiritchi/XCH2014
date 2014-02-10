<?php
session_start();
if(!(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE))
	{
		echo '<meta http-equiv="refresh" content="0; url=../../login.php">';
	}
else
	{
		include 'header.php';
		?>
		<div>
		<div class="row">
    		<div class="col-xs-6 col-md-3">
				<div class="jumbotron">
					<h1>Hello, world!</h1>
					<p>...</p>
					<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="jumbotron">
					<h1>Hello, world!</h1>
					<p>...</p>
					<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="jumbotron">
					<h1>Hello, world!</h1>
					<p>...</p>
					<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
				</div>
			</div>
		</div>
		</div>

		<?php
		include 'footer.php';
		 

				
	
	}
?>




	
