<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='TRUE')
    {
    	include 'header.php';
        $bdd=db_init();
        $contrats=get_contracts($bdd,"all");
		?>
		<?php include 'contrat_body.php'; ?>

        <?php
        include 'footer.php';
        echo '<meta http-equiv="refresh" content="0; url=contrat">';
        if(isset($_POST['idt']) && isset($_POST['idc']) && isset($_POST['date'])){
	        create_contract($bdd,$_POST['idt'],$_POST['idc'],$_POST['date']);
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
