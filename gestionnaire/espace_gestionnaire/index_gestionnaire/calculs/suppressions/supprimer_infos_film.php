<?php
//On invoque un petit fichier pour supprimer les messages d'erreur de php
require_once 'debuf/debug.php';
                                 if(isset($_POST['Id']))
                                 {
                                   // On assigne notre variable $_POST['checkbox_id']
                                   $nombre=$_POST['Id'];
                                   
                                   /* On crée une variable qui comptera le nombre de
                                   checkbox choisis grâce à la fonction count() */
                                   $total=count($nombre);
                                   
                                   // On affiche le résultat
                                   $s =($total<=1) ? "" : "s"; // astuce pour le singulier ou le pluriel
                                   
                                   /* Une petite boucle pour afficher les valeurs qu'on 
                                       a sélectionné dans notre formulaire */
                                   for( $i=0; $i<$total; $i++ )
                                   {
                                     $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                                     $statement = $pdo->prepare('DELETE FROM info_film WHERE Id = :Id');
                                     $statement->bindValue(':Id', $nombre[$i], PDO::PARAM_INT);        
                                         if ($statement->execute()) {
                                         } else {
                                             echo "erreur";
                                         }
                                   }
                             } else {
                                 
                             }