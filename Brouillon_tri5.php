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

        <table class="ligne4">
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
        <?php foreach ($pdo->query('SELECT SalleName FROM infos_cinema1', PDO::FETCH_ASSOC) as $Salle) { ?>
  <?php } ?>
        <?php
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
      $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
      $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']);
            ?>
        <!-- Form  modifierseance-->
        <form class="modifierSeance" method="post" action="">
        <tr class=<?php echo $seance['FilmName']?>>
        <td id="Colonne1"> <input type="checkbox" name="Id" id="Id" required="required" value="<?php echo $seance['Id'];?>"><button name="modifierseance"id="modifier" class="submit">Modifier séance</button></td>
        <td> <?php echo $seance['FilmName'];?></br>
          <select name="FilmName" required="required">
                    <?php foreach ($pdo->query('SELECT FilmName FROM info_film', PDO::FETCH_ASSOC) as $film) { ?>
                        <option id="FilmName" value=<?php echo $film['FilmName']; ?>><?php echo $film['FilmName'].'<br>'; ?></option>
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
                    $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                    foreach ($pdo->query('SELECT SalleName FROM infos_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
                        <option id="Salle"> <?php echo $seance['SalleName'].'<br>'; ?></option> <?php
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
  <?php require_once 'Tri_par_jour_de_seance.php'; ?>
  </span>

  <!--Infos des Films-->
    <h3 class="ligne5">Infos des Films</h3>

    <table class="ligne6">
                <!--Head-->
    <tr class="thead">
        <td>Ajouter</td>
        <td>Nom du film</td>
        <td>Duree</td>
</tr>
<!--form creation_infos_film-->
<form method="post" action="">
       <tr>
    <td><button name="ajoutInfo_film" type="submit">Créer Infos_film</button></td>
    <td><input type="text" required="required" name="FilmName" placeholder="Saisissez Nom du film"></td>
    <td><input type="time" name="Duree"></td>
</form>
<!--Traitement form creation_infos_film-->
<?php if (isset($_POST['ajoutInfo_film'])){
                              require_once 'creation_infos_film.php';
                            }?>
<!--form Modifier Infos_film-->

    <?php foreach ($pdo->query('SELECT * FROM info_film', PDO::FETCH_ASSOC) as $info_film) { 
      $dateSeanceBegin = new DateTime($info_film['Duree']);
      ?>
      <form method="post" action="">
        <tr class=<?php echo $info_film['FilmName']?>>
        <td><input type="checkbox" name="Id" id="Id" value=" <?php echo $info_film['Id']; ?> "><button name="Modifier_Infos_film" type="submit">Mofidier <?php echo $info_film['FilmName']?></button></td>

        <td> <?php echo $info_film['FilmName'];?></br>
        <input type="text" name="FilmName" placeholder=<?php echo $info_film['FilmName'];?>>
        </td> 

        <td><?php echo $dateSeanceBegin->format('H:i:s');?><br/><input type="time" name="Duree" value="<?php echo $dateSeanceBegin->format('H:i');?>"></td>

      </tr>
    <?php } ?>
    
    </form>
    </table>

    <!-- Traitement modifier_info_film-->
    <?php if (isset($_POST['Modifier_Infos_film'])){
                              require_once 'Modifier_info_film.php';
                              }?>

            <!-- Table  supprimer_info_film-->       
    <section class="ligne5">
    <form method="post" class="ligne5">
        <button class="ligne5"  type="reset">Réinitialiser la séléction</button>
        <button class="ligne5"  type="submit" name="supprimer_info_film">Supprimer la séléction</button>
    </section>

    <table class="table4">
    <tr class="thead">
    <td>Supprimer</td>
    </tr>
    <td></td>
    <?php
    foreach ($pdo->query('SELECT * FROM info_film', PDO::FETCH_ASSOC) as $info_film) { 
            ?>
        <tr class=<?php echo $info_film['FilmName']?>><td><input type="checkbox" name="Id[]" id="Id" value=" <?php echo $info_film['Id']; ?> "></td></tr>   
    <?php } ?>
    </form>
    </table>

  <!--Infos du cinema-->
    <h3 class="ligne7">Infos du cinema</h3>
    <table class="ligne8">

                <!--Head-->
    <tr class="thead ">
        <td>Ajouter</td>
        <td>Nom de la salle</td>
        <td>Nombre de place</td>
</tr>
<!--form creation_infos_cinema-->
<form method="post" action="">
<tr>
    <td><button  name="creation_infos_cinema" type="submit">Créer infos cinema</button></td>
    <td><input   type="text" required="required" name="SalleName" placeholder="Nom de Salle"></td>
    <td><input  type="number" name="Nombre_de_place" placeholder="Nombre de place"></td>
</form>
<!--Traitement form modifier_infos_cinema1-->
<?php if (isset($_POST['creation_infos_cinema'])){
                              require_once 'creation_infos_cinema.php';
                            }?>
<!--form modifier_infos_cinema1-->

    <?php foreach ($pdo->query('SELECT * FROM infos_cinema1', PDO::FETCH_ASSOC) as $modifier_infos_cinema1) { 
      ?>
      <form method="post" action="">
        <tr class=<?php echo $modifier_infos_cinema1['SalleName']?>>
        <td><input type="checkbox" name="Id" id="Id" value=" <?php echo $modifier_infos_cinema1['Id']; ?> "><button name="modifier_infos_cinema1" type="submit">Mofidier <?php echo $modifier_infos_cinema1['SalleName']?></button></td>

        <td> <?php echo $modifier_infos_cinema1['SalleName'];?></br>
        <input type="text" name="SalleName" placeholder=<?php echo $modifier_infos_cinema1['SalleName'];?>>
        </td> 

        <td> <?php echo $modifier_infos_cinema1['Nombre_de_place'];?></br>
        <input type="number" name="Nombre_de_place" placeholder=<?php echo $modifier_infos_cinema1['Nombre_de_place'];?>>
        </td> 

      </tr>
    <?php } ?>
    
    </form>
    </table>

    <!-- Traitement modifier_infos_cinema1-->
    <?php if (isset($_POST['modifier_infos_cinema1'])){
                              require_once 'modifier_infos_cinema1.php';
                              }?>

            <!-- Table  supprimer_infos_cinema1-->       
    <section class="ligne7">
    <form method="post" class="ligne7">
        <button class="ligne7"  type="reset">Réinitialiser la séléction</button>
        <button class="ligne7"  type="submit" name="supprimer_info_cinema">Supprimer la séléction</button>
    </section>

    <table class="table6 ">
    <tr class="thead ">
    <td class="">Supprimer</td>
                                      </tr>
    <td class=""></td>
    <?php
    foreach ($pdo->query('SELECT * FROM infos_cinema1', PDO::FETCH_ASSOC) as $infos_cinema1) { 
            ?>
        <tr class=<?php echo $infos_cinema1['SalleName']?>><td><input type="checkbox" name="Id[]" id="Id" value=" <?php echo $infos_cinema1['Id']; ?> "></td></tr>   
    <?php } ?>
    </form>
    </table>

    </body>

    <style>

    body {
        font-family: Calibri, serif;
        display: grid;
        grid-template-columns: 10% 90%;
        grid-template-rows: 100px 100px 70px 1fr;
        row-gap: 10px;
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
    .ligne3{
        grid-row: 3/3;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 0px;
    }
    /*tableau1*/
    .ligne4{
      grid-row: 4/4;
      grid-column: 2/2;
    }
    .table2{
      grid-row: 4/4;
      grid-column: 1/1;
    }
      .ligne5{
      grid-row: 5/5;
      display: flex;
      justify-content: ;
      align-items: flex-end;
    }
    /*tableau2*/
      .ligne6{
      grid-row: 6/6;
      grid-column: 2/2;
    }
    .table4{
      grid-column: 1/1;
      grid-row: 6/6;
    }
    .ligne7{
      grid-row: 7/7;
      display: flex;
      justify-content: ;
      align-items: flex-end;
    }
    /*tableau3*/
    .ligne8{
      grid-column: 2/2;
      grid-row: 8/8;
    }
    .table6{
      grid-column: 1/1;
      grid-row: 8/8;
    }
    .type_of_tri{
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-direction: row;
    }
    </style>

    <script src="script.js"></script>

                              <!-- Traitement supprimerSeance-->
                              <?php if (isset($_POST['supprimerseance'])){
                              require_once 'traitement_supprimer_seance.php';
                            }?>
                            <?php if (isset($_POST['supprimer_info_film'])){
                              require_once 'supprimer_infos_film.php';
                            }?> 
                            <?php if (isset($_POST['supprimer_info_cinema'])){
                              require_once 'supprimer_info_cinema.php';
                            }?> 