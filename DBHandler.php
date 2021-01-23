<?php
    $testMsgs = true;

    $database_host = "localhost";
    $database_user = "root";
    $database_pass = "root";
    $database_name = "loginTest";

    function createDB() {
        $conn = mysqli_connect($GLOBALS['database_host'],
                               $GLOBALS['database_user'],
                               $GLOBALS['database_pass']);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Initial Connect";

        $sql = "CREATE DATABASE IF NOT EXISTS loginTest";
        echo doSQL($conn, $sql);

        $conn = connectDB();
        $sql = "CREATE TABLE IF NOT EXISTS users (
                    userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    user VARCHAR(30) NOT NULL UNIQUE,
                    pass VARCHAR(128) NOT NULL
                )";
        echo doSQL($conn, $sql);
        $sql = 'INSERT INTO users(user, pass) VALUES ("user", "pass")';
        echo doSQL($conn, $sql);
    }

    function connectDB() {
        $conn = mysqli_connect($GLOBALS['database_host'],
                               $GLOBALS['database_user'],
                               $GLOBALS['database_pass'],
                               $GLOBALS['database_name']);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
        return $conn;
    }

    function doSQL($conn, $sql) {
        if($GLOBALS['testMsgs']) {
            echo ("<br><code>SQL: $sql</code>");
            if ($result = $conn->query($sql))
                echo "<code> - OK</code>";
            else
                echo ("<code> - FAIL! " . $conn->error . " </code>");
        }
        else
            $result = $conn->query($sql);
        return $result;
    }

    createDB();
?>
