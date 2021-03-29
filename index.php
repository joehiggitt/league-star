<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends.">
		<title>LeagueStar - Create your league for free</title>
		<link rel="shortcut icon" type="image/png" href="Logo.png">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body><!--  onload="addDropdownEvent()" -->
		<div class="content">
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
				<p>LeagueStar is the ideal tool to create your perfect league with friends, family or colleagues. From a new place to plan your five-aside football league to a fast way of recording your Among Us wins against mates, LeagueStar can cover all of your scoring needs.</p>
				<div class="imageContainer">
					<img src="5AsideImage.png" alt="A 5-aside match">
					<div class="imageCaption">
						<p>Organise your 5-aside 'friendlies' to find out which team's really the goat</p>
					</div>
				</div>
				<div class="imageContainer">
					<img src="BasketballImage.png" alt="A game of basketball in the street">
					<div class="imageCaption">
						<p>Add a little competition to your street basketball</p>
					</div>
				</div>
				<div class="imageContainer">
					<img src="GamerImage.png" alt="A competitive gamer">
					<div class="imageCaption">
						<p>Compete with your friends to finally decide who's best at Fortnite</p>
					</div>
				</div>
				<p>The possibilities really are endless, and with new features being added all the time, such as the upcoming tournament mode or the league pre-set editor, LeagueStar is set to become one of the largest online amateur league communities.</p>
				<p>It's quick and easy to create a league; start by joining the LeagueStar community now!</p>
				<!-- <form action="login.php">
					<input type="submit" valpossibilitiesue="Sign In" id="loginButton">
				</form>
				<br> -->
				<form action="register.php">
					<input type="submit" value="Sign Up" id="registerButton">
				</form>
				<br><br>
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