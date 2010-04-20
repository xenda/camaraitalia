<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
	<div id="container">
		<?php get_sidebar('left'); ?>
		<div id="content">
			<h1><?php echo _e("<!--:it-->Camera di Commercio Italiana in Perú<!--:--><!--:es-->Camara de Comercio Italiana en Perú<!--:-->"); ?></h1>
			
			<?php query_posts('category_name=Portada&posts_per_page=1'); ?>

       <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
       <?php endwhile;?>			
				
		</div>		

		<?php get_sidebar('right'); ?>		
		<?php get_sidebar('footer'); ?>		
		<div class="clear"></div>
		<?php get_footer(); ?>
	</div>
