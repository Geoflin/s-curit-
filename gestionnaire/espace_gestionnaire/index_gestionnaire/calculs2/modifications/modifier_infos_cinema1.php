<?php
                             $pdo_kinepolise_cinema2 = new PDO('mysql:dbname=kinepolise_cinema2;host=localhost', 'root', '');
                                 $pdo_kinepolise_cinema2->exec("SET CHARACTER SET utf8");
                                 $sql2 = "UPDATE `infos_cinema1` SET `SalleName` = '".$_POST['SalleName']."', Nombre_de_place = '".$_POST['Nombre_de_place']."'WHERE `infos_cinema1`.`Id` = '".$_POST['Id']."' ";
                                 $count = $pdo_kinepolise_cinema2->exec($sql2);
                                 
                                 $pdo_kinepolise_cinema2 = null;