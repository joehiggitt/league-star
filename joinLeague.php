<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>LeagueStar - Create your league for free</title>
		<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body>
		<?php
			// Script used if login is required to view this page
			session_start();
			if (!isset($_SESSION["user"]))
			{
				header("Location: index.php");
			}
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
				<li><a href="viewTable.php">Table</a></li>
				<li><a href="viewFixtures.php">Fixtures</a></li>
				<li><a href="viewResults.php">Results</a></li>
				<li><a href="createLeague.php">Create New League</a></li>
				<!-- <li><a href="addPlayers.php">Add Players</a></li> -->
				<li><a href="joinLeague.php" id="active">Join League</a></li>
			</ul>
		</aside>
		<main>
			<h2>Join League</h2>
	        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
	            <label>* Join Code</label><br>
				<input type="text" name="join" required><br><br>
				<input type="submit" name="submit" value="Join League"/>
	        </form>
	        <!-- Need to add php for joining a league at a later point -->
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
