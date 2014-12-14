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

			$array = array_diff($array, array($videoid));

			$favorites = implode(" ", $array);

			$_SESSION['favorites'] = $favorites;

			$query = "UPDATE session SET favorites=\"$favorites\" WHERE email=\"$email\"";
			mysqli_query($conn, $query);

			echo "Successfully removed from wishlist";

		}

	}

?>