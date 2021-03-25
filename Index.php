<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>LeagueStar - Create your league for free</title>
		<meta name="description" content="LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body><!--  onload="addDropdownEvent()" -->
		<div class="content">
			<?php
				// Script used if login is required to view this page
				session_start();
				if (isset($_SESSION["user"]))
				{
					header("Location: dashboard.php");
				}
			?>
			<header>
				<img src="Header.png" height="80px" width="100%">
				<div class="imageLogo"><img src="Logo.png" height="130px"></div>
				<div class="imageText"><h1>LeagueStar</h1></div>
			</header>
			<nav>
				<?php
					require_once("createNavBar.php");
					if (isset($_SESSION["user"]))
					{
						createNavBar($_SESSION["user"], "home");
					}
					else
					{
						createNavBar("", "home");
					}
				?>
				<!-- <script src="writeNav.js"></script> -->
			</nav>
			<?php
				// Script used if login is not required to use this page
				if(isset($_SESSION["user"])) {
					require_once("createSideBar.php");
					createSideBar();
				}
			?>
			<!--<script src="writeAside.js"></script>
			<script>
				SCRIPT.pass(["League 1", "League 2"]);
			</script> -->
			<main>
				<h2>Welcome to LeagueStar!</h2>
				<p>LeagueStar is the perfect tool to create your own league with your friends, family or colleagues. From a new place to score your fantasy football to a fast way of recording your Among Us wins, LeagueStar can cover your needs.</p>
				<h2>Dashboard</h2>
				<!-- style="text-align: center; margin-top: 90px; background-color: #009879; color: white; width: 400px; height: 50px; margin-left: 250px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); font-size: 33px" -->
				<div>
					<table class="styled-table" style="margin-top: 80px; float: left; margin-left: 30px">
					    <thead>
					        <tr>
					           <th colspan="4" style="font-size: 28px"> Name of the League </th>
					        </tr>
					    </thead>
					    <tbody>
					        <tr class="active-row">
					            <td>  1  </td>
					            <td colspan="2">  Man City  </td>　
					            <td>  53  </td>

					        </tr>
					        <tr>
					            <td>  2  </td>
					            <td colspan="2">  Arsenal  </td>
					            <td>  40  </td>
					        </tr>
					        <tr>
					            <td>  3  </td>
					            <td colspan="2">  Liverpool  </td>
					            <td>  39  </td>
					        </tr>
					        <!-- and so on... -->
					    </tbody>
					</table>

					<table class="styled-table" style="margin-top: 80px; float: right; margin-right: 30px">
					    <thead>
					        <tr>
					           <th colspan="4" style="font-size: 28px"> Name of the League </th>
					        </tr>
					    </thead>
					    <tbody>
					        <tr class="active-row">
					            <td>  1  </td>
					            <td colspan="2">  Man City  </td>
					            <td>  53  </td>

					        </tr>
					        <tr>
					            <td>  2  </td>
					            <td colspan="2">  Arsenal  </td>
					            <td>  40  </td>
					        </tr>
					        <tr>
					            <td>  3  </td>
					            <td colspan="2">  Liverpool  </td>
					            <td>  39  </td>
					        </tr>
					        <!-- and so on... -->
					    </tbody>
					</table>
				</div>

				<div>
				<table class="styled-table" style="margin-top: 80px; float: left; margin-left: 30px; margin-bottom: 40px;">
					    <thead>
					        <tr>
					           <th colspan="4" style="font-size: 28px"> Name of the League </th>
					        </tr>
					    </thead>
					    <tbody>
					        <tr class="active-row">
					            <td>  1  </td>
					            <td colspan="2">  Man City  </td>
					            <td>  53  </td>

					        </tr>
					        <tr>
					            <td>  2  </td>
					            <td colspan="2">  Arsenal  </td>
					            <td>  40  </td>
					        </tr>
					        <tr>
					            <td>  3  </td>
					            <td colspan="2">  Liverpool  </td>
					            <td>  39  </td>
					        </tr>
					        <!-- and so on... -->
					    </tbody>
					</table>

					<table class="styled-table" style="margin-top: 80px; float: right; margin-right: 30px; margin-bottom: 40px;">
					    <thead>
					        <tr>
					           <th colspan="4" style="font-size: 28px"> Name of the League </th>
					        </tr>
					    </thead>
					    <tbody>
					        <tr class="active-row">
					            <td>  1  </td>
					            <td colspan="2">  Man City  </td>
					            <td>  53  </td>

					        </tr>
					        <tr>
					            <td>  2  </td>
					            <td colspan="2">  Arsenal  </td>
					            <td>  40  </td>
					        </tr>
					        <tr>
					            <td>  3  </td>
					            <td colspan="2">  Liverpool  </td>
					            <td>  39  </td>
					        </tr>
					        <!-- and so on... -->
					    </tbody>
					</table>
				</div>
				<br><br>
			</main>
			<div class="push"></div>
		</div>
	
		<?php
						$leagueId = $_GET["league"];
						require_once"DBHandler.php";
						$conn = connectDB();
						$sql = "SELECT results.team1Id, results.team2Id
								FROM results
								INNER JOIN league ON league.leagueId = results.leagueId
								WHERE league.leagueId = '$leagueId' AND
									  results.team1Score IS NULL AND
									  results.team2Score IS NULL";
						$results = doSQL($conn, $sql);
						if ($results->num_rows === 0) {
							echo "<p>There are no fixtures for this league</p>";
						} else {
							echo "<h4>Matchday 3 (DATE)</h4>";
							echo "<table class='styled-table'>";
							echo "<tbody>";
							while ($result = $results->fetch_assoc()) {
								echo "<tr>";
								echo "<td> " . $result['team1Id'] . " </td>";
								echo "<td> VS </td>";
								echo "<td> " . $result['team2Id'] . " </td>";
							}
							echo "</tbody>";
							echo "</table>";
						}
					?>
		<footer>
			<img src="Footer.png" height="80px" width="100%">
			<div class="imageText">
				<p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
			</div>
		</footer>
	</body>
</html>