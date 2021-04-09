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
						$sql = "SELECT results.team1Id, results.team2Id, results.team1Score, results.team2Score
								FROM results
								INNER JOIN league ON league.leagueId = results.leagueId
								WHERE league.leagueId = '$leagueId' AND
									  NOT results.team1Score IS NULL AND
									  NOT results.team2Score IS NULL";
						$results = doSQL($conn, $sql);
						if ($results->num_rows === 0) {
							echo "<p>There are no results for this league</p>";
						} else {
							echo "<h4>Matchday 3 (DATE)</h4>";
							echo "<table class='styled-table'>";
							echo "<tbody>";
							while ($result = $results->fetch_assoc()) {
								echo "<tr>";
								echo "<td> " . $result['team1Id'] . " </td>";
								echo "<td> " . $result['team1Score'] . " </td>";
								echo "<td> " . $result['team2Score'] . " </td>";
								echo "<td> " . $result['team2Id'] . " </td>";
							}
							echo "</tbody>";
							echo "</table>";
						}
					?>
					<!-- <h4>Matchday 3 (DATE)</h4>
					<table class="styled-table">
						<tbody>
							<tr>
								<td>  Arsenal  </td>
								<td>  1  </td>
								<td>  3  </td>
								<td>  Everton  </td>

							</tr>
							<tr class="active-row">
								<td>  Liverpool  </td>
								<td>  3  </td>
								<td>  2  </td>
								<td>  Manchester United  </td>
							</tr>
							<tr>
								<td>  Manchester City  </td>
								<td>  5  </td>
								<td>  1  </td>
								<td>  Brighton & Hove Albion  </td>
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
