<?php
	$file = 'ressources/1/profile.jpg';
	$type = 'image/jpeg';
	header('Content-Type:'.$type);
	header('Content-Length: ' . filesize($file));
	readfile($file);
?>
