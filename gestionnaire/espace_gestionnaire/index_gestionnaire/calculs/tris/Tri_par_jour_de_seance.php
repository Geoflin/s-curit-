       <!-- Tri_par_jour_de_seance-->
       <span class="blockTri2">

       <!--On invoque le formulaire de tri d'affichage par jours-->
  <form method="POST" action="">
  <div class="type_of_tri">Tri par jour de seance</div></br>
  <select name="dateSeanceBeginTest">
  <option id="dateSeanceBegin" value=" ">Tout afficher<br></option>
  <?php 
  $pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
  foreach ($pdo_kinepolise_cinema1->query('SELECT dateSeanceBegin FROM seance_cinema1', PDO::FETCH_ASSOC) as $date) { ?>
                    <option><?php echo $date['dateSeanceBegin'].'<br>'; ?></option>
  <?php } ?>
  </select>
  <input type="SUBMIT" value="Tri !" name="triSeanceBegin">
  </form>
  </span>


  <!--On affiche uniquement les séances correxpondant au jour sélectionné-->
  <?php if(isset($_POST['triSeanceBegin'])){?>
    <?php
  $pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
 foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM seance_cinema1 WHERE dateSeanceBegin= "'.$_POST['dateSeanceBeginTest'].'" ', PDO::FETCH_ASSOC) as $FilmSalle) {
  if(isset($FilmSalle['FilmName'])){
    $FilmSalle1= $FilmSalle['FilmName'];
    $SalleName= $FilmSalle['FilmName'];
  } else {
    $FilmSalle1= "null";
  };
  } ?>
      <style>
        tr:not(.<?php echo $FilmSalle1 ?>, .thead  .<?php echo $SalleName ?>){
        display: none;
      }
    </style>
    <?php }; ?>