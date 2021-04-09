<?php
	require_once("DBHandler.php");
	$conn = connectDB();
	$leagueId = $_GET['league'];
	$sql = "UPDATE league SET hasStarted = 1 WHERE leagueId = '$leagueId'";
	doSQL($conn, $sql);
	header("Location: viewTable.php?league='. $leagueId .'");
?>