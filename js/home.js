// HOW TO LOAD JQUERY!!
// https://digwp.com/2011/09/using-instead-of-jquery-in-wordpress/

var $ = jQuery,
    player,
    firstTimePlay = false;

/*
  Create <IFRAME> with id #player
 */
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    videoId: 'EomQ6fh1naA',
    playerVars: {rel: 0},
    events: {
      'onStateChange': onPlayerStateChange,
      'onError': onPlayerError
    }
  });
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

  $('#welcome-text').removeClass(FADE_IN_ANIM).addClass(FADE_OUT_ANIM).one(ANIM_END, function(event) {
    $(this)[0].style.display = 'none';
  });
  $('.welcome-player').fadeTo('slow', 1, function() {});
}
