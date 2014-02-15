<?php
session_start();
if(!(isset($_SESSION['connected']) && $_SESSION['connected']=TRUE && isset($_SESSION['admin']) && $_SESSION['admin']==TRUE))
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
				
				
				
			    <div class="col-md-5">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h3 class="panel-title">Players</h3>
			            </div>
			            <div class="panel-body">
			            <div class="panel-group" id="accordion">
			            <?php $req=get_user_info($bdd,"all");
			            	while ($data=$req->fetch()){
			            		$i++;
			            		echo '
			            				<div class="panel panel-default">
    										<div class="panel-heading">
      											<h4 class="panel-title">
											        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">
											          '.substr($data['pseudo'],1,(strlen($data['pseudo'])-2)).'
											        </a>
    											</h4>
    										</div>
    										<div id="collapse'.$i.'" class="panel-collapse collapse">
      											<div class="panel-body">
        											blabla
      											</div>
    										</div>
										</div>
			            		';

			            	};
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
		</div>

        <?php
        include 'footer.php';
         

                
    
    }
?>
