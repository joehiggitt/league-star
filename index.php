<!DOCTYPE html>
<html>
<head lang="en">
	<title>LeagueStar - Create your league for free</title>
	<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.">
    <link rel="stylesheet" type="text/css" href="styles.css">
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
			<li><a href="index.php" class="active">Home</a></li>
			<li><a href="about.php">About Us</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="contacts.php">Contacts</a></li>
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
					echo '<li><a href="createLeague.php">Create New League</a></li>';
				echo '</ul>';
			echo '</aside>';
		}
	?>
	<main>
		<h3>Welcome to LeagueStar!</h3>
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
	</main>
	<footer>
		<p><a href="terms.php">Terms & Conditions</a></p>
		<p>This website is owned by X16 Lads Ltd, undergraduates at the University of Manchester</p>
	</footer>

</body>
</html>
