<!--On invoque le formulaire: "choix_creneaux_réservations"-->
<form method="POST" action="">
<fieldset>

<!--On permet a l'admin de choisir son créneau de réservation-->
<h2>Choisissez la période des réservations</h2>
<div class="center">
<div class="border"><input type="checkbox" value="tout" name="toutCreneau" required="required">Tout les creneaux</div>
<div><label for="dateDepart">Date de début: <?php if(isset($_POST['dateDepart'])){echo $_POST['dateDepart'];};?></label></div>
    <input type="date" name="dateDepart"></br>
<label for="dateFin">Date de fin: <?php if(isset($_POST['dateFin'])){echo $_POST['dateFin'];};?></label></br>
    <input type="date" name="dateFin"></br></br>
</div>


<!--On permet à l'admin de choisir son cinéma-->
<h2 class="center"> Choisissez l'adresse de votre cinéma</h2>
    <div class="center">
    <div class="border"><input type="checkbox" value="tout" name="tout">Tout</br></div>
    <?php 
    $pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
  foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM adresse', PDO::FETCH_ASSOC) as $adresse) {};?>
 <input type="checkbox" value="cinema1" name="cinemaAdresse"><?php echo $adresse['adresse'].'<br>'; ?>
 <?php 
     $pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
  foreach ($pdo_kinepolise_cinema2->query('SELECT * FROM adresse', PDO::FETCH_ASSOC) as $adresse) {}; ?>
  <input  type="checkbox" value="cinema2"  name="cinemaAdresse2"><?php echo $adresse['adresse'].'<br>'; ?>
  </div>
  <input class="center button" type="submit" name="creneaux" value="générer les stats">

</fieldset>
<!--On ferme le formulaire: "choix_creneaux_réservations"-->
  </form>