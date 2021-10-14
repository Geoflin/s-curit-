<?php
$pdo1 = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');

foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
//On récupère l'heure et la date de la séance
$DateSeanceBegin= $seance['DateSeanceBegin'];
$SalleName= $seance['SalleName'];
};

//On récupère le nombre de place de la salle
foreach ($pdo->query('SELECT Nombre_de_place FROM `infos_cinema1` WHERE SalleName= "'.$seance['SalleName'].'" ', PDO::FETCH_ASSOC) as $Nombre_de_place) {
    $place= $Nombre_de_place['Nombre_de_place'];
    echo $place.'</br>';
};

//On récupère le nombre de réservation pour une séance
foreach ($pdo1->query('SELECT SalleName FROM `reservation_client` WHERE SalleName= "'.$seance['SalleName'].'" AND DateSeanceBegin= "'.$seance['DateSeanceBegin'].'" ', PDO::FETCH_ASSOC) as $Nombre_de_reservations) {
    $reservation[]= $Nombre_de_reservations['SalleName'];
    if(isset($reservation)){
        $reservation_count= count($reservation);
    } else {
        $reservation_count= '0';
    };
    echo $reservation_count.'</br>';
    //On soustrait le nombre de place aux réservations
$place_disponible=($place - $reservation_count);
echo $place_disponible.'</br>';
};


//On stocke le nombre de réservation
//if ($pdo->exec('INSERT INTO seance_cinema1 (reservation) VALUES ("'.$username.'");') !== false){}; 
