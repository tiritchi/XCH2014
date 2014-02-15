<?php
 
if (isset($_GET['page']) && $_GET['page'] != "")
{

    $basepath = "include/";
    switch ($_GET['page']){
	case "index":
		include($basepath."index.php");
		break;
	case "login":
		include($basepath."register/login.php");
		break;
	case "logout":
		include($basepath."register/logout.php");
		break;
	case "board":
		include($basepath."manager/board.php");
		break;
	case "register":
		include($basepath."register/register2.php");
		break;
	case "post":
		include($basepath."register/post.php");
		break;
	case "admin":
		include($basepath."manager/admin/admin_board.php");
		break;
	case "mailer"
		include($basepath."lib/mailer.php");
		break;
	default:
		include($basepath."index.php");
    }
}
else
{
    header('Location: ./index.php?page=index');
}
 
?>
