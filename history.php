<html>
	<head>
		<meta charset="utf-8">
		<title>History</title>
		
		<!-- Favicon -->
		 <link href="img/favicon.png" rel="icon">
		 
		<!-- Style -->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/stylecart.css" rel="stylesheet">
	</head>
	
<body class="cart-img">
	<?php include 'include/header.php';?>
	<?php include 'include/dbconnect.php';?>
	
	
			
	<div class="works" id="work">
				<div class="container">
					<div class="default-heading">
					</div>
	
					<div class="shopping-cart">
					  <!-- Title -->
					  
					  
		<?php
			
			
			
			echo '<div class="title">
						History
					  </div>';
			
			
			
				$result_orders = $conn->query("SELECT * from order_employees 
												JOIN orders on order_employees.order_id = orders.order_id
												JOIN order_product ON orders.order_id = order_product.order_id
												JOIN product ON product.product_id = order_product.product_id
												JOIN user ON order_employees.user_id = user.user_id
												JOIN order_status ON orders.status_id = order_status.status_id
												 ORDER BY order_employees_id DESC");
				while($row_orders = $result_orders->fetch_assoc()){
					
					echo'  <!-- Product -->
					  <div class="item">
					 
						<div class="description">
						  <span>'.$row_orders["product_name"].'</span>
						 
						  <span>'.$row_orders["quantity"].'</span>
						</div>
						
						<div class="description">
						  <span>'.$row_orders["order_date"].'</span>
						 
						  <span>'.$row_orders["status_name"].'</span>
						</div>
						<div class="description">
							<span>'.$row_orders["user_first_name"].' '.$row_orders["user_last_name"].'</span>
						</div>';
						
						$result_customer = $conn->query("SELECT * FROM user WHERE user_id =" .$row_orders["customer_id"]);
						$row_customer = $result_customer->fetch_assoc();
						 echo '<div class="description">
							<span>'.$row_customer["user_first_name"].' '.$row_customer["user_last_name"].'</span>
						  <span>'.$row_customer["user_contact"].'</span>
						 
						  <span>'.$row_customer["user_address"].'</span>
						</div>
						
						</div>';
						
						echo '
							<br>
						  <a href="action_delete_history.php?id='.$row_orders['order_id'].'"><button  class="dropbtn">Delete from history</button></a>';
					  
				}
				echo '	  </div>
					</div>
					</div>';
				
			
					
		?>	
				

</body>

</html>