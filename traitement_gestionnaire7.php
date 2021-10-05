<?php
function unix_timestamp($datetime){
  $datetime = str_replace(array(' ', ':'), '-', $datetime);
  $c    = explode('-', $datetime);
   $c    = array_pad($c, 6, 0);
  array_walk($c, 'intval');
  
   return mktime($c[3], $c[4], $c[5], $c[1], $c[2], $c[0]);
 } 

$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');

foreach ($pdo->query('SELECT DateSeanceBegin, SalleName FROM seance_cinema1 WHERE DateSeanceBegin= "' .$fusionDateBegin_AjouterSeance. '"', PDO::FETCH_ASSOC) as $search) {
  $doublonArray[]= $search['DateSeanceBegin'];
  $doublonInt= count($doublonArray);
};
if (isset($doublonInt)){echo $doublonInt.'</br>';};%
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
          