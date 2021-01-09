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
	
	
		
		
<?php		
	session_start();
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
							<p>Price: $'.$row["product_price"].'</p>';
							
							if(isset($_SESSION['user'])){		//if  session
									$user_check = $_SESSION['user'];
									$ses_sql ="select user_name from user where user_name = '".$user_check. "';";
									$result_ses = $conn->query($ses_sql);
									$row_ses = $result_ses->fetch_assoc();
									$login_session = $row_ses['user_name'];
									
									echo '<a href="cart.php?id='.$_GET['id'].'"><button  class="dropbtn">Buy</button></a>';
								}
							
							echo '<div id="result"></div>
							</div>
						</div>
				</div>';
		}
	}
	
	

?>


	
</body>

</html>