<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modify</title>
</head>
<body>
	<?php
    	include("config.php");
        include("navbar.php");
    ?>
    
    <h1>Modify Videos</h1>
    <h2>Step 1: Enter a video title.</h2>

    <form method=post action="verify_input.php">

    <input type=text size=40 name=to_be_recovered_name>
    </br></br>
    <input type=submit name=submit value="Edit Video">
    <input type=reset name=reset value="Start Over">
    
    </form>
</body>
</html>
