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

  <!--Function Tri-->
  <h2 class="ligne1">Explorer les espaces gestionnaire</h2>


  <!--Tri dans cinema-->
  <span class="ligne2">
  <form class="form" method="POST" action="">
  <h3 class="type_of_tri"> Choisissez l'adresse de votre cinéma</h3></br>
    <select name="FilmNameTest">
    <?php 
    $pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
  foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM adresse', PDO::FETCH_ASSOC) as $adresse) {};?>
 <option value="a"><?php echo $adresse['adresse'].'<br>'; ?></option> 
 <?php 
     $pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
  foreach ($pdo_kinepolise_cinema2->query('SELECT * FROM adresse', PDO::FETCH_ASSOC) as $adresse) {}; ?>
  <option value="b"><?php echo $adresse['adresse'].'<br>'; ?></option>
  </select>
  <input type="SUBMIT" value="Tri !" name="triFilmName">
  </form>
  </span>

  <a class="a" href='test.php'>test.php</a>

  <?php
  if (isset($_POST['triFilmName'])){ ?>
    <?php if($_POST['FilmNameTest']== 'a'){ ?>
      <span class="ligne2">
      <h1><form><button class="return" name="return" type="submit" onclick='window.location.reload(false)'>retour</button></form><a target="_blank" href="../gestionnaire\espace_gestionnaire\index_gestionnaire\espace_gestionnaire.php">Cinéma1: espace gestionnaire</a></h1>
      </span>
      <style>
        .return{
          display: flex;
          z-index: 3;
        }
          .form{
              display:none;
          }
          h1{
              display: flex;
              justify-content: center;
              align-items: flex-start;
              background-color: rgb(39,39,39);
              margin-bottom: 800px;    
              }
      </style>
          <?php } else{ ?>
      <span class="ligne2">
      <h1><a target="_blank" href="../gestionnaire\espace_gestionnaire\index_gestionnaire\espace_gestionnaire_cinema_2.php">Cinéma2: espace gestionnaire</a></h1>
      </span>
      <style>
          .form{
              display:none;
          }
          h1{
              display: flex;
              justify-content: center;
              align-items: flex-start;
              background-color: rgb(39,39,39);
              margin-bottom: 800px;    
              }
      </style>
   <?php };
   }; ?>

  <?php if (isset($_POST['return'])){ ?>
    <style>
    form{
      display:flex;
  }
  </style>
  <?php }; ?>
    


<?php
if (($_SESSION['username'] == $dataCompte['username']  && $_SESSION['password'] == $dataCompte['password'])) {
  echo sprintf("<nav class=center><h3>Bonjour %s<h3/></nav>", $_SESSION['username']) . PHP_EOL; 
?>

    <style>
          body {
        font-family: Calibri, serif;
        display: grid;
        grid-template-columns: 10% 90%;
        grid-template-rows:100px 100px 100px;
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
        grid-column: 1/3;
        grid-row: 3/3;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
        a, h2{
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