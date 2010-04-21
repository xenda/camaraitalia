<?php
/*
Template Name: Datos Economicos
*/
?>
<?php get_header(); ?>
	<div id="container">
		<?php get_sidebar('left'); ?>
		<div id="content">
		
		<?php the_post(); ?>
	
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h1><?php the_title(); ?></h1>
	
					<div class="entry">
					
						<?php $args = array(); ?>
						<?php $args['cat'] = $categories['data']; ?>
						<?php $args['showposts'] = -1; ?>
						<?php query_posts($args); ?> 
						
						<?php if( have_posts() ): ?>
						<div class="combos">
							<select class="dropdown" id="main-combo" onchange="oportunidades(this)">
								<option value="none"><?php echo _e("<!--:it-->[Seleziona]<!--:--><!--:es-->[Seleccionar]<!--:-->"); ?></option>
								<?php while (have_posts()) : the_post(); ?>
									<option value="post-<?php the_ID(); ?>"><?php the_title(); ?></option>
								<?php endwhile; ?>
							</select>
						</div>
						<?php endif; ?>						
						
						
						
						<?php if( have_posts() ): ?>
							<?php while (have_posts()) : the_post(); ?>
								<div id="post-<?php the_ID(); ?>" class="dropdown-content">
									<h1><?php the_title(); ?></h1>
									<?php the_content(); ?>
								</div>	
							<?php endwhile; ?>
						<?php endif; ?>
									
					</div>
					
				</div>
	
		</div>	
		
		<div class="clear"></div>
		<?php get_footer(); ?>
	</div>
