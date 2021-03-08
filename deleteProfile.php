<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Delete Your LeagueStar Account</title>
		<meta name="description" content="Delete your LeagueStar account here.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body onload="addDropdownEvent()">
		<?php
			session_start();
			$user = $_SESSION["user"];
			require_once 'DBHandler.php';
			$conn = connectDB();
		?>
		<?php
			if (isset($_POST['submit']))
			{
				echo '<br>2';
				$sql = "DELETE FROM users WHERE user = '$user'";
				$results = doSQL($conn, $sql);
				// Test if account deleted
				$sql = "SELECT * FROM users WHERE user = '$user'";
				$results = doSQL($conn, $sql);
				$data = mysqli_fetch_array($results);
				if (empty($data))
				{
					unset($_SESSION['user']);
					$_SESSION['deleteProfile'] == True;
				}
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
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="help.php">Help</a></li>
				<?php
					// Script used if login is not required to use this page
					if(isset($_SESSION["user"]))
					{
						echo '<li style="float:right"><a href="logout.php">Sign Out</a></li>';
						echo '<li style="float:right"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';
					}
					else
					{
						echo '<li style="float:right"><a href="register.php">Register</a></li>';
						echo '<li style="float:right"><a href="login.php">Sign In</a></li>';
					}
				?>
			</ul>
		</nav>
		<?php
			if(isset($_SESSION["user"])) {
				require_once("createSideBar.php");
				createSideBar();
			}
		?>
		<main>
			<h2>Delete Your LeagueStar Account</h2>
			<?php
				if (isset($_SESSION['deleteProfile']))
				{
					if ($_SESSION['deleteProfile'] == True)
					{
						echo '<p>You\'re account was successfully deleted, we\'re sorry to see you go.</p>';
						echo '<p>You can always create a new account by <a href="register.php" class="link">registering again here</a>.</p>';
						unset($_SESSION['deleteProfile']);
					}
				}
				elseif (isset($_SESSION['user']))
				{
					echo '<p>Are you sure you want to delete your account? This process is irreversable.</p>';
					echo '<p>All the leagues you coordinate will be immediately terminated and you will lose your current progress in any league you take part in.</p>';
					echo '<form action="' . htmlentities($_SERVER['PHP_SELF']) . '" method="post">';
					echo '	<input type="submit" name="submit" value="Delete My LeagueStar Account" id="deleteButtton">';
					echo '</form><br>';
					echo '<form action="profile.php">';
					echo '	<input type="submit" value="Take Me Back"><br><br>';
					echo '</form>';
				}
				else
				{
					header("Location: index.php");
				}
			?>
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
