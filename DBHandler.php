<?php
	// Constants
	// $testMsgs = true;

	$GLOBALS['database_host'] = "localhost";
	$GLOBALS['database_user'] = "root";
	$GLOBALS['database_pass'] = "root";
	$GLOBALS['database_name'] = "loginTest";

	// Creates the database and table if they do not exist
	function createDB() {
		// Create database
		$conn = mysqli_connect($GLOBALS['database_host'],
							   $GLOBALS['database_user'],
							   $GLOBALS['database_pass']);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		"Initial Connect";

		$sql = "CREATE DATABASE IF NOT EXISTS loginTest";
		doSQL($conn, $sql);

		// Connect to database and create table
		$conn = connectDB();

		$sql = "CREATE TABLE IF NOT EXISTS users (
					userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					user VARCHAR(30) NOT NULL UNIQUE,
					pass VARCHAR(128) NOT NULL,
					email VARCHAR(128) NOT NULL UNIQUE
				) ENGINE=InnoDB";
		doSQL($conn, $sql);

		$sql = "CREATE TABLE IF NOT EXISTS league (
					leagueId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					userId INT(6) UNSIGNED NOT NULL,
					joinCode INT(8) UNSIGNED NOT NULL UNIQUE,
					hasStarted BIT(1) NOT NULL,
					leagueName VARCHAR(30) NOT NULL,
					preset VARCHAR(20) NOT NULL,
					isHomeAway BIT(1) NOT NULL,
					minTeams INT(3) NOT NULL,
					maxTeams INT(3) NOT NULL,
					matchDay VARCHAR(10),
					matchTime TIME,
					CONSTRAINT fk_league_user
						FOREIGN KEY (userId) REFERENCES users(userId)
						ON DELETE CASCADE
						ON UPDATE CASCADE
				) ENGINE=InnoDB";
		doSQL($conn, $sql);

		$sql = "CREATE TABLE IF NOT EXISTS teams (
					teamId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					userId INT(6) UNSIGNED,
					leagueId INT(6) UNSIGNED NOT NULL,
					teamName VARCHAR(30) NOT NULL,
					CONSTRAINT fk_teams_league
						FOREIGN KEY (leagueId) REFERENCES league(leagueId)
						ON DELETE CASCADE
						ON UPDATE CASCADE
				) ENGINE=InnoDB";

				// userId INT(6) UNSIGNED NOT NULL,

				// CONSTRAINT fk_teams_user
				// 		FOREIGN KEY (userId) REFERENCES users(userId)
				// 		ON DELETE CASCADE
				// 		ON UPDATE CASCADE,
		doSQL($conn, $sql);

		// $sql = "CREATE TABLE IF NOT EXISTS players (
		// 			playerId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		// 			teamId INT(6),
		// 			playerName VARCHAR(30),
		// 			CONSTRAINT fk_players_player
		// 				FOREIGN KEY (playerId) REFERENCES users(userId)
		// 				ON DELETE CASCADE
		// 				ON UPDATE CASCADE,
		// 			CONSTRAINT fk_players_team
		// 				FOREIGN KEY (teamId) REFERENCES teams(teamId)
		// 				ON DELETE SET NULL
		// 				ON UPDATE CASCADE
		// 		) ENGINE=InnoDB";
		// doSQL($conn, $sql);

		// $sql = "SHOW ENGINE InnoDB STATUS";
		// $results = doSQL($conn, $sql);
		// while ($row = $results->fetch_assoc()) {
		//     foreach ($row as $cell) {
		//         echo $cell;
		//     }
		// }
		$sql = "CREATE TABLE IF NOT EXISTS results (
					resultId INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					leagueId INT(6) UNSIGNED NOT NULL,
					team1Id INT(6) UNSIGNED NOT NULL,
					team2Id INT(6) UNSIGNED NOT NULL,
					matchDay INT(8),
					team1Score INT(6),
					team2Score INT(6),
					CONSTRAINT fk_results_league
						FOREIGN KEY (leagueId) REFERENCES league(leagueId)
						ON DELETE CASCADE
						ON UPDATE CASCADE,
					CONSTRAINT fk_results_team1
						FOREIGN KEY (team1Id) REFERENCES teams(teamId)
						ON DELETE CASCADE
						ON UPDATE CASCADE,
					CONSTRAINT fk_results_team2
						FOREIGN KEY (team2Id) REFERENCES teams(teamId)
						ON DELETE CASCADE
						ON UPDATE CASCADE
				) ENGINE=InnoDB";
		doSQL($conn, $sql);
		$sql = "CREATE TABLE IF NOT EXISTS totalScore (
					leagueId INT(6) UNSIGNED NOT NULL,
					teamId INT(6) UNSIGNED NOT NULL,
					matchesPlayed INT(6),
					wins INT(6),
					draws INT(6),
					losses INT(6),
					goalDifference INT(6),
					totalScore INT(6),
					PRIMARY KEY(leagueId, teamId),
					CONSTRAINT fk_totalScore_league
						FOREIGN KEY (leagueId) REFERENCES league(leagueId)
						ON DELETE CASCADE
						ON UPDATE CASCADE,
					CONSTRAINT fk_totalScore_team
						FOREIGN KEY (teamId) REFERENCES teams(teamId)
						ON DELETE CASCADE
						ON UPDATE CASCADE
				) ENGINE = InnoDB";
		doSQL($conn, $sql);
	}

	// Connects to the database and returns the connection
	function connectDB() {
		$conn = mysqli_connect($GLOBALS['database_host'],
							   $GLOBALS['database_user'],
							   $GLOBALS['database_pass'],
							   $GLOBALS['database_name']);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		// echo "Connected successfully";
		return $conn;
	}

	// Executes an sql statement taking the sql connection and the sql statement
	// as parameters, any results are returned
	function doSQL($conn, $sql, $testMsgs=false) {
		if($testMsgs) {
			echo ("<br><code>SQL: $sql</code>");
			if ($result = $conn->query($sql))
				echo "<code> - OK</code>";
			else
				echo ("<code> - FAIL! " . $conn->error . " </code><br>");
		}
		else
			$result = $conn->query($sql);
		return $result;
	}

	createDB();
?>
