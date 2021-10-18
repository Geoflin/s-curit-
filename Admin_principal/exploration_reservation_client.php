<html lang="fr">
<head>
<TITLE>Kinepolise/connexion_gestionnaire</TITLE>
</head>
<body>

<style>
        a, h2{
      color:rgb(155, 89, 182);
      text-align: center;
      text-decoration: underline;
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
    .ligne4, .table2, .ligne6, .table4, .ligne8, .table6{
        border-collapse: collapse;
        width: 100%;
        height: 300px;
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
    .ligne3{
      grid-row: 4/4;
      display: flex;
      justify-content: flex-start;
      align-items: flex-end;
      margin-bottom: 0px;
    }
    .title1{
      grid-column: 1/3;
      grid-row: 4/4;
      text-align: center;
      text-decoration: underline;
      color:rgb(155, 89, 182);
      display: flex;
      align-items:flex-end;
      justify-content: ;
      padding: 0px;
      margin: 0px;
    }
    /*tableau1*/
    .ligne4{
      grid-row: 5/5;
      grid-column: 2/2;
    }
    .table2{
      grid-row: 5/5;
      grid-column: 1/1;
    }
      .ligne5{
      grid-row: 6/6;
      display: flex;
      justify-content: ;
      align-items: flex-end;
      margin-bottom:0px;
    }
    /*tableau2*/
      .ligne6{
      grid-row: 7/7;
      grid-column: 2/2;
    }
    .table4{
      grid-row: 7/7;
      grid-column: 1/1;
    }
    .ligne7{
      grid-row: 8/8;
      display: flex;
      justify-content: ;
      align-items: flex-end;
      margin-bottom:0px;
    }
    /*tableau3*/
    .ligne8{
      grid-row: 9/9;
      grid-column: 2/2;
    }
    .table6{
      grid-row: 9/9;
      grid-column: 1/1;
    }
    .type_of_tri{
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-direction: row;
    }
    </style>

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
    <!--Actualiser la page-->
    <h2 class="ligne3">Liste des réservations</h2>
    <!--Tableaux-->
    <!-- Thead-->
    <?php
        $pdo_kinepolise_client = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');?>

        <table class="ligne4">
        <tr class="thead">
            <!-- Form  triNomFilm-->
        <td>Nom d'utilisateur</td>
        <td>Mot de passe</td>
        <td>Nom du film</td>
        <td>Heure de début</td>
        <td>Heure de fin</td>
        <td>Salle</td>
</tr>
    </form>

        <!-- Boucle Corps du tableau-->
        <?php
        $pdo_kinepolise_client= new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
    foreach ($pdo_kinepolise_client->query('SELECT * FROM reservation_client', PDO::FETCH_ASSOC) as $seance) { 
      $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
      $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']);
            ?>
        <!-- Form  modifierseance-->
        <form class="modifierSeance" method="post" action="">

        <tr class=<?php echo $seance['FilmName']?>>

        <td><?php echo $seance['username'];?></td>
        <td><?php echo $seance['FilmName'];?></td> 
        <td id="Colonne3"><?php echo $dateSeanceBegin->format('Y-m-d');?><br/></td>
        <td id="Colonne4"><?php echo $dateSeanceBegin->format('H:i');?><br/></td>
        <td id="Colonne5"><?php echo $DateSeanceEnd->format('H:i');?></td>
        <td id="Colonne6"><?php echo $seance['SalleName'];?></br></td>

        </tr>

        </form>
        
        <?php }; ?>
    </table>


    </body>


    

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
