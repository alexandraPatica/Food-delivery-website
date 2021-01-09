<html>
	<head>
		<meta charset="utf-8">
		<title>FoodXpert</title>
		
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
						Shopping Bag - Product ordered!
					  </div>
					  
		<?php
			
			
			$sql = "SELECT * FROM product WHERE product_id =" .$_GET['id'].";";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			
					echo'  <!-- Product -->
					  <div class="item">
						
						<div class="image">
						  <img src="'.$row["image"].'" alt="" style="float:left;width:100px;height:100px;"/>
						</div>
					 
						<div class="description">
						  <span>'.$row["product_name"].'</span>
						 
						  <span>'.$row["product_quantity"].'</span>
						</div>
					 
						
					 
						<div class="total-price">$'.$row["product_price"].'</div>
					  </div>
					 
					  
					  </div>
					</div>
					</div>';
				
				
					$user_check = $_SESSION['user'];
					$ses_sql ="select * from user where user_name = '".$user_check. "';";
					$result_ses = $conn->query($ses_sql);
					$row_ses = $result_ses->fetch_assoc();
					$login_session = $row_ses['user_name'];
				
					//$date_now = 
					$sql2 = "INSERT INTO orders (customer_id, order_price, order_date, status_id)
							VALUES ('".$row_ses["user_id"]."','".$row["product_price"]."' ,'".date("Y-m-d")."','1')";
					$result2 = $conn->query($sql2); 
					$sqlOrderID = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
					$resultOrderId = $conn->query("SELECT * FROM orders ORDER BY order_id DESC LIMIT 1");
					$row_order_id = $resultOrderId->fetch_assoc();
					
					$sql3 = "INSERT INTO order_product (order_id, product_id, quantity)
							VALUES ('".$row_order_id["order_id"]."','".$_GET['id']."' ,'1')";
					$result3 = $conn->query($sql3); 
					
					$row["order_frequency"] = $row["order_frequency"]+1;
					$sql4 = "UPDATE product
							SET order_frequency='".$row["order_frequency"]."'
							WHERE product_id='".$_GET['id']."';";
					$result4 = $conn->query($sql4); 
				
		
					
		?>	
				

</body>

</html>