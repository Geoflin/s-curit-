       <!-- Tri Par Salle-->
       <span class="blockTri2">

  <form method="POST" action="">
  <div class="type_of_tri">Tri par nom de Salle</div></br>
  <select name="SalleNameTest" value="<?php echo $Salle['SalleName'];?>">
  <option id="SalleName">Tout afficher<br></option>
  <?php 
  foreach ($pdo->query('SELECT SalleName FROM seance_cinema1', PDO::FETCH_ASSOC) as $Salle) { ?>
                    <option><?php echo $Salle['SalleName'].'<br>'; ?></option>
  <?php } ?>
  </select>
  <input type="SUBMIT" value="Tri !" name="triSalleName">
  </form>
  </span>

  <?php if(isset($_POST['triSalleName'])){?>
    <?php
  foreach ($pdo->query('SELECT FilmName FROM seance_cinema1 WHERE SalleName= "'.$_POST['SalleNameTest'].'" ', PDO::FETCH_ASSOC) as $FilmSalle) { 
  $FilmSalle1= $FilmSalle['FilmName'];
  } ?>
      <style>
        tr:not(.<?php echo $FilmSalle1 ?>, .thead){
        display: none;
      }
    </style>
    <?php }; ?>