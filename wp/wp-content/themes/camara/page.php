<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
	<div id="container">
		<?php get_sidebar('left'); ?>
		<div id="content">
			<h1><?php the_title(); ?></h1>
			<?php the_content() ?>
		</div>		

		<?php get_sidebar('right'); ?>		
		
		<div class="clear"></div>
		<?php get_footer(); ?>
	</div>