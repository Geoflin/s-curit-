<?php
        $pdo = new PDO('mysql:host=localhost;dbname=kinepolise', 'root', '');
        $date_time = new DateTime($row['time_of_last_update']);

    


// $describeQuery = ;;
//echo 'date: '.date('j F, Y', $dateSeance).'</br>';
//$dateSeance= $date['DateOfNewSeance'];
//$nextXmas = mktime(0, 0, 0, 12, 25);
//foreach ($pdo->query('SELECT DATE_FORMAT(DateOfNewSeance)FROM seance_cinema1', PDO::FETCH_ASSOC) as $date) {}