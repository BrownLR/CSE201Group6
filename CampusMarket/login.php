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
		if($_GET['err'] != '') {
			$message = $_GET['err'];
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	?>
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
	  	  <hr>

		  <!-- Login -->
		  <div class="w3-container w3-padding-32 w3-half w3-center">  
			  <h3>Login</h3>
			  <form action="account.php" method="get" enctype="multipart/form-data">
					Username:<br>
			    	<input type="text" name="name">
			    	<br>
			    	Password:<br>
			    	<input type="password" name="pass">
					<br><br>
			      <input type="submit" value="Login" name="submit">
			  </form>
		  </div>
		 
		  <!-- Sign up -->
		  <div class="w3-container w3-padding-32 w3-half w3-center">  
			  <h3>Sign Up</h3>
			  <form action="uploadAccount.php" method="post" enctype="multipart/form-data">
			    	Venmo:<br>
			    	<input type="text" name="venmo">
					<br>
			    	Email:<br>
			    	<input type="text" name="email">
					<br>
					Username:<br>
			    	<input type="text" name="name">
			    	<br>
			    	Password:<br>
			    	<input type="password" name="pass">
					<br>
			    	Confirm Password:<br>
			    	<input type="password" name="cpass">
					<br><br>
			      <input type="submit" value="Sign Up" name="submit">
			  </form>
		  </div>
		  <div class="w3-container w3-padding-32 w3-center"></div>
		  
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