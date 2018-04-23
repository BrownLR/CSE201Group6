<!DOCTYPE html>
<html>
	<title>Campus Market</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
	
	<style>
		/* Set style for each item posting */
		#item {
			border-style: solid;
			border-width: 1px;
			height: 400px;
		}
	</style>

	<script>
	// Script to open and close sidebar
	var first_click = true;
	var nav = document.getElementById("nav");
	function w3_open() {
	    document.getElementById("mySidebar").style.display = "block";
	}
 
	function w3_close() {
	    document.getElementById("mySidebar").style.display = "none";
	}
	function is_clicked(){
		if (first_click){
			w3_open();
			first_click = false;
		}
		else {
			w3_close();
			first_click = true;
		}
	}
	</script>

<?php
	$file = 'accounts.txt';
	$username = $_GET['name'];
	$password = $_GET['pass'];
	
	$valid = 0;

	$myfile = fopen($file, "r") or die("Unable to open file!");
	
	while(!feof($myfile)) {
		$line = fgets($myfile);
		$line = str_replace("\n", "", $line);
	    if (substr($line, 6) == $username) {
			$line = fgets($myfile);
			$line = str_replace("\n", "", $line);
		    if ($line == $password) {
				$valid = 1;
				break;
		    } else {
				$valid = 0;
				break;
			}
	    }
	}
	if ($valid == 0) {
		echo '<a href="http://localhost/login.php?">Invalid Username of Password</a>'; 
		exit;
	}
	fclose($myfile);
	
	$file = 'listings.txt';
	$listings = array();
	$myfile = fopen($file, "r") or die("Unable to open file!");
	
	while(!feof($myfile)) {
		$line = fgets($myfile);
		$line = str_replace("\n", "", $line);
	    if (substr($line, 6) == $username) {
			array_push($listings, fgets($myfile));
			array_push($listings, fgets($myfile));
			array_push($listings, fgets($myfile));
			array_push($listings, fgets($myfile));
	    }
	}
	fclose($myfile);
	$item = 0;
