<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            if (isset($_POST['submit'])) {
                // Get details from login form
                $user = $_POST['user'];
                $pass = password_hash($_POST['pass']);

                // Check if user details are valid or not
                require_once 'DBHandler.php';
                $conn = connectDB();
                $sql = "SELECT user, pass FROM users WHERE user='$user' AND pass='$pass'";
                $results = doSQL($conn, $sql);
                if ($row = $results->fetch_assoc()) {
                    // Log in
                    $_SESSION["user"] = $user;
                    header("Location: testHomePage.php");
                    exit;
                } else {
                    echo "fail"; // Go back to self
                }
            }
        ?>
        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
            Username: <input type="text" name="user"/><br>
            Password: <input type="password" name="pass"/><br>
            <input type="submit" name="submit" value="Log on"/>
            <input type="reset" value="Reset"><br>
            Don't have an account? <a href="register.php">Register</a> here
        </form>
    </body>
</html>
