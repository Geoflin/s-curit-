<?php
                             $conn = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
                                 $conn->exec("SET CHARACTER SET utf8");
                                         $sql = "UPDATE `info_film` SET `FilmName` = '".$_POST['FilmName']."', Duree = '".$_POST['Duree']."'WHERE `info_film`.`Id` = '".$_POST['Id']."' ";
                                         $count = $conn->exec($sql);
                                 
                                         $conn = null;