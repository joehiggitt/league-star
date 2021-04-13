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
        echo '<aside id="asideStl">';
        $conn = connectDB();
        $sql = "SELECT league.leagueId, league.leagueName, creatorId
                FROM league
                INNER JOIN users ON users.userId=league.creatorId
                WHERE users.user = '$user'";
        $results = doSQL($conn, $sql);
        $count = 1;

        $sql = "SELECT userId FROM users WHERE user = '$user'";
        $data = doSQL($conn, $sql);
        $currentUser = mysqli_fetch_array($data)["userId"];

        echo '<div class="sideMenu" id="thesideMenu">';
        while($row = $results->fetch_assoc()) {
            echo '<button class="asideDropBtn" id="asideDBtn">' . $row["leagueName"] . '</button>';
            echo '<div class="asideDropContainer">';
            if ($active == "table" && $leagueId == $count) {
                echo '<a href="viewTable.php?league=' . $row["leagueId"] . ' id="active"">&emsp;Table</a>';
            } else {
                echo '<a href="viewTable.php?league=' . $row["leagueId"] . '">&emsp;Table</a>';
            }
            if ($active == "fixture" && $leagueId == $count) {
                echo '<a href="viewFixtures.php?league=' . $row["leagueId"] . '" id="active">&emsp;Fixtures</a>';
            } else {
                echo '<a href="viewFixtures.php?league=' . $row["leagueId"] . '">&emsp;Fixtures</a>';
            }
            if ($active == "result" && $leagueId == $count) {
                echo '<a href="viewResults.php?league=' . $row["leagueId"] . '" id="active">&emsp;Results</a>';
            } else {
                echo '<a href="viewResults.php?league=' . $row["leagueId"] . '">&emsp;Results</a>';
            }
            if ($active == "addResult" && $leagueId == $count && $row["creatorId"] == $currentUser) {
                echo '<a href="addResults.php?league=' . $row["leagueId"] . '" id="active">&emsp;Enter Results</a>';
            } else {
                echo '<a href="addResults.php?league=' . $row["leagueId"] . '">&emsp;Enter Results</a>';
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
        echo '</aside>';
    }
?>
