<?php

$LANGS_ARRAY = array('en', 'pt');
$_lang = '';

initLang();

/**
 * Function created for retriving the HREF attribute of each link of the flag.
 * @param  [string] $lg - language flag descriptor.
 * @return [string]     - empty string if the language it's the current language. To not refresh the page if it's already in that language.
 *                        HREF attribute. Example: href="fsipleiria.com/?lg=en"
 */
function getHREFatt($lg){
	global $_lang;
	if($_lang == $lg)
		return '';

	if(isset($_SERVER) && array_key_exists('REQUEST_URI', $_SERVER)){
		$url = parse_url($_SERVER['REQUEST_URI']);

		if(array_key_exists('query', $url)){
			$params = explode('&', $url['query']);
			foreach ($params as $key => $value) {
				if(startsWith($value, 'lg=')){
					$params[$key] = 'lg=' . $lg;
					$new_params = implode('&', $params);

					return 'href="' . $url['path'] . '?' . $new_params . '"';
				}
			}

			array_push($params, 'lg=' . $lg);
			$new_params = implode('&', $params);

			return 'href="' . $url['path'] . '?' . $new_params . '"';
		}

		return 'href="' . $url['path'] . '?lg=' . $lg . '"';
	}

	return '';
}
/**
 * Function created to retrieve the lang attribute for an HTML tag.
 * @return [string] - Lang attribute.
 */
function getLangAttributes(){
	echo ' lang="' . getCurrentLang() . '" ';
}
/**
 * Function created to get the current language of the page.
 * @return [string] - Language type.
 */
function getCurrentLang(){
	global $_lang;
	return $_lang;
}
/**
 * Function created to initialize the language fields of the user session, if it's not already set. It bases on the browser accepted languages.
 * @return [string] - Language definition. Example: 'en' or 'pt'. If there was no language set, the default it's 'en'.
 */
function initLang(){
	global $LANGS_ARRAY;
	global $_lang;
	$_lang = 'en';

	if(isset($_GET) && array_key_exists('lg', $_GET) && in_array($_GET['lg'], $LANGS_ARRAY)){
		$_lang = $_GET['lg'];
	}
	else if(isset($_POST) && array_key_exists('lg', $_POST) && in_array($_POST['lg'], $LANGS_ARRAY)){
		$_lang = $_POST['lg'];
	}
	else {
		if(isset($_SERVER) && array_key_exists('HTTP_ACCEPT_LANGUAGE', $_SERVER)){
			$array_lang = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
			foreach ($array_lang as $key => $value) {
				if(in_array($value, $LANGS_ARRAY)){
					$_lang = $value;
					break;
				}
			}
		}
	}

	setlocale(LC_MONETARY, $_lang);
}
/**
 * Function created to return the html code of the language widget.
 * @return [string] - Code of the language widget.
 */
function getLanguageWidget(){
	global $LANGS_ARRAY;
	$lang = getCurrentLang();

	foreach ($LANGS_ARRAY as $key => $value) {
		$concept .= '<li id="lang_' . $value . '" class="menu-item menu-item-type-custom menu-item-object-custom"><a ' . getHREFatt($value) . ' class="flag ' . ($value == $lang ? 'current_flag' : 'flag_others') . ' flag_' . $value . '" value="' . $value . '"></a></li>';
	}

	return $concept;
}
/**
 * Function created to append the Language Widget to the nav bar menu.
 * @param [Object] $nav  - NavBar of the theme.
 * @param [Array] $args - Arguments of the nav bar.
 */
function addLangWidget($nav, $args){
	return $nav . getLanguageWidget();
}
add_filter('wp_nav_menu_items','addLangWidget', 10, 2);
/**
 * Function created to check if a string starts with that string.
 * @param  [string] $haystack - String to be searched
 * @param  [string] $needle   - String necessary to starts with.
 * @return [bool]           - true if $needle is empty or if the string starts with that $needle.
 *                            false otherwise.
 */
function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}
?>