?>

	<body>
		<!-- Sidebar (hidden by default) -->
		<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
		  <a href="javascript:void(0)" onclick="w3_close()"
		  class="w3-bar-item w3-button">Close Menu</a>
		  <a href="http://localhost/Home.php" onclick="w3_close()" class="w3-bar-item w3-button">Home</a>
		  <a href="#add" onclick="w3_close()" class="w3-bar-item w3-button">Add Listing</a>
		  <a href="http://localhost/Home.php#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
		</nav>

		<!-- Top menu -->
		<!-- Navigation Button -->
		<div class="w3-top">
			<div class="w3-white w3-xlarge" style="max-width:1300px;margin:auto">
				<div id="nav"class="w3-button w3-padding-16 w3-left" onclick="is_clicked()">☰</div>
				<div class="w3-right w3-padding-16"><form action="login.php" method="get"><input type="submit" value="Login"></form></div>
				<div class="w3-center w3-padding-16"><?php echo $username ?>'s Page</div>
			</div>
		</div>
	
		<!-- !PAGE CONTENT! -->
		<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
		  
		  <!-- First Photo Grid-->
		  <div class="w3-row-padding w3-padding-16 w3-center">
		    <div id="item" class="w3-quarter">
		      <div class="placehere">
		      	<img src="<?php echo $listings[$item]; ?>" style="width:200px;height:200px;" />
				<?php $item = $item + 1; ?>
				<h3> <?php echo $listings[$item]; ?> </h3>
				<?php $item = $item + 1; ?>
				<p> <?php echo $listings[$item]; ?> </br>
				<?php $item = $item + 1; ?> 
				<?php echo $listings[$item]; ?> </p>
				<?php $item = $item + 1; ?> 
		      </div>
		    </div>
		    <div id="item" class="w3-quarter">
		      <div class="placehere">
		      	<img src="<?php echo $listings[$item]; ?>" style="width:200px;height:200px;" />
				<?php $item = $item + 1; ?>
				<h3> <?php echo $listings[$item]; ?> </h3>
				<?php $item = $item + 1; ?>
				<p> <?php echo $listings[$item]; ?> </br>
				<?php $item = $item + 1; ?> 
				<?php echo $listings[$item]; ?> </p>
				<?php $item = $item + 1; ?>
		      </div>
		    </div>
		    <div id="item" class="w3-quarter">
		      <div class="placehere">
		      	<img src="<?php echo $listings[$item]; ?>" style="width:200px;height:200px;" />
				<?php $item = $item + 1; ?>
				<h3> <?php echo $listings[$item]; ?> </h3>
				<?php $item = $item + 1; ?>
				<p> <?php echo $listings[$item]; ?> </br>
				<?php $item = $item + 1; ?> 
				<?php echo $listings[$item]; ?> </p>
				<?php $item = $item + 1; ?>
		      </div>
		    </div>
		    <div id="item" class="w3-quarter">
		      <div class="placehere">
		      	<img src="<?php echo $listings[$item]; ?>" style="width:200px;height:200px;" />
				<?php $item = $item + 1; ?>
				<h3> <?php echo $listings[$item]; ?> </h3>
				<?php $item = $item + 1; ?>
				<p> <?php echo $listings[$item]; ?> </br>
				<?php $item = $item + 1; ?> 
				<?php echo $listings[$item]; ?> </p>
				<?php $item = $item + 1; ?>
		      </div>
		    </div>
		  </div>
  
		  <!-- Second Photo Grid-->
		  <div class="w3-row-padding w3-padding-16 w3-center">
		    <div id="item" class="w3-quarter">
		      <div class="placehere">
		      	<img src="<?php echo $listings[$item]; ?>" style="width:200px;height:200px;" />
				<?php $item = $item + 1; ?>
				<h3> <?php echo $listings[$item]; ?> </h3>
				<?php $item = $item + 1; ?>
				<p> <?php echo $listings[$item]; ?> </br>
				<?php $item = $item + 1; ?> 
				<?php echo $listings[$item]; ?> </p>
				<?php $item = $item + 1; ?>
		      </div>
		    </div>
		    <div id="item" class="w3-quarter">
		      <div class="placehere">
		      	<img src="<?php echo $listings[$item]; ?>" style="width:200px;height:200px;" />
				<?php $item = $item + 1; ?>
				<h3> <?php echo $listings[$item]; ?> </h3>
				<?php $item = $item + 1; ?>
				<p> <?php echo $listings[$item]; ?> </br>
				<?php $item = $item + 1; ?> 
				<?php echo $listings[$item]; ?> </p>
				<?php $item = $item + 1; ?>
		      </div>
		    </div>
		    <div id="item" class="w3-quarter">
		      <div class="placehere">
		      	<img src="<?php echo $listings[$item]; ?>" style="width:200px;height:200px;" />
				<?php $item = $item + 1; ?>
				<h3> <?php echo $listings[$item]; ?> </h3>
				<?php $item = $item + 1; ?>
				<p> <?php echo $listings[$item]; ?> </br>
				<?php $item = $item + 1; ?> 
				<?php echo $listings[$item]; ?> </p>
				<?php $item = $item + 1; ?>
		      </div>
		    </div>
		    <div id="item" class="w3-quarter">
		      <div class="placehere">
		      	<img src="<?php echo $listings[$item]; ?>" style="width:200px;height:200px;" />
				<?php $item = $item + 1; ?>
				<h3> <?php echo $listings[$item]; ?> </h3>
				<?php $item = $item + 1; ?>
				<p> <?php echo $listings[$item]; ?> </br>
				<?php $item = $item + 1; ?> 
				<?php echo $listings[$item]; ?> </p>
				<?php $item = $item + 1; ?>
		      </div>
		    </div>
		  </div>
  		
	  	  <hr id="add">

		  <!-- Add Listing Section -->
		  <div class="w3-container w3-padding-32 w3-center">  
			  <h3>Add Listing</h3>
			  <form action="upload.php" method="post" enctype="multipart/form-data" target="Home.php">
					Username: <br>
			    	<input type="text" name="user">
					<br>
					Select image to upload: <br>
			    	<input type="file" name="fileToUpload" id="fileToUpload">
					<br>
			  		Listing Title:<br>
			    	<input type="text" name="title" value="Item Name">
			    	<br>
			    	Listing Description:<br>
			    	<input type="text" name="descript" value="info...">
					<br>
			  		Price:<br>
			    	<input type="text" name="price" value="0.00">
			    	<br><br>
			      <input type="submit" value="Add Listing" name="submit">
			  </form>
		  </div>
		  <hr>
  
		  <!-- Footer -->
		  <footer class="w3-row-padding w3-padding-32">
		    <div class="w3-third">
		      <h3>FOOTER</h3>
		    </div>
  
		    <div class="w3-third">
      
		    </div>
		  </footer>

		<!-- End page content -->
		</div>

	</body>
</html>