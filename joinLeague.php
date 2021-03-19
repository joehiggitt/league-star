<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>LeagueStar - Join a league</title>
		<meta name="description" content="Join a friend's league">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body onload="addDropdownEvent()">
		<?php
			// Script used if login is required to view this page
			session_start();
			if (!isset($_SESSION["user"]))
			{
				header("Location: index.php");
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
				createNavBar($_SESSION["user"]);
			?>
		</nav>
		<?php
			if(isset($_SESSION["user"])) {
				require_once("createSideBar.php");
				createSideBar("join");
			}
		?>
		<main>
			<h2>Join League</h2>
	        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
	            <label>* Join Code</label><br>
				<input type="text" name="join" required><br><br>
				<input type="submit" name="submit" value="Join League"/>
	        </form>
	        <!-- Need to add php for joining a league at a later point -->
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
