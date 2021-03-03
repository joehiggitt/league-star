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
            $sql = "SELECT * FROM users WHERE user = 'John'";
            $results = doSQL($conn, $sql);
            $data = mysqli_fetch_array($results);
            echo '<br>';
            while($row = mysqli_fetch_array($results))
            {
                echo print_r($row);
                echo "<br><br>";
            }
            echo '<br>';
 

            // $sql = "DROP DATABASE loginTest";
            // $results = doSQL($conn, $sql);
        ?>
    </body>
</html>
