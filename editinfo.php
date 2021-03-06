<?php
	require_once("config.php");

	$email = $_COOKIE['loggedIn'];

	$query = "SELECT * FROM users WHERE email=\"$email\"";
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_array($result);

	$email = $data['email'];
	$dbpass = $data['password'];

	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
	{
		$oldpass = $_POST['oldpassword'];
		$pass = $_POST['password'];
		$repass = $_POST['repassword'];

		$validform = true;
		//Check for empty strings
		if(empty($pass) || empty($repass) || empty($oldpass))
		{
			print "Please fill out all input fields.<br>";
			$validform = false;
		}

		//Check for 8 characters
		if(strlen($pass) < 8 || strlen($pass) > 20){
			print "Password must be 8 to 20 characters.<br>";
			$validform = false;
		}

		//Check for Uppercase, Lowercase and number
		if(!preg_match("/[A-Z]+[a-z]+/", $pass)){
			print 'Password must have at least 1 uppercase and 1 lowercase letter<br>';
			$validform = false;
		}

		if(!preg_match('[\d]', $pass)){
			print 'Password must have at least 1 number<br>';
			$validform = false;
		}

		if(strcmp($pass, $repass) != 0){
			print 'Passwords did not match<br>';
			$validform = false;
		}

		if(strcmp($dbpass, $oldpass) != 0){
			print 'Old password is not correct';
			$validform = false;
		}

		//Insert login data to table if all criteria are met
		if($validform){
			$query = "UPDATE users SET password=\"$pass\" WHERE email=\"$email\"";
			mysqli_query($conn, $query);

			header("location: list.php");
			print "You have successfully changed your password<br>";
		}
	}



?>

<html>
	<header>
		<title>
			CS174 - Group 1 - Edit
		</title>
	</header>
	<body>
		<?php require_once('navbar.php'); ?>
		<h1>
			Register
		</h1>
		<form method="post" action="editinfo.php">
			<label>Email: </label> <?php echo($email); ?>
			</br>
			<input type="password" name="oldpassword" placeholder="Old Password" size="30" />
			</br>
			<input type="password" name="password" placeholder="Password" size="30"/>
			</br>
			<input type="password" name="repassword" placeholder="Re-enter Password" size="30"/>
			</br>
			<input type="submit"/>
		</form>
	</body>
</html>