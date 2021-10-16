<?php
//On Vérifie qu'il n'y ait pas de Salle en double
foreach ($pdo_kinepolise_cinema1->query('SELECT SalleName FROM `infos_cinema1` WHERE `SalleName` = "'.$_POST['SalleName'].'" ', PDO::FETCH_ASSOC) as $infos_cinema1) {
  $infos_cinema1_double[]= $infos_cinema1_double['SalleName'];
    //on compte nombre de films en double
    $countInfo_Salle_double= count($infos_cinema1_double);
  };

                //On insére valeure formulaire sous condition
                if (isset($countInfo_Salle_double)<1){
                if ($pdo_kinepolise_cinema1->exec('INSERT INTO infos_cinema1 (SalleName, Nombre_de_place) VALUES ("'. $_POST['SalleName'] . '", "' . $_POST['Nombre_de_place'] .'");') !== false){};
                } else {
                  echo "Salle en double !";
                };