<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="About the LeagueStar Project.">
		<title>About - LeagueStar</title>
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
				<h2>About The LeagueStar Project</h2>
				<p>LeagueStar is a perfect tool to create, organize and manage your own league. It is a free website, you can create a league by entering your league name, tweaking the settings and inviting your friends! Then you can have online tournament with your friends and league will update itself each match day by entering the result!</p>
				<p>Some key benefits of LeagueStar include:
					<ol>
						<li>It's a hassle free way of adding competition to your sport or games.</li>
						<li>Can add regularity to casual meetups with friends</li>
						<li>Encourages a physically and mentally healthy lifestyle.</li>
					</ol>
				</p>
				<p>This webapp was developed by 6 students at University of Manchester:<br>Aasim, Almuaiyad, Edi, George, Joe and Kehan</p>
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
