<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LeagueStar - Create your league for free</title>
		<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body>
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
				<?php
					// Script used if login is not required to use this page
					if(isset($_SESSION["user"]))
					{
						echo '<li style="float:right"><a href="logout.php">Sign Out</a></li>';
						echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';
					}
					else
					{
						echo '<li style="float:right"><a href="register.php">Register</a></li>';
						echo '<li style="float:right"><a href="login.php">Sign In</a></li>';
					}
				?>
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
			<h2>Sign In To Your LeagueStar Account!</h2>
			<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
				<label>Username</label><br>
				<input type="text" name="user" required><br>
				<label>Password</label><br>
				<input type="password" name="pass" required><br><br>
				<input type="submit" name="submit" value="Sign In"/>
				<!-- <input type="reset" value="Reset"><br> -->
				<p>Don't have an account? <a href="register.php" class="link">Register</a> here.</p>
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
