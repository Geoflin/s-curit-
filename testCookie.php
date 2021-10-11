<?php

// 1ère étape : déclaration
setcookie('cartUpdate', 'username');

// Seconde étape, car les cookies ne sont accessibles qu'après un rechargement de la page

// Affichage
print_r($_COOKIE['cartUpdate']);

// Suppression
setcookie('cartUpdate', '', time() - 3600);
?>