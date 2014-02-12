<?php
session_start();
if(!(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE))
	{
		echo '<meta http-equiv="refresh" content="0; url=.">';
	}
else
	{
		include 'include/lib/db.php';
		include 'header.php';
		$bdd=db_init();
		$mail = $_SESSION['user'];
		$stmt = $bdd->query("SELECT pseudo FROM users WHERE mail='$mail'");
		$data = $stmt->fetch();
		$tmp = $data['pseudo'];
		$user = substr($tmp,1,strlen($tmp));
		?>
		<div class="row">
			<div class="col-md-offset-1 col-md-5">
				<div class="jumbotron">
					<h1>Hello, world!</h1>
					<p>...</p>
					<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
				</div>
			</div>
			<div class="col-md-5">
				<div class="jumbotron">
					<h1>Hello, world!</h1>
					<p>...</p>
					<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
				</div>
			</div>
		</div>

		<?php
		include 'footer.php';
		 

				
	
	}
?>




	
