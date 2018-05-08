<?php
$file = 'listings.txt';
$searchfor = $_GET['search'];

// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($file);

// escape special characters in the query
$pattern = preg_quote($searchfor, '/');
$pattern = strtolower($pattern);
$pattern = str_replace("\\", "", $pattern);

function getMatches($str) {
	$images = array();
	$myfile = fopen("listings.txt", "r") or die("Unable to open file!");
	$lastImg = "";
	while(!feof($myfile)) {
		$line = fgets($myfile);
		$line = str_replace("\n", "", $line);
		if (substr($line, 0, 1) == "$") {
			continue;
		}
	    if (substr($line, 0, 6) == "images") {
			$lastImg = $line;
			continue;
	    }
		if (strpos($line, $str) !== false) {
			if (!in_array($lastImg, $images)) {
				array_push($images, $lastImg);
			}
		}
	}
	fclose($myfile);
	return $images;
}

$images = getMatches($pattern);

function getListings($img) {
	$listings = array();
	$myfile = fopen("listings.txt", "r") or die("Unable to open file!");
	while(!feof($myfile)) {
		$line = fgets($myfile);
		$line = str_replace("\n", "", $line);
		if (in_array($line, $img)) {
			array_push($listings, $line);
			array_push($listings, fgets($myfile));
			array_push($listings, fgets($myfile));
			array_push($listings, fgets($myfile));
			array_push($listings, fgets($myfile));
		}
	}
	fclose($myfile);
	return $listings;
}

$listings = getListings($images);
$item = 0;
?>

<html>
	<title>Campus Market: Listings</title>
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
			height: 450px;
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
			left: 100px;
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
		  <a href="http://localhost/Home.php#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
		</nav>

		<!-- Top menu -->
		<!-- Navigation Button -->
		<div class="w3-top">
			<div class="w3-white w3-xlarge" style="max-width:1300px;margin:auto">
				<div id="nav"class="w3-button w3-padding-16 w3-left" onclick="is_clicked()">☰</div>
				<div class="w3-right w3-padding-16"><form action="login.php" method="get"><input type="submit" value="Login"></form></div>
				<div class="w3-center w3-padding-16">Campus Market</div>
			</div>
		</div>
	

		<!-- !PAGE CONTENT! -->
		<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
		  <hr id="items">
  		<?php
  			if ($listings[$item] == null) {
  				echo 'No items matching search';
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
  						echo '<a href="http://localhost/remove.php?img='.$img.'&purchase=1" class="button">Buy</a></br>';
						echo '<img src=\'' . $img . '\'style="width:200px;height:200px;" />';
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
		  
		  <!-- Search -->
		  <div class="w3-center w3-padding-32">
			  <h2>Search again...</h2>
			  <form action="/search.php" method="get" target="_self">
			    <input type="text" name="search" onfocus="this.value=''" value="Search Criteria...">
			    <input type="submit" value="search">
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