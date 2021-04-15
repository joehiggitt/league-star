<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Sign in to your LeagueStar Account.">
		<title>Sign In - LeagueStar</title>
		<link rel="shortcut icon" type="image/png" href="Logo.png">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body onload="addDropdownEvent()">
		<div class="content">
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
					$email = $_POST['email'];
					$pass = $_POST['pass'];

					// Check if user details are valid or not
					require_once 'DBHandler.php';
					$hash = password_hash($pass, PASSWORD_DEFAULT);
					$conn = connectDB();
					$sql = "SELECT user, pass FROM users WHERE email='$email'";
					$results = doSQL($conn, $sql);
					if ($row = $results->fetch_assoc())
					{
						// Log in
						if (password_verify($pass, $row["pass"])) {
							$_SESSION["user"] = $row["user"];
							header("Location: dashboard.php");
							exit;
						}
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
				<?php
					require_once("createNavBar.php");
					createNavBar("", "login");
				?>

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
							unset($_SESSION["loggedIn"]);
						}
					}
				?>
				<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
					<label>Email</label><br>
					<input type="email" name="email" required><br>
					<label>Password</label><br>
					<input type="password" name="pass" required><br><br>
					<input type="submit" name="submit" value="Sign In"/>
					<p>Don't have an account? <a href="register.php" class="link">Register here</a>.</p>
				</form>
			</main>
			<div class="push"></div>
		</div>
		<footer>
			<img src="Footer.png" height="80px" width="100%">
			<div class="imageText">
				<p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
			</div>
		</footer>
	</body>
</html>
