<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Players - LeagueStar</title>
		<meta name="description" content="Add players to your league.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
			function createForm(num, maxNum)
				{
					document.write('<form>');
					for (var i = 0; i < maxNum; i++)
					{
						document.write('	<p id="Player' + i + '">Player ' + (i + 1) + '  <input type="text" name="Player' + i + '" id="PlayerEntry' + i + '"></p>');
						if (i >= num)
						{
							$("#Player" + i).hide();
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
		<header>
				<h1>LeagueStar</h1>
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
				<li><a href="viewFixtures.php">Fixtures</a></li>
				<li><a href="viewResults.php">Results</a></li>
				<li><a href="createLeague.php">Create New League</a></li>
			</ul>
		</aside>
		<main>
			<h3>Add Players</h3>
			<p>Add players to your team below.</p>
			<script>
				var num = 10;
				var minNum = 5;
				var maxNum = 15;
				createForm(num, maxNum);
			</script>
		</main>
		<footer>
			<p><a href="terms.php">Terms & Conditions</a></p>
			<p>This website is owned by X16 Lads Ltd, undergraduates at the University of Manchester</p>
		</footer>

	</body>
</html>