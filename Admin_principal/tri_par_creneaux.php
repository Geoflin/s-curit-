<head> 
<link href="style.css" rel="stylesheet">
</head>
<?php //statistique créneaux ?>
    <!--Tri_par_creneaux-->
<?php $n= 0; ?>

<span class="center border">
<form method="POST" action="">
<label for="dateDepart">Date de début</label></br>
    <input type="date" required="required" name="dateDepart"></br>
<label for="dateFin">Date de début</label></br>
    <input type="date" required="required" name="dateFin"></br></br>
    <input type="submit" name="creneaux" value="générer les stats">
</form>
</span>

<?php require_once 'tete_du_tableau.php'; ?>
    </form>

        <!-- Boucle Corps du tableau-->
        <?php
//traitement_choix_du_creneau
if(isset($_POST['creneaux'])){
  $dateDepart= $_POST['dateDepart'].' 00:00:00';
  $dateFin= $_POST['dateFin'].' 00:00:00';

        $pdo_kinepolise_client= new PDO('mysql:host=localhost;dbname=kinepolise_client', 'root', '');
        foreach ($pdo_kinepolise_client->query('SELECT * FROM `reservation_client` WHERE `DateSeanceBegin` >= "'.$dateDepart.'" AND `DateSeanceBegin` <= "'.$dateFin.'" ', PDO::FETCH_ASSOC) as $seance) { 
          $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
      $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']); ?>

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
    
}; ?>
<?php 
require_once 'pied_du_tableau.php';
       } ?>
<!--Tri_par_creneaux-->