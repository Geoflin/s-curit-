<html lang="fr">
<head>
<TITLE>Kinepolise/connexion_gestionnaire</TITLE>
</head>
<body>
<nav>
<button name="accueil"><a href="../../../index.php">retour à l'accueil</a></button>
<button name="connexion"><a href="../connexion/connexion_gestionnaire.php">retour connexion</a></button>
<form><button name="deconnexion" type="submit" onclick='window.location.reload(false)'>déconnexion</button></form>
</nav>

<?php
$pdo_kinepolise = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
  foreach ($pdo_kinepolise->query('SELECT * FROM password WHERE Id= "1"', PDO::FETCH_ASSOC) as $dataConnexion) { 
  $username= $dataConnexion['username'];
  $password= $dataConnexion['password'];
};
$pdo_kinepolise_administrateur = new PDO('mysql:host=localhost;dbname=kinepolise_administrateur', 'root', '');
  foreach ($pdo_kinepolise_administrateur->query('SELECT * FROM password WHERE Id= "1"', PDO::FETCH_ASSOC) as $adminConnexion) {};
session_start();
?>

<?php
if ((($_SESSION['username'] == $dataConnexion['username']  && $_SESSION['password'] == $dataConnexion['password']) || ($_SESSION['username'] == $adminConnexion['username']  && $_SESSION['password'] == $adminConnexion['password']) )) {
  echo sprintf("<nav class=center><h3>Vous êtes connecté, bonjour %s <h3/></nav>", $_SESSION['username']) . PHP_EOL; 
?>

<h2>Choisissez la période des réservations</h2>

<?php require_once 'tri_par_creneaux.php'; ?>

<?php } ?>