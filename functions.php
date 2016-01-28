<?php

/**
 * Include file with shortcodes.
 */
if(!defined('fsipleiria-shortcodes')){
	define('fsipleiria-shortcodes', true);
	include ('includes/shortcodes.php');
}

if(!defined('fsipleiria-customizer')){
	define('fsipleiria-customizer', true);
	include ('includes/customizer.php');
}


/*
	Main function to include CSS files.
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    wp_register_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css', false, '3.4.0', 'all');
    wp_enqueue_style('animate');
}
/*
	Main function for include any tag in the <head></head> tag of the content.
 */
add_action( 'wp_head', 'favicon_icon' );
function favicon_icon() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/images/favicon.ico" />' . "\n";
}
/*
	Main function to include JS files.
 */
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts(){
	/*wp_register_script('angular-js', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js', false, "1.3.15", 'all');
	wp_enqueue_script('angular-js' );*/

	wp_register_script('youtube-iframe-api', 'https://www.youtube.com/iframe_api');
	wp_enqueue_script('youtube-iframe-api');

	wp_register_script('scrollTo', get_stylesheet_directory_uri() . '/js/scrollTo.js', array('jquery'), false, true);
	wp_enqueue_script('scrollTo' );

	wp_enqueue_script('home-js', get_stylesheet_directory_uri() . '/js/home.js', array('jquery'), false, true);
}

/**
 * Function created to hide or show the sidebar and the title of each page. (Change the template of all pages to be without the custom wordpress template).
 * @param  [bool] $state - true if want to hide;
 *                       	false if want to show
 */
function changeStateBlankTemplatePages($state){
	$GLOBALS['blank_template'] = $state;
}

changeStateBlankTemplatePages(true);


?>
