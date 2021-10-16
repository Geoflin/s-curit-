<HTML>
 <HEAD>
  <TITLE>Kinepolise/accueil</TITLE>
 </HEAD>
<BODY>
  <div>

  <h1>Kinepolise</h1>
  <h3>Votre cinéma</h3>
  <span>
  <button name="reservation"><a href="client/connexion/connexion_client.php">réserver mes places</a></button>
  <button name="connexion_admin"><a href="Admin_principal\connexion\connexion_admin_principal.php">connexion administrateur</a></button>
  <button name="connexion"><a href="gestionnaire\espace_gestionnaire\connexion\connexion_gestionnaire.php">espace gestionnaire</a></button>
</span>
<img src="accueil/meduse.jpg"/>

</div>
    </BODY>

    <style>
          a{
      color:#A111BD;
    }
          body {
        font-family: Calibri, serif;
        background-color: black;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom:500px;
        font-size: 50px;
    }
    h1, h3{
      display: flex;
      justify-content: center;
      
    }
    span{
      display: flex;
      justify-content: space-around;
      
    }
    button{
      margin-left: 20px;
      font-size: 20px;
    }
    img{
      height: 200px;
      margin: auto;
      display: flex;
      justify-content: center;
      padding: 1rem;
      size: 50px;
    }
    </style>

</HTML>