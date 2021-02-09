<!DOCTYPE html>
<html>
<head>
	<title>Add Players - LeagueStar</title>
	<meta name="description" content="Add players to your league.">
    <meta lang="en">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript">
    	
    	function addPlayerEntry()
    	{
    		num++;
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
			<li>&#9;<a href="viewFixtures.php">Fixtures</a></li>
			<li>&#9;<a href="viewResults.php">Results</a></li>
			<li><a href="createLeague.php">Create New League</a></li>
		</ul>
	</aside>
	<main>
		<h3>Add Players</h3>
		<p>Add players to your team below.</p>
		
		<script type="text/javascript">
			function createForm()
			{
				document.write('<form>');
				for (var i = 0; i < num; i++)
				{
					document.write('	<p>Player ' + (i + 1) + '  <input type="text" name="Player' + i + '"></p>');
				}
				document.write('	<input type="button" name="addPlayerEntry" value="+" onclick="addPlayerEntry()"> <input type="button" name="removePlayerEntry" value="-" onclick="removePlayerEntry()"><br>');
				document.write('	<input type="submit" name="addPlayers" value="Enter Players">');
				document.write('</form>');
			}

			function addPlayerEntry()
			{
				if (num < maxNum)
				{
					num++;
					createForm(num);
				}
			}

			function addPlayerEntry()
			{
				if (num > minNum)
				{
					num--;
					createForm(num);
				}
			}

			num = 10;
			minNum = 5;
			maxNum = 15;
			createForm(num);
		</script>


	</main>
	<footer>
		<p><a href="terms.php">Terms & Conditions</a></p>
		<p>This website is owned by X16 Lads Ltd, undergraduates at the University of Manchester</p>
	</footer>

</body>
</html>