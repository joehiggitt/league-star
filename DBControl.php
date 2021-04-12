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
			// $sql = "SELECT * FROM teams WHERE leagueId = '$leagueId'";
			// $results = doSQL($conn, $sql);
			// echo('<br>---<br>');
			// print_r($results);
			// echo('<br>---<br>');
			// $teams = $results->fetch_all();
			// echo('<br>---<br>');
			// print_r($teams);
			// echo('<br>---<br>');
			// echo('<br>---<br>');

			// for ($i = 0; $i < sizeof($teams); $i++)
			// {
			// 	echo($teams[$i] . "<br>");
			// }
		?>
	</body>
</html>
