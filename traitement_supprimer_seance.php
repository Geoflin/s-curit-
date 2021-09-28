<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>
<BODY>
  <button name="accueil"><a href="index.php">retour à l'accueil</a></button>
  <button name="formulaire_ajoutseance"><a href="connexion_gestionnaire.php">retour espace gestionnaire</a></button>
    </BODY>
</HTML>

<!-- supprimer_seance -->
<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
    $statement = $pdo->prepare('DELETE FROM seance_cinema1 WHERE Id = :Id');
    $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
    if ($statement->execute()) {
        echo 'La suppression a bien été effectuée';
    } else {
        $errorInfo = $statement->errorInfo();
        echo $errorInfo[2];
    }
} catch (PDOException $e) {
    echo 'Une erreur s\'est produite lors de la communication avec la base';
}
?>