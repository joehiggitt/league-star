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
			<?php
				require_once("createNavBar.php");
				createNavBar($_SESSION["user"]);
			?>
		</nav>
		<?php
			if(isset($_SESSION["user"])) {
				require_once("createSideBar.php");
				createSideBar("fixture");
			}
		?>
		<main style="text-align: center;">
			<h2>League 1 Fixtures</h2>
			<div style="text-align: center;">
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
				        <tr>
				            <td>  Man City  </td>
				            <td>  VS  </td>
				            <td>  Man United  </td>

				        </tr>
				            <td>  Arsenal  </td>
				            <td>  VS  </td>
				            <td>  Brighton  </td>
				        </tr>
				        <tr>
				            <td>  Liverpool  </td>
				            <td>  VS  </td>
				            <td>  Everton  </td>
				        </tr>
				        <!-- and so on... -->
				    </tbody>
				</table>
			</div>
			<div>
				<h4>Matchday 2 (DATE)</h4>
				<table class="styled-table">
				    <tbody>
				        <tr>
				            <td>  Brighton  </td>
				            <td>  VS  </td>
				            <td>  Liverpool  </td>

				        </tr>
				            <td>  Arsenal  </td>
				            <td>  VS  </td>
				            <td>  Man City  </td>
				        </tr>
				        <tr>
				            <td>  Man United  </td>
				            <td>  VS  </td>
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
				            <td>  VS  </td>
				            <td>  Everton  </td>
				        </tr>
				            <td>  Liverpool  </td>
				            <td>  VS  </td>
				            <td>  Man United  </td>
				        </tr>
				        <tr>
				            <td>  Man City  </td>
				            <td>  VS  </td>
				            <td>  Brighton  </td>
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
