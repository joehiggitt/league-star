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
                    echo '<div class="dropdownProfile">
                            <button class="dropbtn">' . $_SESSION["user"] . '</button>
                            <div class="dropdown-content">
                                <a href="profile.php">View profile</a>
                                <a href="logout.php">Sign Out</a>
                            </div>
                        </div>';
                    /*echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';*/
                ?>
    		</ul>

    	</nav>
        <?php
			if(isset($_SESSION["user"])) {
				require_once("createSideBar.php");
				createSideBar("create");
			}
		?>
    	<main>
    		<h2>Add Results</h2>
    		<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
                <table class="addresults">
                    <tr class="active-row">
                        <td>Team 1</td>
                        <td><input type="number" name="score1" required></td>
                        <td><input type="number" name="score2" required></td>
                        <td>Team 2</td>
                    </tr>
                    <tr>
                        <td>Team 3</td>
                        <td><input type="number" name="score3" required></td>
                        <td><input type="number" name="score4" required></td>
                        <td>Team 4</td>
                    </tr>
                    <tr>
                        <td>Team 5</td>
                        <td><input type="number" name="score5" required></td>
                        <td><input type="number" name="score6" required></td>
                        <td>Team 6 </td>
                    </tr>
                </table>
                <br>
                <input type="submit" name="submit" value="Add Results"/>
            </form>
            <?php
                if (isset($_POST['submit'])) {
                    $score1 = $_POST['score1'];
                    $score2 = $_POST['score2'];
                    $score3 = $_POST['score3'];
                    $score4 = $_POST['score4'];
                    $score5 = $_POST['score5'];
                    $score6 = $_POST['score6'];
                    if ($score1 == "" or $score2 == "" or $score3 == "" or $score4 == "" or $score5 == "" or $score6 == "") {
                        echo '<p style="color: red;">All fields must be completed.</p>';
                    } else {
                        require_once 'DBHandler.php';
                        $conn = connectDB();
                        print_r($_SESSION);
                        $user = $_SESSION["user"];
                        $sql = "SELECT userId FROM users WHERE user = '$user'";
                        $results = doSQL($conn, $sql);
                        $out = $results->fetch_assoc();
                        $out = $out["userId"];
                        $sql = "INSERT INTO league (creatorId, team1score, team2score, team3score, team4score, team5score, team6score)
                                VALUES ('$out', '$score1', '$score2', '$score3', '$score4', '$score5', '$score6')";
                        $results = doSQL($conn, $sql, true);
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