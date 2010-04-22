<?php
/*
Template Name: Eventos
*/
?>
<?php get_header(); ?>
	<div id="container">
		<?php get_sidebar('left'); ?>
		<div id="content">
		
		<?php the_post(); ?>
	
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h1>Programa de Actividades</h1>
	
					<div class="entry">
					
						<?php $args = array(); ?>
						<?php $args['cat'] = $categories['events']; ?>
						<?php $args['showposts'] = -1; ?>
						<?php query_posts($args); ?>
					
						<?php if( have_posts() ): ?>
							<?php $var = 1;?>
							<?php while (have_posts()) : the_post(); ?>
								<div id="post-<?php the_ID(); ?>" class="magazine">
									<h2><?php the_title(); ?></h2>		
									<?php the_content(); ?>
									<?php $gallery = get_gallery(get_the_ID()); ?>
									<?php if ($gallery): ?>
										<div class="gallery">
										<?php $is_first = true; ?>
										<?php foreach($gallery as $pic):?>
											<a rel="gallery-<?php echo $var; ?>" <?php if ($is_first == true) echo 'class="first"'; ?> href="<?php echo $pic['full'][0]; ?>" rel="" title="<?php echo $item['title']; ?>"><?php if ($is_first == true) echo _e("<!--:it-->Fotos del evento<!--:--><!--:es-->Fotos del evento<!--:-->"); ?></a>
											<?php $is_first = false; ?>
										<?php endforeach; ?>
										<?php $var++; ?>
										</div>
									<?php endif; ?>
								</div>	
							<?php endwhile; ?>
						<?php endif; ?>
						
						<div class="clear"></div>					
					</div>


				</div>
	
		</div>		
		<?php get_sidebar('right'); ?>		
		
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>