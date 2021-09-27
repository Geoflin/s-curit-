<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>
<BODY>
  <button name="accueil"><a href="index.php">retour à l'accueil</a></button>
  <button name="formulaire_ajoutseance"><a href="formulaire_gestionnaire.php">retour au formulaire</a></button>
    </BODY>
</HTML>

<?php
$pdo = new PDO('mysql:host=localhost', 'root', '');
        $kinepolise = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
            if ($kinepolise->exec('INSERT INTO seance_cinema1 (FilmName, DateOfNewSeance, HourBegin, HourEnd, SalleName, Nombre_de_place) VALUES ("'. $_POST['FilmName'] . '", "' . $_POST['DateOfNewSeance'] . '", "' . $_POST['HourBegin'] .'", "' . $_POST['HourEnd'] .'", "' . $_POST['SalleName'] .'", "' . $_POST['Nombre_de_place'] .'");') !== false) {
                echo 'Votre séance est créée !';
            } else {
                echo 'Une erreur est survenue';
        }