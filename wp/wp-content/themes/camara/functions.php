<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}
*/
 
/**
 * Load css.
 * @return HTML content to display css.
 */
function load_css($theme_url) {
	if (in_array(@$_SERVER['REMOTE_ADDR'], array('192.168.0.2', '192.168.0.22','127.0.0.1', '::1'))){
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
	if (in_array(@$_SERVER['REMOTE_ADDR'], array('192.168.0.2', '192.168.0.22','127.0.0.1', '::1'))){
		echo '<script type="text/javascript" src="'. $theme_url . '/js/scripts.js.php"></script>';
	} else {
		echo '<script type="text/javascript" src="'. $theme_url . '/js/scripts.js"></script>';	
	}
}