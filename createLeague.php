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
            if (!isset($_SESSION["user"])) {
                header("Location: index.php");
            }
    	?>
        <header>
    		<img src="Header.png" alt="header" height="80px" width="100%">
    		<div class="imageText"><h1>LeagueStar</h1></div>
    	</header>
    	<nav>
    		<ul class="navNav">
    			<li><a href="index.php">Home</a></li>
    			<li><a href="about.php">About Us</a></li>
    			<li><a href="contact.php">Contact</a></li>
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
                <li>&#9;<a href="viewFixtures.php">Fixtures</a></li>
                <li>&#9;<a href="viewResults.php">Results</a></li>
                <li>&#9;<a href="createLeague.php" id="active">Create New League</a></li>
    			<li>&#9;<a href="addPlayers.php">Add Players</a></li>
                <li><a href="joinLeague.php">Join League</a></li>
            </ul>
        </aside>
    	<main>
    		<h3>Create New League</h3>
    		<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
                *League Name <input type="text" name="name"><br>
                *League Pre-set <select name="preset">
                    <option value="football">Football</option>
                </select><br>
                *Minimum Number of Teams <input type="number" name="min"><br>
                *Maximum Number of Teams <input type="number" name="max"><br>
                <input type="submit" name="submit" value="Create League"/><br>
            </form>
            <?php
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $preset = $_POST['preset'];
                    $min = $_POST['min'];
                    $max = $_POST['max'];
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
    	</main>
        <footer>
    		<img src="Footer.png" height="80px" width="100%">
    		<div class="imageText">
    			<p><a href="contact.php" class="class">Contact Us</a>&emsp;&emsp;<a href="help.php" class="class">Help</a>&emsp;&emsp;<a href="terms.php" class="class">Terms & Conditions</a></p>
    		</div>
    	</footer>
    </body>
</html>
