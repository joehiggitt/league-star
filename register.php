<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Create an account - LeagueStar</title>
		<meta name="description" content="Create a LeagueStar account to begin creating your custom leagues!">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body>
		<?php
			session_start();
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
				<li><a href="help.php">Help</a></li>
				<li style="float:right"><a href="register.php" id="active">Register</a></li>
				<li style="float:right"><a href="login.php">Sign In</a></li>
			</ul>

		</nav>
		<?php
			// Script used if login is not required to use this page
			if (isset($_SESSION["user"]))
			{
				echo '<aside>';
					echo '<ul class="asideNav">';
						echo '<li><a href="viewLeague.php">League 1</a></li>';
						echo '<li><a href="viewTable.php">Table</a></li>';
						echo '<li><a href="viewFixtures.php">Fixtures</a></li>';
						echo '<li><a href="viewResults.php">Results</a></li>';
						echo '<li><a href="createLeague.php">Create New League</a></li>';
						echo '<li><a href="joinLeague.php">Join League</a></li>';
					echo '</ul>';
				echo '</aside>';
			}
		?>
		<main>
			<h2>Create Your LeagueStar Account!</h2>
			<?php
				session_start();
				if (isset($_POST['submit']))
				{
					// Get details from login form
					$user = $_POST['user'];
					$email = $_POST['email'];
					$pass = $_POST['pass'];
					$conpass = $_POST['conpass'];

					// NEEDS FINISHING

					// Check if user details are valid or not
					// require_once 'DBHandler.php';
					// $conn = connectDB();
					// $sql = "SELECT user, pass FROM users WHERE user='$user' AND pass='$pass'";
					// $results = doSQL($conn, $sql);
					// if ($row = $results->fetch_assoc()) 
					// {
					// 	// Log in
					// 	$_SESSION["user"] = $user;
					// 	header("Location: index.php");
					// 	exit;
					// }
					// else 
					// {
					// 	echo "fail"; // Go back to self
					// }
				}
			?>
			<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
				<label>Username</label><br>
				<input type="text" name="user" required><br>
				<label>Email</label><br>
				<input type="text" name="email" required><br>
				<label>Password</label><br>
				<input type="password" name="pass" required><br>
				<label>Confirm Password</label><br>
				<input type="password" name="pass" required><br><br>
				<input type="submit" name="submit" value="Create Your Account"/>
				<!-- <input type="reset" value="Reset"><br> -->
				<p>Already have an account? <a href="login.php" class="link">Sign in</a> here.</p>
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