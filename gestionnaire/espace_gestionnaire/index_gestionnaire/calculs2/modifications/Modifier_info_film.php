<?php
                             $pdo_kinepolise = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
                                 $pdo_kinepolise->exec("SET CHARACTER SET utf8");
                                         $sql = "UPDATE `info_film` SET `FilmName` = '".$_POST['FilmName']."', Duree = '".$_POST['Duree']."'WHERE `info_film`.`Id` = '".$_POST['Id']."' ";
                                         $count = $pdo_kinepolise->exec($sql);
                                 
                                         $pdo_kinepolise = null;