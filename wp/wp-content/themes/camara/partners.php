<?php
/*
Template Name: Socios
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
						<?php $my_query = new WP_Query($args); ?>
						<?php if( $my_query->have_posts() ): ?>
							<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
								<?php $custom_fields = get_post_custom(get_the_ID()); ?>
								<h2><?php echo $custom_fields['code'][0]; ?></h2>
								<?php the_content(); ?>
								<a href="mailto:<?php echo $custom_fields['email'][0]; ?>"><?php echo _e('<!--:it-->Contattare<!--:--><!--:es-->Contactar<!--:-->')?></a>
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
	</div>
<?php get_footer(); ?>