<?php
/*
Template Name: Publicaciones
*/
?>
<?php get_header(); ?>
	<div id="container">
		<?php get_sidebar('left'); ?>
		<div id="content">
		
		<?php the_post(); ?>
	
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h1><?php echo _e("<!--:it-->Notiziario Economico<!--:--><!--:es-->Noticiero Económico<!--:-->"); ?></h1>
	
					<div class="entry">
					
						<?php $args = array(); ?>
						<?php $args['cat'] = $categories['publications']; ?>
						<?php $args['showposts'] = -1; ?>
						<?php query_posts($args); ?>
					
						<?php if( have_posts() ): ?>
							<?php while (have_posts()) : the_post(); ?>
								<div id="post-<?php the_ID(); ?>" class="magazine">
									<?php the_content(); ?>
									<h2><?php the_title(); ?></h2>
								</div>	
							<?php endwhile; ?>
						<?php endif; ?>
						<div class="clear"></div>					
					</div>

				</div>
	
		</div>	
		
		<div class="clear"></div>
		<?php get_footer(); ?>
	</div>