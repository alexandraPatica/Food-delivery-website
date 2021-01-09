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
	<?php include 'include/loginform.php';?>
	
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
						
						
						$sql = "SELECT * FROM product
								ORDER BY order_frequency DESC;";
						$result = $conn->query($sql);
						$var = 0;
						while($var<4 && $row = $result->fetch_assoc()){
							echo '<a href="product.php?id='.$row["product_id"].'"><div class="col-md-3">
								<!-- work item -->
								<div class="work-item">
									<!-- work details image -->
									<img src="' .$row["image"]. '" alt="" style="width:300px;height:300px;"/>
									<!-- heading -->
									<h3><a href="product.php?id='.$row["product_id"].'">'.$row["product_name"].'</a></h3>
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

</body>

</html>