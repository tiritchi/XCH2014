<?php
 
if (isset($_GET['page']) && $_GET['page'] != "")
{
    $path = $_GET['page'];
    if (file_exists($path))
    {
        require_once($path.".php");
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