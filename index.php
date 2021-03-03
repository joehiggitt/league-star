<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>LeagueStar - Create your league for free</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body>
		<?php
			session_start();
		?>
		<header>
			<img src="Header.png" height="80px" width="100%">
			<div class="imageLogo"><img src="Logo.png" height="130px"></div>
			<div class="imageText"><h1>LeagueStar</h1></div>
		</header>
		<nav>
			<ul class="navNav">
				<li><a href="index.php" id="active">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="help.php">Help</a></li>
				<?php
					// Script used if login is not required to use this page
					if(isset($_SESSION["user"]))
					{
						echo '<li style="float:right"><a href="logout.php">Sign Out</a></li>';
						echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';
					}
					else
					{
						echo '<li style="float:right"><a href="register.php">Register</a></li>';
						echo '<li style="float:right"><a href="login.php">Sign In</a></li>';
					}
				?>
			</ul>
		</nav>
		<?php
			// Script used if login is not required to use this page
			if (isset($_SESSION["user"]))
			{
				//echo '<aside>';
					echo '<div class="asideNav">';
						echo '<button class="dropdown-btn">League 1</button>';
						echo '<div class="dropdown-container">';
							echo '<a href="viewTable.php">Table</a>';
							echo '<a href="viewFixtures.php">Fixtures</a>';
							echo '<a href="viewResults.php">Results</a>';
						echo '</div>';
						echo '<a href="createLeague.php">Create New League</a>';
						echo '<a href="joinLeague.php">Join League</a>';
					echo '</div>';
				//echo '</aside>';
			}
		?>
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