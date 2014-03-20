<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='TRUE')
    {
    	include 'header.php';
        $bdd=db_init();
        $contrats=get_contracts($bdd,"all");
		?>
		<div class="jumbotron">
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading">Tous les Contrats</div>
						<!-- Table -->
						<table class="table">
							<thead>
								<tr>
									<th>Cible</th>
									<th>Tueur</th>
									<th>PDF</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($contrats as $contrat){
										$tabc=get_user_info($bdd,$contrat[2]);
										$cible=$tabc[0];
										$tabt=get_user_info($bdd,$contrat[0]);
										$tueur=$tabt[0];
										
										echo '
										<tr>
											<td>'.$cible.'</td>
											<td>'.$tueur.'</td>
											<td><a href="contrat_pdf.php?cno='.$contrat[3].'&pseudo='.$tueur.'" class=" glyphicon glyphicon-file"></a></td>
										</tr>';
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading">Tous les joueurs</div>
						<!-- Table -->
						<table class="table">
							<thead>
								<tr>
									<th>Pseudo</th>
									<th>Ecole</th>
									<th>Positions</th>
								</tr>
							</thead>
							<tbody>
								<?php $req=get_user_info($bdd,"all");
									foreach($req as $user){							
										echo '
										<tr>
											<td>'.$user[12].'</td>
											<td>'.$user[6].'</td>
											<td>'.$user[15].'</td>
										</tr>';
									}
								?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>

        <?php
        include 'footer.php';

    }
elseif(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='FALSE')
    {               
        echo '<meta http-equiv="refresh" content="0; url=board">';    
    }
else{
		echo '<meta http-equiv="refresh" content="0; url=.">'; 
	}
?>
