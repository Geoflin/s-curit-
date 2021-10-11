<?php
$_SESSION['username'] = $_POST['username'];
$_SESSION['password']= $_POST['password'];
if ($_SESSION['username'] == 'john' && $_SESSION['password'] == 'ripples1947') {
  echo sprintf("<nav class=center><h3>Vous êtes connecté, bonjour %s <h3/></nav>", $_SESSION['username']) . PHP_EOL; 
?>
<h1><a href="..\index_gestionnaire\espace_gestionnaire.php">Accèder à mon espace</a></h1>
<?php
} else {
echo "<div class=center>Connexion refusé, vous n'avez pas les droits</div>";
}
?>