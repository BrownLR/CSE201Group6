<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$error = 0;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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
// Check if file already exists
if (file_exists($target_file)) {
    $error = "Sorry, file already exists.";
    $uploadOk = 0;
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
		$myfile = fopen("listings.txt", "a");
		fwrite($myfile, "User: " . $_POST['user'] . "\n");
		fwrite($myfile, $target_file . "\n");
		fwrite($myfile, $_POST['title'] . "\n");
		fwrite($myfile, $_POST['descript'] . "\n");
		fwrite($myfile, "$" . $_POST['price'] . "\n");
		fclose($myfile);
		header( "refresh:1;url=http://localhost/account.php?name=".$_POST['user']."&pass=".$_POST['pass']."&err=The+file+". basename( $_FILES["fileToUpload"]["name"]). "+has+been+uploaded.");
    } else {
        header( "refresh:1;url=http://localhost/account.php?name=".$_POST['user']."&pass=".$_POST['pass']."&err=broke");
    }
}
?>