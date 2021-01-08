<?php
 include 'include/dbconnect.php';

echo '<header id="header" class="header-scrolled">
		<div id="logo">
        <h1><a href="index.php" class="scrollto">FoodXpert</a></h1>
      </div>
		
	<div class="container-fluid" style>
		<nav id="nav-menu-container">
        <ul>
          <li><a href="index.php">Home</a></li>
			<li>
				<div class="dropdown1">
					<div class="dropbtn1">Menu</div>
					<!--  Main Dropdown --> 
					
					
					<div class="dropdown-one">';
					
					$sql = "SELECT category_id, category_name FROM food_category;";
					$result1 = $conn->query($sql);
					
					if ($result1->num_rows > 0) {
					  // output data of each row
					  while($row = $result1->fetch_assoc()) {
						if($row["category_name"] != "No Category"){
							$sql2 = "SELECT subcategory_id, subcategory_name 
									FROM food_subcategory JOIN food_category ON food_subcategory.category_id = food_category.category_id
									WHERE food_subcategory.category_id =" .$row["category_id"]. ";";
							$result2 = $conn->query($sql2);
							
							if ($result2->num_rows > 0) {
								echo '<div id="link1" class="dItem">'.$row["category_name"].
											'<!--  Inside Dropdown -->
											<div class="dropdown-two">';
						  // output data of each row
								while($row2 = $result2->fetch_assoc()) {
										echo 
											'<div class="dItem" id="file"><a href="category.php?id=' .$row2["subcategory_id"].'">' 
											.$row2["subcategory_name"]. '</a></div>';
								}
								echo '</div>
											</div>';
							}
							else{
								echo '<div class="dItem"><a href="category.php?id=' .$row["category_id"].'">' .$row["category_name"]. '</a></div>';
							}
						}
					  }
					}
					echo '</div>
				  </div> 
			</li>
		  <li><button id="myBtn" class="dropbtn" >Log In</button></li>
		  <li><a href="register.php">Register</a></li>
		  <li><a href="about.php">About Us</a></li>
		  <li><a href="cart.php">Cart</a></li>
		  
        </ul>
      </nav>
	</div>
		
	</header>';
	$conn->close();
?>


