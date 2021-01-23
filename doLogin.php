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
            $sql = "SELECT user, pass FROM users WHERE user='$user' AND pass='$pass'";
            $results = doSQL($conn, $sql);
            if ($row = $results->fetch_assoc()) {
                echo "pass"; //Logged in logic
            } else {
                echo "fail"; //Error message for incorrect details
            }
        ?>
    </body>
</html>
