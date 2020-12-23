<html>
	<head>
		<meta charset="utf-8">
		<title>FoodXpert</title>
		
		<!-- Favicon -->
		 <link href="img/favicon.png" rel="icon">
		 
		<!-- Style -->
		<link href="css/style.css" rel="stylesheet">
	</head>
	
<body>
	<?php include 'header.php';?>
	
	<!-- banner -->
			<div class="banner" id="image">
				<div class="container">
					<!-- heading -->
					<h2>Welcome to FoodXpert!</h2>
					<!-- sub heading -->
					<h3>We feed your stomach and your soul!</h3>
					<br><br><br><br>
					<!-- access button -->
					<a href="#work" class="btn btn-default">SEE OUR BESTS</a>
				</div>
			</div>
			<!-- banner end -->
			
			
			

			<!-- The Modal -->
			<div id="myModal" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
				<span class="close">&times;</span>
				
				
				  <form action="/action_page.php" class="form-container">
					<h1>Login</h1>

					<label for="email"><b>Email</b></label>
					<input type="text" placeholder="Enter Email" name="email" required>

					<label for="psw"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" required>

					<button type="submit" class="btn1">Login</button>
				  </form>
				
			  </div>

			</div>
			
			
			<div class="works" id="work">
				<div class="container">
					<!-- default heading -->
					<div class="default-heading">
						<!-- heading -->
						<h2>Our bests</h2>
						<!-- paragraph -->
						<p>Here are our most ordered dishes.</p>
					</div>
					<div class="row">
					<?php
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "food_delivery";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);

						// Check connection
						if ($conn->connect_error) {
						  die("Connection failed: " . $conn->connect_error);
						}
						
						
						$sql = "SELECT product_name, product_price, image FROM product
								ORDER BY order_frequency DESC;";
						$result = $conn->query($sql);
						$var = 0;
						while($var<4 && $row = $result->fetch_assoc()){
							echo '<a href="product.html"><div class="col-md-3">
								<!-- work item -->
								<div class="work-item">
									<!-- work details image -->
									<img src="' .$row["image"]. '" alt="" style="width:300px;height:300px;"/>
									<!-- heading -->
									<h3><a href="product.html">'.$row["product_name"].'</a></h3>
									<!-- brand org -->
									<span class="org">$'.$row["product_price"].'</span>
								</div>
							</div></a>';
							$var++;
						}
					?>
					</div>
				</div>
			</div>

 </div>

</div>
			
<script>
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on the button, open the modal
	btn.onclick = function() {
	  modal.style.display = "block";
	}
	
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}
	
	

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
		modal.style.display = "none";
	  }
	}
</script>
</body>

</html>