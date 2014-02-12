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
				<div class="col-md-3">
				    <div class="panel panel-default">
						<div class="panel-heading">
						    <h3 class="panel-title">Top 5 players</h3>
						</div>
						<div class="panel-body">
						    <ul class="list-group">
						       <li class="list-group-item">Best player 1 <span class="badge">5 points</span></li>
						       <li class="list-group-item">Best player 2 <span class="badge">4 points</span></li>
						       <li class="list-group-item">Best player 3 <span class="badge">3 points</span></li>
						       <li class="list-group-item">Best player 4 <span class="badge">2 points</span></li>
						       <li class="list-group-item">Best player 5 <span class="badge">1 points</span></li>
						    </ul>
						</div>
					</div>
				</div>
				
				
				
				
				<div class="col-md-6">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h3 class="panel-title">Contracts</h3>
			            </div>
			            <div class="panel-body">
			                <div class="list-group">
                                <a href="#myModal" class="list-group-item">Pseudo 1</a>
                                <a href="#" class="list-group-item">Pseudo 2</a>
                                <a href="#" class="list-group-item">Morbi leo risus</a>
                                <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                                <a href="#" class="list-group-item">Vestibulum at eros</a>
                            </div>
			            </div>
			        </div>
			    </div>
			    <!--div class="col-md-offset-1 col-md-5">
					<?php mark_as_read($bdd,1);?>

				</div-->
			    
			    
			    <?php 
			        $var=get_user_info($bdd,$_SESSION['user_id']);
			    ?>
			    
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
						    <h3 class="panel-title">Profile</h3>
						</div>
						<table class="table">
						    <tbody>
						        <tr>
						            <th>Nickname</th>
						            <td><?php echo('<span class="pull-right">'.$var[0].'</span>');?></td>
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




	
