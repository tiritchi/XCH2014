<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE && $_SESSION['admin']=TRUE && isset($_SESSION['admin'])){
    $_SESSION['lock']=0;
    include 'header.php';
    echo '<body>';
    include 'navbar.php';
//    include 'panel.php';
    echo '
        </body>
        </html>';

	}
else
{
	echo '<meta http-equiv="refresh" content="0; url=../xTremCergyHunting.php">';
	echo 'test';
} 
?>

