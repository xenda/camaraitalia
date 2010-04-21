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
					<h1><?php the_title(); ?></h1>
	
					<div class="entry">
					
						<?php $args = array(); ?>
						<?php $args['child_of'] = $categories['faires']; ?>
						<?php $categories = get_categories( $args ); ?> 
						<div class="combos">
							<div class="combo">
							<?php echo _e("<!--:it-->Area<!--:--><!--:es-->Por área<!--:-->"); ?>:
							<select id="main-combo" class="dropdown" onchange="partners(this, 'second-combo', 'list')">
								<option value="none"><?php echo _e("<!--:it-->[Seleziona]<!--:--><!--:es-->[Seleccionar]<!--:-->"); ?></option>
								<?php foreach ($categories as $cat): ?>
									<option value="cat-<?php echo $cat->cat_ID; ?>"><?php echo $cat->cat_name; ?></option>
								<?php endforeach; ?>
							</select>
				
							</div>
							<div class="combo">
							<?php echo _e("<!--:it-->Meze<!--:--><!--:es-->Por mes<!--:-->"); ?>:			
							<select id="second-combo" class="dropdown" onchange="partners(this, 'main-combo', 'list')">
								<option value="none"><?php echo _e("<!--:it-->[Seleziona]<!--:--><!--:es-->[Seleccionar]<!--:-->"); ?></option>
								<?php foreach($months[$q_config['language']] as $key => $value): ?>
									<?php $to_show = $key + 1; ?>
									<?php if ($to_show <= 9) $to_show = '0' . $to_show; ?>
									<option value="month-<?php echo $to_show; ?>"><?php echo $value; ?></option>
								<?php endforeach; ?>
							</select>
							</div>
						</div>												
						<?php $args = array(); ?>
						<?php $args['showposts'] = -1; ?>
						<div class="dropdown-content">
							<ul id="list">
							<?php $var = 0; ?>
							<?php foreach ($categories as $cat): ?>
								<?php $args['cat'] = $cat->cat_ID; ?>
		
								<?php $my_query = new WP_Query($args); ?>
								<?php if( $my_query->have_posts() ): ?>
									<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
										<?php $custom_fields = get_post_custom(get_the_ID()); ?>
										<?php $var++; ?>
										<li id="item-<?php echo $var; ?>" class="cat-<?php echo $cat->cat_ID; ?> month-<?php the_time('m'); ?>">
											<div class="meta">
												<?php if ($custom_fields['fecha'][0] != null): ?>
													<div class="date"><?php echo $custom_fields['fecha'][0]; ?></div>
												<?php endif; ?>											
												<h3><?php the_title(); ?></h3>
											</div>
											<?php the_content(); ?>
											<?php if ($custom_fields['email'][0] != null): ?>
												<a href="mailto:<?php echo $custom_fields['email'][0]; ?>"><?php echo $custom_fields['email'][0]; ?></a>
											<?php endif; ?>
											<?php if ($custom_fields['web'][0] != null): ?>
												<a href="<?php echo $custom_fields['web'][0]; ?>" title="<?php the_title(); ?>"><?php echo $custom_fields['web'][0]; ?></a>
											<?php endif; ?>
											<hr />										
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
		<?php get_footer(); ?>
	</div>