<?php include("dbconnect.php"); 
//recover the form variable values.
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

        $query = "insert into fun_video".
                 " (title, videolink, videolength, highestresolution, description, language, viewcount, 
				 iconimage, tag, videotype) values ".
                 "('$title', '$videolink', '$videolength', '$highestresolution', '$description', '$language', '$viewcount', '$iconimage' '$tag', '$videotype')";
        mysqli_query($conn,$query);

$sql = "INSERT INTO fun_video SET videotype = '$videotype',".
"title = '$title',".
"videolink = '$videolink',".
"videolength = '$videolength',".
"highestresolution = '$highestresolution',".
"description = '$description',".
"language = '$language',".
"viewcount = '$viewcount',".
"iconimage = '$iconimage',".
"tag = '$tag'";
mysqli_query($conn,$sql);

?>
<h2>Your video has been uploaded</h2>
<h2><a href="view.php">Updated Website</a></h2>
<h2><a href="upload.php">Upload New Video</a></h2>
