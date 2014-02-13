<?php require('include/lib/functions.php'); ?>
<?php 
	$bdd=db_init();
//	$cno=create_contract($bdd,"37","36","2014-05-06");
//		$req = $bdd->prepare('INSERT INTO contracts (contract_no,user_id,target_id,complete,exp_date,start_date) VALUES (?,?,?,?,?,NOW())');
//		$req->execute(array('X32235C65H14','32','33','0','2014-06-12'));

//		echo gen_user_code('ENSEA','Male',"0621849218");
		echo mark_as_complete($bdd,"X99709C36H1477","03X90724XCH14");
 ?> 
