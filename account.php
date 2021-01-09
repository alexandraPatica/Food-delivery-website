<html>
	<head>
		<meta charset="utf-8">
		<title>Account</title>
		
		<!-- Favicon -->
		 <link href="img/favicon.png" rel="icon">
		 
		<!-- Style -->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/stylecart.css" rel="stylesheet">
	</head>
	
<body class="cart-img">
	<?php include 'include/header.php';?>
	<?php include 'include/dbconnect.php';?>
	<?php include 'include/loginform.php';?>
	
	
			
	<div class="works" id="work">
				<div class="container">
					<div class="default-heading">
					</div>
	
					<div class="shopping-cart">
					  <!-- Title -->
					  <div class="title">
						Order History
					  </div>
					  
		<?php
			
			$user_check = $_SESSION['user'];
			$ses_sql ="select * from user where user_name = '".$user_check. "';";
			$result_ses = $conn->query($ses_sql);
			$row_ses = $result_ses->fetch_assoc();
			$login_session = $row_ses['user_name'];
			
			$sql_history = "SELECT
					orders.order_id,
					USER.user_name,
					USER.user_first_name,
					USER.user_last_name,
					USER.user_contact,
					USER.user_address,
					product.product_name,
					product.product_price,
					product.product_quantity,
					orders.order_date,
					order_status.status_name
					FROM
						orders
					JOIN order_product ON orders.order_id = order_product.order_id
					JOIN order_status ON orders.status_id = order_status.status_id
					JOIN USER ON USER.user_id = orders.customer_id
					JOIN product ON order_product.product_id = product.product_id WHERE user_name ='" .$row_ses['user_name']."';";
			$result_history = $conn->query("SELECT
					orders.order_id,
					USER.user_name,
					USER.user_first_name,
					USER.user_last_name,
					USER.user_contact,
					USER.user_address,
					product.image,
					product.product_name,
					product.product_price,
					product.product_quantity,
					orders.order_date,
					order_status.status_name
					FROM
						orders
					JOIN order_product ON orders.order_id = order_product.order_id
					JOIN order_status ON orders.status_id = order_status.status_id
					JOIN USER ON USER.user_id = orders.customer_id
					JOIN product ON order_product.product_id = product.product_id WHERE user_name ='" .$row_ses['user_name']."';");
			
			
				while($row_history = $result_history->fetch_assoc()){
			
					echo'  <!-- Product -->
					  <div class="item">
						
						<div class="image">
						  <img src="'.$row_history["image"].'" alt="" style="float:left;width:100px;height:100px;"/>
						</div>
					 
						<div class="description">
						  <span>'.$row_history["product_name"].'</span>
						 
						  <span>'.$row_history["product_quantity"].'</span>
						</div>
					 
						<div class="total-price">$'.$row_history["product_price"].'</div>
						
						<div class="description">
						  <span>'.$row_history["order_date"].'</span>
						 
						  <span>'.$row_history["status_name"].'</span>
						</div>
					  </div>';
				}
					  
				echo '	  </div>
					</div>
					</div>';
				
				
					
		
					
		?>	
				

</body>

</html>