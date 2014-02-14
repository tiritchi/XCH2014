<?php
require('include/lib/functions.php');
$return=send_mail('identifiant','pass',$_POST['user_id'],$_POST['to'],$POST['subject'],$_POST['body']);
if($return==SUCCESS){
	return SUCCESS;
}
else{
	return $return;
}
?>