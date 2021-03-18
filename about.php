<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>About Page</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body onload="addDropdownEvent()">
		<?php
			session_start();
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
					createNavBar($_SESSION["user"], "about");
				}
				else
				{
					createNavBar("", "about");
				}
			?>
		</nav>
		<?php
			// Script used if login is not required to use this page
			if(isset($_SESSION["user"])) {
				require_once("createSideBar.php");
				createSideBar();
			}
		?>
		<main>
			<h2>All you need to know about us</h2>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
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
