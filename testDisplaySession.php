<?php
//display-session.php
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['age']) && isset($_SESSION['favoriteLangages']))
{
  echo sprintf("Je m'appelle %s et j'ai %s ans", $_SESSION['name'], $_SESSION['age']) . PHP_EOL;
  echo sprintf("Mes langages de programmation favoris sont les suivants") . PHP_EOL;
  foreach ($_SESSION['favoriteLangages'] as $langage)
  {
    echo $langage . PHP_EOL;
  }
} else {
  echo "Toutes les variables n'ont pas été définies" . PHP_EOL;
}
?>

<form method="POST" action="">
<input type="SUBMIT" value="Tri !" name="triFilmName">
</form>

<?php
if(isset($_POST['triFilmName'])){
    session_destroy();
}