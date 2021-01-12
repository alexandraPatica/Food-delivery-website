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
					  
					  
		<?php
			
			
			
			$user_check = $_SESSION['user'];
			$ses_sql ="select * from user where user_name = '".$user_check. "';";
			$result_ses = $conn->query($ses_sql);
			$row_ses = $result_ses->fetch_assoc();
			$login_session = $row_ses['user_name'];
			
			if ($_SESSION['type'] == 1){
				echo '<div class="title">
						Order Requests
					  </div>';
			
				$result_orders = $conn->query("SELECT
													*
												FROM
													orders
												JOIN order_product ON orders.order_id = order_product.order_id
												JOIN order_status ON order_status.status_id = orders.status_id
												JOIN product ON order_product.product_id = product.product_id
												JOIN user ON user.user_id = orders.customer_id
												WHERE
													order_status.status_id < 4
													 ORDER BY orders.order_id");
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
						  <span>'.$row_orders["user_contact"].'</span>
						 
						  <span>'.$row_orders["user_address"].'</span>
						</div>
						
						<div class="description">
						<form action="action_status.php?id='.$row_orders["order_id"].'" method="post">
							  <label for="cars">Update status:</label>
							  <select name="status_id">
								<optgroup label="">';
								
								$sql_status = "SELECT * FROM order_status";
								$result_status = $conn->query($sql_status);
								
								
								while($row_status = $result_status->fetch_assoc()){
									echo '<option value="'.$row_status["status_id"].'">'.$row_status["status_name"].'</option>';
								}
								  
								echo '</optgroup>
							  </select>
							  <br><br>
							  <input type="submit" value="Submit">
							</form>
						</div>
						</div>';
					  
				}
				echo '	  </div>
					</div>
					</div>';
				
			}
			 else
			 { 
				
				echo '<div class="title">
						Order History
					  </div>';
					  
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
					JOIN product ON order_product.product_id = product.product_id WHERE user_name ='" .$row_ses['user_name']."'
					order by orders.order_id DESC;");
			
			
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
						<div class="description">
						  <span>'.$row_history["user_contact"].'</span>
						 
						  <span>'.$row_history["user_address"].'</span>
						</div>
					  </div>';
				}
					  
				echo '	  </div>
					</div>
					</div>';
				
			 }
					
		
					
		?>	
				

</body>

</html>