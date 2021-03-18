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
            // $sql = "DROP TABLE results";
            // echo doSQL($conn, $sql, true);
            $sql = "INSERT INTO results (team1Id, team2Id, leagueId)
                    VALUES ('1', '2', '2')";
            echo doSQL($conn, $sql, true);
            $sql = "INSERT INTO results (team1Id, team2Id, leagueId)
                    VALUES ('1', '3', '2')";
            echo doSQL($conn, $sql, true);
            $sql = "INSERT INTO results (team1Id, team2Id, leagueId)
                    VALUES ('2', '3', '2')";
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
