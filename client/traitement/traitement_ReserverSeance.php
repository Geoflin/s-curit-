<?php
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
foreach ($pdo->query('SELECT * FROM password WHERE Id= "2"', PDO::FETCH_ASSOC) as $dataConnexion) { 
$username= $dataConnexion['username'];
$password= $dataConnexion['password'];
};
?>