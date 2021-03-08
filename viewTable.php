<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
	<title>League Star - viewTable</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	<script src="javaScript.js"></script>
</head>

<body onload="addDropdownEvent()">
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

	<main>
		<dev>
			<h2 style="text-align: center; margin-top: 90px; color: black; width: 400px; height: 50px; margin-left: auto; margin-right: auto;  font-size: 42px;"><b>League Name</b></h2>
		</dev>
		<dev>
		<table class="styled-table" id="LeagueTable" style="margin-top: 40px; margin-bottom: 50px; margin-left: auto; margin-right: auto;">
			    <thead>
			        <tr style="font-size: 18px; font-weight: bold; background-color: #eea941">
			           <th> # </th>
			           <th style="min-width: 600px"> Team </th> 
			           <th> GP </th> 
			           <th> W </th> 
			           <th> D </th> 
			           <th> L </th> 
			           <th> GD </th> 
			           <th> P </th>  
			        </tr>
			    </thead>
			    <tbody>
			        <tr class="active-row">
			            <td>  1  </td>
			            <td style="text-align: left;">  Team1  </td>
			            <td>  10  </td>
			            <td>  9  </td>
			            <td>  1  </td>
			            <td>  0  </td>
			            <td>  16  </td>
			            <td>  <b>28</b>  </td>
			        </tr>
			        <tr>
			            <td>  2  </td>
			            <td style="text-align: left;">  Team2  </td>
			            <td>  10  </td>
			            <td>  9  </td>
			            <td>  1  </td>
			            <td>  0  </td>
			            <td>  16  </td>
			            <td>  <b>28</b>  </td>
			        </tr>
			        <tr>
			            <td>  3  </td>
			            <td style="text-align: left;">  Team3  </td>
			            <td>  10  </td>
			            <td>  9  </td>
			            <td>  1  </td>
			            <td>  0  </td>
			            <td>  16  </td>
			            <td>  <b>28</b>  </td>
			        </tr>
			        <tr>
			            <td>  4  </td>
			            <td style="text-align: left;">  Team4  </td>
			            <td>  10  </td>
			            <td>  9  </td>
			            <td>  1  </td>
			            <td>  0  </td>
			            <td>  16  </td>
			            <td>  <b>28</b>  </td>
			        </tr>
			        <tr>
			            <td>  5  </td>
			            <td style="text-align: left;">  Team5  </td>
			            <td>  10  </td>
			            <td>  9  </td>
			            <td>  1  </td>
			            <td>  0  </td>
			            <td>  16  </td>
			            <td>  <b>28</b>  </td>
			        </tr>
			        <tr>
			            <td>  6  </td>
			            <td style="text-align: left;">  Team6  </td>
			            <td>  10  </td>
			            <td>  9  </td>
			            <td>  1  </td>
			            <td>  0  </td>
			            <td>  16  </td>
			            <td>  <b>28</b>  </td>
			        </tr>
			        <tr>
			            <td>  7  </td>
			            <td style="text-align: left;">  Team7  </td>
			            <td>  10  </td>
			            <td>  9  </td>
			            <td>  1  </td>
			            <td>  0  </td>
			            <td>  16  </td>
			            <td>  <b>28</b>  </td>
			        </tr>
			        <tr>
			            <td>  8  </td>
			            <td style="text-align: left;">  Team8  </td>
			            <td>  10  </td>
			            <td>  9  </td>
			            <td>  1  </td>
			            <td>  0  </td>
			            <td>  16  </td>
			            <td>  <b>28</b>  </td>
			        </tr>
			        <tr>
			            <td>  9  </td>
			            <td style="text-align: left;">  Team9  </td>
			            <td>  10  </td>
			            <td>  9  </td>
			            <td>  1  </td>
			            <td>  0  </td>
			            <td>  16  </td>
			            <td>  <b>28</b>  </td>
			        </tr>
			        <!-- and so on... -->
			    </tbody>
			</table>
		</dev>
		
		<dev>
			<h2 style="text-align: center; margin-top: 90px; color: black; width: 400px; height: 50px; margin-left: auto; margin-right: auto;  font-size: 42px;"><b> Latest News</b></h2>

			<h5 style="text-align: left; margin-top: 70px; color: black; height: 50px; margin-left: auto; margin-right: auto;  font-size: 25px;">DATE: NEWS NEWS NEWS NEWS NEWS NEWS</h5>
			<h5 style="text-align: left; margin-top: 10px; color: black; height: 50px; margin-left: auto; margin-right: auto;  font-size: 25px;">DATE: NEWS NEWS NEWS NEWS NEWS NEWS</h5>
		</dev>	

			

	</main>

	<footer>
			<img src="Footer.png" height="80px" width="100%">
			<div class="imageText">
				<p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
			</div>
	</footer>

</body>




</html>