<?php

                             $Id_modif= $_POST['Id'];
//on calcul et ajoute date de fin séance
                  require_once 'Calcul_fin_seance2.php';
                                 $pdo_kinepolise_cinema2 = new PDO('mysql:dbname=kinepolise_cinema2;host=localhost', 'root', '');
                                 $pdo_kinepolise_cinema2->exec("SET CHARACTER SET utf8");
                                         $sql = "UPDATE `seance_cinema1` SET `FilmName` = '".$_POST['FilmName']."', `DateSeanceBegin` = '".$fusionDateBegin_AjouterSeance."', `SalleName` = '".$_POST['SalleName']."' WHERE `seance_cinema1`.`Id` = '".$Id_modif."' ";
                                         $count = $pdo_kinepolise_cinema2->exec($sql);
                                 
                                         $pdo_kinepolise_cinema2 = null;