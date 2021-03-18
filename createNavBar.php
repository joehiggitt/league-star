<?php
	function createNavBar($user, $active = "")
	{
		echo '<ul>';
		if ($active == "home")
		{
			echo '<li><a href="index.php" id="active">Home</a></li>';
		}
		else 
		{
			echo '<li><a href="index.php">Home</a></li>';
		}
		if ($active == "about")
		{
			echo '<li><a href="about.php" id="active">About Us</a></li>';
		}
		else
		{
			echo '<li><a href="about.php">About Us</a></li>';
		}
		if ($active == "contact")
		{
			echo '<li><a href="contact.php" id="active">Contact Us</a></li>';
		}
		else
		{
			echo '<li><a href="contact.php">Contact Us</a></li>';
		}
		if ($active == "help")
		{
			echo '<li><a href="help.php" id="active">Help</a></li>';
		}
		else
		{
			echo '<li><a href="help.php">Help</a></li>';
		}
		if ($user != "")
		{
			echo '<div class="navDrop">';
			if ($active == "profile")
			{
				echo '	<button id="active">' . $_SESSION["user"] . '</button>';
			}
			else
			{
				echo '	<button>' . $_SESSION["user"] . '</button>';
			}
			echo '	<div class="navDropContent">';
			echo '		<a href="profile.php">View Profile</a>';
			echo '		<a href="logout.php">Sign Out</a>';
			echo '	</div>';
			echo '</div>';
			/*echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';*/
		}
		else
		{
			if ($active == "register")
			{
				echo '<li style="float:right"><a href="register.php" id="active">Register</a></li>';
			}
			else
			{
				echo '<li style="float:right"><a href="register.php">Register</a></li>';
			}
			if ($active == "login")
			{
				echo '<li style="float:right"><a href="login.php" id="active">Sign In</a></li>';
			}
			else
			{
				echo '<li style="float:right"><a href="login.php">Sign In</a></li>';
			}
		}
	}
?>