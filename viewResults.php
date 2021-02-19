<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<title> League Star - view Results</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">

	<style type="text/css">

	/* Styling the table */
	.styled-table {
    border-collapse: collapse; /* for smooth borders */
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif; /* choose nice one */
    min-width: 400px; /* setting the width of cells */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);}

    /* Styling the header */
    .styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;}

    /* Moving onto the table cells */
    .styled-table th,
	.styled-table td {
    padding: 12px 15px;} /* setting padding for all cells */

    /* the table rows */
    .styled-table tbody tr {
    border-bottom: 1px solid #dddddd;} /* for nice finishing, setting the colour of bottom border same colour as header */

	.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;}

	.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;}

    /* make the active row look different */
    .styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;}

	</style>
</head>

<body style="font-family: sans-serif;">
	<header style="background-color: #009879; line-height: 80px;">
		<dev>
			<h1 style="color: white; text-align: left; margin-left: 20px;">League Star <img src="LOGO.png" style="height: 90px; width: 90px; float: right;"></h1>
	</dev>

	</header>

	<nav>
		<ul class="navNav">
			<li><a href="index.php" class="active">Home</a></li>
			<li><a href="about.php">About Us</a></li>
			<li><a href="help.php">Help</a></li>
			<li style="float:right"><a href="register.php">Register</a></li>
			<li style="float:right"><a href="login.php">Sign In</a></li>
		</ul>

	</nav>

	<aside>
		<ul class="asideNav">
			<li><a href="viewLeague.php">League 1</a></li>
			<li>&#9;<a href="viewFixtures.php">Fixtures</a></li>
			<li>&#9;<a href="viewResults.php">Results</a></li>
			<li><a href="createLeague.php">Create New League</a></li>
		</ul>
	</aside>
	<dev>
		<h2 style="text-align: center;">NAME OF THE LEAGUE</h2>
	</dev>
	<dev style="text-align: center;">
		<h4>Matchday 1 (DATE)</h4>

		<table class="styled-table" style="align-content: center; margin: auto;">
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
		            <td>  3  </td>
		            <td>  0  </td>
		            <td>  Man United  </td>

		        </tr>
		        <tr class="active-row">
		            <td>  Arsenal  </td>
		            <td>  2  </td>
		            <td>  2  </td>
		            <td>  Brighton  </td>
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

	</dev>


	<dev style="text-align: center;">
		<h4>Matchday 2 (DATE)</h4>

		<table class="styled-table" style="align-content: center; margin: auto;">
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
		            <td>  Brighton  </td>
		            <td>  0  </td>
		            <td>  0  </td>
		            <td>  Liverpool  </td>

		        </tr>
		        <tr class="active-row">
		            <td>  Arsenal  </td>
		            <td>  1  </td>
		            <td>  2  </td>
		            <td>  Man City  </td>
		        </tr>
		        <tr>
		            <td>  Man United  </td>
		            <td>  3  </td>
		            <td>  0  </td>
		            <td>  Everton  </td>

		        </tr>
		        <!-- and so on... -->
		    </tbody>
		</table>
	</dev>

	<dev style="text-align: center;">
		<h4>Matchday 3 (DATE)</h4>

		<table class="styled-table" style="align-content: center; margin: auto;">
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
		            <td>  Arsenal  </td>
		            <td>  1  </td>
		            <td>  3  </td>
		            <td>  Everton  </td>

		        </tr>
		        <tr class="active-row">
		            <td>  Liverpool  </td>
		            <td>  3  </td>
		            <td>  2  </td>
		            <td>  Man United  </td>
		        </tr>
		        <tr>
		            <td>  Man City  </td>
		            <td>  5  </td>
		            <td>  1  </td>
		            <td>  Brighton  </td>

		        </tr>
		        <!-- and so on... -->
		    </tbody>
		</table>

	</dev>


	<footer>
		<p><a href="terms.php">Terms & Conditions</a></p>
		<p>This website is owned by X16 Lads Ltd, undergraduates at the University of Manchester</p>
	</footer>


</body>


</html>
