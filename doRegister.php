<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
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
            } else {
                echo "Passwords do not match";
            }
        ?>
    </body>
</html>
