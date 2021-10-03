<?php
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
$test= ($pdo->query('SELECT * FROM seance_cinema1', PDO::lastInsertId));
echo $test;