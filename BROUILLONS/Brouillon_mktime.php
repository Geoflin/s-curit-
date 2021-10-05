<form method="post" action="">
<input type="int" required="required" name="DateOfNewSeance" id="DateOfNewSeance" placeholder="Saisissez Date de séance">
<button name="ajoutseance" type="submit">Créer nouvelle séance</button>
</form>

<?php 
//echo '05/10/2021 09:22:00 : '.date('d/m/Y H:i:s', mktime(9, 22, 0, 12, 34, 2019)).'<br>';
$nextXmas1 = mktime(0, 0, 0, 10, 05, 2021);
$nextXmas2 = mktime(0, 0, 0, 10, 05, 2021);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
if($nextXmas1 == $nextXmas2){
    $dateBegin= strftime('%A %d %B %Y %I:%M:%S', $nextXmas1);
    echo $dateBegin;
}

//echo 'Le 5 Octobre '.date('Y', $nextXmas).' nous serons le '.date('l', $nextXmas) .' '.date('d', $nextXmas).' '.date('M', $nextXmas).' '.date('Y', $nextXmas);
//echo '03/01/2020 00:00:00 : '.date('d/m/Y H:i:s', mktime(0, 0, 0, 12, 34, 2019)).'<br>';