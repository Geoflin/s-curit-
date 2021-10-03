<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>

<?php
    $pdo = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
    $kinepolise = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
        foreach ($pdo->query('SELECT FilmName, DateOfNewSeance, HourBegin, SalleName FROM seance_cinema1 WHERE Id=(SELECT max(Id) FROM seance_cinema1);')as $maxid) {
            echo $_POST['FilmName'];
            $FilmName= $maxid['FilmName'];
            $DateOfNewSeance= $maxid['DateOfNewSeance'];
            $HourBegin= $maxid['HourBegin'];
            $SalleName= $maxid['SalleName'];
        };
        if (($FilmName == $_POST['FilmName']) && ($DateOfNewSeance == $_POST['DateOfNewSeance']) && ($HourBegin == $_POST['HourBegin']) && ($SalleName == $_POST['SalleName'])) {
            echo 'On peut pas mettre une séance en double !';
        } else { 
            if ($kinepolise->exec('INSERT INTO seance_cinema1 (FilmName, DateOfNewSeance, HourBegin, HourEnd, SalleName, Nombre_de_place) VALUES ("'. $_POST['FilmName'] . '", "' . $_POST['DateOfNewSeance'] . '", "' . $_POST['HourBegin'] .'", "' . $_POST['HourEnd'] .'", "' . $_POST['SalleName'] .'", "' . $_POST['Nombre_de_place'] .'");') !== false) {

            } 
        }