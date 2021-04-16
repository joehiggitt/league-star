<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Your LeagueStar Dashboard.">
		<title>My Dashboard - LeagueStar</title>
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
					createNavBar($_SESSION["user"], "home");
				?>
			</nav>
			<?php
				if(isset($_SESSION["user"])) {
					require_once("createSideBar.php");
					$leagues = createSideBar();
				}
			?>

			<main style="align-content: center; text-align: center;">
				<h2>Dashboard</h2>
				<!-- style="text-align: center; margin-top: 90px; background-color: #009879; color: white; width: 400px; height: 50px; margin-left: 250px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); font-size: 33px" -->
				<div id="dash">
					<?php
						require_once("DBHandler.php");
						$conn = connectDB();
						$content = array();
						for ($i = 0; $i < count($leagues); $i++)
						{ 
							$sql = "SELECT teamId, matchesPlayed, totalScore FROM totalScore
								WHERE leagueId = '$leagues[$i]'
								ORDER BY totalScore DESC, goalDifference DESC";
							$results = doSQL($conn, $sql);
							array_push($content, array());
							if ($results->num_rows !== 0)
							{
								while ($result = $results->fetch_assoc())
								{
									if ($result["matchesPlayed"] == "0")
									{
										array_push($content[$i], "<p>League hasn't started yet.</p>");
										break;
									}
									$teamId = $result['teamId'];
									$sql = "SELECT teamName FROM teams
											WHERE teamId = '$teamId'";
									$data = mysqli_fetch_array(doSQL($conn, $sql));
									array_push($content[$i], array($data["teamName"], $result["totalScore"]));
								}
							}
							else
							{
								array_push($content[$i], "<p>League hasn't started yet.</p>");
							}
						}
						for ($i = 0; $i < count($content); $i++)
						{
							$sql = "SELECT leagueName FROM league WHERE leagueId = '$leagues[$i]'";
							$leagueName = mysqli_fetch_array(doSQL($conn, $sql))["leagueName"];
							echo '<div class="dashContainer"><a href="viewTable.php?league=' . $leagues[$i] . '" class="dashTableContainer"><div>';
							echo '	<h3>' . $leagueName . '</h3>';
							if (count($content[$i]) == 1)
							{
								echo $content[$i][0];
							}
							else
							{
								echo '	<table class="dashTable">';
								for ($j = 0; $j < 3; $j++)
								{
									if ($j == 0)
									{
										echo '		<tr class="winnerRow">';
									}
									else
									{
										echo '		<tr class="runnerUpRow">';
									}
									echo '			<td class="posColumn">' . ($j + 1) . '</td>';
									echo '			<td class="teamColumn">' . $content[$i][$j][0] . '</td>';
									echo '			<td class="pointsColumn">' . $content[$i][$j][1] . '</td>';
									echo '		</tr>';
								}
								echo '	</table>';
							}
							echo '</div></a></div>';
							// echo '<br><br>';
						}
					?>
				</div>
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
