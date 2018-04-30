<?php
$name = $_GET['name'];

function getAccountInfo() {
	global $name;

	$accountInfo = array();
	$myfile = fopen("accounts.txt", "r") or die("Unable to open file!");
	while(!feof($myfile)) {
		$line = fgets($myfile);
		$line = str_replace("\n", "", $line);
		if($line == $name) {
			array_push($accountInfo, $line);
			array_push($accountInfo, fgets($myfile));
			array_push($accountInfo, fgets($myfile));
		}
	}
	fclose($myfile);
	return $accountInfo;
}
$list = getAccountInfo();
?>
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
				<div class="w3-right w3-padding-16"><form action="login.php" method="get"><input type="submit" value="Accounts"></form></div>
				<div class="w3-center w3-padding-16">Campus Market</div>
			</div>
		</div>
	

		<!-- !PAGE CONTENT! -->
		<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
		  
		  <!-- Seller Info -->
		  <h1>Seller Name: <?php echo substr($list[0], 6);?></h1>
		  <h1>Seller Venmo: <?php echo $list[2];?></h1>
		  <h1>Price: <?php echo $_GET['price']?></h1>
		  <hr>
		  
		  <!-- Search -->
		  <div class="w3-center w3-padding-32">
			  <form action="/search.php" method="get" target="_self">
			    <input type="text" name="search" value="Search Criteria...">
			    <input type="submit" value="search">
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