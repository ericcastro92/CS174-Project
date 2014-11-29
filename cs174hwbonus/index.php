
<?php

include "dbconnect.php";

// Check if $_POST variable is not empty
if ($_POST != null) {
	// Collecting all data from post request
	$title=$_POST["title"];
	$link=$_POST["link"];
	$length=$_POST["length"];
	$resolution=$_POST["resolution"];
	$description=addslashes($_POST["description"]);
	$language=$_POST["language"];
	$views=$_POST["views"];
	$type=implode(',' , $_POST["type"]);
	$thumbnail=$_POST["thumbnail"];
	$tags=$_POST["tags"];
	
	$sql = "INSERT INTO `fun_video` (`title`, `videolink`, `videolength`, `highestresolution`, `description`, `language`, `viewcount`, `videotype`, `iconimage`,`tag`) VALUES ('$title', '$link', '$length', '$resolution', '$description', 
	'$language', '$views', '$type', '$thumbnail','$tags')";
	if (mysqli_query($conn, $sql)) {
		echo "New entry created successfully! <br>";
	}
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

?>

<!DOCTYPE HTML>
		<html>
		<head>
			<title>CS 174 Bonus HW</title>
			<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
		</head>
		
		
		<body>
		<a href="list.php"><h1>List of videos</h1></a>
		<br>
		<h3>Add a new video: </h3><br>
			<form method="POST" action="index.php">
				<div>
					<label for="title">Video title: </label>
					<input type="text" name="title" placeholder="Video Title" required>
				</div>
				<br>
				<div>
					<label for="link">Video Link: </label>
					<input type="text" name="link" placeholder="www.youtube.com" required>
				</div>
				<br>
				<div>
					<label for="length">Video length(round to closest minute): </label>
					<input type="number" name="length" placeholder="5" required>
				</div>
				<br>
				<div>
					<label for="resolution">Highest resolution: </label>
					<input type="radio" name="resolution" value="144">144
					<input type="radio" name="resolution" value="240">240
					<input type="radio" name="resolution" value="360">360
					<input type="radio" name="resolution" value="480">480
					<input type="radio" name="resolution" value="720">720
					<input type="radio" name="resolution" value="1080">1080
				</div>
				<br>
				<div>
					<label for="description">Video description: </label><br>
					<textarea name="description" rows="5" cols="50" placeholder="Enter video description here."></textarea>
				</div>
				<br>
				<div>
					<label for="language">Language: </label>
					<input type="radio" name="language" value="English">English
					<input type="radio" name="language" value="Non-English">Non-English
				</div>
				<br>
				<div>
					<label for="views">View count: </label>
					<input type="number" name="views" placeholder="500,000" required>
				</div>
				<br>
				<div>
					<label for="type">Video type: </label><br>
					<input type="checkbox" name="type[]" value="Tutorial">Tutorial<br>
					<input type="checkbox" name="type[]" value="Entertainment">Entertainment<br>
					<input type="checkbox" name="type[]" value="Application">Application<br>
					<input type="checkbox" name="type[]" value="Weapon">Weapon<br>
					<input type="checkbox" name="type[]" value="Group Demo">Group Demo<br>
					<input type="checkbox" name="type[]" value="Others">Others<br>
				</div>
				<br>
				<div>
					<label for="thumbnail">Video icon image: </label>
					<input type="text" name="thumbnail" placeholder="www.host.com/image"  size=40 required>
				</div>
				<br>
				<div>
					<label for="tags">Tags(separated by commas): </label>
					<input type="text" name="tags" placeholder="Sports, Movies, Games" size=40 required>
				</div>
				<br>
				<div>
					<input type="submit" value="submit">
				</div>
			</form>
		</body>
		
		</html>