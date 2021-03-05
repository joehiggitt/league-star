<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>League Star - viewTable</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
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
				// Script used if login is not required to use this page
				if(isset($_SESSION["user"])) {
					echo '<li style="float:right"><a href="logout.php">Sign Out</a></li>';
					echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';
				}
				else {
					echo '<li style="float:right"><a href="register.php">Register</a></li>';
					echo '<li style="float:right"><a href="login.php">Sign In</a></li>';
				}
			?>
			</ul>
		</nav>
		<aside>
			<ul class="asideNav">
			<li><a href="viewLeague.php">League 1</a></li>
			<li><a href="viewTable.php" id="active">Table</a></li>
			<li><a href="viewFixtures.php">Fixtures</a></li>
			<li><a href="viewResults.php">Results</a></li>
			<li><a href="createLeague.php">Create New League</a></li>
			<li><a href="joinLeague.php">Join League</a></li>
			</ul>
		</aside>
		<main><!--  style="text-align: center;" -->
			<!-- style="text-align: center; margin-top: 90px; color: black; width: 400px; height: 50px; margin-left: auto; margin-right: auto;  font-size: 42px;" -->
			<h2>League Name</h2>
			<div>
				<!-- class="styled-table" style="margin-top: 40px; margin-bottom: 50px; margin-left: auto; margin-right: auto;" -->
				<table id="leagueTable">
					<tr id="header">
						<td class="posColumn" style="font-weight: normal;">#</td>
						<!-- style="text-align: left;" -->
						<td class="teamColumn">Team</td>
						<td class="dataColumn">GP</td>
						<td class="dataColumn">W</td>
						<td class="dataColumn">D</td>
						<td class="dataColumn">L</td>
						<td class="dataColumn">GD</td>
						<td class="pointsColumn" style="font-weight: normal;">P</td>
					</tr>
					<!-- class="active-row" -->
					<tr id="winnerRow">
						<td class="posColumn">1</td>
						<!-- style="text-align: left;" -->
						<td class="teamColumn">Oak FC</td>
						<td class="dataColumn">10</td>
						<td class="dataColumn">9</td>
						<td class="dataColumn">1</td>
						<td class="dataColumn">0</td>
						<td class="dataColumn">16</td>
						<td class="pointsColumn">28</td>
					</tr>
					<tr class="runnersUpRow">
						<td class="posColumn">2</td>
						<!-- style="text-align: left;" -->
						<td class="teamColumn">Owens United</td>
						<td class="dataColumn">10</td>
						<td class="dataColumn">6</td>
						<td class="dataColumn">3</td>
						<td class="dataColumn">1</td>
						<td class="dataColumn">8</td>
						<td class="pointsColumn">21</td>
					</tr>
					<tr class="runnersUpRow">
						<td class="posColumn">3</td>
						<!-- style="text-align: left;" -->
						<td class="teamColumn">Richmond Rovers</td>
						<td class="dataColumn">10</td>
						<td class="dataColumn">4</td>
						<td class="dataColumn">3</td>
						<td class="dataColumn">3</td>
						<td class="dataColumn">5</td>
						<td class="pointsColumn">15</td>
					</tr>
					<tr>
						<td class="posColumn">4</td>
						<!-- style="text-align: left;" -->
						<td class="teamColumn">Sheavyn City</td>
						<td class="dataColumn">10</td>
						<td class="dataColumn">2</td>
						<td class="dataColumn">2</td>
						<td class="dataColumn">6</td>
						<td class="dataColumn">-9</td>
						<td class="pointsColumn">8</td>
					</tr>
					<tr>
						<td class="posColumn">5</td>
						<!-- style="text-align: left;" -->
						<td class="teamColumn">Asburne Albion</td>
						<td class="dataColumn">10</td>
						<td class="dataColumn">0</td>
						<td class="dataColumn">6</td>
						<td class="dataColumn">4</td>
						<td class="dataColumn">-14</td>
						<td class="pointsColumn">6</td>
					</tr>
					<tr>
						<td class="posColumn">6</td>
						<!-- style="text-align: left;" -->
						<td class="teamColumn">Unsworth Town</td>
						<td class="dataColumn">10</td>
						<td class="dataColumn">0</td>
						<td class="dataColumn">2</td>
						<td class="dataColumn">8</td>
						<td class="dataColumn">-17</td>
						<td class="pointsColumn">2</td>
					</tr>
					<!-- and so on... -->
				</table>
			</div>
			<div>
				<!-- style="text-align: center; margin-top: 90px; color: black; width: 400px; height: 50px; margin-left: auto; margin-right: auto;  font-size: 42px;" -->
				<h2>Latest News</h2>
				<!-- style="text-align: left; margin-top: 70px; color: black; height: 50px; margin-left: auto; margin-right: auto;  font-size: 25px;" -->
				<p>DATE: News</p>
				<p>DATE: News</p>
			</div>	
		</main>
		<footer>
		<img src="Footer.png" height="80px" width="100%">
		<div class="imageText">
		<p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
		</div>
		</footer>
	</body>
</html>