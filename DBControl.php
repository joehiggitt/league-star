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
			// $sql = "DROP DATABASE loginTest";
			// echo doSQL($conn, $sql, true);
			

			$sql = "SELECT team1Id, team2Id, matchDay FROM results WHERE leagueId = '1'";
			$results = doSQL($conn, $sql, true);
			while ($result = $results->fetch_assoc())
			{
				echo("<br>");
				print_r($result);
			}
		?>
	</body>
</html>
