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
$_SESSION['password']= $_POST['password'];
if (isset($_SESSION['username'])) 
{
  echo sprintf("<h3>Vous êtes connecté, bonjour %s <h3/>", $_SESSION['username']) . PHP_EOL;
  ?>

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
<?php
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
   <tr>

   <form name="supprimerseance" method="post" action="traitement_supprimer_seance.php" target="_blank">
   <td> <input type="checkbox" name="Id[]" value=" <?php echo $seance['Id']; ?> "><button type="submit">Supprimer la ligne</button></td>
       <?php echo '<td>'.$seance['FilmName'].'</td>'.'<td>'.$seance['DateOfNewSeance'].'</td>'.'<td>'.$seance['HourBegin'].'</td>'.'<td>'.$seance['HourEnd'].'</td>'.'<td>'.$seance['SalleName'].'</td>'.'<td>'.$seance['Nombre_de_place'].'</td>';?>
   </tr>
   <?php }
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste';
}
?>
    <button type="reset">Réinitialiser la séléction</button>
 <button type="submit">Supprimer la séléction</button>
   </form>


</table>

  <?php
} else {
  echo "erreur du bonjour" . PHP_EOL;
}
session_destroy();
?>

<!-- ajout_seance -->

</br><button name="ajout_seance" id="openAjoutSeance" class="action_button">Ajouter une séance</button>
<button name="ajout_seance" id="closeAjoutSeance" class="action_button">Fermer le formulaire</button>

<button name="supprimer_seance" id="openSupprimerSeance" class="action_button">supprimer une séance</button>
<button name="supprimer_seance" id="closeSupprimerSeance" class="action_button">Fermer le formulaire</button>

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
</br><button type="reset">Réinitialiser les valeurs du formulaire</button></br>
    <button type="submit">Soumettre le formulaire</button></br>
    
</form>

</fieldset>

<!--supprimer séance-->

<fieldset id="supprimerseance">
<form name="supprimerseance" method="post" action="traitement_supprimer_seance.php" target="_blank">

    <label for="Id">Choisissez la ou les séances à supprimer</label>
    
    <?php
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
                 <table>
                 <td> <input type="checkbox" id="Id" name="Id" value=" <?php echo $seance['Id']; ?> "><label for="select_supprimer_seance"><?php echo $seance['Id'] ?></label></td>
            <?php }
            } catch (PDOException $e) {
                echo 'Récupération Salle impossible';
            }
            ?>
    </select>
    

    </br><button type="reset">Réinitialiser les valeurs du formulaire</button></br>
    <button type="submit">Soumettre le formulaire</button></br>
    
</form>

</fieldset>

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