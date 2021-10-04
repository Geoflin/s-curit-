
        <h2>Date vers timestamp</h2>
          <form method="POST" action="">
          <label for="date_to_timestamp">Date :</label>
          <input type="text" required="required" type="dateTime" id="date_to_timestamp" name="date_to_timestamp" data-date-format="AAAA-MM-JJ HH:MM:SS" placeholder="2021-10-04 11:28:37">
          <input type="submit" value="Convertir en timestamp" name="submit_date_to_timestamp"/>
        </form>

        <?php if (isset($_POST['submit_date_to_timestamp'])){
function unix_timestamp($datetime)
{
	$datetime = str_replace(array(' ', ':'), '-', $datetime);
	$c    = explode('-', $datetime);
	$c    = array_pad($c, 6, 0);
	array_walk($c, 'intval');
 
	return mktime($c[3], $c[4], $c[5], $c[1], $c[2], $c[0]);
} ?>
Timestamp UNIX : <?php echo unix_timestamp($_POST['date_to_timestamp']) ?> 
<?php } ?>
  

        <h2>Timestamp vers date</h2>

        <form method="POST" action="">
          <label for="submit_timestamp_to_date">Timestamp :</label>
          <input type="text" required="required" id="timestamp_to_date" name="timestamp_to_date" placeholder="1633425582" />
          <input type="submit" value="Convertir en date" name="submit_timestamp_to_date"/>
        </form>

<?php if (isset($_POST['submit_timestamp_to_date'])){
         $date = new DateTime(); 
         $date->setTimestamp($_POST['timestamp_to_date']); 
         $variable = $date->format('Y-m-d H:i:s'); 
         echo "The datetime is $variable."; 
        }
         ?> 