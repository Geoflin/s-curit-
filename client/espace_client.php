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
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
  foreach ($pdo->query('SELECT * FROM password WHERE Id= "2"', PDO::FETCH_ASSOC) as $dataConnexion) { 
  $username= $dataConnexion['username'];
  $password= $dataConnexion['password'];
};
session_start();
?>

<?php
if (($_SESSION['username'] == $dataConnexion['username']  && $_SESSION['password'] == $dataConnexion['password'])) {
  echo sprintf("<nav class=center><h3>Bonjour %s, voici nos séance disponibles:<h3/></nav>", $_SESSION['username']) . PHP_EOL; 
?>
    <!--Actualiser la page-->
    <h2 class="ligne1">Liste des séance</h2>
    <!--Tableaux-->
    <!-- Thead-->
    <?php
        $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');?>

        <table class="ligne4">
        <tr class="thead">
            <!-- Form  triNomFilm-->
        <td>Réserver la séance</td>
        <td>Nom du film</td>
        <td>Jour de séance</td>
        <td>Heure de début</td>
        <td>Heure de fin</td>
        <td>Salle</td>
</tr>
    </form>
    <h2 class="title1">Séance disponibles</h2>
    <section class="title1">
    <form class="title1" method="post">
    <input class="title1" type="button" onclick='window.location.reload(false)' value="Actualiser la page"/></form>
        <button class="title1" type="reset">Réinitialiser la séléction</button>
        <button class="title1" type="submit" name="supprimerseance">Supprimer la séléction</button>
    </section>
        <!-- Boucle Corps du tableau-->
        </tr>
        <?php foreach ($pdo->query('SELECT SalleName FROM infos_cinema1', PDO::FETCH_ASSOC) as $Salle) { ?>
  <?php } ?>
        <?php
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
      $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
      $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']);
            ?>
        <!-- Form  ReserverSeance-->
        <form class="ReserverSeance" method="post" action="">
        <tr class=<?php echo $seance['FilmName']?>>
        <td><input type="checkbox" name="Id" id="Id" required="required" value="<?php echo $seance['Id'];?>"><button type="submit" name="ReserverSeance">Réserver la séance</button></td>
        <td><?php echo $seance['FilmName'];?></td> 
        <td><?php echo $dateSeanceBegin->format('Y-m-d');?></td>
        <td><?php echo $dateSeanceBegin->format('H:i');?></td>
        <td><?php echo $DateSeanceEnd->format('H:i');?></td>
        <td><?php echo $seance['SalleName'];?></td>
        </tr>
        </form>
        
        <!-- traitement  ReserverSeance-->
        <?php
        if(isset($_POST['ReserverSeance'])){
          require_once 'traitement/traitement_ReserverSeance.php';
        }
        ?>
        <?php } ?>
    </table>

    <!--Seance_que_vous_avez_réservée-->
    <h2 class="title2">Séance que vous avez réservée</h2>
    <section class="title2">
    <form class="title2" method="post">
    <input class="title2" type="button" onclick='window.location.reload(false)' value="Actualiser la page"/></form>
        <button class="title2" type="reset">Réinitialiser la séléction</button>
    </section>

    <table class="ligne6">
    <?php foreach ($pdo->query('SELECT * FROM reservation_client1', PDO::FETCH_ASSOC) as $seanceReservee) { 
      $dateSeanceBegin = new DateTime($seanceReservee['DateSeanceBegin']);
      $DateSeanceEnd = new DateTime($seanceReservee['DateSeanceEnd']);
            ?>
        <!-- Affichage  Seance_que_vous_avez_réservée-->
        <form class="annulation_ReserverSeance" method="post" action="">
        <tr class=<?php echo $seanceReservee['FilmName']?>>
        <td><input type="checkbox" name="Id[]" id="Id" required="required" value="<?php echo $seanceReservee['Id'];?>"><button type="submit" name="annulation_ReserverSeance">Annuler la réservation</button></td>
        <td><?php echo $seanceReservee['FilmName'];?></td> 
        <td><?php echo $dateSeanceBegin->format('Y-m-d');?></td>
        <td><?php echo $dateSeanceBegin->format('H:i');?></td>
        <td><?php echo $DateSeanceEnd->format('H:i');?></td>
        <td><?php echo $seanceReservee['SalleName'];?></td>
        </tr>
        </form>
        <?php } ?>

        <!-- Traitement annulation Seance_que_vous_avez_réservée-->
        <?php
        if(isset($_POST['annulation_ReserverSeance'])){
          require_once 'traitement/annulation_ReserverSeance.php';
        }
        ?>
    </table>

  <!--Function Tri-->
  <h3 class="ligne1"><br/></br>Tri de l'affichage</h3>
  <span class="ligne2">
  <?php require_once '../gestionnaire\espace_gestionnaire\index_gestionnaire\calculs\tris\Tri_par_nom.php'; ?>
  <?php require_once '../gestionnaire\espace_gestionnaire\index_gestionnaire\calculs/tris/Tri_par_salle.php'; ?>
  <?php require_once '../gestionnaire\espace_gestionnaire\index_gestionnaire\calculs/tris/Tri_par_jour_de_seance.php'; ?>
  </span>

    <style>
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
    body {
        font-family: Calibri, serif;
        display: grid;
        grid-template-columns: 10% 90%;
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
        justify-content: center;
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
    </style>

<?php
if(isset($_POST['deconnexion'])){
  session_destroy();
};
?>


<?php } else { ?>
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
}
</style>
<?php }; ?>
