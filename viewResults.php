<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title> League Star - Fixture</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
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
					// Script used if login is not required to use this page
					if(isset($_SESSION["user"])) {
						echo '<div class="dropdownProfile"> 
									<button class="dropbtn">' . $_SESSION["user"] . '</button>
									<div class="dropdown-content">
										<a href="profile.php">View profile</a>
										<a href="logout.php">Sign Out</a>
									</div>
								</div>';
						/*echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';*/
					}
					else {
						echo '<li style="float:right"><a href="register.php">Register</a></li>';
						echo '<li style="float:right"><a href="login.php">Sign In</a></li>';
					}
				?>
			</ul>
		</nav>
		<div class="asideNav">
            <button class="dropdown-btn">League 1</button>
            <div class="dropdown-container">
                <a href="viewTable.php">Table</a>
                <a href="viewFixtures.php">Fixtures</a>
                <a href="viewResults.php">Results</a>
            </div>
            <a href="createLeague.php">Create New League</a>
            <a href="joinLeague.php">Join League</a>
        </div>
		<main style="text-align: center;">
			<h2>League 1 Results</h2>
			<div>
				<h4>Matchday 1 (DATE)</h4>
				<table class="styled-table">
			    <!-- <thead>
			        <tr>
			            <th>  Team1  </th>
			            <th>  Match</th>
			            <th>  Score  </th>
			            <th>  Team2  </th>
			        </tr>
			    </thead> -->
			    <tbody>
			        <tr class="active-row">
			            <td>  Manchester City  </td>
			            <td>  3  </td>
			            <td>  0  </td>
			            <td>  Manchester United  </td>

			        </tr>
			        <tr>
			            <td>  Arsenal  </td>
			            <td>  2  </td>
			            <td>  2  </td>
			            <td>  Brighton & Hove Albion  </td>
			        </tr>
			        <tr>
			            <td>  Liverpool  </td>
			            <td>  1  </td>
			            <td>  1  </td>
			            <td>  Everton  </td>
			        </tr>
			        <!-- and so on... -->
			    </tbody>
			</table>
		</div>
		<div style="text-align: center;">
			<h4>Matchday 2 (DATE)</h4>
			<table class="styled-table">
			    <tbody>
			        <tr>
			            <td>  Brighton & Hove Albion  </td>
			            <td>  0  </td>
			            <td>  0  </td>
			            <td>  Liverpool  </td>

			        </tr>
			        <tr>
			            <td>  Arsenal  </td>
			            <td>  1  </td>
			            <td>  2  </td>
			            <td>  Manchester City  </td>
			        </tr>
			        <tr class="active-row">
			            <td>  Manchester United  </td>
			            <td>  3  </td>
			            <td>  0  </td>
			            <td>  Everton  </td>
			        </tr>
			    </tbody>
			</table>
		</div>
		<div style="text-align: center;">
			<h4>Matchday 3 (DATE)</h4>
			<table class="styled-table">
			    <tbody>
			        <tr>
			            <td>  Arsenal  </td>
			            <td>  1  </td>
			            <td>  3  </td>
			            <td>  Everton  </td>

			        </tr>
			        <tr class="active-row">
			            <td>  Liverpool  </td>
			            <td>  3  </td>
			            <td>  2  </td>
			            <td>  Manchester United  </td>
			        </tr>
			        <tr>
			            <td>  Manchester City  </td>
			            <td>  5  </td>
			            <td>  1  </td>
			            <td>  Brighton & Hove Albion  </td>
			        </tr>
			    </tbody>
			</table>
			</div>
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