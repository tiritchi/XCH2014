<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='FALSE')
	{
		include 'header.php';
		$bdd=db_init();
		?>
		
		<?php include 'body.php'; ?>

		<?php
		include 'footer.php';
		mark_as_complete ($bdd,'"'.$_POST['cno'].'"',$_POST['tno']);
 		?>
		<?php 	echo '<meta http-equiv="refresh" content="0; url=board">'; 
				
	
	}
elseif(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='TRUE')
    {               
        echo '<meta http-equiv="refresh" content="0; url=admin">';    
    }
else{
		echo '<meta http-equiv="refresh" content="0; url=.">'; 
	}

?>