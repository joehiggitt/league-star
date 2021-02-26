<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Create an account - LeagueStar</title>
		<meta name="description" content="Create a LeagueStar account to begin creating your custom leagues!">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
	</head>
	<body>
		<?php
			// Script used if login is required to view this page
			session_start();
			if (isset($_SESSION["user"]))
			{
				header("Location: index.php");
			}
		?>
		<?php
            session_start();
            if (isset($_POST['submit'])) {
                // Get details from the register form
                $user = $_POST['user'];
				$email = $_POST['email'];
				$emailCheck = $_POST['emailCheck'];
                $pass = $_POST['pass'];
                $passCheck = $_POST['passCheck'];

                // Checks if the given passwords match and adds details to database
                // if they do
                if ($pass == $passCheck && $email == $emailCheck) {
                    require_once 'DBHandler.php';
                    $conn = connectDB();
                    $sql = "INSERT INTO users (user, pass, email)
                            VALUES ('$user', '$pass', '$email')";
                    $results = doSQL($conn, $sql);
                    echo("<br>".$results."<br>");

                    // Log in
                    if($results == 1) {
                        $_SESSION["user"] = $user;
                        header("Location: index.php");
                        exit;
                    }

                } else {
                    echo "Passwords do not match";
                    // Go back to self
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
			// Script used if login is not required to use this page
			if (isset($_SESSION["user"]))
			{
				echo '<aside>';
					echo '<ul class="asideNav">';
						echo '<li><a href="viewLeague.php">League 1</a></li>';
						echo '<li><a href="viewTable.php">Table</a></li>';
						echo '<li><a href="viewFixtures.php">Fixtures</a></li>';
						echo '<li><a href="viewResults.php">Results</a></li>';
						echo '<li><a href="createLeague.php">Create New League</a></li>';
						echo '<li><a href="joinLeague.php">Join League</a></li>';
					echo '</ul>';
				echo '</aside>';
			}
		?>
		<main>
			<h2>Create Your LeagueStar Account!</h2>
			<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
				<label>Username</label><br>
				<input type="text" name="user" required><br>
				<label>Email</label><br>
				<input type="text" name="email" required><br>
				<label>Confirm Email</label><br>
				<input type="text" name="emailCheck" required><br>
				<label>Password</label><br>
				<input type="password" name="pass" required><br>
				<label>Confirm Password</label><br>
				<input type="password" name="passCheck" required><br><br>
				<input type="submit" name="submit" value="Create Your Account">
				<p>Already have an account? <a href="login.php" class="link">Sign in</a> here.</p>
			</form>

		</main>
		<footer>
			<img src="Footer.png" height="80px" width="100%">
			<div class="imageText">
				<p><a href="contact.php" class="link">Contact Us</a>&emsp;&emsp;<a href="help.php" class="link">Help</a>&emsp;&emsp;<a href="terms.php" class="link">Terms & Conditions</a></p>
			</div>
		</footer>
	</body>
</html>
