<html lang="fr">
<head>
<TITLE>Kinepolise/connexion_gestionnaire</TITLE>
</head>
<body>

<nav>
<button name="accueil"><a href="../../../index.php">retour à l'accueil</a></button>
</nav>
<h3 class="center">Connexion à l'espace gestionnaire</h3>

<form method="post" action="">
    <label for="username">utilisateur</label>
    <input type="text" required="required" name="username" id="username" placeholder="Saisissez votre nom utilisateur">
    <label for="password">mot de passe</label>
    <input type="text" required="required" name="password" id="password" placeholder="Saisissez votre mot de passe">
    <button name="connexion" type="submit">connexion</button>
    </form>

    <?php
    if (isset($_POST['connexion'])){
$_SESSION['username'] = $_POST['username'];
$_SESSION['password']= $_POST['password'];
?>

<?php
$pdo_kinepolise = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
foreach ($pdo_kinepolise->query('SELECT * FROM password WHERE Id= "1"', PDO::FETCH_ASSOC) as $dataConnexion) {};
foreach ($pdo_kinepolise->query('SELECT * FROM password WHERE Id= "3"', PDO::FETCH_ASSOC) as $dataConnexion2) {};
if (($_SESSION['username'] == $dataConnexion['username']  && $_SESSION['password'] == $dataConnexion['password'])) {
?>
<h1><a href="..\index_gestionnaire\espace_gestionnaire.php">Accèder à mon espace</a></h1>
<style>
    form{
        display:none;
    }
</style>
<?php } elseif (($_SESSION['username'] == $dataConnexion2['username']  && $_SESSION['password'] == $dataConnexion2['password'])) { ?>
<h1><a href="..\index_gestionnaire\espace_gestionnaire_cinema_2.php">Accèder à mon espace</a></h1>
<style>
    form{
        display:none;
    }
</style>
<?php
};
}; 
?>

</body>
<style>
/**
    Attention, ce CSS est là uniquement pour rendre le formulaire "agréable" à la lecture sans que vous n'ayez
    à récupérer deux fichiers distincts.
    Dans un cas d'usage "réel", ces éléments doivent être externalisés
     */
    a{
      color:#A111BD;
    }
    body {
        font-family: Calibri, serif;
        background-color: black;
        color: white;
        display: grid;
        grid-template-rows:50px 100px 1fr;
        row-gap: 10px;
    }
    h1{
        grid-row: 3/3;
        display: flex;
        justify-content: center;
        align-items: flex-start;
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