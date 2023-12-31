<?php
	require_once("DBHandler.php");
	$conn = connectDB();

	// Test user
	$hash = password_hash("pass", PASSWORD_DEFAULT);
	$sql = 'INSERT INTO users(user, pass, email) VALUES ("user", "' . $hash . '", "user@test.com")';
	doSQL($conn, $sql, true);

	// Test league
	$sql = "SELECT userId FROM users WHERE user = 'user'";
	$results = doSQL($conn, $sql, true);
	$data = mysqli_fetch_array($results);
	// echo("<br>" . $data['userId'] . "<br>");
	$userId = $data["userId"];
	$sql = "INSERT INTO league (creatorId, joinCode, hasStarted, leagueName, preset, isHomeAway, minTeams, maxTeams, matchDay) VALUES ('$userId', '12345678', 0, 'Test League', 'football', 1, '5', '15', 'sat')";
	$results = doSQL($conn, $sql, true);

	// Test teams
	$sql = "SELECT * FROM league WHERE leagueName = 'Test League' AND creatorId = '$userId'";
	$results = doSQL($conn, $sql, true);
	$data = mysqli_fetch_array($results);
	// echo("<br>LeagueId = " . $data['leagueId'] . "<br>");
	$leagueId = $data["leagueId"];

	for ($i = 0; $i < 6; $i++)
	{
		$teamName = "Team" . ($i + 1);
		$sql = "INSERT INTO teams (teamName, leagueId) VALUES ('$teamName', '$leagueId')";
		doSQL($conn, $sql, true);
		$sql = "SELECT teamId FROM teams WHERE teamName = '$teamName'";
		$results = doSQL($conn, $sql, true);
		$data = mysqli_fetch_array($results);
		// echo("<br>" . $data['teamId'] . "<br>");
		$teamId = $data["teamId"];
		$sql = "INSERT INTO totalScore (leagueId, teamId, matchesPlayed, wins, draws, losses, goalDifference, totalScore) VALUES ('$leagueId', '$teamId', '0', '0', '0', '0', '0', '0')";
		doSQL($conn, $sql, true);
	}
?>
