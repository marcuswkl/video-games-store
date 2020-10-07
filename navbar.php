<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="CSS/navbar.css">
	</head>
	<body>
		<nav class="nav-header">
			
		<a href="index.php" id="index-link"><img class="logo" src ="icons/baycon.png" id="baycon-logo" alt="logo"></a>
			
		<div class="link-flex">
			<a href="sign-up.php" id="sign-up">SIGN UP</a>
			<a href="login.php" id="login">LOGIN</a>
			<a href="shopping-cart.php" id="cart">CART</a>
		</div>

		</nav>
	</body>
</html>

<?php
	if (isset($_SESSION["username"])) {
		
		$email = $_SESSION["email"];
		if ($_SESSION["email"] == "admin@bayconeggs.com") {
			echo '
			<script>
				var signup = document.getElementById("sign-up");
				var login = document.getElementById("login");
	
				signup.textContent = "Admin Dashboard";
				signup.href = "admin.php";
				login.textContent = "LOGOUT";
				login.href = "logout.php";
			</script>
			';
		}
		else {
			// Grab user data from the database using the user_id
			// Let them access the "logged in only" pages
			echo '
			<script>
				var signup = document.getElementById("sign-up");
				var login = document.getElementById("login");
			';
			echo "signup.textContent = 'WELCOME, " . $_SESSION['username'] . "';";
			echo '
				signup.href = "#";
				login.textContent = "LOGOUT";
				login.href = "logout.php";
			</script>
			';
		}
		
	}
?>