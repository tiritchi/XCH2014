<?php
 
if (isset($_GET['page']) && $_GET['page'] != "")
{
    $path = "pages/".$_GET['page'];
    if (file_exists($path))
    {
        require_once("pages/".$_GET['page'].".php");
    }
    else
    {
        require_once("pages/404.php");
    }
}
else
{
    header('Location: ./index.php?page=xTremCergyHunting');
}
 
?>