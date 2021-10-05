        <!--submit_datetime_to_timestampUnix-->
        <?php if (isset($_POST['ajoutseance'])){
function unix_timestamp($datetime)
{
	$datetime = str_replace(array(' ', ':'), '-', $datetime);
	$c    = explode('-', $datetime);
	$c    = array_pad($c, 6, 0);
	array_walk($c, 'intval');
 
	return mktime($c[3], $c[4], $c[5], $c[1], $c[2], $c[0]);
} 
 echo 'Timestamp UNIX :'.unix_timestamp($_POST['DateSeanceBegin']);
 $UnixDateOfNewSeance = unix_timestamp($_POST['DateSeanceBegin']);
   
   //submit_timestampUnix_to_datetime
         $date = new DateTime(); 
         $date->setTimestamp($UnixDateOfNewSeance); 
         $variable = $date->format('Y-m-d'); 
         echo "The datetime is $variable."; 
        }
         ?> 