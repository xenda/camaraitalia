<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
$categories = array();
$categories['opportunities'] = 5;
$categories['partners'] = 8;
$categories['data'] = 53;
$categories['faires'] = 54;
$categories['network'] = 84;
$categories['publications'] = 92;
$categories['events'] = 52;

$months['es'][] = 'Enero';
$months['es'][] = 'Febrero';
$months['es'][] = 'Marzo';
$months['es'][] = 'Abril';
$months['es'][] = 'Mayo';
$months['es'][] = 'Junio';
$months['es'][] = 'Julio';
$months['es'][] = 'Agosto';
$months['es'][] = 'Septiembre';
$months['es'][] = 'Octubre';
$months['es'][] = 'Noviembre';
$months['es'][] = 'Diciembre';

$months['it'][] = 'Gennaio';
$months['it'][] = 'Febbraio';
$months['it'][] = 'Marzo';
$months['it'][] = 'Aprile';
$months['it'][] = 'Maggio';
$months['it'][] = 'Giugno';
$months['it'][] = 'Luglio';
$months['it'][] = 'Agosto';
$months['it'][] = 'Settembre';
$months['it'][] = 'Ottobre';
$months['it'][] = 'Novembre';
$months['it'][] = 'Dicembre';

function get_first_letter($value){
	return strtolower(substr($value, 0, 1));
}


/**
 * Load css.
 * @return HTML content to display css.
 */
function load_css($theme_url) {
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'. $theme_url . '/css/styles.css.php" />';
	/*
	if (in_array(@$_SERVER['SERVER_ADDR'], array('192.168.0.2', '192.168.0.22','127.0.0.1', '::1'))){
		//localhost
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'. $theme_url . '/css/styles.css.php" />';
	} else {
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'. $theme_url . '/css/styles.css" />';
	}
	*/
}

/**
 * Load js.
 * @return HTML content to display css.
 */
function load_js($theme_url) {
	echo '<script type="text/javascript" src="'. $theme_url . '/js/scripts.js.php"></script>';
	/*
	if (in_array(@$_SERVER['SERVER_ADDR'], array('192.168.0.2', '192.168.0.22','127.0.0.1', '::1'))){
		echo '<script type="text/javascript" src="'. $theme_url . '/js/scripts.js.php"></script>';
	} else {
		echo '<script type="text/javascript" src="'. $theme_url . '/js/scripts.js"></script>';	
	}
	*/
}

function get_gallery($id = null) {
	$gallery = array();
	$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	if ($attachments) {
		foreach ( $attachments as $id => $attachment ) {
			$gallery[] = array(
				'title'  => $attachment->post_title,
				'desc'   => $attachment->post_content,
				'alt'    => $attachment->post_excerpt,
				'order'  => $attachment->menu_order,
				'full'   => wp_get_attachment_image_src($id, 'full', false),
			);
		}
	}
	return $gallery;
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}