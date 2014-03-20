<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='TRUE')
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
			                <h3 class="panel-title">Players</h3>
			            </div>
			            <div class="panel-body">
			            <div class="panel-group" id="accordion">
			            <?php $req=get_user_info($bdd,"all");
			            	$i='0';
			            	while ($data=$req->fetch()){
			            		$i++;
			            		echo '
			            				<div class="panel panel-default">
    										<div class="panel-heading">
      											<h4 class="panel-title">
											        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">
											          '.substr($data['pseudo'],1,(strlen($data['pseudo'])-2)).
											          if ($data['confirmed']==0){
											          	echo '<a class="pull-right" href="" data-toggle="modal" data-target="#mail">
												        	<i class="glyphicon glyphicon-remove"></i>
												        </a>'
											          };
											          '
											        	<a class="pull-right" href="" data-toggle="modal" data-target="#mail">
												        	<i class="glyphicon glyphicon-envelope"></i>
												        </a>
											        </a>
    											</h4>
    										</div>
    										<div id="collapse'.$i.'" class="panel-collapse collapse">
    											<div class="thumbnail"><img src="get_pic.php?code='.substr($data['user_no'],3,5).'" WIDTH=170 HEIGHT=180/></div>
      											<table class="table">
						                            <tbody>
						                                <tr>
						                                    <th>Nickname</th>
						                                    <td><span class="pull-right">'.substr($data['pseudo'],1,(strlen($data['pseudo'])-2)).'</span></td>
						                                </tr>
						                                <tr>
						                                    <th>User code</th>
						                                    <td><span class="pull-right">'.$data['user_no'].'</span></td>
						                                </tr>
						                                <tr>
						                                    <th>School</th>
						                                    <td><span class="pull-right">'.substr($data['school'],1,(strlen($data['school'])-2)).'</span></t>
						                                </tr>
						                                <tr>
						                                    <th>First name</th>
						                                    <td><span class="pull-right">'.substr($data['fname'],1,(strlen($data['fname'])-2)).'</span></td>
						                                </tr>
						                                <tr>
						                                    <th>Last name</th>
						                                    <td><span class="pull-right">'.substr($data['lname'],1,(strlen($data['lname'])-2)).'</span></td>
						                                </tr>
						                                <tr>
						                                    <th>Date of birth</th>
						                                    <td><span class="pull-right">'.$data['date_naissance'].'</span></td>
						                                </tr>
						                                <tr>
						                                    <th>Address</th>
						                                    <td><span class="pull-right">'.substr($data['adresse'],1,(strlen($data['adresse'])-2)).'</span></td>
						                                </tr>
						                                <tr>
						                                    <th>eMail</th>
						                                    <td><span class="pull-right">'.substr($data['mail'],1,(strlen($data['mail'])-2)).'</span></td>
						                                </tr>
						                                <tr>
						                                    <th>Phone number</th>
						                                    <td><span class="pull-right">'.$data['phone'].'</span></td>
						                                </tr>
						                                <tr>
						                                    <th>Sex</th>
						                                    <td><span class="pull-right">'.substr($data['sexe'],1,(strlen($data['sexe'])-2)).'</span></td>
						                                </tr>
						                            </tbody>
						                        </table>
      											<!--div class="panel-body">
        											
      											</div-->
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
elseif(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='FALSE')
    {               
        echo '<meta http-equiv="refresh" content="0; url=board">';    
    }
else{
		echo '<meta http-equiv="refresh" content="0; url=.">'; 
	}
?>
