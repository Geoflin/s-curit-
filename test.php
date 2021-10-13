<?php
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
//On vérifie que le compte existe déjà
foreach ($pdo->query('SELECT * FROM `info_client` WHERE username= "Mike" AND password="05104chess" ', PDO::FETCH_ASSOC) as $dataCompte) {
  $username = $dataCompte['username'];
  $password = $dataCompte['password'];
  echo $username.'</br>'.$password;
  };