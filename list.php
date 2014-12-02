<!DOCTYPE HTML>
<HTML>
<head>
	<title>CS 174 Bonus HW</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
	<?php
		require_once('config.php');
	?>
	
	
	<script>
		$(document).ready(function() 
			{ 
				$("#datatable").tablesorter(); 
			} 
		); 
		
		//$(".favbutton").click(function(){
		//	$.post("addfavorite.php", {id:
		//});
		
		function addFavorite(id) {
			$.post("addfavorite.php", {videoid:id});
		}
	</script>
	
	
</head>

<body>
	<table border="2" id="datatable" class="tablesorter">
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
				<th>Favorite</th>
			</tr>
		</thead>
		
		<tbody>
			<?php 
			$data = mysqli_query($conn, "SELECT * FROM fun_video") or die(mysql_error());
			
			while ($info = mysqli_fetch_array($data)) {
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
				
				// Favorite button
				echo "<td><button type='button' onclick='addFavorite($videoid)' class='favbutton' id='$videoid'>Add to favorites</button></td>";
				
				// End of row
				echo "</tr>";
			}

			?>
		</tbody>
		
	</table>





</body>