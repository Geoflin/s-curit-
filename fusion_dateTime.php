 <!-- Form  ajoutseance-->
 <form method="post" action="">
    <td><input type="checkbox" name="NoRepeat" id="NoRepeat" required="required" value="NoRepeat"><button name="ajoutseance" type="submit">Créer nouvelle séance</button></td>
    <td><input type="text" required="required" name="FilmName" id="FilmName" placeholder="Saisissez nom du film"></td>
    <td><input type="date" required="required" name="DateSeanceBegin" id="DateSeanceBegin" placeholder="Saisissez Date de séance"></td>
    <td><input type="time" required="required" name="HourBegin" id="HourBegin" placeholder="Choisissez heure de début"></td>
    <td><input type="time" required="required" name="HourEnd" id="HourEnd" placeholder="Choisissez heure de fin"></td>
        <td><select name="SalleName" required="required" id="SalleName">
        <?php
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                    foreach ($pdo->query('SELECT SalleName FROM infos_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
                        <option id="Salle"> <?php echo $seance['SalleName'].'<br>'; ?></option> <?php
                    }
                } catch (PDOException $e) {
                    echo 'Récupération Salle impossible';
                }
                ?>
        </select></td>
        <td><input type="number" required="required" name="Nombre_de_place" id="Nombre_de_place" placeholder="Saisissez Nombre de place"></td>
            </form>

            <?php if (isset($_POST['ajoutseance'])){
//Post
$fusionDateBegin_AjouterSeance= $_POST['DateSeanceBegin'].' '.$_POST['HourBegin'];
$fusionDateEnd_AjouterSeance= $_POST['DateSeanceBegin'].' '.$_POST['HourEnd'];

require_once 'traitement_gestionnaire5.php';


}?>

<table>
<tr>
            <?php
            foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
              $dateSeanceBegin = new DateTime($seance['DateSeanceBegin']);
              $DateSeanceEnd = new DateTime($seance['DateSeanceEnd']);
            ?>
        <!-- Form  modifierseance-->
        <form method="post" action="">
        
        <td id="Colonne1"><input type="checkbox" name="Id[]" id="Id" required="required" value=" <?php echo $seance['Id']; ?> "><button name="modifierseance"id="modifier" class="submit">Modifier les séances</button></td>
        <td id="Colonne2"><?php echo $seance['FilmName'];?><div id="div"><input type="text" name="FilmName" id="FilmName" classe="modifier" placeholder="<?php echo $seance['FilmName'];?>" value="<?php echo $seance['FilmName'];?>"></div></td> 
        <td id="Colonne3"><?php echo $dateSeanceBegin->format('Y-m-d');?><br/><input type="date"  name="DateSeanceBegin"  id="Modifier_DateSeanceBegin" classe="modifier" value="<?php echo $dateSeanceBegin->format('Y-m-d');?>"></td>
        <td id="Colonne4"><?php echo $dateSeanceBegin->format('H:i');?><br/><input type="time" name="HourBegin" id="Modifier_HourBegin" classe="modifier" value="<?php echo $dateSeanceBegin->format('H:i');?>"></td>
        <td id="Colonne5"><?php echo $DateSeanceEnd->format('H-i');?><div id="div"><input type="time"  name="HourEnd" id="Modifier_HourEnd" classe="modifier" value="<?php echo $DateSeanceEnd->format('H-i');?>"></div></td>
        <td id="Colonne6"><?php echo $seance['SalleName'];?><div id="div"><input type="SalleName"  name="SalleName" id="SalleName" classe="modifier" placeholder="<?php echo $seance['SalleName'];?>" value="<?php echo $seance['SalleName'];?>"></div></td>
        <td id="Colonne7"><?php echo $seance['Nombre_de_place'];?></br><div id="div"><input type="number" name="Nombre_de_place" id="Nombre_de_place" classe="modifier" placeholder="<?php echo $seance['Nombre_de_place'];?>" value="<?php echo $seance['Nombre_de_place'];?>"></div></td>
        </form>
        </tr>
        
    </table>
         <?php } ?>
            
