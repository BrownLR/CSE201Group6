<?php
$uploadOk = 1;
$error = '';
$username = $_POST['name'];
$myfile = fopen("accounts.txt", "a+") or die("Unable to open file!");

while(!feof($myfile)) {
	$line = fgets($myfile);
	$line = str_replace("\n", "", $line);
    if (substr($line, 6) == $username) {
		$uploadOk = 0;
    }
}
if ($uploadOk == 0) {
	$error = "Username in use. ";
}

if($_POST['pass'] != $_POST['cpass']) {
	$uploadOk = 0;
	$error = "Passwords do not match. ";
}

if ($uploadOk == 1) {
	fwrite($myfile, "User: " . $_POST['name'] . "\n");
	fwrite($myfile, $_POST['pass'] . "\n");
	fwrite($myfile, $_POST['venmo'] . "\n");
	fclose($myfile);
	header( "refresh:1;url=http://localhost/account.php?name=".$_POST['name']."&pass=".$_POST['pass']."&submit=Login" );
} else {
	header( "refresh:1;url=http://localhost/login.php?err=".$error);
}
?>