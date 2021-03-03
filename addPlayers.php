<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Add Players - LeagueStar</title>
		<meta name="description" content="Add players to your league.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
			function createForm(num, maxNum)
				{
					document.write('<form method="push">');
					for (var i = 0; i < maxNum; i++)
					{
						if (i < minNum)
						{
							document.write('<label id="LPlayer' + i + '">Player ' + (i + 1) + '</label><br>');
							document.write('<input type="text" name="Player' + i + '" id="PlayerEntry' + i + '" required><br>');
						}
						else
						{
							document.write('<label id="LPlayer' + i + '">Player ' + (i + 1) + '</label><br>');
							document.write('<input type="text" name="Player' + i + '" id="PlayerEntry' + i + '"><br>');
							if (i >= num)
							{
								$("#LPlayer" + i).hide();
								$("#PlayerEntry" + i).hide();
							}
						}
					}
					document.write('	<input type="button" name="addPlayer" value="+" onclick="addPlayer()"> <input type="button" name="removePlayer" value="-" onclick="removePlayer()"><br>');
					document.write('	<input type="submit" name="addPlayers" value="Enter Players">');
					document.write('</form>');
				}

			function addPlayer()
				{
					alert("+");
					if (num < maxNum)
					{
						num++;
						$("#Player" + num).fadeIn();
						alert("+, " + num);
					}
				}

				function removePlayer()
				{
					alert("-");
					if (num > minNum)
					{
						document.getElementById("#PlayerEntry" + num).value = "";
						$("#Player" + num).fadeOut();
						num--;
						alert("-, " + num);
					}
				}
		</script>

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
				<li><a href="contact.php">Contact</a></li>
				<li><a href="help.php">Help</a></li>
				<?php
					// Script used if login is required to view this page
					echo '<li style="float:right"><a href="logout.php">Sign Out</a></li>';
					echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';
				?>
			</ul>
		</nav>
		<aside>
			<ul class="asideNav">
				<li><a href="viewLeague.php">League 1</a></li>
				<li><a href="viewTable.php">Table</a></li>
				<li><a href="viewFixtures.php">Fixtures</a></li>
				<li><a href="viewResults.php">Results</a></li>
				<li><a href="createLeague.php">Create New League</a></li>
				<li><a href="joinLeague.php">Join League</a></li>
			</ul>
		</aside>
		<main>
			<h2>Add Players</h2>
			<p>Add players to your team below.</p>
			<script>
				var num = 10;
				var minNum = 5;
				var maxNum = 15;
				createForm(num, maxNum);
			</script>
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