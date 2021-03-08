<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LeagueStar Account - Change Password</title>
		<meta name="description" content="Change your LeagueStar account password.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body>
		<?php
			session_start();
			if (!isset($_SESSION["user"]))
			{
				header("Location: index.php");
			}
			$user = $_SESSION["user"];
			require_once 'DBHandler.php';
			$conn = connectDB();
		?>
		<?php
			if (isset($_POST['submit']))
			{
				$user = $_SESSION['user'];
				$sql = "SELECT pass FROM users WHERE user = '$user'";
				$results = doSQL($conn, $sql);
				$oldPass = mysqli_fetch_array($results)['pass'];
				echo("<br>oldPass = ".$oldPass."<br>");

				$oldPassCheck = $_POST['oldPass'];
				echo("oldPassCheck = ".$oldPassCheck."<br>");
				echo("oldPass == oldPassCheck = ".($oldPass == $oldPassCheck)."<br>");
				$newPass = $_POST['newPass'];
				echo("newPass = ".$newPass."<br>");
				$newPassCheck = $_POST['newPassCheck'];
				echo("newPassCheck = ".$newPassCheck."<br>");
				echo("newPass == newPassCheck = ".($newPass == $newPassCheck)."<br>");

				// Checks if new username and email equal old values
				// if they do
				if ($oldPass == $oldPassCheck && $newPass == $newPassCheck)
				{
					$sql = "UPDATE users SET pass = '$newPass' WHERE user = '$user'";
					$results = doSQL($conn, $sql);
					echo("<br>Results = ".$results."<br>");
				}
				$sql = "SELECT * FROM users WHERE user = '$user'";
				$results = doSQL($conn, $sql);
				$data = mysqli_fetch_array($results);
				if (!empty($data) && $data['pass'] == $newPass)
				{
					$_SESSION['updatePass'] = True;
					header("Location: profile.php");
					exit;

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
			<h2>Your LeagueStar Password</h2>
			<?php
				if (!empty($_POST))
				{
					if ($oldPass != $oldPassCheck)
					{
						echo '<p>Your current password is incorrect.</p>';
					}
					elseif ($newPass != $newPassCheck)
					{
						echo '<p>The new passwords you entered don\'t match.</p>';
					}
					else
					{
						echo '<p>Unfortunately we couldn\'t update your password right now.</p>';
					}
				}
				echo '<form action="' . htmlentities($_SERVER['PHP_SELF']) . '" method="post">';
				echo 	'<label>* Current Password</label><br>';
				echo 	'<input type="password" name="oldPass"><br>';
				echo 	'<label>* New Password</label><br>';
				echo 	'<input type="password" name="newPass"><br>';
				echo 	'<label>* Confirm New Password</label><br>';
				echo 	'<input type="password" name="newPassCheck"><br><br>';
				echo 	'<input type="submit" name="submit" value="Change My Password">';
				echo '</form><br>';
				echo '<form action="profile.php">';
				echo '	<input type="submit" value="Take Me Back"><br><br>';
				echo '</form>';
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
