<head> 
<link href="style.css" rel="stylesheet">
</head>
<?php //statistique créneaux ?>
    <!--Tri_par_creneaux-->
<?php $n= 0; ?>


<!--On invoque un formulaire-->
<form method="POST" action="">

<!--On permet a l'admin de choisir son créneau de réservation-->
<span class="center border">
<label for="dateDepart">Date de début: <?php if(isset($_POST['dateDepart'])){echo $_POST['dateDepart'];};?></label></br>
    <input type="date" required="required" name="dateDepart"></br>
<label for="dateFin">Date de fin: <?php if(isset($_POST['dateFin'])){echo $_POST['dateFin'];};?></label></br>
    <input type="date" required="required" name="dateFin"></br></br>
</span>

    <!--On permet à l'admin de choisir son cinéma-->
    <h3 class="type_of_tri"> Choisissez l'adresse de votre cinéma</h3></br>
    <select name="cinemaAdresse" required="required">
    <?php 
    $pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
  foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM adresse', PDO::FETCH_ASSOC) as $adresse) {};?>
 <option value="cinema1"><?php echo $adresse['adresse'].'<br>'; ?></option> 
 <?php 
     $pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
  foreach ($pdo_kinepolise_cinema2->query('SELECT * FROM adresse', PDO::FETCH_ASSOC) as $adresse) {}; ?>
  <option value="cinema2"><?php echo $adresse['adresse'].'<br>'; ?></option>
  </select>

  <input type="submit" name="creneaux" value="générer les stats">
  </form>

  <!--On insère la tête du tableau-->
<?php require_once 'tete_du_tableau.php'; ?>
    </form>



    
<!--traitement_choix_du_creneau-->
<?php
if(isset($_POST['creneaux'])){
  $dateDepart= $_POST['dateDepart'].' 00:00:00';
  $dateFin= $_POST['dateFin'].' 00:00:00';
?>
<!--traitement_choix_du_creneau-->

<?php
    //traitement_choix_du_creneau
    if(isset($_POST['cinemaAdresse'])){
  if($_POST['cinemaAdresse']== 'cinema1'){
?>
          <!-- Boucle Corps du tableau-->
  <tr>
      <td colspan="6">Cinéma1</td>
  </tr>

  <?php

    $pdo_kinepolise_cinema1= new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
    //traitement_choix_du_creneau
    foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM `reservation_client` WHERE `DateSeanceBegin` >= "'.$dateDepart.'" AND `DateSeanceBegin` <= "'.$dateFin.'" ', PDO::FETCH_ASSOC) as $seance) {
        //traitement_choix_du_creneau 
      $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
  $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']); ?>

  <tr class=thead <?php echo $seance['FilmName']?>>

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
}
  ?>

<?php
    //traitement_choix_du_creneau
    if(isset($_POST['cinemaAdresse'])){
  if($_POST['cinemaAdresse']== 'cinema2'){
?>
<tr>
      <td colspan="6">Cinéma2</td>
  </tr>

<?php 
$pdo_kinepolise_cinema2= new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
        foreach ($pdo_kinepolise_cinema2->query('SELECT * FROM `reservation_client` WHERE `DateSeanceBegin` >= "'.$dateDepart.'" AND `DateSeanceBegin` <= "'.$dateFin.'" ', PDO::FETCH_ASSOC) as $seance) { 
          $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
      $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']); ?>

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
    }
?>


<?php 
require_once 'pied_du_tableau.php';
       } ?>
<!--Tri_par_creneaux-->