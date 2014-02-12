<?php
session_start();
if(!(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE))
	{
		echo '<meta http-equiv="refresh" content="0; url=.">';
	}
else
	{
		include 'header.php';
		$bdd=db_init();
		?>
		<div class="jumbotron">
			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<div class="panel panel-default">
						<div class="panel-heading">
					    	<h3 class="panel-title">Panel title</h3>
						</div>
						<div class="panel-body">
					    	<table class="table">
								<thead>
									<TR> 
										<TH> Jeu </TH> 
										<TH> Possesseur </TH> 
										<TH> Prix </TH> 
										<TH> Commentaires </TH> 
									</TR>
								</thead>
								<tbody> 
								    <?php 
								    	$reponse = $bdd->query('SELECT * FROM jeux_video WHERE console=\'PC\'');
								    	while ($donnees = $reponse->fetch())
										{
										?>
											<TR> 
												<TD> <?php echo $donnees['nom'];?> </TD> 
												<TD> <?php echo $donnees['possesseur'];?> </TD> 
												<TD> <?php echo $donnees['prix'];?> </TD> 
												<TD> <?php echo $donnees['commentaires'];?> </TD> 
											</TR> 
										<?php
										}
											$reponse->closeCursor(); // Termine le traitement de la requête

										?>
									</tbody>
							</table>
						</div>
					</div>
				</div>
			
				<div class="col-md-5">
					<div class="panel panel-default">
						<div class="panel-heading">
						    <h3 class="panel-title">Panel title</h3>
						</div>
						<div class="panel-body">
						    Panel content
						</div>
					</div>
				</div>
			</div>

			<!-- Button trigger modal -->
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
			  Launch demo modal
			</button>

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
			      </div>
			      <div class="modal-body">
			        ...
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>

		<?php
		include 'footer.php';
		 

				
	
	}
?>




	
