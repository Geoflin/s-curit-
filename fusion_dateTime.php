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