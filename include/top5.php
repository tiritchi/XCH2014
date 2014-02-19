<div class="panel panel-default">
	<div class="panel-heading">
	    <h3 class="panel-title">Top 5 players</h3>
	</div>
	<div class="panel-body">
        <ul class="list-group">
            <?php
                $arr=array();
                $arr=get_hs();
                foreach ($arr as $data) {
                    echo '<li class="list-group-item">'.$data[0].' <span class="badge">'.$data[1].' points</span></li>';
                }
            ?>
        </ul>
        <?php 
            $arr=get_alives();
            echo '<div class="pull-left">Participants: '.$arr[0]-1.'</div><div class="pull-right"> Toujours en vie:'.$arr[1]-1.'</div>';
        ?>
    </div>
</div>