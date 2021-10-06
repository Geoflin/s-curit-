        <!--submit_datetime_to_timestampUnix-->
        <?php
function unix_timestamp($datetime)
{
	$datetime = str_replace(array(' ', ':'), '-', $datetime);
	$c    = explode('-', $datetime);
	$c    = array_pad($c, 6, 0);
	array_walk($c, 'intval');
 
	return mktime($c[3], $c[4], $c[5], $c[1], $c[2], $c[0]);
} 
 $UnixDateSeanceBegin_Modifier_Seance = unix_timestamp($seance['DateSeanceBegin']);
   
   //submit_timestampUnix_to_datetime
   //Ajouter_Seance
         $date_Modifier_Seance = new DateTime(); 
         $date_Modifier_Seance->setTimestamp($UnixDateSeanceBegin_Modifier_Seance); 
         $format_date_Ajouter_Seance = $date_Modifier_Seance->format('Y-m-d');
         $format_HourBegin_Ajouter_Seance = $date_Modifier_Seance->format('H:i:s');
         ?> 