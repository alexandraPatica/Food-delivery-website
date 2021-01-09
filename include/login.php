<?php

session_start();
 
//if(isset($_POST['submit'])) {
	include 'dbconnect.php';
	
	$user=mysqli_real_escape_string($conn,$_POST['user']) ;
	$password=mysqli_real_escape_string($conn,$_POST['password']) ;
	if(empty($user) || empty($password)) {
		header("Location: ../index.php?login=empty");  // the did not completed both fields 
		exit();
	}else {
		$sql= "SELECT * FROM user WHERE user_name='".$user."';";
		$result = $conn->query($sql);
		
		$resultCheck=mysqli_num_rows($result);								
		if($result->num_rows < 1) { // check if exists in database  
			header("Location: ../index.php?login=error1");
			exit();
		} else {
			while($row = $result->fetch_assoc())
			{	
				//$hash1= md5($pwd);
				//$hashedPwdCheck = sha1($hash1);
				echo $hashedPwdCheck;
				if($password !==$row['user_password']) { //verific parola
					header("Location: ../index.php?login=error");
					exit();
				}else {
					$_SESSION['user_id']=$row['user_id'];
					$_SESSION['user']=$row['user_name'];
					$_SESSION['fname']=$row['user_first_name'];
					$_SESSION['lname']=$row['user_last_name'];
					$_SESSION['email']=$row['email'];
					$_SESSION['type']=$row['user_type'];
					$_SESSION['contact']=$row['user_contact'];
					$_SESSION['address']=$row['user_address'];
					header("Location: ../index.php?login=succes"); //utlizatorul este logat
					exit();
					};
			}
		}
	}
//}else {
		//header("Location: ../index.php?login=error");
		//exit();
	//}
?>