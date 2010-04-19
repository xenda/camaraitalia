<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
	<div id="sidebar-right">
		<div id="ad">
			
			<?php query_posts('category_name=Publicidad&posts_per_page=5'); ?>

       <?php while (have_posts()) : the_post(); ?>
          <div class="ad_block">
            <?php the_content(); ?>
          </div>
       <?php endwhile;?>
			
		</div>
	</div>