<html lang="fr">
<head>
<TITLE>connexion_client</TITLE>
</head>
<body>
<nav>
<button name="accueil"><a href="../index.php">retour à l'accueil</a></button>
<button name="connexion"><a href="connexion\connexion_admin_principal.php">retour connexion</a></button>
<form><button name="deconnexion" type="submit" onclick='window.location.reload(false)'>déconnexion</button></form>
</nav>

<?php
session_start();
$pdo_kinepolise_administrateur = new PDO('mysql:host=localhost;dbname=kinepolise_administrateur', 'root', '');
foreach ($pdo_kinepolise_administrateur->query('SELECT * FROM `password` WHERE username= "'.$_SESSION['username'].'" AND password="'.$_SESSION['password'].'" ', PDO::FETCH_ASSOC) as $dataCompte) {
  $username = $dataCompte['username'];
  $password = $dataCompte['password'];
  };
?>


<?php
if (($_SESSION['username'] == $dataCompte['username']  && $_SESSION['password'] == $dataCompte['password'])) {
  echo sprintf("<nav class=center><h3>Bonjour %s<h3/></nav>", $_SESSION['username']) . PHP_EOL; 
?>

<link rel="stylesheet" href="CSS/espace_admin_principal.css" />   

<?php
if(isset($_POST['deconnexion'])){
  session_destroy();
};
?>

  <!--Function Tri-->
  <h1 class="ligne1">Explorer vos cinéma</h1>

  <?php
  require_once "exploration_gestionnaire.php";
  ?>

  <h2 class="ligne2"> Infos clients</h2></br>
  <span class="ligne3">
  <form class="form" method="POST" action="">
  <h3 class="type_of_tri"> Choisissez l'adresse de votre cinéma</h3></br>
  <button class="ligne2 button"><a target="_blank" href="exploration_reservation.php">espace client</a></button>


<?php } else { echo $_SESSION['username'].'</br>'.$_SESSION['password'];?>
<h1>Mot de passe ou nom utilisateur faux</h1>


<style>
h1{
  grid-row: 3/3;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  color:red;
  background-color: rgb(39,39,39);
  padding: 1em;
  margin: auto;
}
body{
  background-color: black;
  color:white;
}
</style>
<?php }; ?>


<?php
if(isset($_POST['deconnexion'])){
  session_destroy();
};
?>