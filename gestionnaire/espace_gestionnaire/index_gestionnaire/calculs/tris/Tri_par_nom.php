  <!-- Tri Par Nom-->

  <!--On invoque le formulaire de tri d'affichage par nom de film-->
  <span class="blockTri1">
  <form method="POST" action="">
  <div class="type_of_tri"> Tri par nom de film</div></br>
    <select name="FilmNameTest">
    <option id="FilmName" value=" ">Tout afficher<br></option>
    <?php 
    $pdo_kinepolise = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
  foreach ($pdo_kinepolise->query('SELECT FilmName FROM info_film', PDO::FETCH_ASSOC) as $film) { ?>
                    <option><?php echo $film['FilmName'].'<br>'; ?></option>
  <?php } ?>
  </select>
  <input type="SUBMIT" value="Tri !" name="triFilmName">
  </form>
  </span>
    
  <!--On affiche uniquement les séances correxpondant au nom de film sélectionné-->
    <?php if(isset($_POST['triFilmName'])){?>
      <style>
        tr:not(.<?php echo $_POST['FilmNameTest']?>, .thead){
        display: none;

      }
    </style>
    <?php }; ?>