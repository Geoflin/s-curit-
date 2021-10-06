<HTML>
    <HEAD>
    <TITLE>Brouillon5.php</TITLE>
    </HEAD>
    <body>
    <!--Actualiser la page-->
    <form class="ligne3"><input type="button" onclick='window.location.reload(false)' value="Actualiser la page"/></form>
    <h2 class="ligne1">Liste des séance</h2>
    <!--Tableaux-->
    <!-- Thead-->
    <?php
        $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');?>

        <table class="table1">
        <thead>
            <!-- Form  triNomFilm-->
            <form method="post" action="">
            <input type="checkbox" required="required" value="tri"></br>
        <button name="triNomFilm" type="submit">trier</button>
        <td>Modifier</td>
        <td>Nom du film</td>
        <td>Jour de séance</td>
        <td>Heure de début</td>
        <td>Heure de fin</td>
        <td>Salle</td>
        </thead>
    <tr>
    </form>
        <!-- Form  ajoutseance-->
    <form method="post" action="">
    <td><input type="checkbox" name="NoRepeat" required="required" value="NoRepeat"><button name="ajoutseance" type="submit">Créer nouvelle séance</button></td>
    <td>
    <select name="FilmName" required="required">
        <?php
                    foreach ($pdo->query('SELECT FilmName FROM info_film', PDO::FETCH_ASSOC) as $film) { ?>
                        <option id="FilmName"> <?php echo $film['FilmName'].'<br>'; ?></option>
                    <?php } ?>
        </select>
    </td>
    <td><input type="date" required="required" name="DateSeanceBegin" id="DateSeanceBegin" placeholder="Saisissez Date de séance"></td>
    <td><input type="time" required="required" name="HourBegin" id="HourBegin" placeholder="Choisissez heure de début"></td>
    <td><input type="time" required="required" name="HourEnd" id="HourEnd" placeholder="Choisissez heure de fin"></td>
        <td>
          <select name="SalleName" required="required" id="SalleName">
        <?php
                    $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                    foreach ($pdo->query('SELECT SalleName FROM infos_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
                        <option id="Salle"> <?php echo $seance['SalleName'].'<br>'; ?></option> 
                        <?php } ?>
        </select>
      </td>
            </form>

        <!-- Corps du tableau-->
        </tr>
        <?php if (isset($_POST['ajoutseance'])){
//Post
$fusionDateBegin_AjouterSeance= $_POST['DateSeanceBegin'].' '.$_POST['HourBegin'];
$fusionDateEnd_AjouterSeance= $_POST['DateSeanceBegin'].' '.$_POST['HourEnd'];

require_once 'traitement_gestionnaire8.php';
                              }?>
        <?php
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
      $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
              $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']);
            ?>
        <!-- Form  modifierseance-->
        <form method="post" action="">
        <td id="Colonne1" value="<?php echo $seance['Id']; ?>"> <input type="checkbox" name="Id[]" id="Id" required="required" value=" <?php echo $seance['Id']; ?> "><button name="modifierseance"id="modifier" class="submit">Modifier les séances</button></td>
        <td id="Colonne2">
          <?php echo $seance['FilmName'];?></br>
          <select name="FilmName" required="required">
                    <?php foreach ($pdo->query('SELECT FilmName FROM info_film', PDO::FETCH_ASSOC) as $film) { ?>
                        <option id="FilmName"> <?php echo $film['FilmName'].'<br>'; ?></option>
                    <?php } ?>
        </select>
          </td> 
        <td id="Colonne3"><?php echo $dateSeanceBegin->format('Y-m-d');?><br/><input type="date"  name="DateSeanceBegin"  id="Modifier_DateSeanceBegin" classe="modifier" value="<?php echo $dateSeanceBegin->format('Y-m-d');?>"></td>
        <td id="Colonne4"><?php echo $dateSeanceBegin->format('H:i');?><br/><input type="time" name="HourBegin" id="Modifier_HourBegin" classe="modifier" value="<?php echo $dateSeanceBegin->format('H:i');?>"></td>
        <td id="Colonne5"><?php echo $DateSeanceEnd->format('H:i');?><div id="div"><input type="time"  name="HourEnd" id="Modifier_HourEnd" classe="modifier" value="<?php echo $DateSeanceEnd->format('H:i');?>"></div></td>
        <td id="Colonne6">
          <?php echo $seance['SalleName'];?></br>
          <select name="SalleName" required="required" id="SalleName">
        <?php
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                    foreach ($pdo->query('SELECT SalleName FROM infos_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
                        <option id="Salle"> <?php echo $seance['SalleName'].'<br>'; ?></option> <?php
                    }
                } catch (PDOException $e) {
                    echo 'Récupération Salle impossible';
                }
                ?>
        </select></td>
        </form>
        </tr>
        <?php } ?>
    </table>
                              <!-- Traitement modifierseance-->
                              <?php if (isset($_POST['modifierseance'])){
                                $fusionDateBegin_AjouterSeance= $_POST['DateSeanceBegin'].' '.$_POST['HourBegin'];
                                $fusionDateEnd_AjouterSeance= $_POST['DateSeanceBegin'].' '.$_POST['HourEnd'];
                              require_once 'Modifier_seance1.php';
                              }?>
        <!-- Table  suprimmerSeance-->
    <table class="table2">
    <section class="ligne3">
    <form method="post">
        <button  type="reset">Réinitialiser la séléction</button>
        <button  type="submit" name="supprimerseance">Supprimer la séléction</button>
    </section>
    <thead>
    <td>Supprimer</td>
    </thead>
    <td></td>
    <?php
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
            ?>
        <tr><td><input type="checkbox" name="Id[]" id="Id" value=" <?php echo $seance['Id']; ?> "></td></tr>   
    <?php } ?>
    </form>
    </table>

