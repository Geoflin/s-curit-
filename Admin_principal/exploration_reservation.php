<html lang="fr">
<head>
<TITLE>Kinepolise/connexion_gestionnaire</TITLE>
</head>
<body>
<nav>
<button name="accueil"><a href="../index.php">retour à l'accueil</a></button>
</nav>

<h2 class="ligne2_1"> Infos clients</h2></br>
  <span class="ligne3_1">
  <form class="form" method="POST" action="">
  <h2 class="type_of_tri background">Veuillez compléter le formulaire</h2></br>


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
?>

<?php require_once 'Tri/tri_par_creneaux.php'; ?>

<?php } ?>