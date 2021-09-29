<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>
<BODY>
    </BODY>
</HTML>
<?php
    if(isset($_POST['Id']))
    {
      // On assigne notre variable $_POST['checkbox_id']
      $nombre=$_POST['Id'];
      
      /* On crée une variable qui comptera le nombre de
      checkbox choisis grâce à la fonction count() */
      $total=count($nombre);
      
      // On affiche le résultat
      $s =($total<=1) ? "" : "s"; // astuce pour le singulier ou le pluriel
      echo "Vous avez sélectionné <strong>".$total."</strong> critère".$s;
      
      /* Une petite boucle pour afficher les valeurs qu'on 
          a sélectionné dans notre formulaire */
      for( $i=0; $i<$total; $i++ )
      {
        $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
        $statement = $pdo->prepare('DELETE FROM seance_cinema1 WHERE Id = :Id');
        $statement->bindValue(':Id', $nombre[$i], PDO::PARAM_INT);        
            if ($statement->execute()) {
                echo "<br />",$i+1,"e choix : ".$nombre[$i];
                echo 'suppression effectuée';
            } else {
                echo "erreur";
            }
      }
    }