<?php
session_start();
if(!(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE && isset($_SESSION['admin']) && $_SESSION['admin']==TRUE))
    {
        echo '<meta http-equiv="refresh" content="0; url=.">';
    }
else
    {
        include 'header.php';
        include 'footer.php';
         

                
    
    }
?>
