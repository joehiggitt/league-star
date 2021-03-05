<?php
    require_once("DBHandler.php");
    $user = $_SESSION["user"];
    echo '<div class="asideNav">';
    $conn = connectDB();
    $sql = "SELECT league.leagueId, league.leagueName
            FROM league
            INNER JOIN users ON users.userId=league.creatorId
            WHERE users.user = '$user'";
    $results = doSQL($conn, $sql);
    while($row = $results->fetch_assoc()) {
        echo '<button class="dropdown-btn">' . $row["leagueName"] . '</button>';
        echo '<div class="dropdown-container">';
        echo '<a href="viewTable.php?league=' . $row["leagueId"] . '">Table</a>';
        echo '<a href="viewFixtures.php?league=' . $row["leagueId"] . '">Fixtures</a>';
        echo '<a href="viewResults.php?league=' . $row["leagueId"] . '">Results</a>';
        echo '</div>';
    }
    echo '<a href="createLeague.php">Create New League</a>';
    echo '<a href="joinLeague.php">Join League</a>';
    echo '</div>';
?>
