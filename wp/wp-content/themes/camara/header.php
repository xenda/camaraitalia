<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>


	<?php if (function_exists('load_css')):?>
		<?php load_css(get_bloginfo('template_directory')); ?>
	<?php else: ?>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/css/styles.css.php" />
	<?php endif; ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if IE]><div class="ie"><script type="text/javascript">document.ie = { version: null };</script><![endif]-->
<!--[if IE 6]><div id="ie6"><script type="text/javascript">document.ie.version = 6;</script><![endif]-->
<!--[if IE 7]><div id="ie7"><script type="text/javascript">document.ie.version = 7;</script><![endif]-->
<!--[if gte IE 8]><div id="ie8"><script type="text/javascript">document.ie.version = 8;</script><![endif]-->
<div id="page">


	<div id="header">
		<div id="corner-logo">
			<h1 id="head-logo"><a href="" ><span><?php bloginfo('name'); ?>dhghghf</span></a></h1>
		</div>
		<div class="description"><?php bloginfo('description'); ?></div>
		<div id="head-menu">
			<div class="bg"></div>
				<ul id="header-nav">
					<?php wp_list_pages('child_of=10&depth=1&title_li=&sort_column=menu_order'); ?>
				</ul>
			<div id="head-idioma"></div>
		</div>
	</div>