<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Delete Your League</title>
		<meta name="description" content="Delete your LeagueStar account here.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body onload="addDropdownEvent()">
		<div class="content">
			<?php
				session_start();
				$leagueName = $_SESSION["leagueName"];
				$leagueId = $_SESSION["leagueId"];
				require_once 'DBHandler.php';
				$conn = connectDB();
			?>
			<?php
				if (isset($_POST['submit']))
				{
					$sql = "DELETE FROM league WHERE leagueId = '$leagueId'";
					$results = doSQL($conn, $sql);
					// Test if league deleted
					$sql = "SELECT * FROM league WHERE leagueId = '$leagueId'";
					$results = doSQL($conn, $sql);
					$data = mysqli_fetch_array($results);
					if (empty($data))
					{
						unset($_SESSION['leagueId']);
						$_SESSION['deleteLeague'] = True;
					}
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
					if (isset($_SESSION["user"]))
					{
						createNavBar($_SESSION["user"]);
					}
					else
					{
						createNavBar("");
					}
				?>
			</nav>
			<?php
				if(isset($_SESSION["user"])) {
					require_once("createSideBar.php");
					createSideBar();
				}
			?>
			<main>
				<?php
					if (isset($_SESSION['deleteLeague']))
					{
						if ($_SESSION['deleteLeague'] == True)
						{
							unset($_SESSION['deleteLeague']);
							echo '<h2>Your League Was Successfully Deleted</h2>';
							echo '<p>You can always create a new league by <a href="createLeague.php" class="link">clicking here</a>.</p>';
						}
					}
					elseif (isset($_SESSION['user']))
					{
						echo '<h2>Delete Your League</h2>';
						echo '<p>Are you sure you want to delete this league? This process is irreversable.</p>';
						echo '<p>All the teams you coordinate will be immediately deleted and you will lose your current progress in this league.</p>';
						echo '<form action="' . htmlentities($_SERVER['PHP_SELF']) . '" method="post">';
						echo '	<input type="submit" name="submit" value="Delete League" id="deleteButtton">';
						echo '</form><br>';
						echo '<form action="viewTable.php?leagueId='. $leagueId .'">';
						echo '	<input type="submit" value="Take Me Back"><br><br>';
						echo '</form>';
					}
					else
					{
						header("Location: index.php");
					}
				?>
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