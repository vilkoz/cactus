<?php
	header("Content-Type: text/html; charset=utf-8");
	$file = file_get_contents("file.txt");
	$arr = array();
	$arr = explode("},{", $file);
	foreach ($arr as $key => $value) {
		$arr[$key] = str_replace('"', "", $value);
	}
	print("<pre>");
	print_r($arr);
	print("</pre>");
?>
