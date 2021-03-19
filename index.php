<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>LeagueStar - Create your league for free</title>
		<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body>
		<?php
			// Script used if login is required to view this page
			session_start();
			if (isset($_SESSION["user"]))
			{
				header("Location: dashboard.php");
			}
		?>
		<header>
			<img src="Header.png" height="80px" width="100%">
			<div class="imageLogo"><img src="Logo.png" height="130px"></div>
			<div class="imageText"><h1>LeagueStar</h1></div>
		</header>
		<nav>
			<?php
				require_once("createNavBar.php");
				if (isset($_SESSION["user"]))
				{
					createNavBar($_SESSION["user"], "home");
				}
				else
				{
					createNavBar("", "home");
				}
			?>
			<!-- <script src="writeNav.js"></script> -->
		</nav>
		<?php
			// Script used if login is not required to use this page
			if(isset($_SESSION["user"])) {
				require_once("createSideBar.php");
				createSideBar();
			}
		?>
		<!--<script src="writeAside.js"></script>
		<script>
			SCRIPT.pass(["League 1", "League 2"]);
		</script> -->
		<main>
			<h2>Welcome to LeagueStar!</h2>
			<p>LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
			<p>Test paragraph</p>
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