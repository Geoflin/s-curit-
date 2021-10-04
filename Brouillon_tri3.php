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
        <td>Nombre de place</td>
        </thead>
    <tr>
    </form>
        <!-- Form  ajoutseance-->
    <form method="post" action="">
    <td><input type="checkbox" name="NoRepeat" id="NoRepeat" required="required" value="NoRepeat"><button name="ajoutseance" type="submit">Créer nouvelle séance</button></td>
    <td><input type="text" required="required" name="FilmName" id="FilmName" placeholder="Saisissez nom du film"></td>
    <td><input type="date" required="required" name="DateSeanceBegin" id="DateSeanceBegin" placeholder="Saisissez Date de séance"></td>
    <td><input type="time" required="required" name="HourBegin" id="HourBegin" placeholder="Choisissez heure de début"></td>
    <td><input type="time" required="required" name="HourEnd" id="HourEnd" placeholder="Choisissez heure de fin"></td>
        <td><select name="SalleName" required="required" id="SalleName">
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
        <td><input type="number" required="required" name="Nombre_de_place" id="Nombre_de_place" placeholder="Saisissez Nombre de place"></td>
            </form>

        <!-- Corps du tableau-->
        </tr>
        <?php if (isset($_POST['ajoutseance'])){
                              require_once 'fusion_dateTime.php';
                              require_once 'conversion_dateTime_&&_Unix2.php';
                              }?>
        <?php
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
            ?>
        <!-- Form  modifierseance-->
        
        <form method="post" action="">
        <td id="Colonne1"><input type="checkbox" name="Id[]" id="Id" required="required" value=" <?php echo $seance['Id']; ?> "><button name="modifierseance"id="modifier" class="submit">Modifier les séances</button></td>
        <td id="Colonne2"><?php echo $seance['FilmName'];?><div id="div"><input type="text" name="FilmName" id="FilmName" classe="modifier" placeholder="<?php echo $seance['FilmName'];?>" value="<?php echo $seance['FilmName'];?>"></div></td> 
        <td id="Colonne3"><?php echo $variable;?><div id="div"><input type="timestamp"  name="DateSeanceBegin"  id="DateSeanceBegin" classe="modifier" placeholder="<?php echo $variable;?>" value="<?php echo $variable;?>"></div></td>
        <td id="Colonne4"><?php echo $seance['HourBegin'];?></br><div id="div"><input type="time" name="HourBegin" id="HourBegin" classe="modifier" placeholder="<?php echo $seance['HourBegin'];?>" value="<?php echo $seance['HourBegin'];?>"></div></td>
        <td id="Colonne5"><?php echo $seance['HourEnd'];?></br><div id="div"><input type="time"  name="HourEnd" id="HourEnd" classe="modifier" placeholder="<?php echo $seance['HourEnd'];?>" value="<?php echo $seance['HourEnd'];?>"></div></td>
        <td id="Colonne6"><?php echo $seance['SalleName'];?><div id="div"><input type="SalleName"  name="SalleName" id="SalleName" classe="modifier" placeholder="<?php echo $seance['SalleName'];?>" value="<?php echo $seance['SalleName'];?>"></div></td>
        <td id="Colonne7"><?php echo $seance['Nombre_de_place'];?></br><div id="div"><input type="number" name="Nombre_de_place" id="Nombre_de_place" classe="modifier" placeholder="<?php echo $seance['Nombre_de_place'];?>" value="<?php echo $seance['Nombre_de_place'];?>"></div></td>
        </form>
    </tr>
    <?php } ?>
    </table>
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

                              <?php if (isset($_POST['ajoutseance'])){
                              require_once 'traitement_gestionnaire4.php';
                              }?>
                              <!-- Traitement modifierseance-->
                              <?php if (isset($_POST['modifierseance'])){
                              require_once 'Brouillon16.php';
                              }?>
                              <!-- Traitement supprimerSeance-->
                              <?php if (isset($_POST['supprimerseance'])){
                              require_once 'traitement_supprimer_seance.php';
                            }?>