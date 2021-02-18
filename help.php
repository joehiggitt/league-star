<!DOCTYPE html>
<html lang="en">
<head>
	<title>Help Page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<header>
			<h1>Help</h1>
	</header>

	<nav>
		<ul class="navNav">
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About Us</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="help.php" class="active">Help</a></li>
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
					echo '<li><a href="joinLeague.php">Join League</a></li>';
				echo '</ul>';
			echo '</aside>';
		}
	?>
	<main>
		<h3>This is our help page</h3>
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
		<p>Text</p>
	</main>

	<footer>
		<p><a href="terms.php">Terms & Conditions</a></p>
	</footer>
</body>
</html>
