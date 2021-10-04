<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>

<?php
    $pdo = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
    $kinepolise = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
        foreach ($pdo->query('SELECT FilmName, DateSeanceBegin, DateSeanceEnd, SalleName FROM seance_cinema1 WHERE Id=(SELECT max(Id) FROM seance_cinema1);')as $maxid) {
            echo $_POST['FilmName'];
            $FilmName= $maxid['FilmName'];
            $DateSeanceBegin= $maxid['DateSeanceBegin'];
            $DateSeanceEnd= $maxid['DateSeanceEnd'];
        };
        if ($FilmName != $_POST['FilmName']) {
        if ($kinepolise->exec('INSERT INTO seance_cinema1 (FilmName, DateSeanceBegin, DateSeanceEnd, SalleName, Nombre_de_place) VALUES ("'. $_POST['FilmName'] . '", "' . $fusionDateBegin_AjouterSeance . '", "' . $fusionDateEnd_AjouterSeance .'", "' . $_POST['SalleName'] .'", "' . $_POST['Nombre_de_place'] .'");') !== false) {

        } else { echo 'On peut pas mettre une séance en double !';
            }
        }