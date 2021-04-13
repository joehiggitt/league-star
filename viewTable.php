<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="View your leagues's current table.">
		<?php
			$leagueId = $_GET['league'];
			require_once("DBHandler.php");
			$conn = connectDB();
			$sql = "SELECT leagueName, joinCode FROM league
					WHERE leagueId = '$leagueId'";
			$data = mysqli_fetch_array(doSQL($conn, $sql));
			$leagueName = $data['leagueName'];
			$joinCode = $data['joinCode'];
			echo '<title>' . $leagueName . ' - LeagueStar</title>';
		?>
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
					createSideBar("table");
				}
			?>
			<main style="text-align: center;">
				<!-- style="text-align: center; margin-top: 90px; color: black; width: 400px; height: 50px; margin-left: auto; margin-right: auto;  font-size: 42px;" -->
				<?php
					$sql = "SELECT * FROM totalScore
							WHERE leagueId = '$leagueId'
							ORDER BY totalScore DESC, goalDifference DESC";
					$results = doSQL($conn, $sql);
					$content = array();
					$numTeams = 0;
					if ($results->num_rows !== 0)
					{
						while ($result = $results->fetch_assoc()) {
							$teamId = $result['teamId'];
							$sql = "SELECT teamName FROM teams
									WHERE teamId = '$teamId'";
							$data = mysqli_fetch_array(doSQL($conn, $sql));
							array_push($content, array($data["teamName"],
													   $result["matchesPlayed"],
													   $result["wins"],
													   $result["draws"],
													   $result["losses"],
													   $result["goalDifference"],
													   $result["totalScore"]));
							$numTeams++;
						}
					} else {
						array_push($content, array("","","","","","",""));
					}
					echo '<h2>' . $leagueName . '</h2>';
					echo '<p>Join Code: ' . $joinCode . '</p>';
					// $_SESSION["leagueName"] = $data['leagueName'];
					// $_SESSION["leagueId"] = $leagueId;
				?>
				<div>
					<?php
						// $content = array(
						// 	array("Oak FC", "10", "9", "1", "0", "16", "28"),
						// 	array("Owens United", "10", "6", "3", "1", "8", "21"),
						// 	array("Richmond Rovers", "10", "4", "3", "3", "5", "15"),
						// 	array("Sheavyn City", "10", "2", "2", "6", "-9", "8"),
						// 	array("Asburne Albion", "10", "0", "6", "4", "-14", "6"),
						// 	array("Unsworth Town", "10", "0", "2", "8", "-17", "2"),
						// );

						if ($results->num_rows === 0)
						{
							echo "<p>There are no teams in this league.</p>";
						}
						else
						{

							echo '<table id="leagueTable">';
							echo '	<tr id="header">';
							echo '		<td class="posColumn" style="font-weight: normal;">#</td>';
							echo '		<td class="teamColumn">Team</td>';
							echo '		<td class="dataColumn">GP</td>';
							echo '		<td class="dataColumn">W</td>';
							echo '		<td class="dataColumn">D</td>';
							echo '		<td class="dataColumn">L</td>';
							echo '		<td class="dataColumn">GD</td>';
							echo '		<td class="pointsColumn" style="font-weight: normal;">P</td>';

							for ($i = 0; $i < count($content); $i++)
							{
								echo '	</tr>';
								if ($i == 0)
								{
									echo '	<tr id="winnerRow">';
								}
								elseif ($i < 3)
								{
									echo '	<tr class="runnersUpRow">';
								}
								else
								{
									echo '	<tr>';
								}
								echo '		<td class="posColumn">' . ($i + 1) . '</td>';
								echo '		<td class="teamColumn">' . $content[$i][0] . '</td>';
								echo '		<td class="dataColumn">' . $content[$i][1] . '</td>';
								echo '		<td class="dataColumn">' . $content[$i][2] . '</td>';
								echo '		<td class="dataColumn">' . $content[$i][3] . '</td>';
								echo '		<td class="dataColumn">' . $content[$i][4] . '</td>';
								echo '		<td class="dataColumn">' . $content[$i][5] . '</td>';
								echo '		<td class="pointsColumn">' . $content[$i][6] . '</td>';
								echo '	</tr>';
							}
							echo '</table>';
						}
					?>
				</div>
				<!-- <div> -->
					<!-- style="text-align: center; margin-top: 90px; color: black; width: 400px; height: 50px; margin-left: auto; margin-right: auto;  font-size: 42px;" -->
					<!-- <h2>Latest News</h2> -->
					<!-- style="text-align: left; margin-top: 70px; color: black; height: 50px; margin-left: auto; margin-right: auto;  font-size: 25px;" -->
					<!-- <p>DATE: News</p>
					<p>DATE: News</p>
				</div> -->
				<?php
					$user = $_SESSION['user'];
					$sql = "SELECT userId FROM users WHERE user = '$user'";
					$userId = mysqli_fetch_array(doSQL($conn, $sql))['userId'];
					$sql = "SELECT creatorId, hasStarted, minTeams FROM league WHERE leagueId = '$leagueId'";
					$data = mysqli_fetch_array(doSQL($conn, $sql));
					$creatorId = $data['creatorId'];
					$hasStarted = $data['hasStarted'];
					$minTeams = $data['minTeams'];
					if ($userId == $creatorId)
					{
						if (($numTeams >= $minTeams) and ($hasStarted == 0))
						{
							echo '<br><form action="startLeague.php?league=' . $leagueId . '" method="post">';
							echo '	<input type="submit" value="Start League"><br><br>';
							echo '</form>';
						}
						else
						{
							echo '<p>At least ' . $minTeams . ' teams are needed to start the league.</p>';
						}

						echo '<form action="deleteLeague.php?league=' . $leagueId . '" method="post">';
						echo '	<input type="submit" value="Delete League" id="deleteButtton">';
						echo '</form>';
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