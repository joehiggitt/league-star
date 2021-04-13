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
				if (!isset($_GET["league"]))
				{
					header("Location: joinLeague.php");
				}
				elseif (strlen($_GET["league"]) != 1)
				{
					header("Location: joinLeague.php");
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
				<?php
					require_once("DBHandler.php");
					$conn = connectDB();
					$leagueId = $_GET["league"];
					$sql = "SELECT leagueName FROM league WHERE leagueId = '$leagueId'";
					$leagueName = mysqli_fetch_array(doSQL($conn, $sql))["leagueName"];
					echo '<h2>Join ' . $leagueName . '</h2>';
					echo '<p>The Join Code you\'ve entered is for ' . $leagueName . '. If this is correct, enter a team name and join the league!</p>';
				?>
				<?php
					if (isset($_POST['submit']))
					{
						$teamName = $_POST["teamName"];
						$leagueId = $_GET["league"];
						$user = $_SESSION["user"];
						$sql = "SELECT userId FROM users WHERE user = '$user'";
						$userId = mysqli_fetch_array(doSQL($conn, $sql))["userId"];
						$sql = "INSERT INTO teams (teamName, userId, leagueId) VALUES ('$teamName', '$userId', '$leagueId')";
						doSQL($conn, $sql);
						$sql = "SELECT teamId FROM teams WHERE teamName = '$teamName'";
						$results = doSQL($conn, $sql);
						if ($results->num_rows == 0)
						{
							echo '<p>Unfortunately we couldn\'t add your team to ' . $leagueName . ' right now.</p>';
							$sql = "DELETE FROM teams WHERE teamId = '$teamId'";
							doSQL($conn, $sql);
						}
						else
						{
							$teamId = mysqli_fetch_array($results)["teamId"];
							$sql = "INSERT INTO totalScore (leagueId, teamId, matchesPlayed, wins, draws, losses, goalDifference, totalScore) VALUES ('$leagueId', '$teamId', '0', '0', '0', '0', '0', '0')";
							$results = doSQL($conn, $sql);
							print_r("\$results = " . $results);
							$sql = "SELECT * FROM totalScore WHERE teamId = '$teamId' AND leagueId='$leagueId'";
							$results = doSQL($conn, $sql);
							echo("\$results = ");
							print_r($results);
							if ($results->num_rows == 0)
							{
								echo '<p>Unfortunately we couldn\'t add your team to ' . $leagueName . ' right now.</p>';
								$sql = "DELETE FROM teams WHERE teamId = '$teamId'";
								doSQL($conn, $sql);
								$sql = "DELETE FROM totalScore WHERE teamId = '$teamId' AND leagueId = '$leagueId'";
								doSQL($conn, $sql);
							}
							else
							{
								header("Location: viewTable.php?league=" . $leagueId);
							}
						}
					}
				?>
				<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
					<label>* Team Name</label><br>
					<input type="text" name="teamName" required><br><br>
					<input type="submit" name="submit" value="Join League"/>
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

<!-- 
	Checks:
	* Join code must be correct - league must exist
	* User must not own league
	* User must not already have a team in the league
	* Team name must not be already taken
 -->