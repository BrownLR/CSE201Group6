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
		  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
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
		  
		  <!-- Search -->
		  <h1 class="w3-center">Find unique items to turn your <br> house into a home.</h1>
		  <div class="w3-center w3-padding-32">
			  <form action="/search.php" method="get" target="_self">
			    <input type="text" name="search" onfocus="this.value=''" value="Search Criteria...">
			    <input type="submit" value="search">
			  </form>
	  	  </div>
		  <h3 class="w3-center">Login or sign up to post your own items for sale.</h3>
  		
		  <hr id="about">

		  <!-- About Section -->
		  <div class="w3-container w3-padding-32 w3-center">  
		    <img src="images/miamilogo.jpg" alt="Logo" class="w3-image" style="display:block;margin:auto" width="800">
		    <div class="w3-padding-32">
		      <h4><b>Conveniently Buy and Sell Home Necessities!</b></h4>
		      <h6><i>Make Decorating Easier</i></h6>
		      <p>The Campus Market is your local tool to make moving in and out of campus and near campus housing easier. The software is designed for universities. Students can buy or sell their used items in their own communities. Since all transactions occur among people who are nearby each other, they can drop off or pick up items easily and avoid shipping costs.</p>
		    </div>
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