<?php
	require_once('dbconnect.php');


	$sessionId = session_id();
	if(empty($sessionId)) session_start();

	if ($_POST)
	{

		$videoid = $_POST["videoid"];
		$email;

		if (isset($_COOKIE['loggedIn'])) {
			$email = $_COOKIE['loggedIn'];
		}

		if (isset($_SESSION['favorites'])) {
			$fav = $_SESSION['favorites'];

			$array = explode(" ", $_SESSION['favorites']);

			if (!in_array($videoid, $array))
			{
				$favorites = $fav . " " . $videoid;
				$_SESSION['favorites'] = $favorites;
				$query = "UPDATE session SET favorites=\"$favorites\" WHERE email=\"$email\"";
				mysqli_query($conn, $query);
				echo "Successfully added into favorites";
			}
			else {
				echo "Already added into favorites";
			}

		}
		else {
			$_SESSION['favorites'] = $videoid;
			$query = "INSERT INTO session(email,favorites) VALUES(\"$email\",\"$videoid\")";
			mysqli_query($conn, $query);
			echo "Successfully added into favorites";
		}

	}

?>