<?php
echo '1';
 
if (isset($_GET['page']) && $_GET['page'] != "")
{
	echo '1';
    $basepath = "./include/";
    switch ($_GET['page']){
	case "index":
		echo 'test';
		include($basepath."index.php");
		break;
	case "login":
		include($basepath."login.php");
		break;
	case "logout":
		include($basepath."logout.php");
		break;
	case "board":
		include($basepath."manager/board.php");
		break;
	case "register":
		include($basepath."register/register2.php");
		break;
	case "post":
		include($basepath."register/post.php")
		break;
	case "admin":
		include($basepath."manager/admin/admin_board.php");
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
