<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
	<div id="container">
		<?php get_sidebar('left'); ?>
		<div id="content">
	

			<h2 class="center">Not Found</h2>
			<p class="center">Sorry, but you are looking for something that isn't here.</p>
			<?php get_search_form(); ?>
	
	
		</div>		
		<?php get_sidebar('right'); ?>		
		
		<div class="clear"></div>
		<?php get_footer(); ?>
	</div>