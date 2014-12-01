<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Video</title>
</head>
<body>
	<?php
		//In case the register_globals is turned off, the form parameters can still be recovered as follows.
		$title= $_POST['title'];
		$videolink= $_POST['videolink'];
		$videolength= $_POST['videolength'];
		$videolength = round($videolength,-2);
		$highestresolution= $_POST['highestresolution'];
		echo "$videolength";
		$description= $_POST['description'];
		$description = addslashes($description);
		$language = $_POST['language'];
		$viewcount= $_POST['viewcount'];
		$iconimage = $_POST['iconimage'];
		$tag = $_POST['tag'];
		$videotype = implode("," , $_POST['videotype'] );
		$name_entered = $_POST['name_entered'];
		include("dbconnect.php");
				$query = "update fun_video "
						." set  title ='$title',videolink='$videolink',highestresolution='$highestresolution',"
						." description='$description', language='$language', viewcount='$viewcount',"
						." iconimage='$iconimage', tag='$tag', videotype = '$videotype' "
						." where name = '$name_entered'"
				;
				mysqli_query($conn, $query);
    ?>
    <h2>Thanks!!</h2>
    <h2><a href="view.php">View My Guest Book!!!</a></h2>

</body>
</html>
