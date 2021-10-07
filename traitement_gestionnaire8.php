<?php
//on integre la function pour avoir le timestampUnix
require_once 'function_dateTime.php';
//on crée la date de début(fusion date et time)
$fusionDateBegin_AjouterSeance= $_POST['DateSeanceBegin'].' '.$_POST['HourBegin'];
//on récupère nom salle
 $SalleName= $_POST['SalleName'];
 //on concatène date début et nom salle
 $concatSearch= $fusionDateBegin_AjouterSeance.' '.$SalleName;
  //on ajoute des 00 pour les secondes de la date de début
 $fusion= $fusionDateBegin_AjouterSeance.":00";

$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');

//On sélectionne les dates débuts séance de la salle de la séance à créer 
foreach ($pdo->query('SELECT DateSeanceBegin FROM `seance_cinema1` WHERE DateSeanceBegin LIKE "'.$fusion.'" AND SalleName LIKE "'.$SalleName.'" ', PDO::FETCH_ASSOC) as $search) {
  $doublonArray[]= $search['DateSeanceBegin'];
  //on compte le nombre de date de début de la salle de la séance à créer identique
  $doublonInt= count($doublonArray);
};

        foreach ($pdo->query('SELECT DateSeanceBegin, SalleName FROM seance_cinema1 WHERE Id=(SELECT max(Id) FROM seance_cinema1);')as $maxid) {
            $DateSeanceBegin= $maxid['DateSeanceBegin'];
            $SalleName= $maxid['SalleName'];
            if(isset($DateSeanceBegin)) {
              $Unix_DateSeanceBegin = unix_timestamp($maxid['DateSeanceBegin']);
              $Unix_fusionDateBegin = unix_timestamp($fusionDateBegin_AjouterSeance);
            };
        };
        
        //On insére valeure formulaire sous condition
          if (isset($doublonInt)<1){
            if (isset($Unix_DateSeanceBegin)) {
            if (($Unix_DateSeanceBegin != $Unix_fusionDateBegin && $SalleName == $_POST['SalleName']) || ($Unix_DateSeanceBegin == $Unix_fusionDateBegin && $SalleName != $_POST['SalleName']) || ($Unix_DateSeanceBegin == $Unix_fusionDateBegin && $SalleName != $_POST['SalleName'])) {
              if ($pdo->exec('INSERT INTO seance_cinema1 (FilmName, DateSeanceBegin, SalleName) VALUES ("'. $_POST['FilmName'] . '", "' . $fusionDateBegin_AjouterSeance . '", "' . $_POST['SalleName'] .'");') !== false) {
                                      //on calcul et ajoute date de fin séance
                                      require_once 'Calcul_fin_seance.php';
              };
            };
            } else {
                if ($pdo->exec('INSERT INTO seance_cinema1 (FilmName, DateSeanceBegin, SalleName) VALUES ("'. $_POST['FilmName'] . '", "' . $fusionDateBegin_AjouterSeance . '", "' . $_POST['SalleName'] .'");') !== false) {
                  //on calcul et ajoute date de fin séance
                  require_once 'Calcul_fin_seance.php';
                }
          };
          };

          //SELECT * FROM `seance_cinema1` WHERE CONCAT(TRIM(Unix_DateSeanceBegin), ' ', TRIM(SalleName)) LIKE '%Unix_fusionDateBegin "'. $_POST['SalleName'] . '"%'
          //SELECT * FROM `seance_cinema1` WHERE CONCAT(TRIM(DateSeanceBegin), ' ', TRIM(SalleName)) LIKE '%John Salle1%'
          //2021-10-05 14:41:00
          //SELECT DateSeanceBegin, SalleName FROM `seance_cinema1` WHERE CONCAT(TRIM(DateSeanceBegin), ' ', TRIM(SalleName)) LIKE '%2021-10-05 14:41:00 Salle1%'

          //foreach ($pdo->query('SELECT DateSeanceBegin FROM `seance_cinema1` WHERE DateSeanceBegin LIKE '.$fusionDateBegin_AjouterSeance.' AND SalleName LIKE '.$SalleName.' ', PDO::FETCH_ASSOC) as $search) {

            //foreach ($pdo->query('SELECT DateSeanceBegin FROM `seance_cinema1` WHERE DateSeanceBegin LIKE "2021-10-05 14:41:00" AND SalleName LIKE "Salle1" ', PDO::FETCH_ASSOC) as $search) {