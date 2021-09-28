<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>
<BODY>
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
        echo 'Vous pouvez fermer cette page';
        echo "N'oubliez pas de rafraichir votre espace gestionnaire";
    } else {
        $errorInfo = $statement->errorInfo();
        echo $errorInfo[2];
    }
} catch (PDOException $e) {
    echo 'Une erreur s\'est produite lors de la communication avec la base';
}
?>