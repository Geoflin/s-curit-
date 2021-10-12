<?php
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
$username = $_POST['username'];
$statement = $pdo->prepare('CREATE TABLE '.$username.' (
    `Id` int(11) NOT NULL,
    `FilmName` varchar(250) NOT NULL,
    `DateSeanceBegin` datetime DEFAULT NULL,
    `DateSeanceEnd` datetime DEFAULT NULL,
    `SalleName` varchar(250) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;');   
    if ($statement->execute()) {

    } else {
        echo "erreur";
    };