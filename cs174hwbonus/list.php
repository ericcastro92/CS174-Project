<!DOCTYPE HTML>
<HTML>
<head>
	<title>CS 174 Bonus HW</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
	<?php
		include "dbconnect.php";
	?>
	
	<script type="text/javascript" src="jquery-latest.js"></script> 
	<script type="text/javascript" src="jquery.tablesorter.js"></script> 
	
	<script>
		$(document).ready(function() 
			{ 
				$("#datatable").tablesorter(); 
			} 
		); 
	</script>
	
</head>

<body>
	<h5><a href="index.php">Add a new entry!</a></h5>

	<h3>List of videos in database: </h3><br>
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
			</tr>
		</thead>
		
		<tbody>
			<?php 
			$data = mysqli_query($conn, "CALL GetVideos()") or die(mysqli_error());
			
			while ($info = mysqli_fetch_array($data)) {
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
				
				echo "</tr>";
			}
			?>
		</tbody>
		
	</table>





</body>