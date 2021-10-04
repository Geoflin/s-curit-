<?php
                             //debug
                             $debug = false;
                             if ($debug) {
                             
                                 // gère et affiche tous les niveaux d'erreurs en mode débogage
                             
                                 error_reporting(E_ALL);
                             
                                 ini_set('display_errors', '1');
                             
                             } else {
                             
                                 // en mode production, ne gère pas certains niveaux pour des raisons de performance (ceux précédés de ~), tel que suggéré dans php.ini
                             
                                 // même pour les niveaux gérés, aucun message ne sera affiché
                             
                                 error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
                             
                                 ini_set('display_errors', '0');
                             
                             }
                             //debug
                             $Id= implode("", $_POST['Id']);
                                 $conn = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
                                 $conn->exec("SET CHARACTER SET utf8");
                                 
                                         $sql = "UPDATE `seance_cinema1` SET `FilmName` = '".$_POST['FilmName']."', `DateSeanceBegin` = '".$fusionDateBegin_AjouterSeance."', `DateSeanceEnd` = '".$fusionDateEnd_AjouterSeance."', `SalleName` = '".$_POST['SalleName']."' WHERE `seance_cinema1`.`Id` = '".$Id."' ";
                                         $count = $conn->exec($sql);
                                 
                                         $conn = null;