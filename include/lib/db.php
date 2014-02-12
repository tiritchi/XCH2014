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

	function get_user_info($bdd,$user_id)
	{
		$req=$bdd->prepare('SELECT * FROM users WHERE user_id=?');
		$req->execute(array($user_id));
		$donnees = $req->fetch();
		$tab = array($donnees['pseudo'],$donnees['fname'],$donnees['lname'],$donnees['school'],$donnees['mail'],$donnees['sexe'],$donnees['date_naissance'],$donnees['phone'],$donnees['adresse']);
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

	function create_contrat($bdd,$user_id,$target_id,$exp_date){

	}

	function mark_as_complete ($bdd,$contract_id){

	}
?>