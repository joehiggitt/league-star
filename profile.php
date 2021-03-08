<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LeagueStar Account</title>
		<meta name="description" content="Manage your LeagueStar account here.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
		<script src="javaScript.js"></script>
	</head>
	<body onload="addDropdownEvent()">
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
				// Get details from the register form
				$newUser = $_POST['user'];
				$newEmail = $_POST['email'];

				// Get details from the database
				$oldUser = $_SESSION['user'];
				$sql = "SELECT email FROM users WHERE user='$user'";
				$results = doSQL($conn, $sql);
				$oldEmail = mysqli_fetch_array($results)['email'];

				// Checks if new username and email equal old values
				// if they do
				if ($oldUser != $newUser && $oldEmail != $newEmail)
				{
					$sql = "UPDATE users SET user = '$newUser', email = '$newEmail' WHERE user = '$oldUser'";
					$results = doSQL($conn, $sql);
					echo("<br>".$results."<br>");
				}
				elseif ($oldUser != $newUser)
				{
					$sql = "UPDATE users SET user = '$newUser' WHERE user = '$oldUser'";
					$results = doSQL($conn, $sql);
					echo("<br>".$results."<br>");
				}
				elseif ($oldEmail != $newEmail)
				{
					$sql = "UPDATE users SET email = '$newEmail' WHERE user = '$oldUser'";
					$results = doSQL($conn, $sql);
					echo("<br>".$results."<br>");
				}
				// Test if account updated
				$sql = "SELECT * FROM users WHERE user = '$newUser'";
				$results = doSQL($conn, $sql);
				$data = mysqli_fetch_array($results);
				if (!empty($data) && $data['email'] == $newEmail)
				{
					$_SESSION["user"] = $newUser;
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
						echo '<div class="dropdownProfile">
								<button class="dropbtn">' . $_SESSION["user"] . '</button>
								<div class="dropdown-content">
									<a href="profile.php">View profile</a>
									<a href="logout.php">Sign Out</a>
								</div>
							</div>';
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
			<h2>Your LeagueStar Account</h2>
			<p>Your current account details</p>
			<?php
				if (!empty($_POST))
				{
					if (!empty($data) && $data['email'] == $newEmail)
					{
						echo '<p>Your LeagueStar Account was updated successfully!</p>';
					}
					else
					{
						echo '<p>Unfortunately we couldn\'t update your LeagueStar Account right now.</p>';
					}
				}
				elseif (isset($_SESSION['updatePass']))
				{
					if ($_SESSION['updatePass'] == True)
					{
						echo '<p>You\'re password was updated successfully!</p>';
						unset($_SESSION['updatePass']);
					}
				}
				$user = $_SESSION['user'];
				$sql = "SELECT email FROM users WHERE user = '$user'";
				$results = doSQL($conn, $sql);
				$data = mysqli_fetch_array($results);


				echo '<form action="' . htmlentities($_SERVER['PHP_SELF']) . '" method="post">';
				echo '	<label>Username</label><br>';
				echo '	<input type="text" value="' . $user . '" name="user"><br>';
				echo '	<label>Email</label><br>';
				echo '	<input type="text" value="' . $data['email'] . '" name="email"><br><br>';
				echo '	<input type="submit" name="submit" value="Save Profile"><br><br>';
				echo '</form>';
				echo '<form action="changePassword.php">';
				echo '	<input type="submit" value="Change Password"><br><br>';
				echo '</form>';
				echo '<form action="deleteProfile.php">';
				echo '	<input type="submit" value="Delete Account" id="deleteButtton">';
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
