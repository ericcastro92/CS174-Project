<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Video</title>
</head>
<body>
<h1>Modify Video</h1>
	<?php
		//In case the register_globals is turned off, the form parameters can still be recovered as follows.
		$title= $_POST['title'];
		$videolink= $_POST['videolink'];
		$videolength= $_POST['videolength'];
		$highestresolution= $_POST['highestresolution'];
		$description= $_POST['description'];
		$description = addslashes($description);
		$language = $_POST['language'];
		$viewcount= $_POST['viewcount'];
		$iconimage = $_POST['iconimage'];
		$tag = $_POST['tag'];
		$videotype = implode("," , $_POST['videotype'] );
		$name_entered = $_POST['name_entered'];
		$category = $_POST['category'];
		include("dbconnect.php");
				$query = "update fun_video "
						." set  title ='$title',videolink='$videolink', videolength='$videolength',"
						." highestresolution='$highestresolution',"
						." description='$description', language='$language', viewcount='$viewcount',"
						." videotype = '$videotype', iconimage='$iconimage', tag='$tag', category='$category' "
						." where title = '$name_entered'"
				;
				mysqli_query($conn, $query);
    ?>
    <h2>Changes have been made. Click 
    <a href="index.php">here</a> to view updated website.</h2>

</body>
</html>
