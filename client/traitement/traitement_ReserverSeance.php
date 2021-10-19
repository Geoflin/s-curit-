<?php

require_once 'anti_doublons.php';

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
};

//partie cinema2
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
      $pdo_kinepolise_cinema2 = new PDO('mysql:dbname=kinepolise_cinema2;host=localhost', 'root', '');
      $pdo_kinepolise_cinema2->exec("SET CHARACTER SET utf8");
      if(isset($reservation1)){
              $sql3 = 'UPDATE seance_cinema1 SET Nombre_de_reservation= "'.$reservation1.'" WHERE SalleName= "'.$SalleName.'" AND DateSeanceBegin= "'.$DateSeanceBegin.'" ';
              $count3 = $pdo_kinepolise_cinema2->exec($sql3);
      
              $pdo_kinepolise_cinema1 = null;
            };
    
      //On actualise le nombre de place_dispo
      $pdo_kinepolise_cinema2 = new PDO('mysql:dbname=kinepolise_cinema2;host=localhost', 'root', '');
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
