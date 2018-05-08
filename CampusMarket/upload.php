<?php
$target_dir = "images/";

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

$uploadOk = 1;
$error = 0;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . random_string(50) . "." . $imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        $error = "File is not an image.";
        $uploadOk = 0;
    }
}

// Make sure required fields are present
if($_POST['title'] == "") {
	$uploadOk = 0;
	$error = "Title is required. ";
}

if($_POST['descript'] == "") {
	$uploadOk = 0;
	$error = "Description is required. ";
}

if($_POST['price'] == "") {
	$uploadOk = 0;
	$error = "Price is required. ";
}

if($_POST['pickup'] == "") {
	$uploadOk = 0;
	$error = "Date for pickup or delivery is required. ";
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $error = "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header( "refresh:1;url=http://localhost/account.php?name=".$_POST['user']."&pass=".$_POST['pass']."&err=".$error);
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$myfile = fopen("listings.txt", "a+");
		fwrite($myfile, "User: " . $_POST['user'] . "\n");
		fwrite($myfile, $target_file . "\n");
		fwrite($myfile, $_POST['title'] . "\n");
		fwrite($myfile, $_POST['descript'] . "\n");
		fwrite($myfile, "$" . $_POST['price'] . "\n");
		fwrite($myfile, $_POST['pickup'] . "\n");
		fclose($myfile);
		header( "refresh:1;url=http://localhost/account.php?name=".$_POST['user']."&pass=".$_POST['pass']."&err=Listing has been successfully added.");
    } else {
        header( "refresh:1;url=http://localhost/account.php?name=".$_POST['user']."&pass=".$_POST['pass']."&err=broke");
    }
}
?>