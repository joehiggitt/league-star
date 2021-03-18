<?php
    // Script for dynamically creating sidebar
    function createSideBar($active="") {
        require_once("DBHandler.php");
        $user = $_SESSION["user"];
        if (isset($_GET["league"])) {
            $leagueId = $_GET["league"];
        } else {
            $leagueId = 0;
        }
        echo '<aside>';
        $conn = connectDB();
        $sql = "SELECT league.leagueId, league.leagueName
                FROM league
                INNER JOIN users ON users.userId=league.creatorId
                WHERE users.user = '$user'";
        $results = doSQL($conn, $sql);
        $count = 1;
        while($row = $results->fetch_assoc()) {
            echo '<button class="asideDropBtn">' . $row["leagueName"] . '</button>';
            echo '<div class="asideDropContainer">';
            if ($active == "table" && $leagueId == $count) {
                echo '<a href="viewTable.php?league=' . $row["leagueId"] . ' class="active"">&emsp;Table</a>';
            } else {
                echo '<a href="viewTable.php?league=' . $row["leagueId"] . '">&emsp;Table</a>';
            }
            if ($active == "fixture" && $leagueId == $count) {
                echo '<a href="viewFixtures.php?league=' . $row["leagueId"] . '" class="active">&emsp;Fixtures</a>';
            } else {
                echo '<a href="viewFixtures.php?league=' . $row["leagueId"] . '">&emsp;Fixtures</a>';
            }
            if ($active == "result" && $leagueId == $count) {
                echo '<a href="viewResults.php?league=' . $row["leagueId"] . '" class="active">&emsp;Results</a>';
            } else {
                echo '<a href="viewResults.php?league=' . $row["leagueId"] . '">&emsp;Results</a>';
            }
            if ($active == "addResult" && $leagueId == $count) {
                echo '<a href="addResults.php?league=' . $row["leagueId"] . '" class="active">&emsp;Enter Results</a>';
            } else {
                echo '<a href="addResults.php?league=' . $row["leagueId"] . '">&emsp;Enter Results</a>';
            }
            echo '</div>';
            $count += 1;
        }
        if ($active == "create") {
            echo '<a href="createLeague.php" class="active">Create New League</a>';
        } else {
            echo '<a href="createLeague.php">Create New League</a>';
        }
        if ($active == "join") {
            echo '<a href="joinLeague.php" class="active">Join League</a>';
        } else {
            echo '<a href="joinLeague.php">Join League</a>';
        }
        echo '</aside>';
    }
?>
