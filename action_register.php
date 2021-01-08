

<html>
	<head>
		<meta charset="utf-8">
		<title>FoodXpert</title>
		
		<!-- Favicon -->
		 <link href="img/favicon.png" rel="icon">
		 
		<!-- Style -->
		<link href="css/style.css" rel="stylesheet">
	</head>
	
<body class="reg-img">
	<?php include 'include/header.php';?>
	<?php include 'include/dbconnect.php';?>
	
	
	<!-- The Modal -->
			<div id="myModal" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
				<span class="close">&times;</span>
				
				
				  <form action="/Food-delivery-website/action_page.php" class="form-container">
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
					<div class="default-heading">
					</div>
					<form id="regForm">
					
					<?php
					
					$sql = "SELECT user_name FROM user WHERE user_name ='".$_POST["uname"]."';";
					$result1 = $conn->query($sql);
					
					if ($result1->num_rows > 0){
						echo '<h1>Username "'.$_POST["uname"].'" already exists!';
					}
					else{
						$sql2 = "INSERT INTO user (user_name, user_password, user_first_name, user_last_name, user_contact, user_address)
						VALUES ('".$_POST["uname"]."', '".$_POST["pword"]."', '".$_POST["fname"]."', '".$_POST["lname"]."','"
						.$_POST["phone"]."','".$_POST["address"]."')";

						if ($conn->query($sql2) === TRUE) {
						  echo '<h1>Welcome '.$_POST["fname"].'</h1><br>
								<h1>You have been successfully registered!</h1>';
						} else {
						  echo "Error: " . $conn->error;
						}
					}
					?>
					</form>
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