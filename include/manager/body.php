		<div class="jumbotron">
			<div class="row">
				<div class="col-md-3">
				    <?php include 'include/top5.php';?>
				</div>		
				<div class="col-md-5">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h3 class="panel-title">Contracts</h3>
			            </div>
			            <div class="panel-body">
			                <div class="list-group">
			                	<?php
			                		$monfichier = fopen('include/lib/game.txt', 'r+');
									$var = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
									fclose($monfichier);
									if($var==0){
										echo 'Le jeu n\'a pas encore commencé';
									}
									elseif($var==1 || $var==2){
				                		$array=get_contracts($bdd,$_SESSION['user_id']);
				                		if ($array==NULL) {
				                		    echo 'pas de contrats';
				                		}
				                		else {
										    foreach ($array as $ar) {
											    echo '<a href="" class="list-group-item" data-toggle="modal" data-target="#'.$ar[3].'">'.$ar[3];
											    if($ar[1]==1){
												    echo '<i class="glyphicon glyphicon-log-out pull-right"></i>';
												}
												echo '</a>';
											}
										}
									}
									elseif($var==3){
										echo 'Eliminez Le parrain';
									}
								?>
                            </div>
			            </div>
			        </div>
			    </div>
	    
			    
			    <?php 
			        $var=get_user_info($bdd,$_SESSION['user_id']);
			    ?>
			    
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
						    <h3 class="panel-title">Profile</h3>
						</div>
						<?php echo '<div class="thumbnail"><img src="get_pic.php?code='.substr($var[9],3,5).'" WIDTH=170 HEIGHT=180/></div>';?>
						<table class="table">
						    <tbody>
						        <tr>
						            <th>Pseudo</th>
						            <td><?php echo('<span class="pull-right">'.$var[0].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Code joueur</th>
						            <td><?php echo('<span class="pull-right">'.$var[9].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Ecole</th>
						            <td><?php echo('<span class="pull-right">'.$var[3].'</span>');?></t>
						        </tr>
						        <tr>
						            <th>Prénom</th>
						            <td><?php echo('<span class="pull-right">'.$var[1].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Nom</th>
						            <td><?php echo('<span class="pull-right">'.$var[2].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Date de naissance</th>
						            <td><?php echo('<span class="pull-right">'.$var[6].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Addresse</th>
						            <td><?php echo('<span class="pull-right">'.$var[8].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>eMail</th>
						            <td><?php echo('<span class="pull-right">'.$var[4].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>N° Tel</th>
						            <td><?php echo('<span class="pull-right">'.$var[7].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Sexe</th>
						            <td><?php echo('<span class="pull-right">'.$var[5].'</span>');?></td>
						        </tr>
						    </tbody>
						</table>
					</div>
				</div>
			</div>
			<?php
				foreach ($array as $ar) {
					$tar=get_user_info($bdd,$ar[2]);
					echo '
				<!-- Modal -->
				<form class="form-horizontal" action="validc" method="post">
					<div class="modal fade" id="'.$ar[3].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-body">
		                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                        <div class="row">
		                            <div class="col-md-3">
		                                <img src="get_pic.php?code='.substr($tar[9],3,5).'" WIDTH=170 HEIGHT=180 class="img-thumbnail"></img>
		                            </div>
		                            <div class="col-md-3">
		                                  <h2>'.$ar[3].'   <small>'.$tar[0].'</small><br /></h2>
		                                  Votre contrat (pdf) >>> <a href="contrat_pdf.php?cno='.$ar[3].'&pseudo='.$tar[0].'" class=" glyphicon glyphicon-file"></a>
		                            </div>
                                </div>
					      </div>
					      <div class="modal-footer">
		                    <div class="input-group">
		                       <input id="idno" name="tno" type="text" class="form-control" type="text" placeholder="Enter target number here..."></input>
		                          <span class="input-group-btn">
		                          <button id="Submit" value="SUBMIT" type="submit" class="btn btn-primary">Submit</button>
		                       </span>
		                    </div>
		                  </div>
					    </div>
					  </div>
					</div>
				</form>';
				}
			?>
		</div>