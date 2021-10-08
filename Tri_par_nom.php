  <!-- Tri Par Nom-->
  <form class="ligne2" method="POST" action="">
  <h3>Tri de l'affichage</h3>
  <div>Tri par nom de film</div></br>
    <select name="FilmNameTest" value="<?php echo $seance['FilmName'];?>">
    <option id="FilmName"><?php echo "".'<br>'; ?></option>
    <?php 
  foreach ($pdo->query('SELECT FilmName FROM info_film', PDO::FETCH_ASSOC) as $film) { ?>
                    <option id="FilmName"><?php echo $film['FilmName'].'<br>'; ?></option>
  <?php } ?>
  </select>
  <input type="SUBMIT" value="Tri !" name="triFilmName">
  </form>
    
    <?php if(isset($_POST['triFilmName'])){?>
      <style>
        tr:not(.<?php echo $_POST['FilmNameTest']?>, .thead){
        display: none;
      }
    </style>
    <?php }; ?>