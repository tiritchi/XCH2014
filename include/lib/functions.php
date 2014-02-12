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
		$tab = array(substr($donnees['pseudo'],1,(strlen($donnees['pseudo'])-2)),substr($donnees['fname'],1,(strlen($donnees['fname'])-2)),substr($donnees['lname'],1,(strlen($donnees['lname'])-2)),substr($donnees['school'],1,(strlen($donnees['school'])-2)),substr($donnees['mail'],1,(strlen($donnees['mail'])-2)),substr($donnees['sexe'],1,(strlen($donnees['sexe'])-2)),$donnees['date_naissance'],"0".$donnees['phone'],substr($donnees['adresse'],1,(strlen($donnees['adresse'])-2)),$donnees['user_no']);
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
		$req=$bdd->query("SELECT user_no FROM users WHERE id=$target_id");
		$target_no=$req->fetch();
		$req->closeCursor();
		srand();
		$cno='X'.rand(10000,99999).'C'.$target_id.'H14'.rand(10,99);
		$uid = intval($user_id);
		$tid = intval($target_id);
		$req = $bdd->prepare('INSERT INTO contracts (contract_no,user_id,target_id,target_no,complete,exp_date,start_date) VALUES (?,?,?,?,?,?,NOW())');
		$req->execute(array($cno,$user_id,$target_id,$target_no,'0',$exp_date));
		return $cno;
	}

	function mark_as_complete ($bdd,$contract_id){

	}

	function gen_user_code($School,$Sexe,$Phone){
		srand();
		switch ($School) {
			case 'UCP':
				$u_code='01';
				break;
			case 'IUFM':
				$u_code='02';
				break;
			case 'EISTI':
				$u_code='03';
				break;
			case 'ENSEA':
				$u_code='04';
				break;
			case 'ESSEC':
				$u_code='05';
				break;
			case 'ESCIA':
				$u_code='06';
				break;
			case 'ENSAPC':
				$u_code='07';
				break;
			case 'ITIN':
				$u_code='08';
				break;
			case 'EBI':
				$u_code='09';
				break;
			case 'EPMI':
				$u_code='10';
				break;
			case 'ISTOM':
				$u_code='11';
				break;
			case 'ILEPS':
				$u_code='12';
				break;
			case 'COE':
				$u_code='13';
				break;
			default:
				$s_code='XX';
				break;
		}
		$u_code.=substr($Sexe,0,strlen($Sexe)-1);
		$u_code.=rand(100,999);
		$u_code.=substr((string)$Phone,-2);
		$u_code.='XCH14';
		return $u_code;
	}
?>