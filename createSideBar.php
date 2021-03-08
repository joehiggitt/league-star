<?php
    function createSideBar($active="") {
        require_once("DBHandler.php");
        $user = $_SESSION["user"];
        if (isset($_GET["league"])) {
            $leagueId = $_GET["league"];
        } else {
            $leagueId = 0;
        }
        echo '<div class="asideNav">';
        $conn = connectDB();
        $sql = "SELECT league.leagueId, league.leagueName
                FROM league
                INNER JOIN users ON users.userId=league.creatorId
                WHERE users.user = '$user'";
        $results = doSQL($conn, $sql);
        $count = 1;
        while($row = $results->fetch_assoc()) {
            echo '<button class="dropdown-btn">' . $row["leagueName"] . '</button>';
            echo '<div class="dropdown-container">';
            if ($active == "table" && $leagueId == $count) {
                echo '<a href="viewTable.php?league=' . $row["leagueId"] . ' id="active"">Table</a>';
            } else {
                echo '<a href="viewTable.php?league=' . $row["leagueId"] . '">Table</a>';
            }
            if ($active == "fixture" && $leagueId == $count) {
                echo '<a href="viewFixtures.php?league=' . $row["leagueId"] . '" id="active">Fixtures</a>';
            } else {
                echo '<a href="viewFixtures.php?league=' . $row["leagueId"] . '">Fixtures</a>';
            }
            if ($active == "result" && $leagueId == $count) {
                echo '<a href="viewResults.php?league=' . $row["leagueId"] . '" id="active">Results</a>';
            } else {
                echo '<a href="viewResults.php?league=' . $row["leagueId"] . '">Results</a>';
            }
            echo '</div>';
            $count += 1;
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
    }
?>
