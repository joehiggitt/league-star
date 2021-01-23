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
            $passCheck = $_POST['passCheck'];

            if ($pass == $passCheck) {
                require_once 'DBHandler.php';
                $conn = connectDB();
                $sql = "INSERT INTO users (user, pass)
                        VALUES ('$user', '$pass')";
                $results = doSQL($conn, $sql);
                echo($results);
            }
        ?>
    </body>
</html>
