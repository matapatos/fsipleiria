// HOW TO LOAD JQUERY!!
// https://digwp.com/2011/09/using-instead-of-jquery-in-wordpress/

var $ = jQuery,
    player,
    firstTimePlay = false,
    firstTime = new Date().getTime(),
    MAX_TIMEOUT = 3000;

/*
  Create <IFRAME> with id #player
 */
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    videoId: 'EomQ6fh1naA',
    playerVars: {rel: 0},
    events: {
      'onStateChange': onPlayerStateChange,
      'onError': onPlayerError,
      'onReady': onPlayerReady
    }
  });
}
/**
 * Function created for being the callback of the 'onReady' state of the player.
 */
function onPlayerReady(event){
  var now = new Date().getTime(),
      total = now - firstTime;

  if(total >= MAX_TIMEOUT){
    event.target.playVideo();
  }
  else setTimeout(event.target.playVideo(), MAX_TIMEOUT - total);
}
/*
  Function created to be called when the #player state change. PLAYING, STOP, etc.
 */
function onPlayerStateChange(event){
  if(!firstTimePlay && event.data == YT.PlayerState.PLAYING){
    firstTimePlay = false;
    focusOnPlayer();
  }
}
function onPlayerError(error){
  alert('An error occours with Video Player. Try to refresh the page.');
}
/*
  Function created to hide the welcome text and to change the opacity gradually of the .welcome-player elements.
 */
function focusOnPlayer() {
  var FADE_IN_ANIM = 'animated fadeInDown',
      FADE_OUT_ANIM = 'animated fadeOutDown',
      ANIM_END = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

  $('#welcome-img').removeClass(FADE_IN_ANIM).addClass(FADE_OUT_ANIM).one(ANIM_END, function(event) {
    $(this)[0].style.display = 'none';
  });
  $('.welcome-player').fadeTo('slow', 1, function() {});
}
