<HTML>
 <HEAD>
  <TITLE>Brouillon5.php</TITLE>
  <link rel="stylesheet" href="style.css" />
 </HEAD>
<body>
<!--Actualiser la page-->
<input type="button" onclick='window.location.reload(false)' value="Actualiser la page"/>
<h2>Liste des séance</h2>
<!--Tableaux-->
<!-- Thead-->
  <?php
    $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');?>
    <table>
    <thead>
    <td>Modifier</td>
    <td>Nom du film</td>
    <td>Jour de séance</td>
    <td>Heure de début</td>
    <td>Heure de fin</td>
    <td>Salle</td>
    <td>Nombre de place</td>
</thead>
<tr>
    <!-- Form  ajoutseance-->
   <form name="ajoutseance" method="post" action="traitement_gestionnaire.php" target="_blank">
   <td><button type="submit">Créer nouvelle séance</button></td>
   <td><input type="text" required="required" name="FilmName" id="FilmName" placeholder="Saisissez nom du film"></td>
   <td><input type="date" required="required" name="DateOfNewSeance" id="DateOfNewSeance" placeholder="Saisissez Date de séance"></td>
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
    <!-- Form  supprimerseance-->
    <?php
foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
        ?>
       <!-- Form  modifierseance-->
       
       <form name="modifierseance" method="post" action="Brouillon16.php" target="_blank">
       <td><input type="checkbox" name="Id[]" id="Id" required="required" value=" <?php echo $seance['Id']; ?> "><button name="modifier" id="modifier" class="submit">Modifier les séances</button></td>
       <td><?php echo $seance['FilmName'];?></br><div id="div"><input type="text" name="FilmName" id="FilmName" classe="modifier" placeholder="<?php echo $seance['FilmName'];?>" value="<?php echo $seance['FilmName'];?>"></div></td>
       <td><?php echo $seance['DateOfNewSeance'];?><div id="div"><input type="date"  name="DateOfNewSeance"  id="DateOfNewSeance" classe="modifier" placeholder="<?php echo $seance['DateOfNewSeance'];?>" value="<?php echo $seance['DateOfNewSeance'];?>"></div></td>
       <td><?php echo $seance['HourBegin'];?></br><div id="div"><input type="time" name="HourBegin" id="HourBegin" classe="modifier" placeholder="<?php echo $seance['HourBegin'];?>" value="<?php echo $seance['HourBegin'];?>"></div></td>
       <td><?php echo $seance['HourEnd'];?></br><div id="div"><input type="time"  name="HourEnd" id="HourEnd" classe="modifier" placeholder="<?php echo $seance['HourEnd'];?>" value="<?php echo $seance['HourEnd'];?>"></div></td>
       <td><?php echo $seance['SalleName'];?><div id="div"><input type="SalleName"  name="SalleName" id="SalleName" classe="modifier" placeholder="<?php echo $seance['SalleName'];?>" value="<?php echo $seance['SalleName'];?>"></div></td>
       <td><?php echo $seance['Nombre_de_place'];?></br><div id="div"><input type="number" name="Nombre_de_place" id="Nombre_de_place" classe="modifier" placeholder="<?php echo $seance['Nombre_de_place'];?>" value="<?php echo $seance['Nombre_de_place'];?>"></div></td>
       </form>
       
</tr>
   <?php } ?>
   </table>
    <!-- Table  suprimmerSeance-->
   <table>
   <form name="supprimerseance" method="post" action="traitement_supprimer_seance.php" target="_blank">
    <button type="reset">Réinitialiser la séléction</button>
       <button type="submit">Supprimer la séléction</button>
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
</body>
<style>
/**
    Attention, ce CSS est là uniquement pour rendre le formulaire "agréable" à la lecture sans que vous n'ayez
    à récupérer deux fichiers distincts.
    Dans un cas d'usage "réel", ces éléments doivent être externalisés
     */
    body {
        font-family: Calibri, serif;
    }

    form label {
        font-weight: bold;
        margin-bottom: 10px;
    }

    fieldset {
        border: 1px solid lightgray;
        background-color: rgba(225, 233, 255, 0.25);
    }

    legend {
        font-style: italic;
        font-size: 1.1em;
        padding: 5px;
    }

    form input, form select, form textarea {
        margin-bottom: 10px;
        padding: 10px;
        width: 80%;
    }

    form input[type="radio"],
    form input[type="checkbox"],
    form input[type="submit"] {
        width: auto;
    }

    button[type=submit], button[type=reset], button {
        padding: 10px;
        margin-top: 15px;
    }
</style>

<script src="script.js"></script>