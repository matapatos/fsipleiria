<?php

/**
 * Function created for get welcome section ('sections/welcome.php').
  * @param  [array] $atts    - Shortcode parameters, but in this case there is no parameters.
 * @param  [string|shortcodes|html] $content - Shortcode content
 * @return [html] - HTML code to render on the browser.
 */
function scWelcome($atts, $content = null){
	/*extract(shortcode_atts( array(
	    'video-id' => ''
	), $atts ));*/

	$content = strip_tags($content, '<img>');//remove all tags except <img>

	include( locate_template('sections/welcome.php') );
}
add_shortcode( 'welcome', 'scWelcome');

/**
 * Function created to show the contacts sections ('sections/contacts.php').
 * @param  [array] $atts    - Shortcode parameters:
 *                          	tel [string] - phone number to be displayed. Can be +35199...
 *                          	email [string] - email to be displayed
 *                          	street [string] - address to be displayed.
 * @param  [string|shortcodes|html] $content - Shortcode content
 * @return [html] - HTML code to render on the browser.
 */
function scContacts($atts, $content = null){
	extract(shortcode_atts( array(
	    'tel' => '',
	    'email' => '',
	    'street' => ''
	), $atts ));

	$content = strip_tags($content, '<iframe>');

	include(locate_template('sections/contacts.php' ));
}
add_shortcode( 'contacts', 'scContacts' );

/**
 * Function created to incorporate a Google Maps in the page. You can focus a specific point by it's coordinates (latitude, longitude) or by searching by the street (search).
 * @param  [array] $atts    - Shortcode parameters:
 *                         		lat [long] -> latitute of the point to be show in the map
 *                         		lng [long] -> longitude of the point to be show in the map
 *                         		width [int] -> width of the map
 *                         		height [int] -> height of the map
 *                         		search [string] -> string to be searched on the map. To show that specific point
 *                         		zoom [int] -> zoom of the point.
 * @param  [string|shortcodes|html] $content - Shortcode content
 * @return [html] - HTML code to render on the browser.
 */
function scMap($atts, $content = null){
	extract(shortcode_atts( array(
	    'lat' => '',
	    'lng' => '',
	    'width' => '800',
	    'height' => '600',
	    'zoom' => '17',
	    'scroll' => 'false',
	    'draggable' => false
	), $atts ));

	/*if($scroll)
		$scroll_style = 'pointer-events:none;';*/
	// echo '<iframe src="https://maps.google.com/maps?q=' . $search . '&z=' . $zoom  . '&output=embed&iwloc=0&" width="' . $width . '" height="' . $height . '" style="' . $scroll_style . '"></iframe>';


	if(!defined('google-javascript-api')){
		define('google-javascript-api', true);
		echo '<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>';
	}

	echo '
	<div id="map" style="width:' . $width . '; height:' . $height . ';"></div>
	<script>
		function initMap() {
			var coordinates = {lat: ' . $lat . ' , lng: ' . $lng . '};
			// Create a map object and specify the DOM element for display.
			var map = new google.maps.Map(document.getElementById(\'map\'), {
			center: coordinates,
			scrollwheel: ' . ($scroll ? 'false' : 'true') . ',
			zoom: ' . $zoom . ',
			draggable: ' . ($draggable ? 'false' : 'true') . ',
			mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var marker = new google.maps.Marker({
	                map: map,
	                position: coordinates
	            });
		}
		google.maps.event.addDomListener(window, \'load\', initMap);
	</script>';
}
add_shortcode( 'map', 'scMap' );

/**
 * Function created for showing the template testimonials (sections/testimonials.php).
 * @return [html] - HTML code to render on the browser.
 */
function scTestimonials(){
	include(locate_template('sections/testimonials.php' ));
}
add_shortcode( 'testimonials', 'scTestimonials' );

/**
 * Function created for showing the template team (sections/team.php).
 * @return [html] - HTML code to render on the browser.
 */
function scTeam(){
	include(locate_template('sections/team.php' ));
}
add_shortcode('team', 'scTeam');
/**
 * Function created for showing the template focus_section (sections/focus_section.php).
 * @return [html] - HTML code to render on the browser.
 */
function scFocus_Section(){
	include(locate_template('sections/focus_section.php' ));
}
add_shortcode('focus-section', 'scFocus_Section' );
/**
 * Function created for showing the template competitions (sections/competitions.php).
 * @return [html] - HTML code to render on the browser.
 */
function scCompetitions(){
	include(locate_template('sections/competitions.php' ));
}
add_shortcode('competitions', 'scCompetitions' );
/**
 * Function created for showing the template thanks (sections/thanks.php).
 * @return [html] - HTML code to render on the browser.
 */
function scThanks(){
	include(locate_template('sections/thanks.php' ));
}
add_shortcode('thanks', 'scThanks');
/**
  * Function created for showing the template objective (sections/objective.php).
 * @return [html] - HTML code to render on the browser.
 */
function scObjective(){
	include(locate_template('sections/objective.php'));
}
add_shortcode('objective', 'scObjective' );
/**
  * Function created for showing the template sponsors (sections/sponsors.php).
  * @param  [array] $atts    - Shortcode parameters:
  *                          	Empty
 * @param  [string|shortcodes|html] $content - Shortcode content. Should be a gallery of images.
 * @return [html] - HTML code to render on the browser.
 */
function scSponsors($atts, $content = null){
	include(locate_template('sections/sponsors.php' ));
}
add_shortcode('sponsors', 'scSponsors');
/**
 * Function created just for adding a section in the page with a title and a content text.
 * @param  [array] $atts    - Shortcode parameters:
  *                          	id_section -> id to be putted on the section;
  *                          	title -> title of the section.
 * @param  [string] $content - Content text.
 * @return [html] - HTML code to render on the browser.
 */
function scText($atts, $content = null){
	extract(shortcode_atts( array(
	    'id_section' => '',
	    'title' => ''
	), $atts ));

	include(locate_template('sections/text.php'));
}
add_shortcode('text', 'scText');

?>
