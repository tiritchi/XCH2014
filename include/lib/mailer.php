<?php
session_start();
if(!(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE))
    {
        echo '<meta http-equiv="refresh" content="0; url=.">';
    }
else
    {
		require('include/lib/functions.php');

		$return=send_mail($_SESSION['user_id'],NULL,$_POST['to'],$_POST['subject'],$_POST['body']);
		if($return=='sent'){
			if($_SESSION['admin']=='TRUE'){
				echo '<meta http-equiv="refresh" content="0; url=admin">';
			}
			else{
				echo '<meta http-equiv="refresh" content="0; url=board">';
			}
		}
		else{
			return $return;
		}
	}
?>