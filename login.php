<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LeagueStar - Create your league for free</title>
		<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body onload="addDropdownEvent()">
		<?php
			// Script used if login is required to view this page
			session_start();
			if (isset($_SESSION["user"]))
			{
				header("Location: index.php");
			}
		?>
		<?php
			if (isset($_POST['submit']))
			{
				// Get details from login form
				$user = $_POST['user'];
				$pass = $_POST['pass'];

				// Check if user details are valid or not
				require_once 'DBHandler.php';
				$conn = connectDB();
				$sql = "SELECT user, pass FROM users WHERE user='$user' AND pass='$pass'";
				$results = doSQL($conn, $sql);
				if ($row = $results->fetch_assoc())
				{
					// Log in
					$_SESSION["user"] = $user;
					header("Location: dashboard.php");
					exit;
				}
				else
				{
					$_SESSION["loggedIn"] = false;
				}
			}
		?>
		<header>
			<img src="Header.png" alt="header" height="80px" width="100%">
			<div class="imageLogo"><img src="Logo.png" height="130px"></div>
			<div class="imageText"><h1>LeagueStar</h1></div>
		</header>
		<nav>
			<ul class="navNav">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>				
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="help.php">Help</a></li>
				<?php
					// Script used if login is not required to use this page
					echo '<li style="float:right"><a href="register.php">Register</a></li>';
					echo '<li style="float:right"><a href="login.php" id="active">Sign In</a></li>';
				?>
			</ul>

		</nav>
		<?php
			if(isset($_SESSION["user"])) {
				require_once("createSideBar.php");
				createSideBar();
			}
		?>
		<main>
			<h2>Sign In To Your LeagueStar Account!</h2>
			<?php
				if (isset($_SESSION["loggedIn"]))
				{
					if ($_SESSION["loggedIn"] == false)
					{
						echo '<p>The details you entered don\'t match any of our users, please try again.<p>';
					}
				}
			?>
			<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
				<label>Username</label><br>
				<input type="text" name="user" required><br>
				<label>Password</label><br>
				<input type="password" name="pass" required><br><br>
				<input type="submit" name="submit" value="Sign In"/>
				<p>Don't have an account? <a href="register.php" class="link">Register here</a>.</p>
			</form>

		</main>
		<footer>
			<img src="Footer.png" height="80px" width="100%">
			<div class="imageText">
				<p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
			</div>
		</footer>
	</body>
</html>
