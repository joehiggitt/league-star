<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Help Page</title>
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
			<ul class="navNav">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="help.php" id="active">Help</a></li>
				<?php
					// Script used if login is not required to use this page
					if(isset($_SESSION["user"])) {
						echo '<div class="dropdownProfile">
								<button class="dropbtn">' . $_SESSION["user"] . '</button>
								<div class="dropdown-content">
									<a href="profile.php">View profile</a>
									<a href="logout.php">Sign Out</a>
								</div>
							</div>';
						/*echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';*/
					}
					else {
						echo '<li style="float:right"><a href="register.php">Register</a></li>';
						echo '<li style="float:right"><a href="login.php">Sign In</a></li>';
					}
				?>
			</ul>
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
			<p>Q: How can i invite a friend to join my league?<br>A: Users can invite friends by sending them inviting codes. By typing the inviting code, they can join a league successfully.</p>
			<p>Q: How can i get the results of matches?<br>A: In each matchday league will update itself, and we will also send a email of results to users</p>
			<p>If you have further questions, please <a href="contact.php" class="link">contact us</a> at any time!<p>
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
