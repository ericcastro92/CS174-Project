<?php
	include "dbconnect.php";
	$sessionId = session_id();
	if(empty($sessionId)) session_start();
	$successfulLogin = false;

	// Check if logged in
	if (isset($_COOKIE["loggedIn"])) {
		// Reroute to index.php
		header( 'Location: index.php' ) ;
	}
	else if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];

		$validform = true;

		//Get email and password from database
		$login_query = "SELECT * FROM users WHERE email = '$email'";
		$login_result = mysqli_query($conn, $login_query);
			
		//Email does not exist in database
		if($login_result->num_rows == 0){
			$validform = false;
			include "navbar.php";
			print 'Email or password is incorrect <br>';
		}else{
			//Check for password match
			list($dbid, $dbemail, $dbpass) = mysqli_fetch_array($login_result);
			if(strcmp($pass, $dbpass) != 0){
				$validform = false;
				include "navbar.php";
				print 'Email or password is incorrect <br>';
			}
		}

		//Insert login data to table if all criteria are met
		if($validform){	
			//$_SESSION['email']=$_POST['email'];
			//$_SESSION['password']=$_POST['password'];
			$successfulLogin = true;

			setcookie('loggedIn', $_POST['email'], time()+60);

			$email = $_POST['email'];
			$query = "SELECT * FROM session WHERE email=\"$email\"";
			$result = mysqli_query($conn, $query);

			if (mysqli_num_rows($result) > 0) {
				$data = mysqli_fetch_array($result);
				$_SESSION['favorites'] = $data['favorites'];
			}

			$query = "SELECT * FROM users WHERE email=\"$email\"";
			$result = mysqli_query($conn, $query);

			if (mysqli_num_rows($result) > 0) {
				$data = mysqli_fetch_array($result);
				setcookie('role',$data['role'], time()+60);
			}

			if(isset($_POST['keepLogin']))
			{
				//Keeps user logged in for 5 minutes
				setcookie('email', $_POST['email'], time()+60);
				setcookie('password', $_POST['password'], time()+60);
			}
			
			include "navbar.php";
			print "You have successfully been logged in.<br>";
			print "Click <a href='index.php'>here</a> to go home.</a><br>";
			header( 'Location: index.php' ) ;
		}
	}
	else
		include "navbar.php";

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
		
	<?php
		if($successfulLogin == false && (!isset($_COOKIE['loggedIn']) || !strcmp($_COOKIE['loggedIn'],1)==0)){
			
		print'<form method="post" action="">';
			if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
				print "<input type='text' name='email' placeholder='Email' size='30' value='{$_COOKIE['email']}'/> </br>";
				print "<input type='password' name='password' placeholder='Password' size='30' value='{$_COOKIE['password']}'/></br>";
			}
			else{
				print '<input type="text" name="email" placeholder="Email" size="30"/></br>';
				print '<input type="password" name="password" placeholder="Password" size="30"/></br>';	
			}
		print'<input type="checkbox" name="keepLogin"> Remember Me <br>
			<input type="submit" value="Login"/>
			</form>';
		}
		else{
			print'<p> You are already logged in. </p>';
		}
	?>
	</body>
</html>
