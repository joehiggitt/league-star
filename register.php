<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Create your LeagueStar Account to begin creating custom leagues!">
		<title>Create An Account - LeagueStar</title>
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
				if (isset($_POST['submit'])) {
					// Get details from the register form
					$user = $_POST['user'];
					$email = $_POST['email'];
					$emailCheck = $_POST['emailCheck'];
					$pass = $_POST['pass'];
					$passCheck = $_POST['passCheck'];

					// Checks if the given passwords match and adds details to database
					// if they do
					if ($pass == $passCheck && $email == $emailCheck) {
						require_once 'DBHandler.php';
						$conn = connectDB();
						$sql = "INSERT INTO users (user, pass, email)
								VALUES ('$user', '$pass', '$email')";
						$results = doSQL($conn, $sql);

						// Log in
						if($results == 1) {
							$_SESSION["user"] = $user;
							header("Location: index.php");
							exit;
						}

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
					createNavBar("", "register");
				?>
			</nav>
			<?php
				if(isset($_SESSION["user"])) {
					require_once("createSideBar.php");
					createSideBar();
				}
			?>
			<main>
				<h2>Create Your LeagueStar Account!</h2>
				<?php
					if (!empty($_POST))
					{
						if ($pass != $passCheck && $email != $emailCheck)
						{
							echo '<p>The emails and passwords you entered don\'t match.</p>';
						}
						elseif ($pass != $passCheck)
						{
							echo '<p>The passwords you entered don\'t match.</p>';
						}
						elseif ($email != $emailCheck)
						{
							echo '<p>The emails you entered don\'t match.</p>';
						}
						else
						{
							echo '<p>An account already exists with the username you entered.</p>';
						}
					}
					else
					{
						$user = "";
						$email = "";
					}

					echo '<form action="' . htmlentities($_SERVER['PHP_SELF']) . '" method="post">';
					echo '	<label>Username</label><br>';
					echo '	<input type="text" name="user" minlength="4" value = "' . $user . '" required><br>';
					echo '	<label>Email</label><br>';
					echo '	<input type="email" name="email" value = "' . $email . '" required><br>';
					echo '	<label>Confirm Email</label><br>';
					echo '	<input type="email" name="emailCheck" required><br>';
					echo '	<label>Password</label><br>';
					echo '	<input type="password" name="pass" minlength="8" required><br>';
					echo '	<label>Confirm Password</label><br>';
					echo '	<input type="password" name="passCheck" required><br>';
					echo '	<br><label class="checkboxContainer">';
					echo '		I agree to LeagueStar\'s <a href="terms.php" class="link">Terms & Conditions</a>';
					echo '		<input type="checkbox" name="termsConditions" required><br>';
					echo '		<span class="checkmark"></span>';
					echo '	</label><br>';
					echo '	<input type="submit" name="submit" value="Create Your Account">';
					echo '	<p>Already have an account? <a href="login.php" class="link">Sign in here</a>.</p>';
					echo '</form>';
				?>
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
