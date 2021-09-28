<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>

<?php
$pdo = new PDO('mysql:host=localhost', 'root', '');
        $kinepolise = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
            if ($kinepolise->exec('INSERT INTO seance_cinema1 (FilmName, DateOfNewSeance, HourBegin, HourEnd, SalleName, Nombre_de_place) VALUES ("'. $_POST['FilmName'] . '", "' . $_POST['DateOfNewSeance'] . '", "' . $_POST['HourBegin'] .'", "' . $_POST['HourEnd'] .'", "' . $_POST['SalleName'] .'", "' . $_POST['Nombre_de_place'] .'");') !== false) {
                echo 'Votre séance a été créée !';
                echo 'Vous pouvez fermer cette page';
                echo "N'oubliez pas de rafraichir votre espace gestionnaire";
            } else {
                echo 'Une erreur est survenue';
        }