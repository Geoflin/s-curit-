<?php
        //On insére valeure formulaire dans base de données
                if ($pdo->exec('INSERT INTO info_film (FilmName, Duree) VALUES ("'. $_POST['FilmName'] . '", "' . $_POST['Duree'] .'");') !== false){};