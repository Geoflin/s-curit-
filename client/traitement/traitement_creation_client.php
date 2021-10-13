<?php
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
$username = $_POST['username'];
$password = $_POST['password'];
//On vérifie que le compte n'existe pas déjà
foreach ($pdo->query('SELECT * FROM `info_client` WHERE username= "'.$username.'" OR password="'.$password.'" ', PDO::FETCH_ASSOC) as $compte_anti_doublons) {
    $doublons[]= $compte_anti_doublons['password'];
    //on compte nombre de créneau en conflicts
    $countDoublons= count($doublons);
  };
//On insére sous conditions les données du clients dans la table des infos_clients
if (isset($countDoublons)<1){
if ($pdo->exec('INSERT INTO info_client (username, password) VALUES ("'.$username.'", "'.$password.'");') !== false){}; 
} else {
    echo "Nom utilisateur ou mot de passe déjà utilisé";
};
?>