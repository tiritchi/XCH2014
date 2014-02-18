<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='FALSE')
	{
		include 'header.php';
		$bdd=db_init();
		?>
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
			                		$array=get_contracts($bdd,$_SESSION['user_id']);
			                		if ($array==NULL) {
			                		    echo 'pas de contrats';
			                		}
			                		else {
									    foreach ($array as $ar) {
										    echo '<a href="#" class="list-group-item" data-toggle="modal" data-target="#'.$ar[3].'">';
										    echo $ar[3].'</a>';
										}
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
						<?php include '../get_pic.php?user='.$var[0];?>
						<table class="table">
						    <tbody>
						        <tr>
						            <th>Nickname</th>
						            <td><?php echo('<span class="pull-right">'.$var[0].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>User code</th>
						            <td><?php echo('<span class="pull-right">'.$var[9].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>School</th>
						            <td><?php echo('<span class="pull-right">'.$var[3].'</span>');?></t>
						        </tr>
						        <tr>
						            <th>First name</th>
						            <td><?php echo('<span class="pull-right">'.$var[1].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Last name</th>
						            <td><?php echo('<span class="pull-right">'.$var[2].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Date of birth</th>
						            <td><?php echo('<span class="pull-right">'.$var[6].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Address</th>
						            <td><?php echo('<span class="pull-right">'.$var[8].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>eMail</th>
						            <td><?php echo('<span class="pull-right">'.$var[4].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Phone number</th>
						            <td><?php echo('<span class="pull-right">'.$var[7].'</span>');?></td>
						        </tr>
						        <tr>
						            <th>Sex</th>
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
					<div class="modal fade" id="'.$ar[3].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-body">
		                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                        <div class="row">
		                            <div class="col-md-3">
		                                <img src="ressources/profile_resized.jpg" class="img-thumbnail"></img>
		                            </div>
		                            <div class="col-md-3">
		                                  <h2>'.$ar[3].'   <small>'.$tar[0].'</small><br /></h2>
		                                  
		                            </div>
                                </div>
					      </div>
					      <div class="modal-footer">
		                    <div class="input-group">
		                       <input class="form-control" type="text" placeholder="Enter target number here..."></input>
		                          <span class="input-group-btn">
		                          <button class="btn btn-default" type="button">Submit</button>
		                       </span>
		                    </div>
		                  </div>
					    </div>
					  </div>
					</div>';
				}
			?>
		</div>

		<?php
		include 'footer.php';
		 

				
	
	}
elseif(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='TRUE')
    {               
        echo '<meta http-equiv="refresh" content="0; url=admin">';    
    }
else{
		echo '<meta http-equiv="refresh" content="0; url=.">'; 
	}
?>




	
