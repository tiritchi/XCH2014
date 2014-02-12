<?php

	$bdd=NULL;

	function db_init(){
		global $bdd;
		try 
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'raspberry');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch (Exception $e) 
		{
			die('Erreur : ' . $e->getMessage());
			echo '<p> erreur DB</p>';
		}
		return $bdd;
	}

	function get_user_info($bdd,$user_id){
		$req=$bdd->prepare('SELECT * FROM users WHERE id=?');
		$req->execute(array($user_id));
		$donnees = $req->fetch();
		$tab = array(substr($donnees['pseudo'],1,(strlen($donnees['pseudo'])-2)),substr($donnees['fname'],1,(strlen($donnees['fname'])-2)),substr($donnees['lname'],1,(strlen($donnees['lname'])-2)),substr($donnees['school'],1,(strlen($donnees['school'])-2)),substr($donnees['mail'],1,(strlen($donnees['mail'])-2)),substr($donnees['sexe'],1,(strlen($donnees['sexe'])-2)),$donnees['date_naissance'],"0".$donnees['phone'],substr($donnees['adresse'],1,(strlen($donnees['adresse'])-2)));
		return $tab;
	}

	function add_user_event($bdd,$user_id,$event,$infos){
		$uid = intval($user_id);
		$eventtmp = $bdd->quote($event);
		$inf = $bdd->quote($infos);
		$req = $bdd->prepare("INSERT INTO users_event (users_id,event,infos,r) VALUES (:uid,:event,:infos,:r)");
		$req->execute(array(
		    'uid'=>$uid,
		    'event'=>$eventtmp,
		    'infos'=>$inf,
		    ':r'=>0
	    ));
		return 0;
	}

	function mark_as_read($bdd,$id){
		$req=$bdd->prepare('UPDATE users_event SET r = 1 WHERE id=:id');
		$req->execute(array(
			':id'=>$id
			));
		return 0;
	}

	function get_contracts($bdd,$user_id){
		$tab=array();
		$req=$bdd->prepare('SELECT * FROM contracts WHERE user_id=?');
		$req->execute(array($user_id));

		while ($donnees = $req->fetch())
		{
			$tab->array_push(array($donnees['id'],$donnees['complete'],$donnees['target_id'],$donnees['contract_no'],$donnees['exp_date']));
		}

		return $tab;
	}

	function create_contract($bdd,$user_id,$target_id,$exp_date){
		srand();
		$contract_no='X'.rand(10000,99999).'C'.$target_id.'H14';
		$uid = intval($user_id);
		$tid = intval($target_id);
		$req = $bdd->exec('INSERT INTO contracts (contract_no,user_id,target_id,complete,exp_date,start_date) VALUES ($contract_no,$uid,$tid,\'0\',$exp_date,NOW())');
//		$req = $bdd->prepare('INSERT INTO contracts (contract_no,user_id,target_id,complete,exp_date,start_date) VALUES (:contract_no,:uid,:tid,:complete,:expd,NOW()');
//		$req->execute(array('uid'=>$uid,'tid'=>$tid,'complete'=>'0','expd'=>$exp_date,'contract_no'=>$contract_no));
	    echo $contract_no;
		return 0;
	}

	function mark_as_complete ($bdd,$contract_id){

	}
?>