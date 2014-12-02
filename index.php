<html>
	<?php require_once('config.php'); ?>
	<header>
		<title>
			CS174 - Group 1 - Home
		</title>
	</header>
	<body>
		<h1>
			Home
		</h1>
		<div>
		<object type="audio/x-mpeg" data="topgun.mp3" width="0" height="0">
		 	<param name="src" value="topgun.mp3">
		 	<param name="controller" value="false">
		 	<param name="autoplay" value="true">
			<param name="loop" value="false">
		</object>
		<?php
			echo "<h2>Favorites</h2>";
			if(isset($_SESSION['favorites']))
			{ 
				$favs = explode(" ", $_SESSION['favorites']);
				foreach($favs as $favorite){
					$data = mysqli_query($conn, "SELECT * FROM fun_video WHERE id = '$favorite'");
					list($id, $title, $videolink, $videolength, $highestres, $description, $lang, $viewcount, $vidtype, $iconimage, $tag) = mysqli_fetch_array($data);
					echo "<a href = '$videolink'> $title </a></br>";
				}
			}
			else
				echo "No favorited videos";
		?>
	</body>
</html>
