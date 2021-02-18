<!DOCTYPE html>
<htmllang="en">
<head>
	<title>LeagueStar - Create your league for free</title>
	<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<?php
		// Script used if login is required to view this page
		session_start();
		if (!isset($_SESSION["user"])) {
			header("Location: index.php");
		}
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
				// Script used if login is required to view this page
				echo '<li style="float:right"><a href="logout.php">Sign Out</a></li>';
				echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';
			?>
		</ul>

	</nav>
	<aside>
		<ul class="asideNav">
			<li><a href="viewLeague.php">League 1</a></li>
			<li>&#9;<a href="viewFixtures.php">Fixtures</a></li>
			<li>&#9;<a href="viewResults.php">Results</a></li>
			<li>&#9;<a href="createLeague.php">Create New League</a></li>
			<li><a href="joinLeague.php" class="active">Join League</a></li>
		</ul>
	</aside>
	<main>
		<h3>Join League</h3>
        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
            Enter your join code: <input type="text" name="join" value="">
            <input type="submit" name="submit" value="Join"/><br>
        </form>
        <!-- Need to add php for joining a league at a later point -->
	</main>
	<footer>
		<p><a href="terms.php">Terms & Conditions</a></p>
		<p>This website is owned by X16 Lads Ltd, undergraduates at the University of Manchester</p>
	</footer>

</body>
</html>
