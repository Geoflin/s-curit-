<?php
//debug
                             $debug = false;
                             if ($debug) {
                             
                                 // gère et affiche tous les niveaux d'erreurs en mode débogage
                             
                                 error_reporting(E_ALL);
                             
                                 ini_set('display_errors', '1');
                             
                             } else {
                             
                                 // en mode production, ne gère pas certains niveaux pour des raisons de performance (ceux précédés de ~), tel que suggéré dans php.ini
                             
                                 // même pour les niveaux gérés, aucun message ne sera affiché
                             
                                 error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
                             
                                 ini_set('display_errors', '0');
                             
                             }
                             //debug
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
                                     $pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
                                     $statement = $pdo_kinepolise_cinema2->prepare('DELETE FROM seance_cinema1 WHERE Id = :Id');
                                     $statement->bindValue(':Id', $nombre[$i], PDO::PARAM_INT);        
                                         if ($statement->execute()) {
                                         } else {
                                             echo "erreur";
                                         }
                                   }
                             } else {
                                 
                             }