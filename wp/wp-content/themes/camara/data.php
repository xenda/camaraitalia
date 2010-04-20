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
						<?php $post_titles = get_posts('category=53'); ?>
						
						<select id="sector" class="dropdown">
							<option value="none"><?php echo _e("<!--:it-->[Seleziona]<!--:--><!--:es-->[Seleccionar]<!--:-->"); ?></option>
							<?php foreach ($post_titles as $post): ?>
								<option value="post-<?php echo $post->ID; ?>"><?php echo the_title(); ?></option>
							<?php endforeach; ?>
						</select>
			
						Alfabetico
						<select id="alfabetico" class="dropdown">
							<option value="none"><?php echo _e("<!--:it-->[Seleziona]<!--:--><!--:es-->[Seleccionar]<!--:-->"); ?></option>
							<?php for($x = 65; $x <= 90; $x++): ?>
								<option value="letter-<?php echo strtolower(chr($x)); ?>"><?php echo chr($x); ?></option>
							<?php endfor; ?>
						</select>
												
						<?php $args = array(); ?>
						<div class="dropdown-content">
							<ul>			
							<?php foreach ($post_titles as $post): ?>
										<?php $custom_fields = get_post_custom(get_the_ID()); ?>
										<li class="post-<?php echo $post->ID; ?> letter-<?php echo get_first_letter(get_the_title()); ?>">
											<h2><?php the_title(); ?></h2>
											<?php echo the_content(); ?>
											<?php if ($custom_fields['email'][0] != null): ?>
												E-mail: <a href="mailto:<?php echo $custom_fields['email'][0]; ?>"><?php echo $custom_fields['email'][0]; ?></a>
											<?php endif; ?>
										</li>
							<?php endforeach; ?>
							</ul>
						</div>
					</div>
	
				</div>
	
		</div>		
		<?php get_sidebar('right'); ?>		
		
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>
