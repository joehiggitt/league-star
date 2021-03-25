<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>League Star - viewTable</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
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
					createNavBar($_SESSION["user"], "home");
				?>
			</nav>
			<?php
				if(isset($_SESSION["user"])) {
					require_once("createSideBar.php");
					createSideBar();
				}
			?>

			<main>
				<h2 style="text-align: center">Dashboard</h2>
				<!-- style="text-align: center; margin-top: 90px; background-color: #009879; color: white; width: 400px; height: 50px; margin-left: 250px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); font-size: 33px" -->
				<div>
					<br><br>
					<table class="styled-table">
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
					<br><br>

					<table class="styled-table">
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
					<br><br>
				</div>

				<div>
				<table class="styled-table">
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
					<br><br>

					<table class="styled-table">
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
					<br><br><br>
				</div>
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
