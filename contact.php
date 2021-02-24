<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Contact Page</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body>
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
				<li><a href="contact.php" id="active">Contact Us</a></li>
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
						echo '<li><a href="viewTable.php">Table</a></li>';
						echo '<li><a href="viewFixtures.php">Fixtures</a></li>';
						echo '<li><a href="viewResults.php">Results</a></li>';
						echo '<li><a href="createLeague.php">Create New League</a></li>';
						echo '<li><a href="joinLeague.php">Join League</a></li>';
					echo '</ul>';
				echo '</aside>';
			}
		?>
		<main>
			<h2>Contact Us</h2>
			<p>If you encounter any difficulties, please fill out the following form and one of our operators will get back with a response as soon as possible.</p>
			<form>
				<label>* Name</label><br>
				<input type="text" name="name" required><br>
				<label>* Email</label><br>
				<input type="text" name="email" required><br>
				<label>* Message</label><br>
				<textarea name="message" required></textarea><br><br>
				<input type="submit" name="submit" value="Send Message">
				<!-- <input type="reset" value="Reset"><br> -->
			</form>
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
