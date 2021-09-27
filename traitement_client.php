<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>
<BODY>
  <button name="accueil"><a href="index.php">retour à l'accueil</a></button>
  <button name="formulaire_client"><a href="formulaire_client.php">retour au formulaire</a></button>
    </BODY>
</HTML>

<?php
$pdo = new PDO('mysql:host=localhost', 'root', '');
        $kinepolise = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
            if ($kinepolise->exec('INSERT INTO tableaux (lastname, firstname, film, Salle, Date, Horaire) VALUES ("'. $_POST['lastname'] . '", "' . $_POST['firstname'] . '", "' . $_POST['film'] .'", "' . $_POST['Salle'] .'", "' . $_POST['Date'] .'", "' . $_POST['Horaire'] .'");') !== false) {
                echo 'Votre séance est réservée !';
            } else {
                echo 'Une erreur est survenue';
        }
