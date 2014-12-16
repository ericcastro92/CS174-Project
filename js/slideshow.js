var player;
// duration an embedded youtube video is shown in ms (milliseconds)
var durationYoutubeVideo = 12000;
// At what point to start video plays at, in seconds.
var videoStart = 30;
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
          playerVars: { 'controls': 0, 'showinfo': 1, 'autoplay': 1},
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
    player.loadPlaylist(videoPlaylist);

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