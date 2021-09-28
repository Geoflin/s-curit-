<!--supprimer séance-->

<fieldset id="supprimerseance">
<form name="supprimerseance" method="post" action="traitement_supprimer_seance.php" target="_blank">

    <label for="Id">Choisissez la ou les séances à supprimer</label>
    
    <?php
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
                foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { ?>
                 <table>
                 <tr>
                 <td> <input type="checkbox" id="Id" name="Id" value=" <?php echo $seance['Id']; ?> "><label for="select_supprimer_seance"><?php echo $seance['Id'] ?></label></td>
                 <?php echo '<td>'.$seance['FilmName'].'</td>'.'<td>'.$seance['DateOfNewSeance'].'</td>'.'<td>'.$seance['HourBegin'].'</td>'.'<td>'.$seance['HourEnd'].'</td>'.'<td>'.$seance['SalleName'].'</td>'.'<td>'.$seance['Nombre_de_place'].'</td>';?>
                 </tr>
              </table>
            <?php }
            } catch (PDOException $e) {
                echo 'Récupération Salle impossible';
            }
            ?>
    </select>
    

    </br><button type="reset">Réinitialiser les valeurs du formulaire</button></br>
    <button type="submit">Soumettre le formulaire</button></br>
    
</form>

</fieldset>