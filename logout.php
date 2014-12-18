<?php
	
	setcookie('email', "", 0);
	setcookie('password', "", 0);
	setcookie('loggedIn', "", 0);


	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	header('location: index.php');

?>