<!--Barre de recherche-->
     <form class="ligne2" method="POST" action=""> 
     <div>Rechercher une séance : <input type="text" name="recherche"><input type="SUBMIT" value="Search!"><div> 
     </form>

     <span class="ligne2">
     <?php
    $db_server = 'localhost'; // Adresse du serveur MySQL
    $db_name = 'kinepolise';            // Nom de la base de données
    $db_user_login = 'root';  // Nom de l'utilisateur
    $db_user_pass = '';       // Mot de passe de l'utilisateur
    // Ouvre une connexion au serveur MySQL
    $conn = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);
     // Récupère la recherche
     $recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';
     // la requete mysql
     $q = $conn->query(
     "SELECT FilmName FROM seance_cinema1
      WHERE FilmName LIKE '%$recherche%'");
     // affichage du résultat
     while( $r = mysqli_fetch_array($q)){
     echo $r['FilmName'].'<br/>';
     }
    ?>
    </span>

    </body>
    
    <style>
    body {
        font-family: Calibri, serif;
        display: grid;
        grid-template-columns: 10% 90%;
        grid-template-rows: 100px 25px 70px 1fr;
    }
    .table1, .table2{
        border-collapse: collapse;
        width: 100%;
        height: 300px;
    }
    .ligne1{
        grid-column: 1/3;
        grid-row: 1/1;
        display: flex;
        justify-content: space-around;
    }
    .ligne2{
        grid-column: 1/3;
        grid-row: 2/2;
        display: flex;
        justify-content: center;
    }
    .ligne3{
        grid-row: 3/3;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 0px;
    }
    .table1{
        grid-column: 2/2;
        grid-row: 4/4;
    }
    .table2{
        grid-column: 1/1;
        grid-row: 4/4;
    }
    table td{
        border: 1px solid black;
        padding: 1rem;
        text-align: center;
        max-width: 100px;
        min-width: 100px;
        word-wrap: break-word;
        height: 100px;
    }
    thead td{
        background-color: rgb(192, 189, 189);
        font-weight: bold;
    }

    </style>

    <script src="script.js"></script>

                              <!-- Traitement supprimerSeance-->
                              <?php if (isset($_POST['supprimerseance'])){
                              require_once 'traitement_supprimer_seance.php';
                            }?>