       <!-- Tri Par Salle-->
       <form class="ligne2" method="POST" action="">
  <h3>Tri de l'affichage</h3>
  <div>Tri par nom de Salle</div></br>
    <select name="SalleNameTest" value="<?php echo $seance['SalleName'];?>">
    <option id="SalleName"><?php echo "".'<br>'; ?></option>
    <?php 
  foreach ($pdo->query('SELECT SalleName FROM info_film', PDO::FETCH_ASSOC) as $Salle) { ?>
                    <option id="SalleName"><?php echo $Salle['SalleName'].'<br>'; ?></option>
  <?php } ?>
  </select>
  <input type="SUBMIT" value="Tri !" name="triSalleName">
  </form>
  
  <?php if(isset($_POST['triSalleName'])){?>
      <style>
        tr:not(.<?php echo $_POST['SalleNameTest']?>, .thead){
        display: none;
      }
    </style>
    <?php }; ?>