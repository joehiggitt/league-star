<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>League Star - viewTable</title>
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
					<li><a href="index.php" id="active">Home</a></li>
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

		<main>
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
		</main>
		<footer>
			<img src="Footer.png" height="80px" width="100%">
			<div class="imageText">
				<p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
			</div>
		</footer>
	</body>
</html>