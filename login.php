<?php
	include 'dbconnect.php';
	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];

		/**
		DEBUG: REMOVE WHEN DONE
		print $email."<br>";
		print $pass."<br>";
		*/

		$validform = true;

		//Get email and password from database
		$login_query = "SELECT * FROM users WHERE email = '$email'";
		$login_result = mysqli_query($conn, $login_query);
			
		//Email does not exist in database
		if($login_result->num_rows == 0){
			$validform = false;
			print 'Email or password is incorrect <br>';
		}else{
			//Check for password match
			list($dbid, $dbemail, $dbpass) = mysqli_fetch_array($login_result);
			if(strcmp($pass, $dbpass) != 0){
				$validform = false;
				print 'Email or password is incorrect <br>';
			}
		}

		//Insert login data to table if all criteria are met
		if($validform){	
			/**
			Do any cookie or session things here
			*/
				if(isset($_POST['saveinfo']))
			{
				setcookie('email', $_POST['email'], time()+60);
				setcookie('password', $_POST['password']), time()+60);
			}
			
			print "You have successfully been logged in.<br>";
			print "Click <a href='index.html'>here</a> to go home.</a><br>";
		
			
			
		}
	}
?>
<html>
	<header>
		<title>
			CS174 - Group 1 - Login
		</title>
	</header>
	<body>
		<h1>
			Login
		</h1>
		<h2>
			<a href="index.html">Home</a> | <a href="register.php">Register</a>
		</h2>
		<form method="post" action="">
			<input type="text" name="email" placeholder="<?php echo $_COOKIE['email']?> " size="30"/>
			</br>
			<input type="password" name="password" placeholder="<?php echo $_COOKIE['password']?> " size="30"/>
			</br>
			<input type="checkbox" name="userlogin" value="saveinfo"> Stay logged in <br>
			<input type="submit" value="Login"/>
		</form>
	</body>
</html>
