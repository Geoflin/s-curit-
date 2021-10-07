<?php
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');

foreach ($pdo->query('SELECT 1 FROM seance_cinema1 WHERE EXISTS (SELECT * FROM seance_cinema1) ', PDO::FETCH_ASSOC) as $isVideTable) {
  if(!isset($isVideTable)){
    echo 'table vide';
  } else {
    echo 'table remplit';
  };
};