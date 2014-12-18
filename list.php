
	
	
	<script>
		$(document).ready(function() 
			{ 
				//$("#datatable").tablesorter(); 
				$('#datatable').DataTable();
			} 
		); 
		
		//$(".favbutton").click(function(){
		//	$.post("addfavorite.php", {id:
		//});
		
		function addFavorite(id) {
			$.post("addfavorite.php", {videoid:id},function(data){
				alert(data);
				location.reload();
			});
		}

		function removeFavorite(id) {
			var confirm = window.confirm("Are you sure you want to remove this from favorites?");

			if(confirm){
				$.post("removefavorite.php", {videoid:id},function(data){
					alert(data);
					location.reload();
				});
			}
		}
	</script>

	<?php 
		//include "navbar.php"; 

		$fav;

		if(isset($_SESSION['favorites'])) {
			$fav = explode(" ", $_SESSION['favorites']);
		}

		function favoriteButton($id) {
			global $fav;

			if (isset($_SESSION['favorites'])){
				if (!in_array($id, $fav)) {
					echo "<td><button type='button' onclick='addFavorite($id)' class='favbutton' id='$id'>Add to favorites</button></td>";
				}
				else {
					echo "<td><button type='button' onclick='removeFavorite($id)' class='favbutton'>Remove from favorites</button>";
				}
			}
			else{
				echo "<td><button type='button' onclick='addFavorite($id)' class='favbutton' id='$id'>Add to favorites</button></td>";
			}

		}

	?>

	<h2> All Videos </h2>

	<table border="2" id="datatable" class="table table-hover table-bordered table-condensed">
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
				<th>Category</th>
				<th>Tags</th>
				<?php 
					if(isset($_COOKIE['loggedIn'])) {
						echo "<th>Favorite</th>";
					}
				?>
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
				$category=$info["category"];
				
				// Video image and link
				echo "<tr><td>
				<a href='". $link ."' target='_blank'><img src='".htmlspecialchars($thumbnail)."' alt='".$thumbnail."' height='50' width='100'></a>
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

				// Category
				echo "<td>".$category."</td>";
				
				// Video's Tags
				echo "<td width=100>".$tags."</td>";
				
				// Favorite button
				if (isset($_COOKIE['loggedIn'])) {
					favoriteButton($videoid);
				}
				
				// End of row
				echo "</tr>";
			}

			?>
		</tbody>
		
	</table>



