<?php
/*
Template Name: Oportunidades
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
					<?php $args['child_of'] = $categories['opportunities']; ?>
					<?php $categories = get_categories( $args ); ?> 
					
					<select class="dropdown">
						<option value="none"><?php echo _e("<!--:it-->[Seleziona]<!--:--><!--:es-->[Seleccionar]<!--:-->"); ?></option>
						<?php foreach ($categories as $cat): ?>
							<option value="cat-<?php echo $cat->cat_ID; ?>"><?php echo $cat->cat_name; ?></option>
						<?php endforeach; ?>
					</select>
					
					<?php $args = array(); ?>
					<?php $args['showposts'] = -1; ?>
					<?php foreach ($categories as $cat): ?>
						<?php $args['cat'] = $cat->cat_ID; ?>
						<div id="cat-<?php echo $cat->cat_ID?>" class="dropdown-content">
							<div class="cat-name"><?php echo $cat->cat_name; ?></div>
							<?php $my_query = new WP_Query($args); ?>
							<?php if( $my_query->have_posts() ): ?>
								<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<?php $custom_fields = get_post_custom(get_the_ID()); ?>
									<div class="code"><?php echo _e("<!--:it-->Código<!--:--><!--:es-->Código<!--:-->"); ?>: <?php echo $custom_fields['code'][0]; ?></div>
									<?php the_content(); ?>
									<?php if ($custom_fields['email'][0] != null): ?>
										<div class="email"><a href="mailto:<?php echo $custom_fields['email'][0]; ?>"><?php echo _e('<!--:it-->Contattare<!--:--><!--:es-->Contactar<!--:-->')?></a></div>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php unset($my_query); ?>
						</div>
					<?php endforeach; ?>
					</div>
	
				</div>
	
		</div>		
		<?php get_sidebar('right'); ?>		
		
		<div class="clear"></div>
		<?php get_footer(); ?>
	</div>