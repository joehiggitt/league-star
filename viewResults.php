<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="View your league's recent results.">
		<?php
			$leagueId = $_GET['league'];
			require_once("DBHandler.php");
			$conn = connectDB();
			$sql = "SELECT leagueName, joinCode FROM league
					WHERE leagueId = '$leagueId'";
			$data = mysqli_fetch_array(doSQL($conn, $sql));
			$leagueName = $data['leagueName'];
			echo '<title>Results - ' . $leagueName . ' - LeagueStar</title>';
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
				if (!isset($_GET["league"]))
                {
                    header("Location: dashboard.php");
                }
                elseif (strlen($_GET["league"]) != 1)
                {
                    header("Location: dashboard.php");
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
					createSideBar("result");
				}
						
			?>
			<main style="text-align: center;">
				<?php echo '<h2>' . $leagueName . ' Results</h2>'; ?>
				<div style="text-align: center;">
					<?php
						$leagueId = $_GET["league"];
						$conn = connectDB();
						$sql = "SELECT results.team1Id, results.team2Id, results.team1Score, results.team2Score, results.matchDay
								FROM results
								INNER JOIN league ON league.leagueId = results.leagueId
								WHERE league.leagueId = '$leagueId' AND
									  NOT results.team1Score IS NULL AND
									  NOT results.team2Score IS NULL";
						$results = doSQL($conn, $sql);
						if ($results->num_rows === 0) {
							echo "<p>There are no results for this league.</p>";
						} else {
							$results = array();
							$matchDays = array();
							while ($result = $results->fetch_assoc()) {
								$team1Id = $result["team1Id"];
								$team2Id = $result["team2Id"];
								$sql = "SELECT teamName FROM teams WHERE teamId = ";
								$team1Name = mysqli_fetch_array(doSQL($conn, $sql . "'$team1Id'"))["teamName"];
								$team2Name = mysqli_fetch_array(doSQL($conn, $sql . "'$team2Id'"))["teamName"];
								array_push($results, array($team1Name, $team2Name, $result['matchDay']));
								if(!in_array($result['matchDay'], $matchDays)) {
									array_push($matchDays, $result['matchDay']);
								}
							}
							sort($matchDays);
							for ($i=0; $i < count($matchDays); $i++) {
								echo "<h3>Matchday " . ($matchDays[$i] + 1) . "</h3>";
								echo "<table class='styled-table'>";
								echo "<tbody>";
								for ($j=0; $j < count($results); $j++) {
									if ($results[$j][2] === $matchDays[$i]) {
										echo "<tr>";
										echo "<td> " . $results[$j][0] . " </td>";
										echo "<td> VS </td>";
										echo "<td> " . $results[$j][1] . " </td>";
										echo "</tr>";
									}
								}
								echo "</tbody>";
								echo "</table>";
							}
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
