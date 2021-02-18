<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Terms & Conditions - LeagueStar</title>
	<meta name="description" content="Terms & Conditions">
    <link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<?php
		session_start();
	?>
	<header>
			<h1>LeagueStar</h1>
	</header>
	<nav>
		<ul class="navNav">
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About Us</a></li>
			<li><a href="contact.php">Contact</a></li>
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
		<h3>Terms & Conditions</h3>
		<p>LeagueStar does not take responsibility for data loss if your password is not safe. USE A SAFE PASSWORD!!!</p>
		<p>Even with a strong password, LeagueStar cannot guarantee a zero-percent chance of your security being comprimised. This is why we take no personal details other than your email.</p>
		<p>LeagueStar will only use your email to send you reminders of upcoming fixtures and join requests if you consent to this.</p>
		<p>LeagueStar is not responsible for any minor or fatal injury that occurs when playing a sport which LeagueStar coordinates.</p>
		<p>LeagueStar cannot be used for the creation of nuclear or biological weapons.</p>
	</main>
	<footer>
		<p><a href="terms.php">Terms & Conditions</a></p>
		<p>This website is owned by X16 Lads Ltd, undergraduates at the University of Manchester</p>
	</footer>

</body>
</html>
