<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Some FAQs about LeagueStar.">
		<title>Help - LeagueStar</title>
		<link rel="shortcut icon" type="image/png" href="Logo.png">
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
						createNavBar($_SESSION["user"], "help");
					}
					else
					{
						createNavBar("", "help");
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
				<h2>Help</h2>
				<p>Here are some frequently asked questions</p>
				<p>Q: What is this website about? Building a league?<br>A: LeagueStar is a website aimed to allow users to create their own league.</p>
				<p>Q: What kind of league can a user create? Can I make a football league for example?<br>A: A user can create whatever they want: football, basketball, or even e-sports.</p>
				<p>Q: How can i invite a friend to join my league?<br>A: Users can invite friends by sharing the join code for that league.</p>
				<p>Q: How can i get the results of matches?<br>A: In each matchday league will update itself, and we will also send a email of results to users</p>
				<p>If you have further questions, please <a href="contact.php" class="link">contact us</a> at any time!<p>
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
