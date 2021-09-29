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
        echo "<br />",$i+1,"e choix : ".$nombre[$i];
      }
    }
    else
    {
      echo "Veuillez sélectionner un critère";
    }
?>