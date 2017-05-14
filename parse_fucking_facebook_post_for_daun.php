<?php
	require_once 'Site.class.php';
	DB::init();
	header("Content-Type: text/html; charset=utf-8");
	$file = file_get_contents("file.txt");
	$arr = array();
	$arr = explode("},{", $file);
	foreach ($arr as $key => $value) {
		$arr[$key] = str_replace('"', "", $value);
		$tmp_arr = explode(":", $value);
		foreach ($tmp_arr as $tmp_key => $tmp_value)
		{
			if (preg_match("/.name/", $tmp_value))
			{
				// echo("name: ".explode(",",$tmp_arr[$tmp_key + 1])[0]."\n");
				$name = explode("\"",$tmp_arr[$tmp_key + 1])[1];
				break ;
			}
		}
		foreach ($tmp_arr as $tmp_key => $tmp_value)
		{
			if (preg_match("/.longitude/", $tmp_value))
			{
				// echo("latitude: " . explode(",",$tmp_arr[$tmp_key])[0]."\n");
				$geolocation = substr(explode(",",$tmp_arr[$tmp_key])[0], 0, 9) . " ";
				// echo("longitude: " . explode(",",$tmp_arr[$tmp_key + 1])[0]."\n");
				$geolocation .= substr(explode(",",$tmp_arr[$tmp_key + 1])[0], 0, 9);
				// $geolocation .= explode(",",$tmp_arr[$tmp_key + 1])[0];
				break ;
			}
		}
		foreach ($tmp_arr as $tmp_key => $tmp_value)
		{
			if (preg_match("/.start_time/", $tmp_value))
			{
				// echo("latitude: " . explode(",",$tmp_arr[$tmp_key])[0]."\n");
				$time = explode(",",$tmp_arr[$tmp_key + 1])[0];
				$time = explode("T", $time)[0];
				$time = substr($time, 1);
				break ;
			}
		}
		echo ("name: ".$name ."\n		geo: ". $geolocation ."\n		time: ". $time."\n");
		add_event(0, $time, $geolocation, $name, "null");

	}
	// print("<pre>");
	// print_r($arr);
	// print("</pre>");
?>
