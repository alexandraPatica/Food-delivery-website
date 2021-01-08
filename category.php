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
	$sql = "SELECT * FROM food_subcategory WHERE subcategory_id =" .$_GET['id'].";";
	$result1 = $conn->query($sql);
	
	if ($result1->num_rows > 0) {
	while($row = $result1->fetch_assoc()){
	
		echo '<!-- products -->
					<div class="works" id="work">
						<div class="container">
							<!-- default heading -->
							<div class="default-heading">
								<!-- heading -->
								<h2>'.$row["subcategory_name"].'</h2>
								<!-- paragraph -->
								<p>There are now a set available here in three<br>colours and in a banner sizes.</p>
							</div>
							<div class="row">';
							
							
								$sql2 = "SELECT * FROM product JOIN food_subcategory ON product.subcategory_id = food_subcategory.subcategory_id WHERE food_subcategory.subcategory_id =".$_GET['id'].";";
								$result2 = $conn->query($sql2);
							if ($result2->num_rows > 0) {
							while($row2 = $result2->fetch_assoc()) {
								echo '<a href="product.php?id='.$row2["product_id"].'"><div class="col-md-3">
									<!-- work item -->
									<div class="work-item">
										<!-- work details image -->
										<img src="'.$row2["image"].'" alt="" style="width:300px;height:300px;"/>
										<!-- heading -->
										<h3><a href="product.php?id='.$row2["product_id"].'">'.$row2["product_name"].'</a></h3>
										<!-- brand org -->
										<span class="org">'.$row2["product_price"].'</span>
									</div>
								</div></a>';
							}
							}
						echo'
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