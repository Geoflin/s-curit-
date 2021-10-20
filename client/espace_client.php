<html lang="fr">
<head>
<TITLE>connexion_client</TITLE>
</head>
<body>
<nav>
<button name="accueil"><a href="../index.php">retour à l'accueil</a></button>
<button name="connexion"><a href="connexion/connexion_client.php">retour connexion</a></button>
<form><button name="deconnexion" type="submit">déconnexion</button></form>
</nav>

<?php
session_start();
$pdo_kinepolise_client = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
foreach ($pdo_kinepolise_client->query('SELECT * FROM `info_client` WHERE username= "'.$_SESSION['username'].'" AND password="'.$_SESSION['password'].'" ', PDO::FETCH_ASSOC) as $dataCompte) {
  $username = $dataCompte['username'];
  $password = $dataCompte['password'];
  };
?>

<?php
if (($_SESSION['username'] == $dataCompte['username']  && $_SESSION['password'] == $dataCompte['password'])) {
  echo sprintf("<nav class=center><h3>Bonjour %s, voici nos séance disponibles:<h3/></nav>", $_SESSION['username']) . PHP_EOL; 
?>
    <!--Actualiser la page-->

    <?php
    if(isset($_SESSION['cinemaAdresse'])){
      if($_SESSION['cinemaAdresse']== 'cinema1'){
        require_once 'liste_seance_cinema1.php';
      } elseif($_SESSION['cinemaAdresse']== 'cinema2') {
        require_once 'liste_seance_cinema2.php';
      }
    }
    ?>
   
        <!-- traitement  ReserverSeance-->
        <?php
        if(isset($_POST['ReserverSeance'])){
          require_once 'traitement/traitement_ReserverSeance.php';
        }
        ?>


    <!--Seance_que_vous_avez_réservée-->
    <?php require_once 'traitement/affichage_seance_deja_reservee.php'; ?> 


        <!-- Traitement annulation Seance_que_vous_avez_réservée-->
        <?php
        if(isset($_POST['annulation_ReserverSeance'])){
          require_once 'traitement/annulation_ReserverSeance.php';
        }
        ?>
    </table>

    <style>
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
    body {
        font-family: Calibri, serif;
        display: grid;
        grid-template-columns: 15% 85%;
        grid-template-rows:50px 100px 100px 70px 1fr;
        background-color: black;
        color: white;
    }
    table td{
        border: 1px solid rgba(29, 29, 29);
        padding: 1rem;
        text-align: center;
        max-width: 100px;
        min-width: 100px;
        word-wrap: break-word;
        height: 100px;
    }
    .thead{
      background-color:rgb(69, 69, 69);
        font-weight: bold;
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
    nav button, nav form{
      background-color: white;
      z-index: 2;
      height: 25px;
      margin-left: 10px;
    }
    .center{
      display: flex;
      justify-content: center;
      background-color: rgb(39, 39, 39);
      z-index: 1;
    }
    .ligne1{
        grid-column: 1/3;
        grid-row: 2/2;
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .ligne2{
        grid-column: 1/3;
        grid-row: 3/3;
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-left:300px;
        margin-right:300px;
    }
    /*tableau1*/
    .ligne4{
      grid-row: 5/5;
      grid-column: 1/3;
    }
    .type_of_tri{
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-direction: row;
    }
    .display_none{
      display: none;
    }
    .espace_tarif{
      grid-column: 1/1;
      grid-row:2/4;
      background-color: rgb(155, 89, 182);
    }
    </style>

  <!--Function Tri-->
  <h3 class="ligne1"><br/></br>Tri de l'affichage</h3>
  <span class="ligne2">
  <?php require_once '../gestionnaire\espace_gestionnaire\index_gestionnaire\calculs\tris\Tri_par_nom.php'; ?>
  <?php require_once '../gestionnaire\espace_gestionnaire\index_gestionnaire\calculs/tris/Tri_par_jour_de_seance.php'; ?>
  </span>

 

<?php
if(isset($_POST['deconnexion'])){
  session_destroy();
};
?>


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
