<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE && $_SESSION['admin']=TRUE && isset($_SESSION['admin'])){
    require "header.php";
    echo '<body>';
    require "navbar.php";
    require "panel.php";
    echo '
        </body>
        </html>';

	}
else
{
	echo '<meta http-equiv="refresh" content="0; url=../xTremCergyHunting.php">';
	echo '<!--';
} 
?>

