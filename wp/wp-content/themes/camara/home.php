<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
	<div id="container">
		<?php get_sidebar('left'); ?>
		<div id="content">
			<h2><?php echo _e("<!--:it-->Camera di Commercio Italiana in Perú<!--:--><!--:es-->Camara de Comercio Italiana en Perú<!--:-->"); ?></h2>
			<div class="camara"></div>	
		</div>		
		<?php get_sidebar('right'); ?>		
		
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>