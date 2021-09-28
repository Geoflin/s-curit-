<HTML>
 <HEAD>
  <TITLE>espace_gestionnaire.php</TITLE>
  <link rel="stylesheet" href="style.css" />
 </HEAD>

<?php
if ($_POST['username'] == 'john' && $_POST['password'] == 'ripples1947') {
?>

     <button name="accueil"><a href="index.php">accueil</a></button>
     <button name="connexion"><a href="connexion_gestionnaire.php">retour connexion</a></button></br>

     <?php
    session_start();
$_SESSION['username'] = $_POST['username'];
if (isset($_SESSION['username'])) 
{
  echo sprintf("<h3>Vous êtes connecté, bonjour %s <h3/>", $_SESSION['username']) . PHP_EOL;
  ?>

<!--Liste des séance-->

  <h2>Liste des séance</h2>
  <?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');?>
    <table>
    <thead>
    <td>Nom du film</td><td>Jour de séance</td><td>Heure de début</td><td>Heure de fin</td><td>Salle</td><td>Nombre de place</td>
</thead>
</table>
<?php
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) {?>
        <table>
   <tr>
       <?php echo '<td>'.$seance['FilmName'].'</td>'.'<td>'.$seance['DateOfNewSeance'].'</td>'.'<td>'.$seance['HourBegin'].'</td>'.'<td>'.$seance['HourEnd'].'</td>'.'<td>'.$seance['SalleName'].'</td>'.'<td>'.$seance['Nombre_de_place'].'</td>';?>
   </tr>
</table>
        
        <?php }
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste des jeux';
}
?>

  <?php
} else {
  echo "erreur du bonjour" . PHP_EOL;
}
session_destroy();
?>

<!-- ajout_seance -->

</br><button name="ajout_seance" id="openAjoutSeance">Ajouter une séance</button></br>

</br><button name="ajout_seance" id="closeAjoutSeance" >Fermer le formulaire</button></br>

<fieldset id="ajoutseance">
<form name="ajoutseance" method="post" action="traitement_gestionnaire.php">
<table>
    
    <thead><label for="FilmName">Nom du film</label></thead>
    <input type="text" required="required" name="FilmName" id="FilmName" placeholder="Saisissez nom du film">

    <thead><label for="DateOfNewSeance">Date séance</label></thead>
    <input type="date" required="required" name="DateOfNewSeance" id="DateOfNewSeance" placeholder="Saisissez Date de séance">

    <thead><label for="HourBegin">heure de début</label></thead>
    <input type="time" required="required" name="HourBegin" id="HourBegin" placeholder="Choisissez heure de début">

    <thead><label for="HourEnd">heure de fin</label></thead>
    <input type="time" required="required" name="HourEnd" id="HourEnd" placeholder="Choisissez heure de fin">

    <thead><label for="SalleName">Choisissez votre Salle</label></thead>
    <select name="SalleName" required="required" id="SalleName" multiple>
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

    <thead><label for="Nombre_de_place">nombre de place</label></thead>
    <input type="number" required="required" name="Nombre_de_place" id="Nombre_de_place" placeholder="Saisissez Nombre de place">
    
    </table>

    </br><button type="reset">Réinitialiser les valeurs du formulaire</button></br>
    <button type="submit">Soumettre le formulaire</button></br>
    
</form>

</fieldset>

<!-- supprimer_seance -->



<!-- erreur connexion -->
<?php
} else {
    echo "Connexion refusé, vous n'avez pas les droits";
    echo '<button name="accueil"><a href="index.php">accueil</a></button>';
    echo '<button name="connexion"><a href="connexion_gestionnaire.php">connexion</a></button>';
}
?>



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
<script src="script.js"></script>