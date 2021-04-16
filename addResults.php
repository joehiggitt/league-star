<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Add results to your league.">
		<?php
			$leagueId = $_GET['league'];
			require_once("DBHandler.php");
			$conn = connectDB();
			$sql = "SELECT leagueName, joinCode FROM league
					WHERE leagueId = '$leagueId'";
			$data = mysqli_fetch_array(doSQL($conn, $sql));
			$leagueName = $data['leagueName'];
			echo '<title>Add Results - ' . $leagueName . ' - LeagueStar</title>';
		?>
		<link rel="shortcut icon" type="image/png" href="Logo.png">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<title></title>
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
				require_once("DBHandler.php");
				$conn = connectDB();
				$sql = "SELECT hasStarted FROM league WHERE leagueId = '$leagueId'";
				if (!mysqli_fetch_array(doSQL($conn, $sql))["hasStarted"])
				{
					header("Location: viewTable.php?league=" . $leagueId);
				}
			?>
			<?php
				if (isset($_POST['submit']))
				{
					unset($_POST['submit']);
					// print_r($_POST);
					// echo("<br>");
					$sql = "SELECT matchesPlayed FROM totalScore WHERE leagueId = '$leagueId'";
					$matchDay = mysqli_fetch_array(doSQL($conn, $sql))["matchesPlayed"];
					$keys = array_keys($_POST);
					for ($i = 0; $i < sizeof($_POST); $i += 2) {
						$team1Key = $keys[$i];
						$team2Key = $keys[$i+1];
						$team1Id = substr($team1Key, 0, 1);
						$team2Id = substr($team2Key, 0, 1);
						$score1 = $_POST[$team1Key];
						$score2 = $_POST[$team2Key];
						if ($score1 != "" and $score2 != "") {
							$day = substr($team1Key, 1, 1);
							$sql = "UPDATE results
									SET team1Score = '$score1', team2Score = '$score2'
									WHERE leagueId = '$leagueId' AND team1Id = '$team1Id'
									AND team2Id = '$team2Id' AND matchDay = '$day'";
							$results = doSQL($conn, $sql, true);
							// print_r($results);
							$sql = "SELECT * FROM totalScore WHERE leagueId = '$leagueId' AND teamId = '$team1Id'";
							$results = doSQL($conn, $sql);
							$team1Data = mysqli_fetch_array($results);
							$sql = "SELECT * FROM totalScore WHERE leagueId = '$leagueId' AND teamId = '$team2Id'";
							$results = doSQL($conn, $sql);
							$team2Data = mysqli_fetch_array($results);
							if ($score1 > $score2) {
								$team1Data["wins"]++;
								$team2Data["losses"]++;
								$team1Data["totalScore"] += 3;
								$score = $score1 - $score2;
								$team1Data["goalDifference"] += $score;
								$team2Data["goalDifference"] -= $score;
							}
							else if ($score1 < $score2){
								$team1Data["losses"]++;
								$team2Data["wins"]++;
								$team2Data["totalScore"] += 3;
								$score = $score2 - $score1;
								$team1Data["goalDifference"] -= $score;
								$team2Data["goalDifference"] += $score;
							}
							else {
								$team1Data["draws"]++;
								$team2Data["draws"]++;
								$team1Data["totalScore"]++;
								$team2Data["totalScore"]++;
							}
							$team1Data["matchesPlayed"]++;
							$team2Data["matchesPlayed"]++;
							$matchesPlayed = $team1Data["matchesPlayed"];
							$wins = $team1Data["wins"];
							$losses = $team1Data["losses"];
							$draws = $team1Data["draws"];
							$goalDifference = $team1Data["goalDifference"];
							$totalScore = $team1Data["totalScore"];
							$sql = "UPDATE totalScore
									SET matchesPlayed = '$matchesPlayed', wins = '$wins', losses = '$losses', draws = '$draws', goalDifference = '$goalDifference', totalScore = '$totalScore'
									WHERE leagueId = '$leagueId' AND teamId = '$team1Id'";
							doSQL($conn, $sql);

							$matchesPlayed = $team2Data["matchesPlayed"];
							$wins = $team2Data["wins"];
							$losses = $team2Data["losses"];
							$draws = $team2Data["draws"];
							$goalDifference = $team2Data["goalDifference"];
							$totalScore = $team2Data["totalScore"];
							$sql = "UPDATE totalScore
									SET matchesPlayed = '$matchesPlayed', wins = '$wins', losses = '$losses', draws = '$draws', goalDifference = '$goalDifference', totalScore = '$totalScore'
									WHERE leagueId = '$leagueId' AND teamId = '$team2Id'";
							doSQL($conn, $sql);
						}
					}
					header("Location: viewTable.php?league=" . $leagueId);
				}
			?>
			<header>
				<img src="Header.png" alt="header" height="80px" width="100%">
				<div class="imageLogo"><img src="Logo.png" height="130px"></div>
				<div class="imageText"><h1>LeagueStar</h1></div>
			</header>
			<nav>
				<?php
					if(isset($_SESSION["user"]))
					{
						require_once("createNavBar.php");
						createNavBar($_SESSION["user"]);
					}
				?>
			</nav>
			<?php
				if(isset($_SESSION["user"])) {
					require_once("createSideBar.php");
					createSideBar("addResult");
				}
			?>
			<main style="text-align: center; align-content: center;">
				<h2>Enter Results</h2>
				<p>You can enter the results for any fixture in any matchday. If a game needs to be postponed, leave the entry blank.</p>
					<?php
						$leagueId = $_GET['league'];
						// $matchDay = 0;
						$teams = array();
						$conn = connectDB();
						$sql = "SELECT matchesPlayed FROM totalScore WHERE leagueId = '$leagueId'";
						// $currentMatchDay = mysqli_fetch_array(doSQL($conn, $sql))["matchesPlayed"];
						$matchDays = array();
						$sql = "SELECT team1Id, team2Id, matchDay FROM results WHERE leagueId = '$leagueId' AND team1Score IS NULL AND team2Score IS NULL";
						$results = doSQL($conn, $sql);
						while ($result = $results->fetch_assoc())
						{
							$team1Id = $result["team1Id"];
							$team2Id = $result["team2Id"];
							$sql = "SELECT teamName FROM teams WHERE teamId = ";
							$team1Name = mysqli_fetch_array(doSQL($conn, $sql . "'$team1Id'"))["teamName"];
							$team2Name = mysqli_fetch_array(doSQL($conn, $sql . "'$team2Id'"))["teamName"];
							$day = $result["matchDay"];
							array_push($teams, array($team1Id, $team2Id, $team1Name, $team2Name, $day));
							if(!in_array($result['matchDay'], $matchDays)) {
								array_push($matchDays, $result['matchDay']);
							}
						}
						sort($matchDays);
						echo '<form action="' . htmlentities($_SERVER['PHP_SELF']) . '?league=' . $leagueId . '" method="post" class="centredForm">';
						for ($j=0; $j < count($matchDays); $j++) {
							echo '<p>Enter the results for Matchday ' . ($matchDays[$j] + 1) . '.</p>';
							echo '<table id="scoreTable">';
							for ($i = 0; $i < sizeof($teams); $i++)
							{
								if ($teams[$i][4] == $matchDays[$j]) {
									echo '<tr>';
									echo '	<td class="homeColumn">' . $teams[$i][2] . '</td>';
									echo '	<td class="dataColumn"><input type="number" min="0" name="' . $teams[$i][0] . $j . '"></td>';
									echo '	<td class="dataColumn"><input type="number" min="0" name="' . $teams[$i][1] . $j . '"></td>';
									echo '	<td class="awayColumn">' . $teams[$i][3] . '</td>';
									echo '</tr>';
								}
							}
							echo '  </table><br><br>';
						}
						echo '  <input type="submit" name="submit" value="Add Results"/>';
						echo '</form>';
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
