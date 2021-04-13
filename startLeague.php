<?php
	require_once("DBHandler.php");
	$conn = connectDB();
	$leagueId = $_GET['league'];
	$sql = "UPDATE league SET hasStarted = 1 WHERE leagueId = '$leagueId'";
	doSQL($conn, $sql);
	$sql = "SELECT teamId FROM teams WHERE leagueId = '$leagueId'";
	$results = doSQL($conn, $sql);
	$teams = array();
	while ($result = $results->fetch_assoc())
	{
		array_push($teams, $result["teamId"]);
	}
	$sql = "SELECT isHomeAway FROM league WHERE leagueId = '$leagueId'";
	$isHomeAway = mysqli_fetch_array(doSQL($conn, $sql))["isHomeAway"];
	require_once("generateFixtures.php");
	$fixtureList = generateFixtures($teams, $isHomeAway);




	for ($i = 0; $i < sizeof($fixtureList); $i++)
	{
		for ($j = 0; $j < sizeof($fixtureList[$i]); $j++)
		{
			$team1Id = $fixtureList[$i][$j][0];
			$team2Id = $fixtureList[$i][$j][1];
			$sql = "INSERT INTO results (leagueId, team1Id, team2Id, matchDay) VALUES ('$leagueId', '$team1Id', '$team2Id', '$i')";
			doSQL($conn, $sql);
			// echo($fixtureList[$i][$j][0] . " v " . $fixtureList[$i][$j][1] . "<br><br>");
		}
	}

	header("Location: viewTable.php?league=" . $leagueId);
?>