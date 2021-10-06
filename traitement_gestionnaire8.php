<?php
function unix_timestamp($datetime){
  $datetime = str_replace(array(' ', ':'), '-', $datetime);
  $c    = explode('-', $datetime);
   $c    = array_pad($c, 6, 0);
  array_walk($c, 'intval');
  
   return mktime($c[3], $c[4], $c[5], $c[1], $c[2], $c[0]);
 } 

 $SalleName= $_POST['SalleName'];
 $concatSearch= $fusionDateBegin_AjouterSeance.' '.$SalleName;
 $fusion= $fusionDateBegin_AjouterSeance.":00";

$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');

foreach ($pdo->query('SELECT DateSeanceBegin FROM `seance_cinema1` WHERE DateSeanceBegin LIKE "'.$fusion.'" AND SalleName LIKE "'.$SalleName.'" ', PDO::FETCH_ASSOC) as $search) {
  $doublonArray[]= $search['DateSeanceBegin'];
  $doublonInt= count($doublonArray);
};
//  

        foreach ($pdo->query('SELECT DateSeanceBegin, SalleName FROM seance_cinema1 WHERE Id=(SELECT max(Id) FROM seance_cinema1);')as $maxid) {
            $DateSeanceBegin= $maxid['DateSeanceBegin'];
            $SalleName= $maxid['SalleName'];
            
            $Unix_DateSeanceBegin = unix_timestamp($maxid['DateSeanceBegin']);
            $Unix_fusionDateBegin = unix_timestamp($fusionDateBegin_AjouterSeance);
        };
        
          if (isset($doublonInt)<1){
            if (isset($Unix_DateSeanceBegin)) {
            if (($Unix_DateSeanceBegin != $Unix_fusionDateBegin && $SalleName == $_POST['SalleName']) || ($Unix_DateSeanceBegin == $Unix_fusionDateBegin && $SalleName != $_POST['SalleName']) || ($Unix_DateSeanceBegin == $Unix_fusionDateBegin && $SalleName != $_POST['SalleName'])) {
              if ($pdo->exec('INSERT INTO seance_cinema1 (FilmName, DateSeanceBegin, DateSeanceEnd, SalleName, Nombre_de_place) VALUES ("'. $_POST['FilmName'] . '", "' . $fusionDateBegin_AjouterSeance . '", "' . $fusionDateEnd_AjouterSeance .'", "' . $_POST['SalleName'] .'", "' . $_POST['Nombre_de_place'] .'");') !== false) {}
            };
            } else {
                if ($pdo->exec('INSERT INTO seance_cinema1 (FilmName, DateSeanceBegin, DateSeanceEnd, SalleName, Nombre_de_place) VALUES ("'. $_POST['FilmName'] . '", "' . $fusionDateBegin_AjouterSeance . '", "' . $fusionDateEnd_AjouterSeance .'", "' . $_POST['SalleName'] .'", "' . $_POST['Nombre_de_place'] .'");') !== false) {}
          };
          };

          //SELECT * FROM `seance_cinema1` WHERE CONCAT(TRIM(Unix_DateSeanceBegin), ' ', TRIM(SalleName)) LIKE '%Unix_fusionDateBegin "'. $_POST['SalleName'] . '"%'
          //SELECT * FROM `seance_cinema1` WHERE CONCAT(TRIM(DateSeanceBegin), ' ', TRIM(SalleName)) LIKE '%John Salle1%'
          //2021-10-05 14:41:00
          //SELECT DateSeanceBegin, SalleName FROM `seance_cinema1` WHERE CONCAT(TRIM(DateSeanceBegin), ' ', TRIM(SalleName)) LIKE '%2021-10-05 14:41:00 Salle1%'

          //foreach ($pdo->query('SELECT DateSeanceBegin FROM `seance_cinema1` WHERE DateSeanceBegin LIKE '.$fusionDateBegin_AjouterSeance.' AND SalleName LIKE '.$SalleName.' ', PDO::FETCH_ASSOC) as $search) {

            //foreach ($pdo->query('SELECT DateSeanceBegin FROM `seance_cinema1` WHERE DateSeanceBegin LIKE "2021-10-05 14:41:00" AND SalleName LIKE "Salle1" ', PDO::FETCH_ASSOC) as $search) {