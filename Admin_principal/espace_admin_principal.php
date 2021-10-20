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

    <style>
          body {
        font-family: Calibri, serif;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows:100px 100px 100px 100px 100px;
        background-color: black;
        color: white;
    }
    .ligne1{
        grid-column: 1/3;
        grid-row: 2/2;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .ligne2{
        grid-column: 1/1;
        grid-row: 3/3;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .ligne2_1{
        grid-column: 2/2;
        grid-row: 3/3;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .ligne3{
        grid-column: 1/1;
        grid-row: 4/4;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .ligne3_1{
        grid-column: 2/2;
        grid-row: 4/4;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .ligne4{
      grid-column: 1/3;
        grid-row: 5/5;
        display: block;
        text-align: center;
        border: 5px solid rgb(155, 89, 182);
    }
        a, h2, h1{
      color:rgb(155, 89, 182);
      text-align: center;
      text-decoration: underline;
    }
    .title1{
      grid-row: 4/4;
      display: flex;
      justify-content: flex-start;
      align-items: flex-end;
      margin-bottom: 0px;
    }
    .title2{
      grid-row: 6/6;
      display: flex;
      justify-content: flex-start;
      align-items: flex-end;
      margin-bottom: 0px;
    }
    .ligne4, .ligne6{
        border-collapse: collapse;
        width: 100%;
        height: 100px;
        background-color: rgb(39, 39, 39);
    }
    nav{
        grid-column: 1/3;
        grid-row: 1/1;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    nav button, nav form, .deconnexion{
      background-color: white;
      z-index: 3;
      height: 25px;
      margin-left: 10px;
    }
    .center{
      display: flex;
      justify-content: center;
      background-color: rgb(39, 39, 39);
      z-index: 1;
    }
    .type_of_tri{
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-direction: row;
    }
    .display_none, .a{
      display: none;
    }
    </style>

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
  <h3 class="ligne2"><a target="_blank" href="exploration_reservation.php">espace client</a></h3>


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