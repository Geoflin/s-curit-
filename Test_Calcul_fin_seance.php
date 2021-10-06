<?php
	$date = '2021-10-06 15:59:00';
	$heure = 2;
	$minute = 00;
	echo "$date<br>";
	echo date('Y-m-d H:i:s',strtotime("+$heure hours $minute minutes", strtotime($date))) . '<br>';
?>