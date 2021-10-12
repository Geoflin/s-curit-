<?php
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');


$username = $_POST['username'];
$password = $_POST['password'];
//On insére les données du clients dans la table des infos_clients
if ($pdo->exec('INSERT INTO info_client (username, password) VALUES ("'.$username.'", "'.$password.'");') !== false){}; 