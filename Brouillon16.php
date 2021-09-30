<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>

<?php
$Id= implode("", $_POST['Id']);

try {
$conn = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
$conn->exec("SET CHARACTER SET utf8");

        $sql = "UPDATE `seance_cinema1` SET `FilmName` = '".$_POST['FilmName']."', `DateOfNewSeance` = '".$_POST['DateOfNewSeance']."', `HourBegin` = '".$_POST['HourBegin']."', `HourEnd` = '".$_POST['HourEnd']."', `SalleName` = '".$_POST['SalleName']."' WHERE `seance_cinema1`.`Id` = '".$Id."' ";
        $count = $conn->exec($sql);

        $conn = null;
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
    
    if($count !== false) echo 'Affected rows : '. $count;
    ?>