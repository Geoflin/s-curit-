                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Affiche et compte le nombre de checkbox                                                                       
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=299
    Auteur           : david96                                                                                            
    Date édition     : 05 Sept 2007                                                                                       
    Date mise à jour : 28 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/?>
    <html>
    <head><title>Formulaire exemple</title></head>
    <body>

    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>

    <form action="Brouillon14.php" method="post">
       
    Element-1 <input type="checkbox" name="Id[]" value="<?php echo $seance['Id']; ?>"
 /><br />
    <!-- etc... //-->
    <?php } ?>
    <input type="submit" />
    </form>

    
    
    </body>
    </html>