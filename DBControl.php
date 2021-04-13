<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			require_once "DBHandler.php";
			$conn = connectDB();
		?>
		<?php
			$sql = "DROP DATABASE loginTest";
			echo doSQL($conn, $sql, true);
			
			// $leagueId = 1;
			// $matchDay = 0;
			// $sql = "SELECT team1Id, team2Id, team1Score, team2Score FROM results WHERE leagueId = '$leagueId' AND matchDay = '$matchDay'";
			// $results = doSQL($conn, $sql, true);
			// print_r($results);
			// while ($result = $results->fetch_assoc())
			// {
			// 	echo("<br>");
			// 	print_r($result);
			// }
		?>
	</body>
</html>
