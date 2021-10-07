<?php
	$date = '2021-10-06 15:59:00';
	$heure = 2;
	$minute = 00;
  $Id= 504;
	echo "$date<br>";
	$dateEnd= date('Y-m-d H:i:s',strtotime("+$heure hours $minute minutes", strtotime($date))) . '<br>';

$conn = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
$conn->exec("SET CHARACTER SET utf8");
                                 
$sql = "UPDATE `seance_cinema1` SET `DateSeanceEnd` = '".$dateEnd."' WHERE `seance_cinema1`.`Id` = '".$Id."' ";
$count = $conn->exec($sql);
$conn = null;