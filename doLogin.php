<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            require_once 'DBHandler.php';
            $conn = connectDB();
            $sql = "SELECT user, pass FROM users WHERE user='$user'";
            $results = doSQL($conn, $sql);
            while ($row = $results->fetch_assoc()) {
                echo "$row[user] $row[pass] <br>";
            }
        ?>
    </body>
</html>
