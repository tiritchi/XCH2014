<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='TRUE')
    {
    	include 'include/manager/admin/header.php';
        $bdd=db_init();
        $contrats=get_contracts($bdd,"all");
		?>
		<?php include 'include/manager/admin/contrat_body.php'; ?>

        <?php
        include 'include/manager/admin/footer.php';
        echo '<meta http-equiv="refresh" content="0; url=contrat">';
        if(isset($_GET['cno'])){
	        delete_contract($bdd,$_GET['cno']);
    	}
    }
elseif(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='FALSE')
    {               
        echo '<meta http-equiv="refresh" content="0; url=board">';    
    }
else{
		echo '<meta http-equiv="refresh" content="0; url=.">'; 
	}
?>
