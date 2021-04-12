<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="View your league's upcoming fixtures.">
		<?php
			$leagueId = $_GET['league'];
			require_once("DBHandler.php");
			$conn = connectDB();
			$sql = "SELECT leagueName, joinCode FROM league
					WHERE leagueId = '$leagueId'";
			$data = mysqli_fetch_array(doSQL($conn, $sql));
			$leagueName = $data['leagueName'];
			echo '<title>Fixtures - ' . $leagueName . ' - LeagueStar</title>';
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
					createSideBar("fixture");
				}
			?>
			<main style="text-align: center;">
				<?php echo '<h2>' . $leagueName . ' Fixtures</h2>'; ?>
				<div style="text-align: center;">
					<?php
						$leagueId = $_GET["league"];
						$conn = connectDB();
						$sql = "SELECT results.team1Id, results.team2Id, results.matchday
								FROM results
								INNER JOIN league ON league.leagueId = results.leagueId
								WHERE league.leagueId = '$leagueId' AND
									  results.team1Score IS NULL AND
									  results.team2Score IS NULL";
						$results = doSQL($conn, $sql);
						if ($results->num_rows === 0) {
							echo "<p>There are no fixtures for this league</p>";
						} else {
							$fixtures = array();
							$matchDays = array();
							while ($result = $results->fetch_assoc()) {
								array_push($fixtures, array($result['team1Id'],
															$result['team2Id'],
															$result['matchDay']));
								if(!in_array($result['matchDay'], $matchDays)) {
									array_push($matchDays, $result['matchDay']);
								}
							}
							sort($matchDays);
							for ($i=0; $i < length($matchDays); $i++) {
								echo "<h4>" . $matchDays[i] . "</h4>";
								echo "<table class='styled-table'>";
								echo "<tbody>";
								for ($j=0; $j < length($fixtures); $j++) {
									if ($fixtures[j][3] === $matchDays[i]) {
										echo "<tr>";
										echo "<td> " . $fixtures[j][0] . " </td>";
										echo "<td> VS </td>";
										echo "<td> " . $fixtures[j][1] . " </td>";
										echo "</tr>";
									}
								}
								echo "</tbody>";
								echo "</table>";
							}
						}
					?>
					<!-- <h4>Matchday 3 (DATE)</h4>
					<table class="styled-table">
						<tbody>

							<tr>
								<td>  Arsenal  </td>
								<td>  VS  </td>
								<td>  Everton  </td>
							</tr>
								<td>  Liverpool  </td>
								<td>  VS  </td>
								<td>  Man United  </td>
							</tr>
							<tr>
								<td>  Man City  </td>
								<td>  VS  </td>
								<td>  Brighton  </td>
							</tr>
						</tbody>
					</table> -->
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
