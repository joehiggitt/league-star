<?php
	function printLeague($count, $active, $leagueName, $leagueId, $currentUser, $creatorId)
	{
		echo '<button class="asideDropBtn">' . $leagueName . '</button>';
		echo '<div class="asideDropContainer">';
		if ($active == "table" && $leagueId == $count) {
			echo '<a href="viewTable.php?league=' . $leagueId . ' id="active"">&emsp;Table</a>';
		} else {
			echo '<a href="viewTable.php?league=' . $leagueId . '">&emsp;Table</a>';
		}
		if ($active == "fixture" && $leagueId == $count) {
			echo '<a href="viewFixtures.php?league=' . $leagueId . '" id="active">&emsp;Fixtures</a>';
		} else {
			echo '<a href="viewFixtures.php?league=' . $leagueId . '">&emsp;Fixtures</a>';
		}
		if ($active == "result" && $leagueId == $count) {
			echo '<a href="viewResults.php?league=' . $leagueId . '" id="active">&emsp;Results</a>';
		} else {
			echo '<a href="viewResults.php?league=' . $leagueId . '">&emsp;Results</a>';
		}
		if ($active == "addResult" && $leagueId == $count && $creatorId == $currentUser) {
			echo '<a href="addResults.php?league=' . $leagueId . '" id="active">&emsp;Enter Results</a>';
		} else {
			echo '<a href="addResults.php?league=' . $leagueId . '">&emsp;Enter Results</a>';
		}
		echo '</div>';
		return $count++;
	}

	// Script for dynamically creating sidebar
	function createSideBar($active="") {
		require_once("DBHandler.php");
		$conn = connectDB();
		$user = $_SESSION["user"];
		if (isset($_GET["league"])) {
			$leagueId = $_GET["league"];
		} else {
			$leagueId = 0;
		}
		echo '<aside class="asideStl">';
		$sql = "SELECT userId FROM users WHERE user = '$user'";
		$currentUser = mysqli_fetch_array(doSQL($conn, $sql))["userId"];
		$sql = "SELECT leagueId FROM teams WHERE userId = '$currentUser'";
		$leagues = array_unique(mysqli_fetch_array(doSQL($conn, $sql)));
		$sql = "SELECT league.leagueId, league.leagueName, league.creatorId
				FROM league
				INNER JOIN users ON users.userId=league.creatorId
				WHERE users.user = '$user'";
		$results = doSQL($conn, $sql);
		$count = 1;
		$leaguesPrinted = array();
		echo '<div class="sideMenu">';
		while($row = $results->fetch_assoc()) {
			$count = printLeague($count, $active, $row["leagueName"], $row["leagueId"], $currentUser, $row["creatorId"]);
			array_push($leaguesPrinted, $row["leagueId"]);
		}
		$leagues = array_diff($leagues, $leaguesPrinted);
		foreach ($leagues as $league)
		{
			$sql = "SELECT leagueName, creatorId FROM league WHERE leagueId = '$leagueId'";
			$data = mysqli_fetch_array(doSQL($conn, $sql));
			printLeague($data["leagueName"], $active, $league, $currentUser, $data["creatorId"]);
		}
		if ($active == "create") {
			echo '<a href="createLeague.php" id="active">Create New League</a>';
		} else {
			echo '<a href="createLeague.php">Create New League</a>';
		}
		if ($active == "join") {
			echo '<a href="joinLeague.php" id="active">Join League</a>';
		} else {
			echo '<a href="joinLeague.php">Join League</a>';
		}
		echo '</div>';
		echo '</aside>';
	}
?>