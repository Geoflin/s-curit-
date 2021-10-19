<?php //statistique créneaux ?>
<?php $n= 0; ?>

<form method="POST" action="">
    <input type="date" required="required" name="dateDepart" placeholder="Saisissez Date de départ">
    <input type="date" required="required" name="dateFin" placeholder="Saisissez Date de départ">
    <input type="submit" name="creneaux" value="générer les stats">
</form>

<!--Tableaux-->
<h2 class="ligne4 center">Liste des réservations</h2>
    <!-- Thead-->
    <?php
        $pdo_kinepolise_client = new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');?>

        <table class="ligne5">
        <tr class="thead">
            <!-- Form  triNomFilm-->

            <td>Nom d'utilisateur</td>
        <td>Nom du film</td>
        <td>date de la séance</td>
        <td>Heure de début</td>
        <td>Heure de fin</td>
        <td>Salle</td>
</tr>
    </form>

        <!-- Boucle Corps du tableau-->
        <?php

if(isset($_POST['creneaux'])){
  $dateDepart= $_POST['dateDepart'].' 00:00:00';
  $dateFin= $_POST['dateFin'].' 00:00:00';
  echo $dateDepart.'</br>';
  echo $dateFin;

        $pdo_kinepolise_client= new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
        foreach ($pdo_kinepolise_client->query('SELECT * FROM `reservation_client` WHERE `DateSeanceBegin` >= "'.$dateDepart.'" AND `DateSeanceBegin` <= "'.$dateFin.'" ', PDO::FETCH_ASSOC) as $seance) { 
          $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
      $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']);
            ?>


        <tr class=<?php echo $seance['FilmName']?>>

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
      ?>