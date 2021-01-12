

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
	
			
	
	<div class="works" id="work">
				<div class="container">
					<div class="default-heading">
					</div>
					<form id="regForm">
					
					<?php
					
					
					
					$sql_status = "UPDATE orders
							SET status_id='".$_POST["status_id"]."'
							WHERE order_id='".$_GET['id']."';";
					//$result_status = $conn->query($sql_status); 
					
						if ($conn->query($sql_status) === TRUE) {
						  echo '
								<h1>Order updated!</h1>';
						} else {
						  echo "Error: " . $conn->error;
						}
						
						
						$sql_employee = "INSERT INTO order_employees (order_id, user_id)
						VALUES ('".$_GET["id"]."', '".$_SESSION['user_id']."')";

						if ($conn->query($sql_employee) === TRUE) {
						 
						} else {
						  echo "Error: " . $conn->error;
						}
					
					?>
					</form>
				</div>
			</div>
			
			
</body>

</html>