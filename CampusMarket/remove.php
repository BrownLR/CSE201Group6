<?php

$img = $_GET['img'];
$name = '';
$price = '';
$pickup = '';
function removeListing($img) {
	global $name, $price, $pickup;
	$t = '';
	$prevLine = "";
	$myfile = fopen("listings.txt", "r") or die("Unable to open file!");
	while(!feof($myfile)) {
		$line = fgets($myfile);
		$line = str_replace("\n", "", $line);
		if($line == $img) {
			$name = $prevLine;
			$t = substr ( $t, 0, strlen($t) - strlen($prevLine) - 1);
			$line = fgets($myfile);
			$line = fgets($myfile);
			$line = fgets($myfile);
			$price = $line;
			$line = fgets($myfile);
			$pickup = $line;
		} else {
			$t = $t.$line."\n";
		}
		$prevLine = $line;
	}
	fclose($myfile);
	return $t;
}

$lines = removeListing($img);
$myfile = fopen("listings.txt", "w") or die("Unable to open file!");
fwrite($myfile, $lines);
unlink($img);
fclose($myfile);
header( "refresh:1;url=http://localhost/purchase.php?name=".$name."&price=".$price."&date=".$pickup);
?>