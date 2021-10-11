

<?php
// index.php
session_start();

$_SESSION['name'] = 'Laurent';
$_SESSION['age'] = 27;
$_SESSION['favoriteLangages'] = ['PHP', 'HTML', 'CSS'];

echo 'Session initialisée';
?>

