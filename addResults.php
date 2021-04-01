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
            <?php
                require_once("DBHandler.php");
                if (isset($_POST['submit']))
                {
                    // $teams = $_SESSION['teams'];
                    // require_once('DBHandler.php');
                    // $conn = connectDB();
                    unset($_POST['submit']);
                    print_r($_POST);
                    $keys = array_keys($_POST);
                    $conn = connectDB();
                    for ($i=0; $i<sizeof($_POST); $i=$i+2) {
                        $team1 = $keys[$i];
                        $team2 = $keys[$i+1];
                        $score1 = $_POST[$team1];
                        $score2 = $_POST[$team2];
                        $sql = "UPDATE results
                                SET team1Score = '$score1', team2Score = '$score1'
                                WHERE team1Id = '$team1' AND team2Id = '$team2'"; // Only works if no rematch. Needs to be updated for matchday
                        $results = doSQL($conn, $sql, true);
                        print_r($results);
                    }
                    // for ($i = 0; $i < sizeof($teams); $i++)
                    // {
                    //     array_push($teams[$i], $_POST[$teams[$i][0]]);
                    //     array_push($teams[$i], $_POST[$teams[$i][1]]);
                        // $team1Id = $teams[$i][0];
                        // $team2Id = $teams[$i][1];
                        // $team1Score = $teams[$i][4];
                        // $team2Score = $teams[$i][5];
                        // $sql = "UPDATE results SET team1Score = '$team1Score', team2Score = '$team2Score' WHERE team1Id = '$team1Id' AND team2Id = '$team2Id'";
                        // $results = doSQL($conn, $sql, true);
                        // echo("<br>".$results."<br>");
                    // }
                    // for ($i = 0; $i < sizeof($teams); $i++)
                    // {
                    //     for ($j = 0; $j < sizeof($teams[$i]); $j++)
                    //     {
                    //         echo $teams[$i][$j];
                    //         echo '<br>';
                    //     }
                    // }
                }
            ?>
            <header>
        		<img src="Header.png" alt="header" height="80px" width="100%">
                <div class="imageLogo"><img src="Logo.png" height="130px"></div>
        		<div class="imageText"><h1>LeagueStar</h1></div>
        	</header>
        	<nav>
        		<?php
                    if(isset($_SESSION["user"]))
                    {
                        require_once("createNavBar.php");
                        createNavBar($_SESSION["user"]);
                    }
                ?>
        	</nav>
            <?php
    			if(isset($_SESSION["user"])) {
    				require_once("createSideBar.php");
    				createSideBar("addResult");
    			}
    		?>
        	<main>
        		<h2>Enter Results</h2>
                <?php
                    $leagueId = $_GET['league'];
                    $matchDay = 0;
                    $teams = array();

                    $sql = "SELECT team1Id, team2Id
                            FROM results
                            WHERE leagueId = '$leagueId' AND
                                  team1Score IS NULL AND
                                  team2Score IS NULL";
                    $results = doSQL($conn, $sql);
                    $data = mysqli_fetch_array($results);
                    while ($result = $results->fetch_assoc())
                    {
                        array_push($teams, array($result["team1Id"], $result["team2Id"])); // Need to switch to team name
                    }
                    // for ($i = 0; $i < sizeof($teams); $i++)
                    // {
                    //     $team1Id = $teams[$i][0];
                    //     $team2Id = $teams[$i][1];
                    //     $sql = "SELECT teamName FROM teams
                    //         WHERE teamId = '$team1Id' OR teamId = '$team2Id'";
                    //     $results = doSQL($conn, $sql);
                    //     if ($results->num_rows !== 0)
                    //     {
                    //         $teams = array();
                    //         while ($result = $results->fetch_assoc())
                    //         {
                    //             array_push($teams[$i], $result["team1Id"]);
                    //             array_push($teams[$i], $result["team2Id"]);
                    //         }
                    //     }
                    // }

                    $teams = array(
                        array("Team 1", "Team 2"),
                        array("Team 3", "Team 4"),
                        array("Team 5", "Team 6"),
                        array("Team 7", "Team 8")
                    );
                    // for ($i = 0; $i < sizeof($teams); $i++)
                    // {
                    //     for ($j = 0; $j < sizeof($teams[$i]); $j++)
                    //     {
                    //         echo $teams[$i][$j];
                    //         echo '<br>';
                    //     }
                    // }
                    if (!isset($_SESSION['teams']))
                    {
                        $_SESSION['teams'] = $teams;
                    }

                    echo '<form action="' . htmlentities($_SERVER['PHP_SELF']) . '?league=' . $leagueId . '" method="post">';
                    echo '  <table class="addResults">';
                    for ($i = 0; $i < sizeof($teams); $i++)
                    {
                        echo '      <tr>';
                        echo '          <td>' . $teams[$i][0] . '</td>';
                        echo '          <td><input type="number" name="' . $teams[$i][0] . '" required></td>';
                        echo '          <td><input type="number" name="' . $teams[$i][1] . '" required></td>';
                        echo '          <td>' . $teams[$i][1] . '</td>';
                        echo '      </tr>';
                    }
                    echo '  </table><br><br>';
                    echo '  <input type="submit" name="submit" value="Add Results"/>';
                    echo '</form>';
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
