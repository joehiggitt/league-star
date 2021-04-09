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
				require_once 'DBHandler.php';
				$conn = connectDB();
				$leagueId = $_GET["league"];
				$user = $_SESSION["user"];
				$sql = "SELECT league.leagueName from league
						INNER JOIN users ON league.userId = users.userId
						WHERE league.leagueId = '$leagueId'
						AND users.user = '$user'";
				$results = doSQL($conn, $sql);
				$data = mysqli_fetch_array($results);
				$leagueName = $data[0];
				$deleteLeague = false;
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
						unset($_GET['leagueId']);
						$deleteLeague = true;
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
					if ($deleteLeague == true)
					{
						$deleteLeague = false;
						echo '<h2>Your League Was Successfully Deleted</h2>';
						echo '<p>You can always create a new league by <a href="createLeague.php" class="link">clicking here</a>.</p>';
					}
					elseif (isset($_SESSION['user']))
					{
						echo '<h2>Delete ' . $leagueName . '</h2>';
						echo '<p>Are you sure you want to delete ' . $leagueName . '? This process is irreversable.</p>';
						echo '<p>All the teams and their progress in ' . $leagueName . ' will be immediately deleted.</p>';
						echo '<form action="' . htmlentities($_SERVER['PHP_SELF']) . '" method="post">';
						echo '	<input type="submit" name="submit" value="Delete ' . $leagueName . '" id="deleteButtton">';
						echo '</form><br>';
						echo '<form action="viewTable.php?league='. $leagueId .'" method="post">';
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
