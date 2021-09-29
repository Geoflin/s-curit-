<HTML>
 <HEAD>
  <TITLE>espace_gestionnaire.php</TITLE>
  <link rel="stylesheet" href="style.css" />
 </HEAD>


<!--Liste des séance-->

<!--Liste des séance-->
<input type="button" onclick='window.location.reload(false)' value="Actualiser la page"/>
<h2>Liste des séance</h2>
  <?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');?>
    <table>
    <thead>
    <td>Sélectionner</td><td>Nom du film</td><td>Jour de séance</td><td>Heure de début</td><td>Heure de fin</td><td>Salle</td><td>Nombre de place</td>
</thead>
<tr>
   <form name="ajoutseance" method="post" action="traitement_gestionnaire.php" target="_blank">
   <td><button type="submit">Créer nouvelle séance</button></td><td><input type="text" required="required" name="FilmName" id="FilmName" placeholder="Saisissez nom du film"></td><td><input type="date" required="required" name="DateOfNewSeance" id="DateOfNewSeance" placeholder="Saisissez Date de séance"></td><td><input type="time" required="required" name="HourBegin" id="HourBegin" placeholder="Choisissez heure de début"></td><td><input type="time" required="required" name="HourEnd" id="HourEnd" placeholder="Choisissez heure de fin"></td>
    <td><select name="SalleName" required="required" id="SalleName">
    <?php
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                foreach ($pdo->query('SELECT SalleName FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
                    <option id="Salle"> <?php echo $seance['SalleName'].'<br>'; ?></option> <?php
                 }
            } catch (PDOException $e) {
                echo 'Récupération Salle impossible';
            }
            ?>
    </select></td>
    <td><input type="number" required="required" name="Nombre_de_place" id="Nombre_de_place" placeholder="Saisissez Nombre de place"></td>
        </form>
    </tr>

    <!-- supprimer_ligne -->

    <?php
foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
        ?>
   <tr id="openModifierseance1"><td><form name="modifierseance" method="post" action="traitement_supprimer_seance.php" target="_blank"><input type="checkbox" name="Id[]" value=" <?php echo $seance['Id']; ?> "><button type="submit">Supprimer la ligne</button><button name="openModifierseance" id="openModifierseance" class="action_button">modifier la ligne</button></td> <?php echo '<td>'.$seance['FilmName'].'</td>'.'<td>'.$seance['DateOfNewSeance'].'</td>'.'<td>'.$seance['HourBegin'].'</td>'.'<td>'.$seance['HourEnd'].'</td>'.'<td>'.$seance['SalleName'].'</td>'.'<td>'.$seance['Nombre_de_place'].'</td>';?>
   <tr id="closeModifierseance1"><td><form name="modifierseance" method="post" action="traitement_supprimer_seance.php" target="_blank"><input type="checkbox" name="Id[]" value=" <?php echo $seance['Id']; ?> "><button type="submit">Supprimer la ligne</button><button name="closeModifierseance" id="closeModifierseance" class="action_button">modifier la ligne</button></td> <td><input type="text" required="required" name="FilmName" id="" placeholder= <?php echo $seance['FilmName'];?>> </td> <?php echo '<td>'.$seance['DateOfNewSeance'].'</td>'.'<td>'.$seance['HourBegin'].'</td>'.'<td>'.$seance['HourEnd'].'</td>'.'<td>'.$seance['SalleName'].'</td>'.'<td>'.$seance['Nombre_de_place'].'</td>';?></tr>
   <?php }
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste';
}?>
<button type="reset">Réinitialiser la séléction</button>
<button type="submit">Supprimer la séléction</button>
</form>





</body>
<style>
/**
    Attention, ce CSS est là uniquement pour rendre le formulaire "agréable" à la lecture sans que vous n'ayez
    à récupérer deux fichiers distincts.
    Dans un cas d'usage "réel", ces éléments doivent être externalisés
     */

    #closeModifierseance{
    display: none;
}
    body {
        font-family: Calibri, serif;
    }

    form label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }

    label.inline-label {
        display: inline-block;
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
        display: inline-block;
        margin-bottom: 10px;
        padding: 10px;
        width: 80%;
    }

    form input[type="radio"],
    form input[type="checkbox"],
    form input[type="submit"] {
        width: auto;
    }

    button[type=submit], button[type=reset] {
        padding: 10px;
        margin-top: 15px;
    }
</style>
<script src="script.js"></script>