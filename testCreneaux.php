<?php
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
//On Vérifie que le créneau est disponible
foreach ($pdo->query('SELECT `FilmName` FROM `seance_cinema1` WHERE `DateSeanceBegin` >= "2021-10-07 11:24:00" AND `DateSeanceBegin` <= "'.$fusion.'" AND `SalleName` = "'.$SalleName.'" ', PDO::FETCH_ASSOC) as $creneau) {
  $creneauconflict[]= $creneau['FilmName'];
  //on compte nombre de créneau en conflicts
  $countCreneauconflict= count($creneauconflict);
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
        if (isset($countCreneauconflict)<1){
            if (isset($Unix_DateSeanceBegin)) {
            if (($Unix_DateSeanceBegin != $Unix_fusionDateBegin && $SalleName == $_POST['SalleName']) || ($Unix_DateSeanceBegin == $Unix_fusionDateBegin && $SalleName != $_POST['SalleName']) || ($Unix_DateSeanceBegin == $Unix_fusionDateBegin && $SalleName != $_POST['SalleName'])) {
              if ($pdo->exec('INSERT INTO seance_cinema1 (FilmName, DateSeanceBegin, SalleName) VALUES ("'. $_POST['FilmName'] . '", "' . $fusionDateBegin_AjouterSeance . '", "' . $_POST['SalleName'] .'");') !== false) {};
                                                    //on calcul et ajoute date de fin séance
                                                    require_once 'Calcul_fin_seance.php';
            };
            } else {
                if ($pdo->exec('INSERT INTO seance_cinema1 (FilmName, DateSeanceBegin, SalleName) VALUES ("'. $_POST['FilmName'] . '", "' . $fusionDateBegin_AjouterSeance . '", "' . $_POST['SalleName'] .'");') !== false) {};
                                  //on calcul et ajoute date de fin séance
                                  require_once 'Calcul_fin_seance.php';
          };
          } else {
            echo "Créneau déjà occupé par ".$countCreneauconflict." séances"; 
          };
        } else {
          echo "Séance en double !"; 
        };