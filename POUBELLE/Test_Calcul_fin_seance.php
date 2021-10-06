<?php
	$date = '2021-10-06 15:59:00';
	$heure = 2;
	$minute = 00;
	echo "$date<br>";
	echo date('Y-m-d H:i:s',strtotime("+$heure hours $minute minutes", strtotime($date))) . '<br>';
?>


Time durée du film= 02:00:00
Unix durée du film= 1007074800

Date début du film= 2021-10-06 15:59:00
Unix durée du film= 1007074800

Somme Timestamp= 2640603540

Time Fin de séance= 13:59

//on explose durée du film en heure et minute

<?php
//On concatene date seance avec durée film
//On convertit tout en timestampsUnix
echo 'Time durée du film= '.$dureeFilm.'</br>';

echo 'Date début du film= '.$DateSeanceBegin1.'</br>';
$Unix_Date_debut_film= unix_timestamp($DateSeanceBegin1);
echo 'Unix durée du film= '.$Unix_dureeFilm.'</br></br>';
//On aditionne les Timestamps
$HourEndSeanceSet = new DateTime(); 
$HourEndSeance= $Unix_Date_debut_film + $Unix_dureeFilm;
echo 'Somme Timestamp= '.$HourEndSeance.'</br></br>';
//On convertit somme timestamps en dateTime
$HourEndSeanceSet->setTimestamp($HourEndSeance);
echo 'Time Fin de séance= '.$HourEndSeanceSet->format('H:i').'</br></br>';