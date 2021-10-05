
<?php
$pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
?>
<td><button value="MasquerLigne1" id="MasquerLigne1">Masquer Ligne</button><button value="AfficherLigne1" id="AfficherLigne1">Afficher Ligne</button></td>
<table>
    <?php
    foreach ($pdo->query('SELECT * FROM seance_cinema1', PDO::FETCH_ASSOC) as $seance) { 
        ?>
        <!-- Form  modifierseance-->
        <form name="modifierseance" method="post" action="">
    <tr id="Ligne1">
        <td id="Colonne1"><input type="checkbox" name="Id[]" id="Id" required="required" value=" <?php echo $seance['Id']; ?> "><button onclick='window.location.reload(false)' name="modifier" id="modifier" class="submit">Modifier les séances</button></td>
        <td id="Colonne2"><?php echo $seance['FilmName'];?><div id="div"><input type="text" name="FilmName" id="FilmName" classe="modifier" placeholder="<?php echo $seance['FilmName'];?>" value="<?php echo $seance['FilmName'];?>"></div></td> 
        <td id="Colonne3"><?php echo $seance['DateOfNewSeance'];?><div id="div"><input type="timestamp"  name="DateOfNewSeance"  id="DateOfNewSeance" classe="modifier" placeholder="<?php echo $seance['DateOfNewSeance'];?>" value="<?php echo $seance['DateOfNewSeance'];?>"></div></td>
        <td id="Colonne4"><?php echo $seance['HourBegin'];?></br><div id="div"><input type="time" name="HourBegin" id="HourBegin" classe="modifier" placeholder="<?php echo $seance['HourBegin'];?>" value="<?php echo $seance['HourBegin'];?>"></div></td>
        <td id="Colonne5"><?php echo $seance['HourEnd'];?></br><div id="div"><input type="time"  name="HourEnd" id="HourEnd" classe="modifier" placeholder="<?php echo $seance['HourEnd'];?>" value="<?php echo $seance['HourEnd'];?>"></div></td>
        <td id="Colonne6"><?php echo $seance['SalleName'];?><div id="div"><input type="SalleName"  name="SalleName" id="SalleName" classe="modifier" placeholder="<?php echo $seance['SalleName'];?>" value="<?php echo $seance['SalleName'];?>"></div></td>
        <td id="Colonne7"><?php echo $seance['Nombre_de_place'];?></br><div id="div"><input type="number" name="Nombre_de_place" id="Nombre_de_place" classe="modifier" placeholder="<?php echo $seance['Nombre_de_place'];?>" value="<?php echo $seance['Nombre_de_place'];?>"></div></td>
    </tr>
        </form>
    <?php } ?>
          <!--Gestion affichage-->
          <tr>
        <td></td>
        <td><button value="MasquerColonne1" id="MasquerColonne1">Masquer colonne</button><button value="AfficherColonne1" id="AfficherColonne1">Afficher colonne</button></td>
        <td><button value="MasquerColonne2" id="MasquerColonne2">Masquer colonne</button><button value="AfficherColonne2" id="AfficherColonne2">Afficher colonne</button></td>
        <td><button value="MasquerColonne3" id="MasquerColonne3">Masquer colonne</button><button value="AfficherColonne3" id="AfficherColonne3">Afficher colonne</button></td>
        <td><button value="MasquerColonne4" id="MasquerColonne4">Masquer colonne</button><button value="AfficherColonne4" id="AfficherColonne4">Afficher colonne</button></td>
        <td><button value="MasquerColonne5" id="MasquerColonne5">Masquer colonne</button><button value="AfficherColonne5" id="AfficherColonne5">Afficher colonne</button></td>
        <td><button value="MasquerColonne6" id="MasquerColonne6">Masquer colonne</button><button value="AfficherColonne6" id="AfficherColonne6">Afficher colonne</button></td>
        <td><button value="MasquerColonne7" id="MasquerColonne7">Masquer colonne</button><button value="AfficherColonne7" id="AfficherColonne7">Afficher colonne</button></td>
         </tr>
    </table>
<script>
    //affichage.colonne1//
    var Colonne1 = document.getElementById('Colonne1')
    const MasquerColonne1 = document.getElementById('MasquerColonne1')
    const AfficherColonne1 = document.getElementById('AfficherColonne1')
    const masquerColonne1 = () => {
        Colonne1.style.display= "none"
        MasquerColonne1.style.display= "none"
        AfficherColonne1.style.display= "block"
      }
    const afficherColonne1 = () => {
        Colonne1.style.display= ""
        MasquerColonne1.style.display= "block"
        AfficherColonne1.style.display= "none"
      }
      MasquerColonne1.addEventListener('click', masquerColonne1)
      AfficherColonne1.addEventListener('click', afficherColonne1)
          //affichage.colonne2//
    var Colonne2 = document.getElementById('Colonne2')
    const MasquerColonne2 = document.getElementById('MasquerColonne2')
    const AfficherColonne2 = document.getElementById('AfficherColonne2')
    const masquerColonne2 = () => {
        Colonne2.style.display= "none"
        MasquerColonne2.style.display= "none"
        AfficherColonne2.style.display= "block"
      }
    const afficherColonne2 = () => {
        Colonne2.style.display= ""
        MasquerColonne2.style.display= "block"
        AfficherColonne2.style.display= "none"
      }
      MasquerColonne2.addEventListener('click', masquerColonne2)
      AfficherColonne2.addEventListener('click', afficherColonne2)
                //affichage.Ligne1//
    var Ligne1 = document.getElementById('Ligne1')
    const MasquerLigne1 = document.getElementById('MasquerLigne1')
    const AfficherLigne1 = document.getElementById('AfficherLigne1')
    const masquerLigne1 = () => {
        Ligne1.style.display= "none"
        MasquerLigne1.style.display= "none"
        AfficherLigne1.style.display= "block"
      }
    const afficherLigne1 = () => {
        Ligne1.style.display= ""
        MasquerLigne1.style.display= "block"
        AfficherLigne1.style.display= "none"
      }
      MasquerLigne1.addEventListener('click', masquerLigne1)
      AfficherLigne1.addEventListener('click', afficherLigne1)
</script>
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
#AfficherColonne1, #AfficherColonne2, #AfficherColonne3, #AfficherColonne4, #AfficherColonne5, #AfficherColonne6, #AfficherColonne7, #AfficherLigne1{
display:none;
}
</style>
                          <!-- Traitement modifierseance-->
                          <?php require_once 'Brouillon16.php'; ?>