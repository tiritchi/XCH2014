<?php
session_start();
if(!(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE))
	{
		echo '<meta http-equiv="refresh" content="0; url=../../login.php">';
	}
else
	{
		include 'header.php';
		include 'footer.php';
		 

				
	
	}
?>




	
