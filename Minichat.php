<?php
if (isset($_POST['pseudo']) && isset($_POST['message']) && trim($_POST['pseudo']) != '' && trim($_POST['message']) != '') {
mysql_connect("localhost", "nom", "pass"); // Connexion à MySQL
mysql_select_db("bdd"); // Sélection de la base


        $lastmsg = mysql_result(mysql_query('SELECT message FROM minichat WHERE ID=(SELECT max(ID) FROM minichat);'), 0, 0);
        if($lastmsg != htmlspecialchars($_POST['message'])) {
                $message = mysql_real_escape_string(htmlspecialchars($_POST['message'])); // eviter le html !
                $pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
                mysql_query("INSERT INTO minichat VALUES('','$pseudo','$message')"); // on insère pseudo et message
    } 
        else { echo '<strong>Attention, tu ne peux pas entrer deux fois le même message !</strong>'; }
        mysql_close(); // on se déconnecte de la base
}



if((isset($_POST['pseudo']) && trim($_POST['pseudo']) == '') || (isset($_POST['message']) && trim($_POST['message']) == ''))
     echo "<strong>Attention tu as oublié soit de mettre ton Pseudo, soit de mettre un Message !</strong>";
?>
<div align="center">
<form action="test.php" method="post">
<p>
Pseudo:
  <input name="pseudo" type="text" <?php echo (isset($_POST['pseudo']))?'value="'.$_POST['pseudo'].'"':''; ?> maxlength="255" />
  <br />
<br />
  Message:
  <input name="message" type="text" <?php echo (isset($_POST['message']))?'value="'.$_POST['message'].'"':''; ?> size="50" maxlength="255" />
    <br />
    <input type="submit" value="Envoyer" />
</p>
</form></div>
<?php
mysql_connect("localhost", "nom", "pass"); // Connexion à MySQL
mysql_select_db("bdd"); // Sélection de la base
$reponse = mysql_query("SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0,10");
mysql_close();

while ($donnees = mysql_fetch_assoc($reponse))
    echo '<p><strong>'.$donnees['pseudo'].'</strong>: '.$donnees['message'].'</p>';
?>