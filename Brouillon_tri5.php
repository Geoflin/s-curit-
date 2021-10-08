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
        <tr class="thead">
            <!-- Form  triNomFilm-->
        <td>Modifier</td>
        <td>Nom du film</td>
        <td>Jour de séance</td>
        <td>Heure de début</td>
        <td>Heure de fin</td>
        <td>Salle</td>
</tr>
    </form>
        <!-- Form  ajoutseance-->
    <form method="post" action="">
       <tr>
    <td><button name="ajoutseance" type="submit">Créer nouvelle séance</button></td>
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
    <td></td>
        <td>
          <select name="SalleName" required="required" id="SalleName">
        <?php
                    $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                    foreach ($pdo->query('SELECT SalleName FROM infos_cinema1', PDO::FETCH_ASSOC) as $infos) { ?>
                        <option id="Salle"> <?php echo $infos['SalleName'].'<br>'; ?></option> 
                        <?php } ?>
        </select>
      </td>
            </form>

        <!-- Boucle Corps du tableau-->
        </tr>
        <?php
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
      $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
      $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']);
            ?>
        <!-- Form  modifierseance-->
        <form class="modifierSeance" method="post" action="">
          <tr class=<?php echo $seance['FilmName']?> <?php echo $seance['FilmName']?>>
        <td id="Colonne1"> <input type="checkbox" name="Id" id="Id" required="required" value="<?php echo $seance['Id'];?>"><button name="modifierseance"id="modifier" class="submit">Modifier les séances</button></td>
        <td class=<?php echo $seance['FilmName']?>> <?php echo $seance['FilmName'];?></br>
          <select name="FilmName" required="required">
                    <?php foreach ($pdo->query('SELECT FilmName FROM info_film', PDO::FETCH_ASSOC) as $film) { ?>
                        <option id="FilmName"> <?php echo $film['FilmName'].'<br>'; ?></option>
                    <?php } ?>
        </select>
          </td> 
        <td id="Colonne3"><?php echo $dateSeanceBegin->format('Y-m-d');?><br/><input type="date"  name="DateSeanceBegin"  id="Modifier_DateSeanceBegin" classe="modifier" value="<?php echo $dateSeanceBegin->format('Y-m-d');?>"></td>
        <td id="Colonne4"><?php echo $dateSeanceBegin->format('H:i');?><br/><input type="time" name="HourBegin" id="Modifier_HourBegin" classe="modifier" value="<?php echo $dateSeanceBegin->format('H:i');?>"></td>
        <td id="Colonne5"><?php echo $DateSeanceEnd->format('H:i');?></td>
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
        </tr>
        </form>
        
        <?php } ?>
    </table>
                              <!-- Traitement modifierseance-->
                              <?php if (isset($_POST['modifierseance'])){
                                $fusionDateBegin_AjouterSeance= $_POST['DateSeanceBegin'].' '.$_POST['HourBegin'];
                              require_once 'Modifier_seance1.php';
                              }?>
                                      <?php if (isset($_POST['ajoutseance'])){
          foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) {};
          require_once 'traitement_gestionnaire10.php';
                                        }?>
        <!-- Table  suprimmerSeance-->
    <table class="table2">
    <section class="ligne3">
    <form method="post">
        <button  type="reset">Réinitialiser la séléction</button>
        <button  type="submit" name="supprimerseance">Supprimer la séléction</button>
    </section>
    <tr class="thead">
    <td>Supprimer</td>
                                      </tr>
    <td></td>
    <?php
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
            ?>
        <tr class=<?php echo $seance['FilmName']?>><td><input type="checkbox" name="Id[]" id="Id" value=" <?php echo $seance['Id']; ?> "></td></tr>   
    <?php } ?>
    </form>
    </table>

  <!--Function Tri-->
  <h3 class="ligne1"><br/></br>Tri de l'affichage</h3>
  <span class="ligne2">
  <?php require_once 'Tri_par_nom.php'; ?>
  <?php require_once 'Tri_par_salle.php'; ?>
    </body>
    
    <style>
    body {
        font-family: Calibri, serif;
        display: grid;
        grid-template-columns: 10% 90%;
        grid-template-rows: 100px 100px 70px 1fr;
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
        justify-content: space-around;
        align-items: center;
        margin-left:300px;
        margin-right:300px;
    }
    .type_of_tri{
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-direction: row;
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
    .thead{
        background-color: rgb(192, 189, 189);
        font-weight: bold;
    }

    </style>

    <script src="script.js"></script>

                              <!-- Traitement supprimerSeance-->
                              <?php if (isset($_POST['supprimerseance'])){
                              require_once 'traitement_supprimer_seance.php';
                            }?>