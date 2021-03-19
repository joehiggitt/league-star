<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Contact Page</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body onload="addDropdownEvent()">
		<?php
			session_start();
		?>
		<?php
			// sendMessage code here
		?>
		<header>
			<img src="Header.png" alt="header" height="80px" width="100%">
			<div class="imageLogo"><img src="Logo.png" height="130px"></div>
			<div class="imageText"><h1>LeagueStar</h1></div>
		</header>
		<nav>
			<?php
				require_once("createNavBar.php");
				if (isset($_SESSION["user"]))
				{
					createNavBar($_SESSION["user"], "contact");
				}
				else
				{
					createNavBar("", "contact");
				}
			?>
		</nav>
		<?php
			if(isset($_SESSION["user"])) {
				require_once("createSideBar.php");
				createSideBar();
			}
		?>
		<main>
			<h2>Contact Us</h2>
			<p>If you encounter any difficulties, please fill out the following form and one of our operators will get back with a response as soon as possible.</p>
			<?php
			echo '<form>';
			if (!isset($_SESSION["user"]))
			{
				echo '	<label>* Name</label><br>';
				echo '	<input type="text" name="name" required><br>';
				echo '	<label>* Email</label><br>';
				echo '	<input type="text" name="email" required><br>';
			}
			echo '	<label>* Message</label><br>';
			echo '	<textarea name="message" required></textarea><br><br>';
			echo '	<input type="submit" name="submit" value="Send Message">';
			echo '	<!-- <input type="reset" value="Reset"><br> -->';
			echo '</form>';
			?>
			<br><br>
		</main>
		<footer>
			<img src="Footer.png" height="80px" width="100%">
			<div class="imageText">
				<p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
			</div>
		</footer>
	</body>
</html>
