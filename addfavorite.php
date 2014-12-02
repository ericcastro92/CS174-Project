<?php
require_once('config.php');

if ($_POST)
{
	$videoid = $_POST["videoid"];

	if (isset($_SESSION['favorites'])) {
		$fav = $_SESSION['favorites'];

		$array = explode(" ", $_SESSION['favorites']);

		if (!in_array($videoid, $array))
		{
			$_SESSION['favorites'] = $fav . " " . $videoid;
		}

	}
	else {
		$_SESSION['favorites'] = $videoid;
	}
}

?>