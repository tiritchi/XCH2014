<?php
session_start();
if(!(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE$_SESSION['admin']=TRUE && isset($_SESSION['admin']))
    {
        echo '<meta http-equiv="refresh" content="0; url=../index.php">';
    }
else
    {
    include 'header.php';
    echo '<body>';
    include 'navbar.php';
    include 'panel.php';
    echo '
        </body>
        </html>';

	}
?>

