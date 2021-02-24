<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
    	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
        <title></title>
    </head>
    <body>
        <?php
            // Script used if login is required to view this page
            session_start();
            if (!isset($_SESSION["user"]))
            {
                header("Location: index.php");
            }
        ?>
        <header>
    		<img src="Header.png" alt="header" height="80px" width="100%">
            <div class="imageLogo"><img src="Logo.png" height="130px"></div>
    		<div class="imageText"><h1>LeagueStar</h1></div>
    	</header>
    	<nav>
    		<ul class="navNav">
    			<li><a href="index.php">Home</a></li>
    			<li><a href="about.php">About Us</a></li>
    			<li><a href="contact.php">Contact Us</a></li>
    			<li><a href="help.php">Help</a></li>
                <?php
    				// Script used if login is required to view this page
                    echo '<li style="float:right"><a href="logout.php">Sign Out</a></li>';
                    echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';
                ?>
    		</ul>

    	</nav>
        <aside>
            <ul class="asideNav">
                <li><a href="viewLeague.php">League 1</a></li>
                <li><a href="viewTable.php">Table</a></li>
                <li><a href="viewFixtures.php">Fixtures</a></li>
                <li><a href="viewResults.php">Results</a></li>
                <li><a href="createLeague.php" id="active">Create New League</a></li>
                <li><a href="joinLeague.php">Join League</a></li>
            </ul>
        </aside>
    	<main>
    		<h2>Create New League</h2>
    		<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
                <label>* League Name</label><br>
                <input type="text" name="name" required><br>
                <label>* League Preset</label><br>
                <select name="preset" required>
                    <option value="football">Football</option>
                </select><br>
                <label>* Minimum Number Of Teams</label><br>
                <input type="number" name="minTeams" required><br>
                <label>* Maximum Number Of Teams</label><br>
                <input type="number" name="maxTeams" required><br>
                <!-- <label>* Minimum Number Of Players</label><br>
                <input type="number" name="minPlayers" required><br>
                <label>* Maximum Number Of Players</label><br>
                <input type="number" name="maxPlayers" required><br> -->
                <label>Match Day</label><br>
                <select name="day">
                    <option value="mon">Monday</option>
                    <option value="tue">Tuesday</option>
                    <option value="wed">Wednesday</option>
                    <option value="thu">Thursday</option>
                    <option value="fri">Friday</option>
                    <option value="sat" selected="selected">Saturday</option>
                    <option value="sun">Sunday</option>
                </select><br>
                <label>Match Time</label><br>
                <input type="time" name="time"><br><br>
                <input type="submit" name="submit" value="Create League"/>
            </form>
            <?php
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $preset = $_POST['preset'];
                    $minTeams = $_POST['minTeams'];
                    $maxTeams = $_POST['maxTeams'];
                    // $minPlayer = $_POST['minPlayer'];
                    // $maxPlayer = $_POST['maxPlayer'];
                    $day = $_POST['day'];
                    $time = $_POST['time'];
                    if ($name == "" or $min == "" or $max == "") {
                        echo '<p style="color: red;">Fields marked with an asterisk are required fields</p>';
                    } else {
                        require_once 'DBHandler.php';
                        $conn = connectDB();
                        print_r($_SESSION);
                        $user = $_SESSION["user"];
                        $sql = "SELECT userId FROM users WHERE user = '$user'";
                        $results = doSQL($conn, $sql);
                        $out = $results->fetch_assoc();
                        $out = $out["userId"];
                        $sql = "INSERT INTO league (userId, leagueName, preset, maxPlayer, minPlayer)
                                VALUES ('$out', '$name', '$preset', '$max', '$min')";
                        $results = doSQL($conn, $sql);
                        echo("<br>".$results."<br>");
                    }
                }
            ?>
            <br><br>
    	</main>
        <footer>
            <img src="Footer.png" height="80px" width="100%">
            <div class="imageText">
                <p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
            </div>
        </footer>
    </body>
</html>