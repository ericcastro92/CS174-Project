<html>
	<?php 
		require_once('config.php');
		include "navbar.php"; 
	?>
	<header>
		<title>
			CS174 - Group 1 - Home
		</title>
		<!-- Slideshow script -->
		<script src="js/slideshow.js"></script>
		<!-- Index page css -->
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</header>
	<body>
		<iframe id="ytplayer" frameborder="0" allowfullscreen="1" title="YouTube video player" width="1080" height="720" src="//www.youtube.com/embed/0Y_GULVhJmM?controls=0&amp;showinfo=1&amp;autoplay=1&amp;enablejsapi=1&amp;"></iframe>
		<div id="canvas" class="canvas">
			<h1 align="center">Judo</h1>
		</div>

		<?php
			include 'list.php';
			if(isset($_COOKIE['loggedIn']))
			{
				echo "<h2>Favorites</h2>";
				if(isset($_SESSION['favorites'])) {
					echo "
						<table border='2' id='datatable' class='tablesorter'>
						<thead>
							<tr>
								<th>Video</th>
								<th>Title</th>
								<th>Length</th>
								<th>Highest Resolution</th>
								<th>Video Description</th>
								<th>Language</th>
								<th>View Count</th>
								<th>Video type</th>
								<th>Tags</th>
							</tr>
						</thead>
						
						<tbody>
					";


					$favs = explode(" ", $_SESSION['favorites']);
					foreach($favs as $favorite){
						$data = mysqli_query($conn, "SELECT * FROM fun_video WHERE id = '$favorite'");
						$info = mysqli_fetch_array($data);
						//list($id, $title, $videolink, $videolength, $highestres, $description, $lang, $viewcount, $vidtype, $iconimage, $tag) = mysqli_fetch_array($data);
						//echo "<a href = '$videolink'> $title </a></br>";

						$videoid=$info["id"];
						$title=$info["title"];
						$link=$info["videolink"];
						$length=$info["videolength"];
						$resolution=$info["highestresolution"];
						$description=$info["description"];
						$language=$info["language"];
						$views=$info["viewcount"];
						$type=$info["videotype"];
						$thumbnail=$info["iconimage"];
						$tags=$info["tag"];

						// Video image and link
						echo "<tr><td>
						<a href='".$link."' target='_blank'><img src='".$thumbnail."' alt='".$thumbnail."' height='100' width='200'></a>
						</td>";
						
						// Video title
						echo "<td>".$title."</td>";
						
						// Video Length
						echo "<td>".$length."</td>";
						
						// Video's Highest Resolution
						echo "<td>".$resolution."</td>";
						
						// Video's Description
						echo "<td>".$description."</td>";
						
						// Video's Language
						echo "<td>".$language."</td>";
						
						// Video's View Count
						echo "<td>".$views."</td>";
						
						// Video type
						echo "<td>".$type."</td>";
						
						// Video's Tags
						echo "<td>".$tags."</td>";

						// End of row
						echo "</tr>";
					}
				}
				else echo "No favorited videos";
			}
		?>
	</body>
</html>
