<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>

<?php
    $pdo = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
    $kinepolise = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
        foreach ($pdo->query('SELECT FilmName, DateSeanceBegin, HourBegin, SalleName FROM seance_cinema1 WHERE Id=(SELECT max(Id) FROM seance_cinema1);')as $maxid) {
            echo $_POST['FilmName'];
            $FilmName= $maxid['FilmName'];
            $DateSeanceBegin= $maxid['DateSeanceBegin'];
            $HourBegin= $maxid['HourBegin'];
        };
        if ($FilmName != $_POST['FilmName']) {
        if ($kinepolise->exec('INSERT INTO seance_cinema1 (FilmName, DateSeanceBegin, HourBegin, HourEnd, SalleName, Nombre_de_place) VALUES ("'. $_POST['FilmName'] . '", "' . $fusionDateBegin . '", "' . $_POST['HourBegin'] .'", "' . $_POST['HourEnd'] .'", "' . $_POST['SalleName'] .'", "' . $_POST['Nombre_de_place'] .'");') !== false) {

        } else { echo 'On peut pas mettre une séance en double !';
            }
        }