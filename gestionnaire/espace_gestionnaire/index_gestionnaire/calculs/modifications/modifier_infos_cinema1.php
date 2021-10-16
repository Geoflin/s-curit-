<?php
                             $kinepolise_cinema1 = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
                                 $kinepolise_cinema1->exec("SET CHARACTER SET utf8");
                                 $sql2 = "UPDATE `infos_cinema1` SET `SalleName` = '".$_POST['SalleName']."', Nombre_de_place = '".$_POST['Nombre_de_place']."'WHERE `infos_cinema1`.`Id` = '".$_POST['Id']."' ";
                                 $count = $kinepolise_cinema1->exec($sql2);
                                 
                                         $kinepolise_cinema1 = null;