
<!-- ajout_seance -->

<fieldset id="ajoutseance">
<form name="ajoutseance" method="post" action="traitement_gestionnaire.php" target="_blank">

<table>
    <thead>
    <td><label for="FilmName">Nom du film</label></td><td><label for="DateOfNewSeance">Date séance</label></td><td><label for="HourBegin">heure de début</label></td><td><label for="HourEnd">heure de fin</label></td><td><label for="SalleName">Choisissez votre Salle</label></td><td><label for="Nombre_de_place">nombre de place</label></td>
</thead>
    
    <tr>
    <td><input type="text" required="required" name="FilmName" id="FilmName" placeholder="Saisissez nom du film"></td><td><input type="date" required="required" name="DateOfNewSeance" id="DateOfNewSeance" placeholder="Saisissez Date de séance"></td><td><input type="time" required="required" name="HourBegin" id="HourBegin" placeholder="Choisissez heure de début"></td><td><input type="time" required="required" name="HourEnd" id="HourEnd" placeholder="Choisissez heure de fin"></td>
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
    </tr>
</table>
    
</form>

</fieldset>
<style>
/**
    Attention, ce CSS est là uniquement pour rendre le formulaire "agréable" à la lecture sans que vous n'ayez
    à récupérer deux fichiers distincts.
    Dans un cas d'usage "réel", ces éléments doivent être externalisés
     */
    body {
        font-family: Calibri, serif;
    }

    form {
        max-width: 50%;
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

