<?php require('include/lib/functions.php'); ?>
<?php 
	$bdd=db_init();
	echo create_contract($bdd,"37","36","2014-05-06");
//		$req = $bdd->prepare('INSERT INTO contracts (contract_no,user_id,target_id,complete,exp_date,start_date) VALUES (?,?,?,?,?,NOW())');
//		$req->execute(array('X32235C65H14','32','33','0','2014-06-12'));

//		echo gen_user_code('ENSEA','Male',"0621849218");
	//mark_as_complete($bdd,13);
//	$array=get_contracts($bdd,36);
//	echo $array[]
 ?> 
