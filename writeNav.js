function writeNav(loggedIn, user)
{
	document.write('<ul class="navNav">');
	document.write('	<li><a href="index.php" id="active">Home</a></li>');
	document.write('	<li><a href="about.php">About Us</a></li>');
	document.write('	<li><a href="contact.php">Contact Us</a></li>');
	document.write('	<li><a href="help.php">Help</a></li>');
	if (loggedIn)
	{
		document.write('<li style="float:right"><a href="logout.php">Sign Out</a></li>');
		document.write('<li style="float:right"><a href="profile.php">' + user + '</a></li>');
	}
	else
	{
		document.write('<li style="float:right"><a href="register.php">Register</a></li>');
		document.write('<li style="float:right"><a href="login.php">Sign In</a></li>');
	}
	document.write('</ul>');
}

writeNav(false);