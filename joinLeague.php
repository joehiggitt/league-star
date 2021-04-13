<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Join a league and start competing.">
		<title>Join A League - LeagueStar</title>
		<link rel="shortcut icon" type="image/png" href="Logo.png">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body onload="addDropdownEvent()">
		<div class="content">
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
				<?php
					require_once("createNavBar.php");
					createNavBar($_SESSION["user"]);
				?>
			</nav>
			<?php
				if(isset($_SESSION["user"])) {
					require_once("createSideBar.php");
					createSideBar("join");
				}
			?>
			<main>
				<h2>Join League</h2>
				<p>To join a league, enter the Join Code given to you by the league coordinator and search for that league.</p>
				<?php
					if (isset($_POST['submit']))
					{
						$joinCode = $_POST['joinCode'];
						require_once("DBHandler.php");
						$conn = connectDB();
						$sql = "SELECT leagueId FROM league WHERE joinCode = '$joinCode'";
						$leagueId = mysqli_fetch_array(doSQL($conn, $sql))["leagueId"];
						if ($results->num_rows !== 0)
						{
							header("Location: joiningLeague.php?league=" . $leagueId);
						}
						else
						{
							echo '<p>We couldn\'t find a league that matches the Join Code entered.</p>';
						}
					}
				?>
				<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
					<label>* Join Code</label><br>
					<input type="text" name="joinCode" maxlength="8" minlength="8" required><br><br>
					<input type="submit" name="submit" value="Search For League"/>
				</form>
				<br><br>
			</main>
			<div class="push"></div>
		</div>
		<footer>
			<img src="Footer.png" height="80px" width="100%">
			<div class="imageText">
				<p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
			</div>
		</footer>
	</body>
</html>