<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            echo "Session superglobal array:<br>";
            print_r($_SESSION);
            if (isset($_SESSION["user"])) {
                echo "<p>Logged in<br>Click <a href='logout.php'>here</a> to log out</p>";
            } else {
                echo "<p>Not logged in<br>Click <a href='login.php'>here</a> to log in</p>";
            }
        ?>
    </body>
</html>
