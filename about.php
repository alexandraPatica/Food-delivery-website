<html>
	<head>
		<meta charset="utf-8">
		<title>FoodXpert</title>
		
		<!-- Favicon -->
		 <link href="img/favicon.png" rel="icon">
		 
		<!-- Style -->
		<link href="css/style.css" rel="stylesheet">
	</head>
	
<body class="about-img">
	<?php include 'include/header.php';?>
	
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
						<h2 style="color: white; font-family: "Eras ITC", "Eras Bold ITC",  sans-serif ;">About Us</h2>
						<br><br><br><br>
						<!-- paragraph -->
						<div class="columns">
						<p style="color: white;">We are a restaurant which sells food and drinks. The food is of good quality and the delivery is very fast. We make everything possible for our clients. You can search us on Facebook, Instagram and Twitter.</p>
						<p style="color: white;">Email: food@expert.com Phone: 5423147895 We are open for job applications!</p><br>
						<p style="color: white;">Address: Food Street, no 10, Foodland</p>
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