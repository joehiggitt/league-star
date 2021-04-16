<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Create a new league.">
		<title>Create A League - LeagueStar</title>
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
					createSideBar("create");
				}
			?>
			<main>
				<h2>Create New League</h2>
				<?php
					if (isset($_POST['submit']))
					{
						$joinCode = '';
						for ($i = 0; $i < 8; $i++)
						{
							$joinCode = $joinCode . strval(random_int(0, 9));
						}
						$name = $_POST['name'];
						$preset = $_POST['preset'];
						$isHomeAway = 0;
						if (isset($_POST['isHomeAway']))
						{
							$isHomeAway = 1;
						}
						$minTeams = $_POST['minTeams'];
						$maxTeams = $_POST['maxTeams'];
						// $minPlayer = $_POST['minPlayer'];
						// $maxPlayer = $_POST['maxPlayer'];
						$day = $_POST['day'];
						// if (isset($_POST['time']))
						// {
						// 	$time = $_POST['time'];
						// }
						// else
						// {
						// 	$time = 
						// }
						if ($minTeams > $maxTeams)
						{
							echo '<p>The minimum number of teams must be less than or equal to the maximum number of teams.</p>';
						}
						else
						{
							require_once 'DBHandler.php';
							$conn = connectDB();
							$user = $_SESSION["user"];
							$sql = "SELECT userId FROM users WHERE user = '$user'";
							$results = doSQL($conn, $sql);
							$out = $results->fetch_assoc();
							$userId = $out["userId"];
							$sql = "INSERT INTO league (creatorId, joinCode, hasStarted, leagueName, preset, isHomeAway, maxTeams, minTeams, matchDay)
									VALUES ('$userId', '$joinCode', 0, '$name', '$preset', $isHomeAway, '$maxTeams', '$minTeams', '$day')";
							doSQL($conn, $sql);
							$sql = "SELECT leagueId FROM league WHERE joinCode = '$joinCode'";
							$leagueId = mysqli_fetch_array(doSQL($conn, $sql))["leagueId"];
							header("Location: viewTable.php?league=" . $leagueId);
						}
					}
				?>
				<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
					<label>* League Name</label><br>
					<input type="text" name="name" required><br>
					<label>* League Preset</label><br>
					<select name="preset" required>
						<option hidden disabled selected value>Select A Preset</option>
						<option value="football">Football</option>
					</select><br>
					<br><label class="checkboxContainer">
						Home & Away?
						<input type="checkbox" name="isHomeAway"><br>
						<span class="checkmark"></span>
					</label>
					<label>* Minimum Number Of Teams</label><br>
					<input type="number" name="minTeams" min="3" max="100" required><br>
					<label>* Maximum Number Of Teams</label><br>
					<input type="number" name="maxTeams" min="3" max="100" required><br>
					<!-- <label>* Minimum Number Of Players</label><br>
					<input type="number" name="minPlayers" required><br>
					<label>* Maximum Number Of Players</label><br>
					<input type="number" name="maxPlayers" required><br> -->
					<label>Match Day</label><br>
					<select name="day">
						<option value selected>None</option>
						<option value="mon">Monday</option>
						<option value="tue">Tuesday</option>
						<option value="wed">Wednesday</option>
						<option value="thu">Thursday</option>
						<option value="fri">Friday</option>
						<option value="sat">Saturday</option>
						<option value="sun">Sunday</option>
					</select><br><br>
					<!-- <label>Match Time</label><br>
					<input type="time" name="time"><br><br> -->
					<input type="submit" name="submit" value="Create League"/>
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
