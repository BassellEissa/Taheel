$(document).ready(function() {
    // Fancybox Configuration
    $('[data-fancybox="gallery"]').fancybox({
        buttons: [
        "slideShow",
        "thumbs",
        "zoom",
        "fullScreen",
        "share",
        "close"
        ],
        loop: false,
        protect: true
    });
    });
    $(document).ready(function() {
VideoAudioHandler();
});

var StopAllVideoNotv = function(v) {
$(plyr.get()).each(function() {

  if (this.getContainer() != v.detail.plyr.getContainer()) {
    this.pause();
  }
});
};
var GetPlayingVideo = function() {
$("video").filter(function() {
  var video = $(this).get(0);
  return !video.paused;
});
};
var VideoAudioHandler = function() {



$("video").each(function() {

  $('<div class="videoContainer"></div>').insertBefore(this).append(this);
  $(this).attr("video-id","video-"+ Date.now());

});


plyr.setup(document.querySelectorAll("video"), {
  enabled: true
});

$(plyr.get()).each(function() {
  this.on('playing', function(event) {
    StopAllVideoNotv(event);
    CloseSmallVideo();
  });
});





$(window).scroll(function() {

     var PlayingVideo = $(plyr.get()).filter(function(){
        return !this.isPaused();
    })[0];

     // none of videos is playing
     if(PlayingVideo == undefined) return 0;
     
     //if video is playing and not visible to screen and no small video
     if(!$(PlayingVideo.getContainer()).visible(true) && $(".SmallVideo").length == 0)
     {
         PlayingVideo.pause();
         var n =$("<div class='SmallVideo'></div>");
         n.attr("related-video", $(PlayingVideo.getMedia()).attr("video-id"));
         var sv = $(PlayingVideo.getMedia()).clone();
         sv.get(0).currentTime = PlayingVideo.getCurrentTime();
         n.append(sv);
         n.appendTo( "body" );
         plyr.setup('.SmallVideo', {
        enabled: true,
        autoplay : true
       });

         $('<button type="button" onclick="CloseSmallVideo(this)" class="closeSmallVideoBtn" aria-label="Play"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 47.971 47.971" style="enable-background:new 0 0 47.971 47.971;" xml:space="preserve"> <g> <path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88 c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242 C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879 s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></button>').appendTo('.SmallVideo .plyr');
     }
     //if video is playing and visible to screen
     else
     {

     }


    });
  };

  var CloseSmallVideo = function(e) {
  
  if($(".SmallVideo").length == 0) return 0;
    var v =plyr.get($(".SmallVideo .plyr").get(0));
    v[0].pause();
    $(".SmallVideo").remove();
    
  };