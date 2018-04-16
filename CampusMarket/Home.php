<!DOCTYPE html>
<html>
	<title>Campus Market</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">

	<?php
		function readListings() {
			$listings = array();
			$myfile = fopen("listings.txt", "r") or die("Unable to open file!");
			while(!feof($myfile)) {
				array_push($listings, fgets($myfile));
			}
			fclose($myfile);
			return $listings;
		}
		$listings = readListings();
	
		$item = 0;
	?>

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
		  <a href="#items" onclick="w3_close()" class="w3-bar-item w3-button">Items</a>
		  <a href="#add" onclick="w3_close()" class="w3-bar-item w3-button">Add Listing</a>
		  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
		</nav>

		<!-- Top menu -->
		<!-- Navigation Button -->
		<div class="w3-top">
			<div class="w3-white w3-xlarge" style="max-width:1300px;margin:auto">
				<div id="nav"class="w3-button w3-padding-16 w3-left" onclick="is_clicked()">☰</div>
				<div class="w3-right w3-padding-16"><button type="button">Login</button></div>
				<div class="w3-center w3-padding-16">Campus Market</div>
			</div>
		</div>
	

		<!-- !PAGE CONTENT! -->
		<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

		  <!-- First Photo Grid-->
		  <div class="w3-row-padding w3-padding-16 w3-center" id="items">
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

		  <!-- Pagination 
		  <div class="w3-center w3-padding-32">
		    <div class="w3-bar">
		      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
		      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
		      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
		      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
		      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
		      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
		    </div>
		  </div> -->
  		
	  	  <hr id="add">

		  <!-- About Section -->
		  <div class="w3-container w3-padding-32 w3-center">  
			  <h3>Add Listing</h3>
			  <form action="upload.php" method="post" enctype="multipart/form-data" target="Home.php">
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
		
		  <hr id="about">

		  <!-- About Section -->
		  <div class="w3-container w3-padding-32 w3-center">  
		    <img src="images/miamilogo.jpg" alt="Logo" class="w3-image" style="display:block;margin:auto" width="800">
		    <div class="w3-padding-32">
		      <h4><b>Conveniently Buy and Sell Home Necessities!</b></h4>
		      <h6><i>Make Decorating Easier</i></h6>
		      <p>The Campus Market is a web application to make moving in and out of campus and near campus housing easier. The software is designed for universities. Students can buy or sell their used items in their own communities. Since all transactions occur among people who are nearby each other, they can drop off or pick up items easily and avoid shipping costs.</p>
		    </div>
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