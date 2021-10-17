       <!-- Tri Par Salle-->
       <span class="blockTri2">

  <form method="POST" action="">
  <div class="type_of_tri">Tri par nom de Salle</div></br>
  <select name="SalleNameTest">
  <option id="SalleName">Tout afficher<br></option>
  <?php 
  foreach ($pdo_kinepolise_cinema2->query('SELECT SalleName FROM infos_cinema1', PDO::FETCH_ASSOC) as $Salle) { ?>
                    <option><?php echo $Salle['SalleName'].'<br>'; ?></option>
  <?php } ?>
  </select>
  <input type="SUBMIT" value="Tri !" name="triSalleName">
  </form>
  </span>

  <?php if(isset($_POST['triSalleName'])){?>
    <?php
  $pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
  foreach ($pdo_kinepolise_cinema2->query('SELECT * FROM seance_cinema1 WHERE SalleName= "'.$_POST['SalleNameTest'].'" ', PDO::FETCH_ASSOC) as $FilmSalle) {
  if(isset($FilmSalle['FilmName'])){
    $FilmSalle1= $FilmSalle['FilmName'];
    $SalleName= $FilmSalle['FilmName'];
  } else {
    $FilmSalle1= "null";
  };
  } ?>
      <style>
        tr:not(.<?php echo $FilmSalle1 ?>, .thead, .<?php echo $SalleName ?>){
        display: none;
      }
    </style>
    <?php }; ?>