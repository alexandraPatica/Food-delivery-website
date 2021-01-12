

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
					
					$uname=mysqli_real_escape_string($conn,$_POST['uname']);
					$pword=mysqli_real_escape_string($conn,$_POST['pword']);
					$fname=mysqli_real_escape_string($conn,$_POST['fname']);
					$lname=mysqli_real_escape_string($conn,$_POST['lname']);
					$phone=mysqli_real_escape_string($conn,$_POST['phone']);
					$address=mysqli_real_escape_string($conn,$_POST['address']);
					
					$sql = "SELECT user_name FROM user WHERE user_name ='".$uname."';";
					$result1 = $conn->query($sql);
					
					if ($result1->num_rows > 0){
						echo '<h1>Username "'.$uname.'" already exists!';
					}
					else{
						$sql2 = "INSERT INTO user (user_name, user_password, user_first_name, user_last_name, user_contact, user_address)
						VALUES ('".$uname."', '".$pword."', '".$fname."', '".$lname."','"
						.$phone."','".$address."')";

						if ($conn->query($sql2) === TRUE) {
						  echo '<h1>Welcome '.$fname.'</h1><br>
								<h1>You have been successfully registered!</h1>';
						} else {
						  echo "Error: " . $conn->error;
						}
					}
					?>
					</form>
				</div>
			</div>
			
</body>

</html>