<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>

<?php
$Id= implode("", $_POST['Id']);

try {
$conn = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
$conn->exec("SET CHARACTER SET utf8");

        $sql = "SELECT `Nombre_de_place` FROM `infos_cinema1` WHERE `SalleName`='Salle1'";
        $count = $conn->exec($sql);

        $conn = null;
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
    
    if($count !== false) echo 'Affected rows : '. $count;
    ?>