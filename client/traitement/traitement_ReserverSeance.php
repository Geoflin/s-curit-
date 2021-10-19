<?php

$pdo_kinepolise = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
$pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) {};

//On récupère données séance réservée
foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM seance_cinema1 WHERE Id= "'.$_POST['Id'].'" ', PDO::FETCH_ASSOC) as $reservationSeance) { 
$Id= $reservationSeance['Id'];
$FilmName= $reservationSeance['FilmName'];
$DateSeanceBegin= $reservationSeance['DateSeanceBegin'];
$DateSeanceEnd= $reservationSeance['DateSeanceEnd'];
$SalleName= $reservationSeance['SalleName'];
};


//On Vérifie que le créneau est disponible
$pdo_kinepolise_client = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
foreach ($pdo_kinepolise_client->query('SELECT * FROM `reservation_client` WHERE `DateSeanceBegin` <= "'.$DateSeanceBegin.'" AND `DateSeanceEnd` >= "'.$DateSeanceBegin.'" AND username = "'.$_SESSION['username'].'" AND password = "'.$_SESSION['password'].'" ', PDO::FETCH_ASSOC) as $creneau) {
    $creneauconflict[]= $creneau['SalleName'];
    //on compte nombre de créneau en conflicts
    $countCreneauconflict= count($creneauconflict);
  };


//On récupère le nombre de réservation pour une séance
$pdo_kinepolise_client = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
foreach ($pdo_kinepolise_client->query('SELECT SalleName FROM `reservation_client` WHERE SalleName= "'.$SalleName.'" AND DateSeanceBegin= "'.$DateSeanceBegin.'" ', PDO::FETCH_ASSOC) as $Nombre_de_reservations) {
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


//On stocke sous condition séance réservée dans table réservation client du cinéma1 ou cinéma2
if($_SESSION['cinemaAdresse']== 'cinema1'){
  //stockage dans cinéma1
  $pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
$pdo_kinepolise_cinema1->exec("SET CHARACTER SET utf8");
if ($seance['place_disponible']>0){
if (isset($countCreneauconflict)<1){
    if ($pdo_kinepolise_cinema1->exec('INSERT INTO reservation_client (Id, username, password, FilmName, DateSeanceBegin, DateSeanceEnd, SalleName) VALUES ("'.$Id.'", "'.$_SESSION['username'].'", "'.$_SESSION['password'].'", "'.$FilmName.'", "'.$DateSeanceBegin.'", "'.$DateSeanceEnd.'", "'.$SalleName.'");') !== false){}; 
} else {
    echo "Créneau déjà occupé par ".$countCreneauconflict." séances"; 
  };

  //On stocke nombre de réservation pour une séance dans seance_cinema1
  $pdo_kinepolise_cinema1 = new PDO('mysql:dbname=kinepolise_cinema1;host=localhost', 'root', '');
  $pdo_kinepolise_cinema1->exec("SET CHARACTER SET utf8");
  if(isset($reservation1)){
          $sql3 = 'UPDATE seance_cinema1 SET Nombre_de_reservation= "'.$reservation1.'" WHERE SalleName= "'.$SalleName.'" AND DateSeanceBegin= "'.$DateSeanceBegin.'" ';
          $count3 = $pdo_kinepolise_cinema1->exec($sql3);
  
          $pdo_kinepolise_cinema1 = null;
        };

  //On actualise le nombre de place_dispo
  $pdo_kinepolise_cinema1 = new PDO('mysql:dbname=kinepolise_cinema1;host=localhost', 'root', '');
  $pdo_kinepolise_cinema1->exec("SET CHARACTER SET utf8");
if(isset($place_dispo)){
  $sql2  = 'UPDATE seance_cinema1 SET place_disponible= "'.$place_dispo.'" WHERE SalleName= "'.$SalleName.'" AND DateSeanceBegin= "'.$DateSeanceBegin.'" ';
  $count3 = $pdo_kinepolise_cinema1->exec($sql2 );

  $pdo_kinepolise_cinema1  = null;
};
} else {
  echo "Il n'y a plus de place !";
}
} elseif($_SESSION['cinemaAdresse']== 'cinema2') {
  //stockage dans cinéma2
    $pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
    $pdo_kinepolise_cinema2->exec("SET CHARACTER SET utf8");
    if ($seance['place_disponible']>0){
    if (isset($countCreneauconflict)<1){
        if ($pdo_kinepolise_cinema2->exec('INSERT INTO reservation_client (Id, username, password, FilmName, DateSeanceBegin, DateSeanceEnd, SalleName) VALUES ("'.$Id.'", "'.$_SESSION['username'].'", "'.$_SESSION['password'].'", "'.$FilmName.'", "'.$DateSeanceBegin.'", "'.$DateSeanceEnd.'", "'.$SalleName.'");') !== false){}; 
    } else {
        echo "Créneau déjà occupé par ".$countCreneauconflict." séances"; 
      };
    
    
      //On stocke nombre de réservation pour une séance dans seance_cinema1
      $pdo_kinepolise_cinema2 = new PDO('mysql:dbname=kinepolise_cinema1;host=localhost', 'root', '');
      $pdo_kinepolise_cinema2->exec("SET CHARACTER SET utf8");
      if(isset($reservation1)){
              $sql3 = 'UPDATE seance_cinema1 SET Nombre_de_reservation= "'.$reservation1.'" WHERE SalleName= "'.$SalleName.'" AND DateSeanceBegin= "'.$DateSeanceBegin.'" ';
              $count3 = $pdo_kinepolise_cinema2->exec($sql3);
      
              $pdo_kinepolise_cinema1 = null;
            };
    
      //On actualise le nombre de place_dispo
      $pdo_kinepolise_cinema2 = new PDO('mysql:dbname=kinepolise_cinema1;host=localhost', 'root', '');
      $pdo_kinepolise_cinema2->exec("SET CHARACTER SET utf8");
    if(isset($place_dispo)){
      $sql2  = 'UPDATE seance_cinema1 SET place_disponible= "'.$place_dispo.'" WHERE SalleName= "'.$SalleName.'" AND DateSeanceBegin= "'.$DateSeanceBegin.'" ';
      $count3 = $pdo_kinepolise_cinema2->exec($sql2 );
    
      $pdo_kinepolise_cinema2  = null;
    };
    } else {
      echo "Il n'y a plus de place !";
    }
}
