<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>LeagueStar - Create your league for free</title>
		<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.">
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
			<ul class="navNav">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="help.php">Help</a></li>
				<?php
					// Script used if login is required to view this page
					echo '<div class="dropdownProfile">
							<button class="dropbtn">' . $_SESSION["user"] . '</button>
							<div class="dropdown-content">
								<a href="profile.php">View profile</a>
								<a href="logout.php">Sign Out</a>
							</div>
						</div>';
					/*echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';*/
				?>
			</ul>

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
