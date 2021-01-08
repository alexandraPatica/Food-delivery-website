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
	<?php include 'include/header.php';?>
	<?php include 'include/dbconnect.php';?>
	
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
		
		
<?php		
	$sql = "SELECT * FROM product WHERE product_id =" .$_GET['id'].";";
	$result1 = $conn->query($sql);
	
	if ($result1->num_rows > 0) {
		while($row = $result1->fetch_assoc()){
			echo
			'<!-- products -->
					<div class="works" id="work">
						<div class="container">
							<!-- default heading -->
							<div class="default-heading">
								<!-- heading -->
								<h2>'.$row["product_name"].'</h2>
								<!-- paragraph -->
								<p>There are now a set available here in three<br>colours and in a banner sizes.</p>
							</div>
							
							<div style="margin: 100px;">
							<img src="'.$row["image"].'" alt="Smiley face" style="float:left;width:400px;height:400px;">
							<p>Ingredients: '.$row["ingredients"].'</p>
							<p>Price: $'.$row["product_price"].'</p>
							<button class="dropbtn">Add to Cart</button>
							</div>
						</div>
				</div>';
		}
	}
?>
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