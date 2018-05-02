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
	if ($username == '') {
		$valid = 0;
	}
	if ($valid == 0) {
		header("refresh:1;url=http://localhost/login.php?err=Invalid+Username+or+Password");
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
			array_push($listings, fgets($myfile));
	    }
	}
	fclose($myfile);
	$item = 0;
	
	if($_GET['err'] != '') {
		$message = $_GET['err'];
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>

<html>
	<title>Campus Market</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
	
	<style>
		/* Set style for each item posting */
		#item {
			border-color: lightgray;
			border-style: solid;
			border-width: 1px;
			border-radius: 12px;
			height: 400px;
		}
		a.button {
		    -webkit-appearance: button;
		    -moz-appearance: button;
		    appearance: button;
			padding: 5px 11px;
		    text-decoration: none;
		    color: initial;
			position: relative;
			bottom: 10px;
			left: 90px;
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
				<div class="w3-center w3-padding-16"><?php echo $username ?>'s Page</div>
			</div>
		</div>
	
		<!-- !PAGE CONTENT! -->
		<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
		<?php
			if ($listings[$item] == null) {
				echo 'User has no listings';
			}
		  	for ($i = 0; $i < 3 && $listings[$item] != null; ++$i) {
		  		echo '<div class="w3-row-padding w3-padding-16 w3-center">';
				for ($j = 0; $j < 4 ; ++$j) {
					if ($listings[$item] == null) {
						break 1;
					} else {
  						echo '<div class="w3-quarter">';
						echo '<div id="item" class="w3-padding-16">';
						$img = $listings[$item];
						echo '<a href="http://localhost/remove.php?img='.$img.'&user='.$username.'&pass='.$password.'&purchase=0" class="button">Delete</a></br>';
						echo '<img src=' . $img . 'style="width:200px;height:200px;border-radius:10%;" />';
						$item = $item + 1;
						echo '<h3>' . $listings[$item] . '</h3>';
						$item = $item + 1;
						echo '<p>' . $listings[$item] . '</br>';
						$item = $item + 1;
						echo $listings[$item] . '</br>';
						$item = $item + 1;
						echo "<b>Pickup By: " . $listings[$item] . '</b></p>';
						$item = $item + 1;
						echo '</div></div>';
					}
				}
				echo '</div>';
			}
		 ?>
  		
	  	  <hr id="add">

		  <!-- Add Listing Section -->
		  <div class="w3-container w3-padding-32 w3-center">  
			  <h3>Add Listing</h3>
			  <form action="upload.php" method="post" enctype="multipart/form-data">
			    	<input type="hidden" name="user" value="<?php echo $username; ?>">
					<input type="hidden" name="pass" value="<?php echo $password; ?>">
					Select image to upload: <br>
			    	<input type="file" name="fileToUpload" id="fileToUpload">
					<br>
			  		Listing Title:<br>
			    	<input type="text" onfocus="this.value=''" name="title" value="Item Name">
			    	<br>
			    	Listing Description:<br>
			    	<input type="text" onfocus="this.value=''" name="descript" value="info...">
					<br>
			  		Price ($):<br>
			    	<input type="text" onfocus="this.value=''" name="price" value="0.00">
					<br>
			  		Pickup By Date:<br>
			    	<input type="date" name="pickup" value="MM/DD/YYYY">
			    	<br><br>
			      <input type="submit" value="Add Listing" name="submit">
			  </form>
		  </div>
		  <hr>
  
		  <!-- Footer -->
		  <footer class="w3-row-padding w3-padding-32">
		    <div class="w3-third">
		      <h3>© 2018</h3>
		    </div>
  
		    <div class="w3-third">
      
		    </div>
		  </footer>

		<!-- End page content -->
		</div>

	</body>
</html>