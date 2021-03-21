<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Terms & Conditions - LeagueStar</title>
		<meta name="description" content="Terms & Conditions">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body onload="addDropdownEvent()">
		<div class="content">
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
						createNavBar($_SESSION["user"]);
					}
					else
					{
						createNavBar("");
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
				<h3>Terms & Conditions</h3>
				<p>LeagueStar does not take responsibility for data loss if your password is not safe. USE A SAFE PASSWORD!!!</p>
				<p>Even with a strong password, LeagueStar cannot guarantee a zero-percent chance of your security being comprimised. This is why we take no personal details other than your email.</p>
				<p>LeagueStar will only use your email to send you reminders of upcoming fixtures and join requests if you consent to this.</p>
				<p>LeagueStar is not responsible for any minor or fatal injury that occurs when playing a sport which LeagueStar coordinates.</p>
				<p>LeagueStar cannot be used for the creation of nuclear or biological weapons.</p>
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
