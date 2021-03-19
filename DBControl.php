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
            $sql = "SELECT leagueName FROM league WHERE creatorId = '1'";
            $results = doSQL($conn, $sql, True);
            $data = mysqli_fetch_array($results);
            echo($data['leagueName']);
            while($row = mysqli_fetch_array($results))
            {
                echo print_r($row);
                echo "<br>-<br>";
            }
            echo '<br>';


            // $sql = "DROP DATABASE loginTest";
            // $results = doSQL($conn, $sql);
        ?>
    </body>
</html>
