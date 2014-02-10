<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE)
	{
		echo file_get_contents('board.php');
	}
else
{
	echo '<meta http-equiv="refresh" content="0; url=../xTremCergyHunting.php">';
} 
?>
