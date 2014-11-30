<?php
	include 'dbconnect.php';
	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$repass = $_POST['repassword'];

		/**
		DEBUG: REMOVE WHEN DONE
		print $email."<br>";
		print $pass."<br>";
		print $email."<br>";
		*/

		$validform = true;

		//Check for empty strings
		if(empty($email) || empty($pass) || empty($repass))
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

		//Insert login data to table if all criteria are met
		if($validform){
			$query = "INSERT into users (email, password) values ('$email','$pass')";
			mysqli_query($conn, $query);

			print "You have successfully been registered<br>";
			print "Click <a href='login.php'>here</a> to login.<br>";
		}
	}
?>
<html>
	<header>
		<title>
			CS174 - Group 1 - Registration
		</title>
	</header>
	<body>
		<h1>
			Register
		</h1>
		<h2>
			<a href="index.html">Home</a> | <a href="login.php">Login</a>
		</h2>
		<form method="post" action="">
			<input type="text" name="email" placeholder="Email" size="30"/>
			</br>
			<input type="password" name="password" placeholder="Password" size="30"/>
			</br>
			<input type="password" name="repassword" placeholder="Re-enter Password" size="30"/>
			</br>
			<input type="submit"/>
		</form>
	</body>
</html>