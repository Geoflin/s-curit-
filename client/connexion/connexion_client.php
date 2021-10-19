<html lang="fr">
<head>
<TITLE>Kinepolise/connexion_gestionnaire</TITLE>
</head>
<body>

<nav>
<button name="accueil"><a href="../../index.php">retour à l'accueil</a></button>
</nav>
<h3 class="center">Connexion à l'espace client</h3>

<!--On permet au client de ce connecter-->
<h2 class="center">Je veux me connecter à mon compte</h2> 




<!--On permet au client de ce connecter-->
<form method="post" action="">
    <label for="username">utilisateur</label>
    <input type="text" required="required" name="username" id="username" placeholder="Saisissez votre nom utilisateur">
    <label for="password">mot de passe</label>
    <input type="text" required="required" name="password" id="password" placeholder="Saisissez votre mot de passe">

    <!--On permet au client de choisir son cinéma-->
  <h3 class="type_of_tri"> Choisissez l'adresse de votre cinéma</h3></br>
    <select name="cinemaAdresse" required="required">
    <?php 
    $pdo_kinepolise_cinema1 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema1', 'root', '');
  foreach ($pdo_kinepolise_cinema1->query('SELECT * FROM adresse', PDO::FETCH_ASSOC) as $adresse) {};?>
 <option value="cinema1"><?php echo $adresse['adresse'].'<br>'; ?></option> 
 <?php 
     $pdo_kinepolise_cinema2 = new PDO('mysql:host=localhost;dbname=kinepolise_cinema2', 'root', '');
  foreach ($pdo_kinepolise_cinema2->query('SELECT * FROM adresse', PDO::FETCH_ASSOC) as $adresse) {}; ?>
  <option value="cinema2"><?php echo $adresse['adresse'].'<br>'; ?></option>
  </select>

  <!--On soumet le formulaire-->
  <button name="connexion_client" type="submit">connexion</button>
    </form>

    <!--On permet au client de créer son compte-->
    <h2 class="center">Je veux créer mon compte</h2> 
    <form method="post" action="">
    <label for="username">utilisateur</label>
    <input type="text" required="required" name="username" id="username" placeholder="Saisissez votre nom utilisateur">
    <label for="password">mot de passe</label>
    <input type="text" required="required" name="password" id="password" placeholder="Saisissez votre mot de passe">
    <button name="creation_client" type="submit">connexion</button>
    </form>

    <style>
    a, h2{
      color:rgb(155, 89, 182);
    }
    body {
        font-family: Calibri, serif;
        background-color: black;
        color: white;
        display: grid;
        grid-template-rows:1fr 1fr 1fr;
        row-gap: 10px;
    }
    nav{
        grid-row: 1/1;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    nav button{
      background-color: white;
      z-index: 2;
      height: 25px;
      margin-left: 10px;
    }
    .center{
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: rgb(39, 39, 39);
      z-index: 1;
      height: 50px;
      margin-left: 10%;
      margin-right: 10%;
    }
    form {
        max-width: 50%;
        margin-left: 500px;
    }
    form label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }
    label.inline-label {
        display: inline-block;
    }
    fieldset {
        border: 1px solid lightgray;
        background-color: rgba(225, 233, 255, 0.25);
    }
    legend {
        font-style: italic;
        font-size: 1.1em;
        padding: 5px;
    }
    form input, form select, form textarea {
        display: inline-block;
        margin-bottom: 10px;
        padding: 10px;
        width: 80%;
    }
    form input[type="radio"],
    form input[type="checkbox"],
    form input[type="submit"] {
        width: auto;
    }
    button[type=submit], button[type=reset] {
        padding: 10px;
        margin-top: 15px;
    }
</style> 

    <!--On traite la connexion au compte-->
    <?php
    if (isset($_POST['connexion_client'])){
        session_start();
$_SESSION['username'] = $_POST['username'];
$_SESSION['password']= $_POST['password'];
$_SESSION['cinemaAdresse']= $_POST['cinemaAdresse'];
?>
<h1><a href="..\espace_client.php">Accèder à mon espace</a></h1>
<style>
    form, .center{
        display:none;
    }
    h1{
        grid-row: 2/2;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgb(39,39,39);
        margin-bottom: 100px;
    }
</style>
    <?php }; ?>

    <!--On traite la création de compte-->
    <?php
    if (isset($_POST['creation_client'])){
        require_once '../traitement/traitement_creation_client.php';
    }?>
</body>