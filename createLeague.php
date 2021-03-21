<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
    	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
        <title></title>
		<script src="javaScript.js"></script>
    </head>
    <body onload="addDropdownEvent()">
        <div class="content">
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
        		<?php
                    require_once("createNavBar.php");
                    createNavBar($_SESSION["user"]);
                ?>
        	</nav>
            <?php
    			if(isset($_SESSION["user"])) {
    				require_once("createSideBar.php");
    				createSideBar("create");
    			}
    		?>
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
                        <option value="none" selected="selected">None</option>
                        <option value="mon">Monday</option>
                        <option value="tue">Tuesday</option>
                        <option value="wed">Wednesday</option>
                        <option value="thu">Thursday</option>
                        <option value="fri">Friday</option>
                        <option value="sat">Saturday</option>
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
                        if ($name == "" or $minTeams == "" or $maxTeams == "") {
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
                            $sql = "INSERT INTO league (creatorId, leagueName, preset, maxTeams, minTeams, matchDay, matchTime)
                                    VALUES ('$out', '$name', '$preset', '$maxTeams', '$minTeams', '$day', '$time')";
                            $results = doSQL($conn, $sql);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                    }
                ?>
                <br><br>
        	</main>
            <div class="push"></div>
        </div>
        <footer>
            <img src="Footer.png" height="80px" width="100%">
            <div class="imageText">
                <p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
            </div>
        </footer>
    </body>
</html>
