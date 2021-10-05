<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>

<?php
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    $kinepolise = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
        if ($kinepolise->exec('INSERT INTO seance_cinema1 (FilmName, DateOfNewSeance, HourBegin, HourEnd, SalleName, Nombre_de_place) VALUES ("'. $_POST['FilmName'] . '", "' . $_POST['DateOfNewSeance'] . '", "' . $_POST['HourBegin'] .'", "' . $_POST['HourEnd'] .'", "' . $_POST['SalleName'] .'", "' . $_POST['Nombre_de_place'] .'");') !== false) {
        } else {
            echo 'Une erreur est survenue';
        }
//$sql = "UPDATE `seance_cinema1` SET `FilmName`= '. $_POST['FilmName'] .', `DateOfNewSeance`='. $_POST['DateOfNewSeance'] .', `HourBegin`='. $_POST['HourBegin'] .', `HourEnd`='. $_POST['HourEnd'] . ', `SalleName`='. $_POST['SalleName'] . ', `Nombre_de_place`='. $_POST['Nombre_de_place'] . ' WHERE `Id`= $_POST['Id'] "; //