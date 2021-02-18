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
            $sql = "SELECT * FROM users";
            $results = doSQL($conn, $sql);
            while($row = mysqli_fetch_array($results)) {
                echo print_r($row);
                echo "<br><br>";
            }
            $sql = "DROP DATABASE loginTest";
            echo doSQL($conn, $sql);
        ?>
    </body>
</html>
