<?php
	include 'dbconnect.php';
	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
	{
		//Login
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