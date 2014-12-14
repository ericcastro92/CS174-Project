<?php

	
	$sessionId = session_id();
	if(empty($sessionId)) session_start();

	$loggedin = isset($_COOKIE["loggedIn"]);

	if ($loggedin) {

		if ($_COOKIE['role'] == 'A') {
			echo "<h2>
					<a href='index.php'>Home</a> 
					| <a href='list.php'>View Videos</a> 
					| <a href='upload.php'>Upload video</a>
					| <a href='modify.php'>Modify video</a>
					| <a href='editinfo.php'>Change password</a>
					| <a href='logout.php'>Logout</a>
				</h2>";
		}
		else {
			echo "<h2>
					<a href='index.php'>Home</a> 
					| <a href='list.php'>View Videos</a> 
					| <a href='upload.php'>Upload video</a>
					| <a href='editinfo.php'>Change password</a>
					| <a href='logout.php'>Logout</a>
				</h2>";
		}

	}
	else {
		echo "<h2>
				<a href='login.php'>Login</a>
				|	<a href='register.php'>Register</a>
				|	<a href='list.php'>View Videos</a>

			</h2>";
	}

?>
