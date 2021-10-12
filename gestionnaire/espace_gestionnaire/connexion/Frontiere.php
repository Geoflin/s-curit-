<?php
session_start();
$_SESSION['username'] = $_POST['username'];
$_SESSION['password']= $_POST['password'];
?>
<h1><a href="..\index_gestionnaire\espace_gestionnaire.php">Accèder à mon espace</a></h1>