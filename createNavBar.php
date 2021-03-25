<?php
	function createNavBar($user, $active = "")
	{
		echo '<div class="topnav" id="theTopnav">';
		if ($active == "home")
		{
			echo '<a href="index.php" class="activeHome" id="active">Home</a>';
		}
		else 
		{
			echo '<a href="index.php">Home</a>';
		}
		if ($active == "about")
		{
			echo '<a href="about.php" id="active">About Us</a>';
		}
		else
		{
			echo '<a href="about.php">About Us</a>';
		}
		if ($active == "contact")
		{
			echo '<a href="contact.php" id="active">Contact Us</a>';
		}
		else
		{
			echo '<a href="contact.php">Contact Us</a>';
		}
		if ($active == "help")
		{
			echo '<a href="help.php" id="active">Help</a>';
		}
		else
		{
			echo '<a href="help.php">Help</a>';
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
			echo '<div class="navOpt">';
			if ($active == "register")
			{
				echo '<a href="register.php" id="active">Register</a>';
			}
			else
			{
				echo '<a href="register.php">Register</a>';
			}
			if ($active == "login")
			{
				echo '<a href="login.php" id="active">Sign In</a>';
			}
			else
			{
				echo '<a href="login.php">Sign In</a>';
			}
		}
			echo '<a href="javascript:void(0);" class="icon" onclick="responsiveNav()">&#9776;</a>';
		echo '</div>';
	}
?>

<script type="text/javascript">
	function responsiveNav() {
	  var x = document.getElementById("theTopnav");
	  if (x.className === "topnav") {
	    x.className += " responsive";
	  } else {
	    x.className = "topnav";
	  }
	}
</script>