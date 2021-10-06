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

//date début film
echo 'Date début du film= '.$DateSeanceBegin1.'</br>';

//on explose durée du film en heure et minute
echo 'Time durée du film= '.$dureeFilm.'</br>';
$explosion= explode(":", $dureeFilm);
$heure= $explosion[0];
echo 'heureFilm= '.$heure.'</br>';
$minute = $explosion[1];
echo 'MinuteFilm= '.$minute.'</br>';

//On ajoute les heures et minutes au début du film
echo "<br/>$DateSeanceBegin1<br>";
$DateFinSeance= date('Y-m-d H:i:s',strtotime("+$heure hours $minute minutes", strtotime($DateSeanceBegin1)));
echo $DateFinSeance;