<?php
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
$filtre='FilmName';
        try{
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
            ?>
        <!-- Form  modifierseance-->
        <table>
        <form name="modifierseance" method="post" action="Brouillon16.php" target="_blank">
        <td><input type="checkbox" name="Id[]" id="Id" required="required" value=" <?php echo $seance['Id']; ?> "><button name="modifier" id="modifier" class="submit">Modifier les séances</button></td>
        <td><?php if($seance['FilmName'] !==false){ echo $seance['FilmName'];?></br><div id="div"><input type="text" name="FilmName" id="FilmName" classe="modifier" placeholder="<?php echo $seance['FilmName'];?>" value="<?php echo $seance['FilmName'];}?>"></div></td> 

        
            <?php if('DateOfNewSeance' == $filtre){ echo '<td>'.$seance['DateOfNewSeance'];?></br><input type="text" name="DateOfNewSeance" id="DateOfNewSeance" classe="modifier" placeholder="<?php echo $seance['DateOfNewSeance'];?>" value="<?php echo $seance['DateOfNewSeance'];?>"></td><?php } else { echo '';  } ?>

            <?php if('HourBegin' == $filtre){ echo '<td>'.$seance['HourBegin'];?></br><input type="text" name="HourBegin" id="HourBegin" classe="modifier" placeholder="<?php echo $seance['HourBegin'];?>" value="<?php echo $seance['HourBegin'];?>"></td><?php } else { echo '';  } ?>
            <?php if('HourEnd' == $filtre){ echo '<td>'.$seance['HourEnd'];?></br><input type="text" name="HourEnd" id="HourEnd" classe="modifier" placeholder="<?php echo $seance['HourEnd'];?>" value="<?php echo $seance['HourEnd'];?>"></td><?php } else { echo '';  } ?>
            <?php if('SalleName' == $filtre){ echo '<td>'.$seance['SalleName'];?></br><input type="text" name="SalleName" id="SalleName" classe="modifier" placeholder="<?php echo $seance['SalleName'];?>" value="<?php echo $seance['SalleName'];?>"></td><?php } else { echo '';  } ?>
            <?php if('Nombre_de_place' == $filtre){ echo '<td>'.$seance['Nombre_de_place'];?></br><input type="text" name="Nombre_de_place" id="Nombre_de_place" classe="modifier" placeholder="<?php echo $seance['Nombre_de_place'];?>" value="<?php echo $seance['Nombre_de_place'];?>"></td><?php } else { echo '';  } ?>
       
        </form>
    </table>
    </tr>
    <?php } 
                    } catch (PDOException $e) {
                    echo 'Récupération Salle impossible';
                } ?>

<style>
    table td{
        border: 1px solid black;
        padding: 1rem;
        text-align: center;
        max-width: 100px;
        min-width: 100px;
        word-wrap: break-word;
        height: 100px;
    }
    thead td{
        background-color: rgb(192, 189, 189);
        font-weight: bold;
    }

    </style>