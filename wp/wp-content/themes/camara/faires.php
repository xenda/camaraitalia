<?php
/*
Template Name: Ferias
*/
?>
<?php get_header(); ?>
	<div id="container">
		<?php get_sidebar('left'); ?>
		<div id="content">
		
		<?php the_post(); ?>
	
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	
					<div class="entry">
					
						<?php $args = array(); ?>
						<?php $args['child_of'] = $categories['partners']; ?>
						<?php $categories = get_categories( $args ); ?> 
						Por sector
						<select id="sector" class="dropdown">
							<option value="none"><?php echo _e("<!--:it-->[Seleziona]<!--:--><!--:es-->[Seleccionar]<!--:-->"); ?></option>
							<?php foreach ($categories as $cat): ?>
								<option value="cat-<?php echo $cat->cat_ID; ?>"><?php echo $cat->cat_name; ?></option>
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
						<?php $args['showposts'] = -1; ?>
						<div class="dropdown-content">
							<ul>			
							<?php foreach ($categories as $cat): ?>
								<?php $args['cat'] = $cat->cat_ID; ?>
		
								<?php $my_query = new WP_Query($args); ?>
								<?php if( $my_query->have_posts() ): ?>
									<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
										<?php $custom_fields = get_post_custom(get_the_ID()); ?>
										<li class="cat-<?php echo $cat->cat_ID; ?> letter-<?php echo get_first_letter(get_the_title()); ?>">
											<h2><?php the_title(); ?></h2>
											<p><?php echo _e("<!--:it-->Settore<!--:--><!--:es-->Sector<!--:-->"); ?>: <?php echo $cat->cat_name; ?></p>
											<?php the_content(); ?>
											<?php if ($custom_fields['email'][0] != null): ?>
												E-mail: <a href="mailto:<?php echo $custom_fields['email'][0]; ?>"><?php echo $custom_fields['email'][0]; ?></a>
											<?php endif; ?>
										</li>
									<?php endwhile; ?>
								<?php endif; ?>
								<?php unset($my_query); ?>
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
