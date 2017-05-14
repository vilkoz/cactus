<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("DB.class.php");
require_once("Site.class.php");
session_start();
	DB::init();
	$events = array();
			if ($res = DB::query("SELECT * FROM events")) {
				$tmp = $res;
				while ($row = $tmp->fetch_assoc()) {
					array_push($events, $row);
				}
			}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
	foreach ($events as $key => $value) {
		print("<div class='event'>");
		print("<label>  Name event</label><span>");
		print($value['description']);
		print("</span>");
		print("<br><label>  geoposition</label><span>");
		print($value['geopos']);
		print("</span>");
		print("<br><label>  Date</label><span>");
		print($value['date']);
		print("<br></span>");
		print("<input type='button' value='JOIN'>");
	}
	 ?>
</body>
</html>
