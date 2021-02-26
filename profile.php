<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LeagueStar Account</title>
		<meta name="description" content="Manage your LeagueStar account here.">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body>
		<?php
    //         session_start();
    //         if (isset($_POST['submit'])) {
    //             // Get details from the register form
    //             $user = $_POST['user'];
				// $email = $_POST['email'];
    //             $pass = $_POST['pass'];
    //             $passCheck = $_POST['passCheck'];

    //             // Checks if the given passwords match and adds details to database
    //             // if they do
    //             if ($pass == $passCheck) {
    //                 require_once 'DBHandler.php';
    //                 $conn = connectDB();
    //                 $sql = "INSERT INTO users (user, pass, email)
    //                         VALUES ('$user', '$pass', '$email')";
    //                 $results = doSQL($conn, $sql);
    //                 echo("<br>".$results."<br>");

    //                 // Log in
    //                 if($results == 1) {
    //                     $_SESSION["user"] = $user;
    //                     header("Location: index.php");
    //                     exit;
    //                 }

    //             } else {
    //                 echo "Passwords do not match";
    //                 // Go back to self
    //             }
    //         }
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
				<li><a href="help.php">Help</a></li>
				<?php
					// Script used if login is not required to use this page
					if(isset($_SESSION["user"]))
					{
						echo '<li style="float:right"><a href="logout.php">Sign Out</a></li>';
						echo '<li style="float:right" id="active"><a href="profile.php">' . $_SESSION["user"] . '</a></li>';
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
			<h2>Your LeagueStar Account</h2>
			<?php
				$user = $_SESSION["user"];
				require_once 'DBHandler.php';
				$conn = connectDB();
				$sql = "SELECT user, email FROM users WHERE user='$user";
				$results = doSQL($conn, $sql);
				echo("Results = " . $results);


				echo '<form action="' . htmlentities($_SERVER['PHP_SELF']) . '" method="post">';
				echo 	'<label>Username</label><br>';
				echo 	'<input type="text" value="" name="user"><br>';
				echo 	'<label>Email</label><br>';
				echo 	'<input type="text" value="" name="email"><br><br>';
				echo 	'<input type="submit" name="submit" value="Save Profile">';
				echo 	'<input type="submit" name="changePass" value="Change Password">';
				echo 	'<input type="submit" name="delete" value="Delete Account" id="deleteButtton">';
				echo '</form>';
			?>

		</main>
		<footer>
			<img src="Footer.png" height="80px" width="100%">
			<div class="imageText">
				<p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
			</div>
		</footer>
	</body>
</html>
