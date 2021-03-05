<?php
    // Constants
    // $testMsgs = true;

    $database_host = "localhost";
    $database_user = "root";
    $database_pass = "root";
    $database_name = "loginTest";

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
                    email VARCHAR(128)
                ) ENGINE=InnoDB";
        doSQL($conn, $sql);
        $sql = "CREATE TABLE IF NOT EXISTS league (
                    leagueId INT(6) AUTO_INCREMENT PRIMARY KEY,
                    creatorId INT(6) UNSIGNED NOT NULL,
                    leagueName VARCHAR(30) NOT NULL UNIQUE,
                    preset VARCHAR(20) NOT NULL,
                    maxPlayer INT(3) NOT NULL,
                    minPlayer INT(3) NOT NULL,
                    matchDay VARCHAR(10),
                    matchTime TIME,
                    CONSTRAINT fk_user
                        FOREIGN KEY (creatorId) REFERENCES users(userId)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE
                ) ENGINE=InnoDB";
        doSQL($conn, $sql);
        $sql = "CREATE TABLE IF NOT EXISTS teams (
                    teamId INT(6) AUTO_INCREMENT PRIMARY KEY,
                    teamName VARCHAR(30) NOT NULL
                ) ENGINE=InnoDB";
        doSQL($conn, $sql);
        $sql = "CREATE TABLE IF NOT EXISTS players (
                    playerId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    teamId INT(6),
                    playerName VARCHAR(30),
                    CONSTRAINT fk_player
                        FOREIGN KEY (playerId) REFERENCES users(userId)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE,
                    CONSTRAINT fk_team
                        FOREIGN KEY (teamId) REFERENCES teams(teamId)
                        ON DELETE SET NULL
                        ON UPDATE CASCADE
                ) ENGINE=InnoDB";
        doSQL($conn, $sql);
        // $sql = "SHOW ENGINE InnoDB STATUS";
        // $results = doSQL($conn, $sql);
        // while ($row = $results->fetch_assoc()) {
        //     foreach ($row as $cell) {
        //         echo $cell;
        //     }
        // }
        $sql = "CREATE TABLE IF NOT EXISTS results (
                    resultId INT(8) AUTO_INCREMENT PRIMARY KEY,
                    matchDay DATE,
                    team1Id INT(6),
                    team2Id INT(6),
                    team1Score INT(6),
                    team2Score INT(6)
                    -- CONSTRAINT fk_team1
                    --     FOREIGN KEY (team1Id) REFERENCES teams(teamId)
                    --     ON DELETE SET NULL
                    --     ON UPDATE CASCADE,
                    -- CONSTRAINT fk_team2
                    --     FOREIGN KEY (team2Id) REFERENCES teams(teamId)
                    --     ON DELETE SET NULL
                    --     ON UPDATE CASCADE
                ) ENGINE=InnoDB";
        doSQL($conn, $sql);
        $sql = "CREATE TABLE IF NOT EXISTS totalScore (
                    leagueId INT(6),
                    teamId INT(6),
                    matchesPlayed INT(6),
                    wins INT(6),
                    draws INT(6),
                    losses INT(6),
                    totalScore INT(6),
                    PRIMARY KEY(leagueId, teamId)
                    CONSTRAINT fk_league
                        FOREIGN KEY (leagueId) REFERENCES league(leagueId)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE,
                    -- CONSTRAINT fk_team
                    --     FOREIGN KEY (teamId) REFERENCES teams(teamId)
                    --     ON DELETE CASCADE
                    --     ON UPDATE CASCADE
        ) ENGINE = InnoDB";
        $sql = 'INSERT INTO users(user, pass, email) VALUES ("user", "pass", "user@test.com")';
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
    function doSQL($conn, $sql, $testMsgs=true) {
        if($testMsgs) {
            echo ("<br><code>SQL: $sql</code>");
            if ($result = $conn->query($sql))
                echo "<code> - OK</code>";
            else
                echo ("<code> - FAIL! " . $conn->error . " </code>");
        }
        else
            $result = $conn->query($sql);
        return $result;
    }

    createDB();
?>
