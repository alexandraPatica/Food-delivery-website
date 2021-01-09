<?php
echo '<!-- The Modal -->
			<div id="myModal" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
				<span class="close">&times;</span>
				
				
				  <form  class="form-container" action="include/login.php" method="POST">
					<h1>Login</h1>

					<label for="user"><b>Username</b></label>
					<input type="text" placeholder="Enter username" name="user" required>

					<label for="password"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="password" required>

					<button type="submit" class="btn1">Login</button>
				  </form>
				
			  </div>

			</div>
			
			<script>
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on the button, open the modal
	btn.onclick = function() {
	  modal.style.display = "block";
	}
	
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}
	
	

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
		modal.style.display = "none";
	  }
	}
</script>';
?>