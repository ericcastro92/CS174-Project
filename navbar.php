<?php
	$loggedin = isset($_COOKIE["loggedIn"]);
?>

<h2><a href="index.php">Home</a> | <a href="register.php">Register</a> | <a href="list.php">List</a> | <a href="login.php">Login</a> | <a href="upload.php">Upload video</a>
<?php if($loggedin) echo "| <a href='logout.php'>Logout</a>" ?>
</h2>