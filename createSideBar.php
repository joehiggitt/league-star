<?php
	function printLeague($active, $leagueName, $leagueId, $currentLeague, $currentUser, $creatorId, $hasStarted = 0)
	{
		echo '<button class="asideDropBtn" id="asideDBtn">' . $leagueName . '</button>';
		echo '<div class="asideDropContainer">';
		if ($active == "table" && $leagueId == $currentLeague) {
			echo '<a href="viewTable.php?league=' . $leagueId . '" id="active">&emsp;Table</a>';
		} else {
			echo '<a href="viewTable.php?league=' . $leagueId . '">&emsp;Table</a>';
		}
		if ($active == "fixture" && $leagueId == $currentLeague) {
			echo '<a href="viewFixtures.php?league=' . $leagueId . '" id="active">&emsp;Fixtures</a>';
		} else {
			echo '<a href="viewFixtures.php?league=' . $leagueId . '">&emsp;Fixtures</a>';
		}
		if ($active == "result" && $leagueId == $currentLeague) {
			echo '<a href="viewResults.php?league=' . $leagueId . '" id="active">&emsp;Results</a>';
		} else {
			echo '<a href="viewResults.php?league=' . $leagueId . '">&emsp;Results</a>';
		}
		if ($creatorId == $currentUser && $hasStarted == 1)
		{
			if ($active == "addResult" && $leagueId == $currentLeague) {
				echo '<a href="addResults.php?league=' . $leagueId . '" id="active">&emsp;Enter Results</a>';
			} else {
				echo '<a href="addResults.php?league=' . $leagueId . '">&emsp;Enter Results</a>';
			}
		}
		echo '</div>';
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
		$leagues = mysqli_fetch_array(doSQL($conn, $sql));
		$sql = "SELECT league.leagueId, league.leagueName, league.creatorId, league.hasStarted
				FROM league
				INNER JOIN users ON users.userId=league.creatorId
				WHERE users.user = '$user'";
		$results = doSQL($conn, $sql);
		$leaguesPrinted = array();
		echo '<div class="sideMenu" id="thesideMenu">';
		while($row = $results->fetch_assoc()) {
			printLeague($active, $row["leagueName"], $row["leagueId"], $leagueId, $currentUser, $row["creatorId"], $row["hasStarted"]);
			array_push($leaguesPrinted, $row["leagueId"]);
		}
		if ($leagues != null)
		{
			$leagues = array_diff(array_unique($leagues), $leaguesPrinted);
			foreach ($leagues as $league)
			{
				$sql = "SELECT leagueName, creatorId FROM league WHERE leagueId = '$league'";
				$data = mysqli_fetch_array(doSQL($conn, $sql));
				printLeague($active, $data["leagueName"], $league, $leagueId, $currentUser, $data["creatorId"]);
				array_push($leaguesPrinted, $league);
			}
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
		return $leaguesPrinted;
	}
?>
