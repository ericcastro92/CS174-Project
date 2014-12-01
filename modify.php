<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modify</title>
</head>
<body>
	<?php
    	include("dbconnect.php");
    ?>
    
    <h2>Modify my Guest Book!!!</h2>
    Enter the name of the guest you wish to modify
    <form method=post action="verify_input.php">
    
    <b>Name:</b>
    <input type=text size=40 name=to_be_recovered_name>
    <br>
    <input type=submit name=submit value="Recover that guest info!">
    <input type=reset name=reset value="Start Over">
    
    </form>
</body>
</html>
