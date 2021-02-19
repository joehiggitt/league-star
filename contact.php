<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Contact Page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">>
</head>
<body>
	<?php
		session_start();
	?>
	<header>
		<img src="Header.png" alt="header" height="80px" width="100%">
		<div class="imageText"><h1>Contact Us</h1></div>
	</header>

	<nav>
		<ul class="navNav">
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About Us</a></li>
			<li><a href="contact.php" id="active">Contact</a></li>
			<li><a href="help.php">Help</a></li>
			<?php
				// Script used if login is not required to use this page
				if(isset($_SESSION["user"])) {
					echo '<li style="float:right"><a href="logout.php">Sign Out</a></li>';
					echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';
				}
				else {
					echo '<li style="float:right"><a href="register.php">Register</a></li>';
					echo '<li style="float:right"><a href="login.php">Sign In</a></li>';
				}
			?>
		</ul>
	</nav>
	<?php
		// Script used if login is not required to use this page
		if (isset($_SESSION["user"])) {
			echo '<aside>';
				echo '<ul class="asideNav">';
					echo '<li><a href="viewLeague.php">League 1</a></li>';
					echo '<li>&#9;<a href="viewFixtures.php">Fixtures</a></li>';
					echo '<li>&#9;<a href="viewResults.php">Results</a></li>';
					echo '<li>&#9;<a href="createLeague.php">Create New League</a></li>';
					echo '<li>&#9;<a href="addPlayers.php">Add Players</a></li>';
					echo '<li><a href="joinLeague.php">Join League</a></li>';
				echo '</ul>';
			echo '</aside>';
		}
	?>
	<main>
		<h3>This is our contact page</h3>
		<p>If you encounter any difficulties, contact us by the phone number or the e-mail address below and one of our operators will get back with a response asap.</p>
		<p>Text</p>
		<p>Text</p>
		<p>Text</p>
		<p>Text</p>
		<p>Text</p>
		<p>Text</p>
		<p>Text</p>
		<p>Text</p>
		<p>Text</p>
	</main>

	<footer>
		<p><a href="terms.php">Terms & Conditions</a></p>
		<p>E-Mail: x16lads@gmail.com</p>
		<p>Phone Number: *********
	</footer>
</body>
</html>
