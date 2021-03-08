<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>About Page</title>
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
				<li><a href="about.php" id="active">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="help.php">Help</a></li>
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
			// Script used if login is not required to use this page
			if (isset($_SESSION["user"]))
			{
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
			}
		?>
		<main>
			<h2>All you need to know about us</h2>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
			<p>Text</p>
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
