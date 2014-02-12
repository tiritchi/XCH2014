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
						       <li class="list-group-item">Best player 1</li>
						       <li class="list-group-item">Best player 2</li>
						       <li class="list-group-item">Best player 3</li>
						       <li class="list-group-item">Best player 4</li>
						       <li class="list-group-item">Best player 5</li>
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
			                <ul class="list-group">
			                    <li class="list-group-item">pseudo1</li>
			                    <li class="list-group-item">pseudo2</li>
			                    <li class="list-group-item">pseudo3</li>
			                </ul>
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
						<div class="panel-body">
						    <ul class="list-group">
						        <li class="list-group-item">Nickname<?php echo('<span class="pull-right">'.$var[0].'</span>');?></li>
						        <li class="list-group-item">School<?php echo('<span class="pull-right">'.$var[3].'</span>');?></li>
						        <li class="list-group-item">First name<?php echo('<span class="pull-right">'.$var[1].'</span>');?></li>
						        <li class="list-group-item">LAST NAME<?php echo('<span class="pull-right">'.$var[2].'</span>');?></li>
						        <li class="list-group-item">JJ/MM/AAAA<?php echo('<span class="pull-right">'.$var[6].'</span>');?></li>
						        <li class="list-group-item">Address<?php echo('<span class="pull-right">'.$var[8].'</span>');?></li>
						        <li class="list-group-item">e-mail<?php echo('<span class="pull-right">'.$var[4].'</span>');?></li>
						        <li class="list-group-item">Phone number<?php echo('<span class="pull-right">'.$var[7].'</span>');?></li>
						        <li class="list-group-item">Sex<?php echo('<span class="pull-right">'.$var[5].'</span>');?></li>
						    </ul>
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




	
