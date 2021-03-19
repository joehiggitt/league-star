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
				$sql = "DELETE FROM users WHERE user = '$user'";
				$results = doSQL($conn, $sql);
				// Test if account deleted
				$sql = "SELECT * FROM users WHERE user = '$user'";
				$results = doSQL($conn, $sql)
				$data = mysqli_fetch_array($results);
				if (empty($data))
				{
					unset($_SESSION['user']);
					$_SESSION['deleteProfile'] = True;
				}
			}
		?>
		<header>
			<img src="Header.png" alt="header" height="80px" width="100%">
			<div class="imageLogo"><img src="Logo.png" height="130px"></div>
			<div class="imageText"><h1>LeagueStar</h1></div>
		</header>
		<nav>
			<?php
				require_once("createNavBar.php");
				if (isset($_SESSION["user"]))
				{
					createNavBar($_SESSION["user"]);
				}
				else
				{
					createNavBar("");
				}
			?>
		</nav>
		<?php
			if(isset($_SESSION["user"])) {
				require_once("createSideBar.php");
				createSideBar();
			}
		?>
		<main>
			<?php
				if (isset($_SESSION['deleteProfile']))
				{
					if ($_SESSION['deleteProfile'] == True)
					{
						unset($_SESSION['deleteProfile']);
						echo '<h2>Your LeagueStar Account Was Successfully Deleted</h2>';
						echo '<p>We\'re sorry to see you go.</p>';
						echo '<p>You can always create a new account by <a href="register.php" class="link">registering again here</a>.</p>';
					}
				}
				elseif (isset($_SESSION['user']))
				{
					echo '<h2>Delete Your LeagueStar Account</h2>';
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
