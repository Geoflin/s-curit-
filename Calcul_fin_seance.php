<?php
require_once 'function_dateTime.php';


//On récupère la durée du film
foreach ($pdo->query('SELECT Duree FROM `info_film` WHERE FilmName LIKE "'.$seance['FilmName'].'" ', PDO::FETCH_ASSOC) as $duree) {
  $dureeFilm= $duree['Duree'];
};
  //On récupère la date de la séance
foreach ($pdo->query('SELECT DateSeanceBegin FROM `seance_cinema1` WHERE FilmName LIKE "'.$seance['FilmName'].'" ', PDO::FETCH_ASSOC) as $DateSeanceBegin) {
  $DateSeanceBegin1= $DateSeanceBegin['DateSeanceBegin'];
};
//On concatene date seance avec durée film
//On convertit tout en timestampsUnix
  echo 'Time durée du film= '.$dureeFilm.'</br>';
  $Unix_dureeFilm= unix_timestamp($dureeFilm);
  echo 'Unix durée du film= '.$Unix_dureeFilm.'</br></br>';

  echo 'Date début du film= '.$DateSeanceBegin1.'</br>';
  $Unix_Date_debut_film= unix_timestamp($DateSeanceBegin1);
  echo 'Unix durée du film= '.$Unix_dureeFilm.'</br></br>';
//On aditionne les Timestamps
$HourEndSeanceSet = new DateTime(); 
$HourEndSeance= $Unix_Date_debut_film + $Unix_dureeFilm;
echo 'Somme Timestamp= '.$HourEndSeance.'</br></br>';
//On convertit somme timestamps en dateTime
$HourEndSeanceSet->setTimestamp($HourEndSeance);
echo 'Time Fin de séance= '.$HourEndSeanceSet->format('H:i').'</br></br>';