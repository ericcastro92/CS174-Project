<html>
	<?php 
		require_once('config.php');
		include "navbar.php"; 
	?>
	<header>
		<title>
			CS174 - Group 1 - Home
		</title>
		<style>
			#ytplayer {    
			    /*position: absolute;*/
			    min-width:            1080px;
			    min-height:            720px;
			    height: auto;
			    width: 100%;
			    /*margin: -100px 0 0 -200px;*/
			    /* left: 50%; */
			}

			.canvas {
			    position: absolute;
			    width: 100%;
			    /*height: 390px;*/
			    margin: 0 0 0 -50%;
			    left: 50%; /*150px;*/
			    top: 100px;
			    color: #ffffff;
			    text-align: center;
			    font-size: 40px;
			    font-family: "Arial", sans-serif;
			}
		</style>
		<script>
			/*

			http://stackoverflow.com/questions/24868226/how-do-you-mute-an-embedded-youtube-player/24869361#24869361

			https://developers.google.com/youtube/iframe_api_reference
			*/

			var player;
			// duration an embedded youtube video is shown in ms (milliseconds)
			var durationYoutubeVideo = 12000;
			// At what point to start video plays at, in seconds.
			var videoStart = 148;
			// Index of current video being played. 
			var currentVideo = 0;
			// Playlist of videos.
			var videoPlaylist = [
			            '0Y_GULVhJmM', 
			            '_dog-aaCCIc', 
			            '5HQnuWY13ac',
			            '72yaPmAH3uw'];

			            
			function init() {
				console.log("init");
			    // 2. This code loads the IFrame Player API code asynchronously.
			    var tag = document.createElement('script');

			    tag.src = "//www.youtube.com/iframe_api";
			    var firstScriptTag = document.getElementsByTagName('script')[0];
			    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
			    
			    // Initialize the prev and next buttons to have functionality.
			    jQuery('#prev-button').click(prevVideo);
			    jQuery('#next-button').click(nextVideo);
			}
			            
			function onYouTubeIframeAPIReady() {
					console.log("YouTube frame ready");
			        player = new YT.Player('ytplayer', {
			          height: '720',
			          width: '1080',
			          videoId: videoPlaylist[0],
			          playerVars: { 'controls': 0, 'showinfo': 1, 'autoplay': 1 },
			          events: {
			            'onReady': onPlayerReady,
			            'onStateChange': onPlayerStateChange
			          }
			        });
			        
			  }

			// 4. The API will call this function when the video player is ready.
			function onPlayerReady(event) {
			    //This should mute player
			    console.log("Player ready");
			    player.mute();
			    player.playVideo();
			    //event.target.mute();
			    //event.target.loadPlaylist(videoPlaylist);

			}

			// 5. The API calls this function when the player's state changes.
			//    The function indicates that when playing a video (state=1),
			//    the player should play for some amount of seconds and then play the next video.
			var done = false;
			var timeoutIsFresh = false;
			function onPlayerStateChange(event) {
			    
			    if (event.data == YT.PlayerState.PLAYING && !done) {
			      //setTimeout(stopVideo, 6000);
			      //done = true;
			      //event.target.seekTo(videoStart, true);
			      timeoutIsFresh = true;
			      setTimeout(function() {
			        if (timeoutIsFresh) {
			            // only do this if nextVideo() was not called before this happened, because we do not want to interrupt the video playing if the player forced the next video to play.
			            nextVideo();
			        }
			      }, durationYoutubeVideo);
			    }
			    
			}
			function stopVideo() {
			    player.stopVideo();
			}

			function nextVideo() {
			    timeoutIsFresh = false;  // invalidate a concurrently sleeping setTimeout call, if any.
			    player.stopVideo();
			    // Enforce the loop ourselves. For some reason player.setLoop() is only causing the last video to loop, so we use this to force the looping ourselves.
			    if (currentVideo == videoPlaylist.length - 1) {
			        // last video was playing, so loop.
			        currentVideo = 0;
			        //player.playVideoAt(currentVideo);
			    }
			    else {
			        currentVideo++;
			        //player.nextVideo();
			    }
			    player.playVideoAt(currentVideo);
			    player.seekTo(videoStart, false);
			    player.playVideo();
			    /*
			    setTimeout(function() {
			        nextVideo();
			        }, durationYoutubeVid);
			    */
			}
			function prevVideo() {
			    timeoutIsFresh = false;
			    player.stopVideo();
			    if (currentVideo == 0) {
			        // first video was playing, so choose the index of last video.
			        currentVideo = videoPlaylist.length - 1;
			    }
			    else {
			        currentVideo--;
			    }
			    player.playVideoAt(currentVideo);
			    player.seekTo(videoStart, false);
			    player.playVideo();
			}

			/*
			//    Prepares for the next video to be played, calling playNextVideo() after some timeout duration.
			function preparePlayNextVideo(duration) {
			    setTimeout(function() { playNextVideo(); }, duration); 
			}

			//    Plays the next video, starting at some interesting point in the video.
			//    Prepares for the next video to be played by calling preparePlayNextVideo().
			function playNextVideo() {
			    player.nextVideo();
			    player.seekTo(videoStart);
			    //player.playVideo();
			    preparePlayNextVideo(durationYoutubeVid);
			}
			*/


			// Begin initializing the video player when document finishes loading.
			console.log("And it begins");
			jQuery(document).ready(init);
		</script>
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
