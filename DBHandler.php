<?php
    // Constants
    $testMsgs = true;

    $database_host = "localhost";
    $database_user = "root";
    $database_pass = "root";
    $database_name = "loginTest";

    // Creates the database and table if they do not exist
    function createDB() {
        // Create database
        $conn = mysqli_connect($GLOBALS['database_host'],
                               $GLOBALS['database_user'],
                               $GLOBALS['database_pass']);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Initial Connect";

        $sql = "CREATE DATABASE IF NOT EXISTS loginTest";
        echo doSQL($conn, $sql);

        // Connect to database and create table
        $conn = connectDB();
        $sql = "CREATE TABLE IF NOT EXISTS users (
                    userId INT(6) AUTO_INCREMENT PRIMARY KEY,
                    user VARCHAR(30) NOT NULL UNIQUE,
                    pass VARCHAR(128) NOT NULL
                )";
        echo doSQL($conn, $sql);
        $sql = "CREATE TABLE IF NOT EXISTS league (
                    leagueId INT(6) AUTO_INCREMENT PRIMARY KEY,
                    userId INT(6),
                    leagueName VARCHAR(30) NOT NULL UNIQUE,
                    preset VARCHAR(20) NOT NULL,
                    maxPlayer INT(3),
                    minPlayer INT(3),
                    CONSTRAINT 'fk_user'
                        FOREIGN KEY (userId) References user (userId)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE
                )";
        echo doSQL($conn, $sql);
        $sql = 'INSERT INTO users(user, pass) VALUES ("user", "pass")';
        echo doSQL($conn, $sql);
    }

    // Connects to the database and returns the connection
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

    // Executes an sql statement taking the sql connection and the sql statement
    // as parameters, any results are returned
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
