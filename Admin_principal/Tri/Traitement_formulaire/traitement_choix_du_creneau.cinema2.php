<?php
    //traitement_choix_du_creneau si on a choisi le cinéma2 ou tout les cinémas, on lit la boucle suivante
    if(isset($_POST['cinemaAdresse2']) || isset($_POST['tout'])){
        if($_POST['cinemaAdresse2']== 'cinema2' || $_POST['tout']== 'tout'){
?>

<?php
//traitement_choix_du_creneau_cinema2 si on a sélectionné tout les créneaux et tout les cinémas
    if($_POST['toutCreneau']== 'tout'){
        $pdo_kinepolise_cinema2= new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
        foreach ($pdo_kinepolise_cinema2->query('SELECT * FROM `reservation_client` ', PDO::FETCH_ASSOC) as $seance) {
            $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
            $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']); 
            ?>

            <tr>
      <td colspan="6">Cinéma2</td>
  </tr>

            <tr class= thead <?php echo $seance['FilmName']?>>

            <td><?php echo $seance['username'];?></td>
            <td><?php echo $seance['FilmName'];?></td> 
            <td id="Colonne3"><?php echo $dateSeanceBegin->format('Y-m-d');?><br/></td>
            <td id="Colonne4"><?php echo $dateSeanceBegin->format('H:i');?><br/></td>
            <td id="Colonne5"><?php echo $DateSeanceEnd->format('H:i');?></td>
            <td id="Colonne6"><?php echo $seance['SalleName'];?></br></td>
            </tr>
      
            <?php 
            $n+= 1; 
        } 

    //traitement_choix_du_creneau_cinema2 si on a sélectionné tout les créneaux et le cinémas2
    }else {
            
$pdo_kinepolise_cinema2= new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
        foreach ($pdo_kinepolise_cinema2->query('SELECT * FROM `reservation_client` WHERE `DateSeanceBegin` >= "'.$dateDepart.'" AND `DateSeanceBegin` <= "'.$dateFin.'" ', PDO::FETCH_ASSOC) as $seance) { 
          $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
      $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']); 
      ?>

      <tr class= thead <?php echo $seance['FilmName']?>>

      <td><?php echo $seance['username'];?></td>
      <td><?php echo $seance['FilmName'];?></td> 
      <td id="Colonne3"><?php echo $dateSeanceBegin->format('Y-m-d');?><br/></td>
      <td id="Colonne4"><?php echo $dateSeanceBegin->format('H:i');?><br/></td>
      <td id="Colonne5"><?php echo $DateSeanceEnd->format('H:i');?></td>
      <td id="Colonne6"><?php echo $seance['SalleName'];?></br></td>
      </tr>

      <?php 
      $n+= 1; 
}; 
};
};
};
?>