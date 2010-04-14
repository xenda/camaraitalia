<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
$categories = array();
$categories['opportunities'] = 5;
$categories['partners'] = 8;
//$categories['opportunities'] = 5;


function build_combo($class = '', $cat){
	//obtiene a todos
	
}


/**
 * Load css.
 * @return HTML content to display css.
 */
function load_css($theme_url) {
	if (in_array(@$_SERVER['SERVER_ADDR'], array('192.168.0.2', '192.168.0.22','127.0.0.1', '::1'))){
		//localhost
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'. $theme_url . '/css/styles.css.php" />';
	} else {
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'. $theme_url . '/css/styles.css" />';
	}
}

/**
 * Load js.
 * @return HTML content to display css.
 */
function load_js($theme_url) {
	if (in_array(@$_SERVER['SERVER_ADDR'], array('192.168.0.2', '192.168.0.22','127.0.0.1', '::1'))){
		echo '<script type="text/javascript" src="'. $theme_url . '/js/scripts.js.php"></script>';
	} else {
		echo '<script type="text/javascript" src="'. $theme_url . '/js/scripts.js"></script>';	
	}
}