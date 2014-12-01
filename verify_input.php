<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Verify Input</title>
</head>

<body>
<h1>Modify Video</h1>
<h2>Step 2 : Edit Video Parameters </h2>
	<?php
    include_once("dbconnect.php");
    //In case the register_globals is turned off, the form parameters can still be recovered as follows.
    $to_be_recovered_name = $_POST['to_be_recovered_name'];
    if (empty($to_be_recovered_name))
    {
      print "<h2>You have not entered the guest name</h2>";
      print "<h2><a href='modify.php'>Modify Video!</a></h2>";
    }
    else
    include ("recovervideo.php");
    ?>
    <!-- PHP codes ends here -->

</body>
</html>
