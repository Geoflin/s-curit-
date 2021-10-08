       <!-- Tri Par Salle-->
       <span class="blockTri2">
       <form method="POST" action="">
  <div class="type_of_tri">Tri par nom de Salle</div></br>
    <select name="SalleNameTest" value="<?php echo $seance['SalleName'];?>">
    <option id="SalleName"><?php echo "".'<br>'; ?></option>
    <?php 
  foreach ($pdo->query('SELECT SalleName FROM infos_cinema1', PDO::FETCH_ASSOC) as $Salle) { ?>
                    <option id="SalleName"><?php echo $Salle['SalleName'].'<br>'; ?></option>
  <?php } ?>
  </select>
  <input type="SUBMIT" value="Tri !" name="triSalleName">
  </form>
  </span>

  <?php if(isset($_POST['triSalleName'])){?>
      <style>
        tr:not(.<?php echo $_POST['SalleNameTest']?>, .thead){
        display: none;
      }
    </style>
    <?php }; ?>