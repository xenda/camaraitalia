<div id="bottom_ad">
		<?php query_posts('category_name=PublicidadAbajo&posts_per_page=5'); ?>

     <?php while (have_posts()) : the_post(); ?>
        <div class="ad_block">
          <?php the_content(); ?>
        </div>
     <?php endwhile;?>
</div>