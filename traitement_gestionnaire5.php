<HTML>
 <HEAD>
  <TITLE>Kinepolise/reservation/confirmation</TITLE>
 </HEAD>

 <?php
 function unix_timestamp($datetime)
{
	$datetime = str_replace(array(' ', ':'), '-', $datetime);
	$c    = explode('-', $datetime);
	$c    = array_pad($c, 6, 0);
	array_walk($c, 'intval');
 
	return mktime($c[3], $c[4], $c[5], $c[1], $c[2], $c[0]);
} 


    $pdo = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
    $kinepolise = new PDO('mysql:dbname=kinepolise;host=localhost', 'root', '');
        foreach ($pdo->query('SELECT FilmName, DateSeanceBegin, DateSeanceEnd, SalleName FROM seance_cinema1 WHERE Id=(SELECT max(Id) FROM seance_cinema1);')as $maxid) {
            echo $_POST['FilmName'];
            $FilmName= $maxid['FilmName'];
            $DateSeanceBegin= $maxid['DateSeanceBegin'];
            $DateSeanceEnd= $maxid['DateSeanceEnd'];
            
            $Unix_DateSeanceBegin = unix_timestamp($maxid['DateSeanceBegin']);
            $Unix_fusionDateBegin = unix_timestamp($fusionDateBegin_AjouterSeance);
        };
        if (isset($Unix_DateSeanceBegin)) {
          if (($FilmName == $_POST['FilmName'] && $Unix_DateSeanceBegin != $Unix_fusionDateBegin) || ($FilmName != $_POST['FilmName'] && $Unix_DateSeanceBegin != $Unix_fusionDateBegin)) {
            if ($kinepolise->exec('INSERT INTO seance_cinema1 (FilmName, DateSeanceBegin, DateSeanceEnd, SalleName, Nombre_de_place) VALUES ("'. $_POST['FilmName'] . '", "' . $fusionDateBegin_AjouterSeance . '", "' . $fusionDateEnd_AjouterSeance .'", "' . $_POST['SalleName'] .'", "' . $_POST['Nombre_de_place'] .'");') !== false) {}
                }
            } else {
              if ($kinepolise->exec('INSERT INTO seance_cinema1 (FilmName, DateSeanceBegin, DateSeanceEnd, SalleName, Nombre_de_place) VALUES ("'. $_POST['FilmName'] . '", "' . $fusionDateBegin_AjouterSeance . '", "' . $fusionDateEnd_AjouterSeance .'", "' . $_POST['SalleName'] .'", "' . $_POST['Nombre_de_place'] .'");') !== false) {}
        }