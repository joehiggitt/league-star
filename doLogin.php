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
            $sql = "CREATE TABLE IF NOT EXISTS users (
                        userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        user VARCHAR(30) NOT NULL UNIQUE,
                        pass VARCHAR(128) NOT NULL
                    )";
            echo doSQL($conn, $sql);
            $sql = 'INSERT INTO users(user, pass) VALUES ("user", "pass")';
            echo doSQL($conn, $sql);
            $sql = 'SELECT user, pass FROM users WHERE user=' . $user;
            $results = doSQL($conn, $sql);
            while ($row = $results->fetch_assoc()) {
                echo "$row[user] $row[pass] <br>";
            }
        ?>
    </body>
</html>
