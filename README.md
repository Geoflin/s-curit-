Pour utiliser cette application:

1: cloner le dépot git-hub (https://github.com/Geoflin/s-curit- )
2: connecter vous à une interface telle que phpMyAdmin
3: connecter vous à une interface telle que phpMyAdmin avec comme coordonnée: 
host= localhost
password='root
4: copier/coller le contenu du fichier CINEMA\SQL\fusion_sql.sql comme requête SQL
5: connecter vous à votre serveur APACHE et rentrer l'url: (http://localhost/CINEMA/)



Pour tester l'application:



I: Tester l'espace client:

1: depuis l'accueil aller dans 'réserver mes places'
2: créer vous un compte client ou utiliser un compte client existant (voir dans bdd: kinepolise_client et table: info_client)(exemple: username= Mike et password= 05104chess)
3: rentrer nom utilisateur + mot de passe + choisissez adresse cinéma1
4: cliquer sur "Accèder à mon espace"
5: essayer toute les actions possibles:
-tri affichage
-Réserver séance
-annuler séance
6: cliquer sur 'retour connexion'
7: effectuer la même chose sur le cinéma numéro2


II: Tester l'espace gestionnaire:

1: depuis l'accueil aller dans 'connexion administrateur'
2: entrer nom d'utilisateur et mot de passe de l'admin (voir dans bdd= kinepolise_administrateur et table= password)(soit: username= admin et password= inputBox)

3: explorer les infos clients:
-appuyer sur le bouton: espace_client 
-cocher tout les créneaux et tout puis appuyer sur "générer les stats"
-essayer les autres possibilitées

4: retourner dans l'espace administrateur
5: Choisissez l'adresse de votre cinéma
6: cliqué sur le lien (exemple: 'Cinéma1: espace gestionnaire')
7: essayer toutes les possibilitées: 
-tri affichage
-création de séance/infos_films/infos_cinéma
-modifications de séance/infos_films/infos_cinéma
-suppression d'une ou plusieurs: séance/infos_films/infos_cinéma


III: Tester l'espace gestionnaire:

1: depuis l'accueil aller dans 'espace gestionnaire'
2: saisissez les identifiants du gestionnaire du cinéma1 ou du cinéma2 (voir dans bdd= kinepolise et table= password)(soit: gestionnaire_cinema1= username= john et password= ripples1947 et gestionnaire cinéma2= username= Billy et  password= billy1)
3: cliquer sur le lien: accèder à mon espace
4: essayer toutes les possibilitées: 
-tri affichage
-création de séance/infos_films/infos_cinéma
-modifications de séance/infos_films/infos_cinéma
-suppression d'une ou plusieurs: séance/infos_films/infos_cinéma



Pour analiser le code: 
laisser vous porter par l'organisation des dossiers + des fichiers + les commentaires du code !