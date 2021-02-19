<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LeagueStar - Create your league for free</title>
		<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body>
		<header>
			<img src="Header.png" alt="header" height="80px" width="100%">
			<div class="imageText"><h1>LeagueStar</h1></div>
		</header>
		<nav>
			<ul class="navNav">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="help.php">Help</a></li>
				<li style="float:right"><a href="register.php">Register</a></li>
				<li style="float:right"><a href="login.php" id="active">Sign In</a></li>
			</ul>

		</nav>
		<aside>
			<ul class="asideNav">
				<li><a href="viewLeague.php">League 1</a></li>
				<li><a href="viewTable.php">Table</a></li>
				<li><a href="viewFixtures.php">Fixtures</a></li>
				<li><a href="viewResults.php">Results</a></li>
				<li><a href="createLeague.php">Create New League</a></li>
				<li><a href="joinLeague.php">Join League</a></li>
			</ul>
		</aside>
		<main>
			<h2>Sign In</h2>
			<?php
				session_start();
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
						header("Location: index.php");
						exit;
					}
					else 
					{
						echo "fail"; // Go back to self
					}
				}
			?>
			<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
				<label>Username</label><br>
				<input type="text" name="user"/><br>
				<label>Password</label><br>
				<input type="password" name="pass"/><br>
				<input type="submit" name="submit" value="Sign In"/>
				<!-- <input type="reset" value="Reset"><br> -->
				<p>Don't have an account? <a href="register.php" class="link">Register</a> here</p>
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