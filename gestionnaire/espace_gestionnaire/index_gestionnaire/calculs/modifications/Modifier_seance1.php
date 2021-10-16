<?php

                             $Id_modif= $_POST['Id'];
//on calcul et ajoute date de fin séance
                  require_once 'Calcul_fin_seance2.php';
                                 $kinepolise_cinema1 = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
                                 $kinepolise_cinema1->exec("SET CHARACTER SET utf8");
                                         $sql = "UPDATE `seance_cinema1` SET `FilmName` = '".$_POST['FilmName']."', `DateSeanceBegin` = '".$fusionDateBegin_AjouterSeance."', `SalleName` = '".$_POST['SalleName']."' WHERE `seance_cinema1`.`Id` = '".$Id_modif."' ";
                                         $count = $kinepolise_cinema1->exec($sql);
                                 
                                         $conn = null;