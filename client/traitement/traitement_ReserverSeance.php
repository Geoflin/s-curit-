<?php

$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
//On récupère données séance réservée
foreach ($pdo->query('SELECT * FROM seance_cinema1 WHERE Id= "'.$_POST['Id'].'" ', PDO::FETCH_ASSOC) as $reservationSeance) { 
$Id= $reservationSeance['Id'];
$FilmName= $reservationSeance['FilmName'];
$DateSeanceBegin= $reservationSeance['DateSeanceBegin'];
$DateSeanceEnd= $reservationSeance['DateSeanceEnd'];
$SalleName= $reservationSeance['SalleName'];
};

//On Vérifie que le créneau est disponible
foreach ($pdo1->query('SELECT * FROM `reservation_client` WHERE `DateSeanceBegin` <= "'.$DateSeanceBegin.'" AND `DateSeanceEnd` >= "'.$DateSeanceBegin.'" AND username = "'.$_SESSION['username'].'" AND password = "'.$_SESSION['password'].'" ', PDO::FETCH_ASSOC) as $creneau) {
    $creneauconflict[]= $creneau['SalleName'];
    //on compte nombre de créneau en conflicts
    $countCreneauconflict= count($creneauconflict);
  };

//On stocke sous condition séance réservée dans table réservation du client
if (isset($countCreneauconflict)<1){
    if ($pdo1->exec('INSERT INTO reservation_client (Id, username, password, FilmName, DateSeanceBegin, DateSeanceEnd, SalleName) VALUES ("'.$Id.'", "'.$_SESSION['username'].'", "'.$_SESSION['password'].'", "'.$FilmName.'", "'.$DateSeanceBegin.'", "'.$DateSeanceEnd.'", "'.$SalleName.'");') !== false){}; 
} else {
    echo "Créneau déjà occupé par ".$countCreneauconflict." séances"; 
  };
