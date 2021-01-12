

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
	<?php include 'include/loginform.php';?>

	
	<div class="works" id="work">
				<div class="container">
					<div class="default-heading">
					</div>
					<form id="regForm">
					
					<?php
					
					
					
					$sql_delete1 = "DELETE FROM order_employees
									WHERE order_id =".$_GET['id'].";";	
					$sql_delete2 = "DELETE FROM order_product
									WHERE order_id =".$_GET['id'].";";	
					$sql_delete3 = "DELETE FROM orders
									WHERE order_id =".$_GET['id'].";";
					
						if ($conn->query($sql_delete1) === TRUE && $conn->query($sql_delete2) === TRUE && $conn->query($sql_delete3) === TRUE ) {
						  echo '
								<h1>Order deleted from history!</h1>';
						} else {
						  echo "Error: " . $conn->error;
						}
					?>
					</form>
				</div>
			</div>
			
</body>

</html>