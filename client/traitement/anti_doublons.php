<?php
//Si on a choisi le cinéma1, on vérifie qu'il n'y a pas de doublons dans le cinéma1
if($_SESSION['cinemaAdresse']== 'cinema1'){

//On récupère données séance réservée
$pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM seance_cinema1 WHERE Id= "'.$_POST['Id'].'" ', PDO::FETCH_ASSOC) as $reservationSeance) { 
$Id= $reservationSeance['Id'];
$FilmName= $reservationSeance['FilmName'];
$DateSeanceBegin= $reservationSeance['DateSeanceBegin'];
$DateSeanceEnd= $reservationSeance['DateSeanceEnd'];
$SalleName= $reservationSeance['SalleName'];
};


//On Vérifie que le créneau est disponible
$pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM `reservation_client` WHERE `DateSeanceBegin` <= "'.$DateSeanceBegin.'" AND `DateSeanceEnd` >= "'.$DateSeanceBegin.'" AND username = "'.$_SESSION['username'].'" AND password = "'.$_SESSION['password'].'" ', PDO::FETCH_ASSOC) as $creneau) {
    $creneauconflict[]= $creneau['SalleName'];
    //on compte nombre de créneau en conflicts
    $countCreneauconflict= count($creneauconflict);
  };


//On récupère le nombre de réservation pour une séance
$pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
foreach ($pdo_kinepolise_cinema1->query('SELECT SalleName FROM `reservation_client` WHERE SalleName= "'.$SalleName.'" AND DateSeanceBegin= "'.$DateSeanceBegin.'" ', PDO::FETCH_ASSOC) as $Nombre_de_reservations) {
  $reservation[]= $Nombre_de_reservations['SalleName']; 
  $reservation1= count($reservation);
 }; 

  //On récupère Nombre_de_place
  $pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
  foreach ($pdo_kinepolise_cinema1->query('SELECT Nombre_de_place FROM infos_cinema1 WHERE SalleName= "'.$SalleName.'" ', PDO::FETCH_ASSOC) as $Nombre_de_place) { 
    $Nombre_de_place1= $Nombre_de_place['Nombre_de_place'];
    };

//On calcule les place_dispo
if(isset($reservation1)){
$place_dispo= $Nombre_de_place1 - $reservation1;
};


//Si on a choisi le cinéma2, on vérifie qu'il n'y a pas de doublons dans le cinéma2
} elseif($_SESSION['cinemaAdresse']== 'cinema2'){
    //On récupère données séance réservée
$pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
foreach ($pdo_kinepolise_cinema2->query('SELECT * FROM seance_cinema1 WHERE Id= "'.$_POST['Id'].'" ', PDO::FETCH_ASSOC) as $reservationSeance) { 
$Id= $reservationSeance['Id'];
$FilmName= $reservationSeance['FilmName'];
$DateSeanceBegin= $reservationSeance['DateSeanceBegin'];
$DateSeanceEnd= $reservationSeance['DateSeanceEnd'];
$SalleName= $reservationSeance['SalleName'];
};


//On Vérifie que le créneau est disponible
$pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
foreach ($pdo_kinepolise_cinema2->query('SELECT * FROM `reservation_client` WHERE `DateSeanceBegin` <= "'.$DateSeanceBegin.'" AND `DateSeanceEnd` >= "'.$DateSeanceBegin.'" AND username = "'.$_SESSION['username'].'" AND password = "'.$_SESSION['password'].'" ', PDO::FETCH_ASSOC) as $creneau) {
    $creneauconflict[]= $creneau['SalleName'];
    //on compte nombre de créneau en conflicts
    $countCreneauconflict= count($creneauconflict);
  };


//On récupère le nombre de réservation pour une séance
$pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
foreach ($pdo_kinepolise_cinema2->query('SELECT SalleName FROM `reservation_client` WHERE SalleName= "'.$SalleName.'" AND DateSeanceBegin= "'.$DateSeanceBegin.'" ', PDO::FETCH_ASSOC) as $Nombre_de_reservations) {
  $reservation[]= $Nombre_de_reservations['SalleName']; 
  $reservation1= count($reservation);
 }; 

  //On récupère Nombre_de_place
  $pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
  foreach ($pdo_kinepolise_cinema2->query('SELECT Nombre_de_place FROM infos_cinema1 WHERE SalleName= "'.$SalleName.'" ', PDO::FETCH_ASSOC) as $Nombre_de_place) { 
    $Nombre_de_place1= $Nombre_de_place['Nombre_de_place'];
    };

//On calcule les place_dispo
if(isset($reservation1)){
$place_dispo= $Nombre_de_place1 - $reservation1;
};
}