<?php
//On récupère la durée du film
foreach ($pdo_kinepolise->query('SELECT Duree FROM `info_film` WHERE FilmName LIKE "'.$_POST['FilmName'].'" ', PDO::FETCH_ASSOC) as $duree) {
  $dureeFilm= $duree['Duree'];
};

  //On récupère la date de la séance
foreach ($pdo_kinepolise_cinema1->query('SELECT DateSeanceBegin FROM `seance_cinema1` WHERE FilmName LIKE "'.$_POST['FilmName'].'" ', PDO::FETCH_ASSOC) as $DateSeanceBegin) {
  $DateSeanceBegin1= $DateSeanceBegin['DateSeanceBegin'];
};

//on explose durée du film en heure et minute
$explosion= explode(":", $dureeFilm);
$heure= $explosion[0];
$minute = $explosion[1];

//On ajoute les heures et minutes au début du film
if (isset($DateSeanceBegin1)){
  $DateFinSeance= date('Y-m-d H:i:s',strtotime("+$heure hours $minute minutes", strtotime($DateSeanceBegin1)));
}else {
  $DateFinSeance= date('Y-m-d H:i:s',strtotime("+$heure hours $minute minutes", strtotime($fusionDateBegin_AjouterSeance)));
};

$conn = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
$conn->exec("SET CHARACTER SET utf8");

//On récupère l'Id de la séance crée
foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM `seance_cinema1`', PDO::FETCH_ASSOC) as $seance) {
  $Id_creation= $seance['Id'];
};