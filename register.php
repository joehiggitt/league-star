<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            if (isset($_POST['submit'])) {
                // Get details from the register form
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $passCheck = $_POST['passCheck'];

                // Checks if the given passwords match and adds details to database
                // if they do
                if ($pass == $passCheck) {
                    require_once 'DBHandler.php';
                    $conn = connectDB();
                    $sql = "INSERT INTO users (user, pass)
                            VALUES ('$user', '$pass')";
                    $results = doSQL($conn, $sql);
                    echo($results);
                    // Log in
                } else {
                    echo "Passwords do not match";
                    // Go back to self
                }
            }
        ?>
        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
            Username: <input type="text" name="user"/><br>
            Password: <input type="password" name="pass"/><br>
            Confirm Password: <input type="password" name="passCheck"/><br>
            <input type="submit" name="submit" value="Register"/>
            <a href="login.php"><input type="button" value="Back"></a>
        </form>
    </body>
</html>
