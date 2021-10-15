<?php

//On récupère données séance réservée
foreach ($pdo->query('SELECT * FROM seance_cinema1 ', PDO::FETCH_ASSOC) as $reservationSeance) { 
    $Id= $reservationSeance['Id'];
    $FilmName= $reservationSeance['FilmName'];
    $DateSeanceBegin= $reservationSeance['DateSeanceBegin'];
    $DateSeanceEnd= $reservationSeance['DateSeanceEnd'];
    $SalleName= $reservationSeance['SalleName'];
    };

//On récupère le nombre de réservation pour une séance
$pdo1 = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
foreach ($pdo1->query('SELECT * FROM `reservation_client` WHERE SalleName= "'.$_POST['SalleName'].'" AND DateSeanceBegin= "'.$_POST['DateSeanceBegin'].'" ', PDO::FETCH_ASSOC) as $Nombre_de_reservations) {
  $reservation[]= $Nombre_de_reservations['FilmName']; 
  $reservation1= count($reservation);
 }; 

 //On récupère Nombre_de_place
 foreach ($pdo->query('SELECT Nombre_de_place FROM infos_cinema1 WHERE SalleName= "'.$_POST['SalleName'].'" ', PDO::FETCH_ASSOC) as $Nombre_de_place) { 
    $Nombre_de_place1= $Nombre_de_place['Nombre_de_place'];
    };

//On calcule les place_dispo
if(isset($reservation1)){
$reservation1-- ;
$place_dispo= $Nombre_de_place1 - $reservation1;
};


                                 if(isset($_POST['Id']))
                                 {
                                   // On assigne notre variable $_POST['checkbox_id']
                                   $nombre=$_POST['Id'];
                                   
                                   /* On crée une variable qui comptera le nombre de
                                   checkbox choisis grâce à la fonction count() */
                                   $total=count($nombre);
                                   
                                   // On affiche le résultat
                                   $s =($total<=1) ? "" : "s"; // astuce pour le singulier ou le pluriel
                                   
                                   /* Une petite boucle pour afficher les valeurs qu'on 
                                       a sélectionné dans notre formulaire */
                                   for( $i=0; $i<$total; $i++ )
                                   {
                                     $statement = $pdo1->prepare('DELETE FROM reservation_client WHERE Id = :Id');
                                     $statement->bindValue(':Id', $nombre[$i], PDO::PARAM_INT);        
                                         if ($statement->execute()) {

                                         } else {
                                             echo "erreur";
                                         }
                                   }
                             } else {};

//On actualise le nombre de réservation
  $pdo1->exec("SET CHARACTER SET utf8");
  if(isset($reservation1)){
    $sql2 = 'UPDATE seance_cinema1 SET Nombre_de_reservation= "'.$reservation1.'" WHERE SalleName= "'.$_POST['SalleName'].'" AND DateSeanceBegin= "'.$_POST['DateSeanceBegin'].'" ';
    $count4 = $pdo->exec($sql2);

    $conn3 = null;
  };

//On actualise le nombre de place_dispo
if(isset($place_dispo)){
    $sql2 = 'UPDATE seance_cinema1 SET place_disponible= "'.$place_dispo.'" WHERE SalleName= "'.$_POST['SalleName'].'" AND DateSeanceBegin= "'.$_POST['DateSeanceBegin'].'" ';
    $count4 = $pdo->exec($sql2);

    $conn3 = null;
  };?>