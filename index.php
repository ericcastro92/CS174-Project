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
		            'UTucZltO4UM', 
		            'H4A_l1P8zno', 
		            'Z4-s8TBB6dw',
		            '7qHL2PSpecI'];

		            
		function init() {
		    // 2. This code loads the IFrame Player API code asynchronously.
		    var tag = document.createElement('script');

		    tag.src = "https://www.youtube.com/iframe_api";
		    var firstScriptTag = document.getElementsByTagName('script')[0];
		    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		    
		    // Initialize the prev and next buttons to have functionality.
		    jQuery('#prev-button').click(prevVideo);
		    jQuery('#next-button').click(nextVideo);
		}
		            
		function onYouTubeIframeAPIReady() {
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
		    
		    
		    event.target.mute();  //player.mute();
		    //event.target.setLoop(true);  //
		    //player.setLoop(true);
		    
		    //event.target.cuePlaylist(videoPlaylist);
		    event.target.loadPlaylist(videoPlaylist);
		    
		    
		    //event.target.playVideo();
		    //player.playVideo();
		    //event.target.seekTo(videoStart, true);  //
		    //player.seekTo(videoStart, false);
		    //preparePlayNextVideo();
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
		jQuery(document).ready(init);
		</script>
		<script>
			if (!window['YT']) {
			    var YT = {
			        loading: 0,
			        loaded: 0
			    };
			}
			if (!window['YTConfig']) {
			    var YTConfig = {
			        'host': 'http://www.youtube.com'
			    };
			}
			if (!YT.loading) {
			    YT.loading = 1;
			    (function() {
			        var l = [];
			        YT.ready = function(f) {
			            if (YT.loaded) {
			                f();
			            } else {
			                l.push(f);
			            }
			        };
			        window.onYTReady = function() {
			            YT.loaded = 1;
			            for (var i = 0; i < l.length; i++) {
			                try {
			                    l[i]();
			                } catch (e) {}
			            }
			        };
			        YT.setConfig = function(c) {
			            for (var k in c) {
			                if (c.hasOwnProperty(k)) {
			                    YTConfig[k] = c[k];
			                }
			            }
			        };
			        var a = document.createElement('script');
			        a.id = 'www-widgetapi-script';
			        a.src = 'https:' + '//s.ytimg.com/yts/jsbin/www-widgetapi-vflHvbdf-/www-widgetapi.js';
			        a.async = true;
			        var b = document.getElementsByTagName('script')[0];
			        b.parentNode.insertBefore(a, b);
			    })();
			}
		</script>
	</header>
	<body>
		<iframe id="ytplayer" frameborder="0" allowfullscreen="1" title="YouTube video player" width="1080" height="720" src="https://www.youtube.com/embed/UTucZltO4UM?controls=0&amp;showinfo=1&amp;autoplay=1&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fwww.sjsu-cs.org"></iframe>
		<div id="canvas" class="canvas">
			<h1 align="center">Our Category</h1>
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
