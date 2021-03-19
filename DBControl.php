<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once "DBHandler.php";
            $conn = connectDB();
        ?>
        <?php
            // $sql = "DROP TABLE totalScore";
            // echo doSQL($conn, $sql, true);
            // $sql = "INSERT INTO results (team1Id, team2Id, leagueId, team1Score, team2Score)
            //         VALUES ('1', '2', '2', '1', '3')";
            // echo doSQL($conn, $sql, true);
            // $sql = "INSERT INTO results (team1Id, team2Id, leagueId, team1Score, team2Score)
            //         VALUES ('1', '3', '2', '3', '2')";
            // echo doSQL($conn, $sql, true);
            // $sql = "INSERT INTO results (team1Id, team2Id, leagueId, team1Score, team2Score)
            //         VALUES ('2', '3', '2', '5', '1')";
            // echo doSQL($conn, $sql, true);
            // $sql = "INSERT INTO totalScore (leagueId, teamId, matchesPlayed, wins, draws, losses, goalDifference, totalScore)
            //         VALUES ('2', '4', '10', '9', '1', '0', '16', '28'),
            //                ('2', '2', '10', '6', '3', '1', '8', '21'),
            //                ('2', '1', '10', '4', '3', '3', '5', '15'),
            //                ('2', '6', '10', '2', '2', '6', '-9', '8'),
            //                ('2', '3', '10', '0', '6', '4', '-14', '6'),
            //                ('2', '5', '10', '0', '2', '8', '-17', '2')";
            $sql = "DROP DATABASE loginTest";
            echo doSQL($conn, $sql, true);
            // $data = mysqli_fetch_array($results);
            // echo '<br>';
            // while($row = mysqli_fetch_array($results))
            // {
            //     echo print_r($row);
            //     echo "<br><br>";
            // }
            // echo '<br>';


            // $sql = "DROP DATABASE loginTest";
            // $results = doSQL($conn, $sql);
        ?>
    </body>
</html>
