<?php
$MemberNo= "Guilaume";
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');

foreach ($pdo->query('SELECT MemberNo FROM delegates WHERE MemberNo= "' .$MemberNo. '"', PDO::FETCH_ASSOC) as $search) {
  $doublonArray[]= $search['MemberNo'];
};
echo $search['MemberNo'].'</br>';
$doublonInt= count($doublonArray);
echo $doublonInt.'</br>';
//  
