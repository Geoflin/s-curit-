<html lang="fr">
<head>
<TITLE>Kinepolise/reservation</TITLE>
</head>
<body>
<button name="accueil"><a href="index.php">retour à l'accueil</a></button>
<form method="post" action="traitement_client.php">

    <label for="name">Votre nom</label>
    <input type="text" required="required" name="lastname" id="lastname" placeholder="Saisissez votre nom">

    <label for="name">Votre prénom</label>
    <input type="text" required="required" name="firstname" id="firstname" placeholder="Saisissez votre prénom">

    <label for="film">Choisissez votre film</label>
    <select name="film" required="required" id="film" multiple>
    <?php
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                foreach ($pdo->query('SELECT FilmName FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
                    <option id="film"> <?php echo $seance['FilmName'].'<br>'; ?></option> <?php
                 }
            } catch (PDOException $e) {
                echo 'Récupération film impossible';
            }
            ?>
    </select>

    <label for="Salle">Choisissez votre Salle</label>
    <select name="Salle" required="required" id="Salle" multiple>
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
    </select>

    <label for="Date">Choisissez votre Date</label>
    <select name="Date" required="required" id="Date" multiple>
    <?php
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                foreach ($pdo->query('SELECT DateOfNewSeance FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
                    <option id="Date"> <?php echo $seance['DateOfNewSeance'].'<br>'; ?></option> <?php
                 }
            } catch (PDOException $e) {
                echo 'Récupération Date impossible';
            }
            ?>
    </select>

    <label for="Horaire">Choisissez votre Horaire</label>
    <select name="Horaire" required="required" id="Horaire" multiple>
    <?php
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                foreach ($pdo->query('SELECT HourBegin, HourEnd FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
                    <option id="Horaire"> <?php echo $seance['HourBegin'].' / '.$seance['HourEnd'].'<br>'; ?></option> <?php
                 }
            } catch (PDOException $e) {
                echo 'Récupération Horaire impossible';
            }
            ?>
    </select>
   
    <label for="tos" required="required" class="inline-label"><input type="checkbox" name="tos" id="tos">J'accepte les conditions générales d'utilisation</label><br/>
    
    <button type="reset">Réinitialiser les valeurs du formulaire</button>
    <button type="submit">Soumettre le formulaire</button>
    
</form>
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