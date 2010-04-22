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

					<div class="combos">
						<select id="main-combo" onchange="oportunidades(this)">
							<option value="none"><?php echo _e("<!--:it-->[Seleziona]<!--:--><!--:es-->[Seleccionar]<!--:-->"); ?></option>
							<?php foreach ($categories as $cat): ?>
								<option value="cat-<?php echo $cat->cat_ID; ?>"><?php echo $cat->cat_name; ?></option>
							<?php endforeach; ?>
						</select>
						<div class="clear"></div>
					</div>
					
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
									<hr />
								<?php endwhile; ?>
							<?php endif; ?>
							<?php unset($my_query); ?>
						</div>
					<?php endforeach; ?>
					</div>

					<div class="contact" id="contact">
						<?php
						$lang['it'] = 'Se desidera contattarsi con qualcuna di queste imprese, si comunichi con l’ufficio commerciale. <a href="mailto:oficinacomercial@cameritpe.com">oficinacomercial@cameritpe.com</a>, <br />tel/fax: (00511) 445-4278/4471785,interno 108, <br /><strong>facendo riferimento al codice a lato.</strong>.';
						$lang['es'] = 'Si desea contactarse con alguna de estas empresas, comuníquese con el departamento comercial. <a href="mailto:oficinacomercial@cameritpe.com">oficinacomercial@cameritpe.com</a>, <br />tel/fax: (00511) 445-4278 / 447-1785 anexo 108, <br /><strong>mencionando el código de referencia</strong>.';
						echo _e("<!--:it-->" . $lang['it'] . "<!--:--><!--:es-->" . $lang['es'] . "<!--:-->");
						?>
					</div>

				</div>
	
		</div>		
		<?php get_sidebar('right'); ?>		
		
		<div class="clear"></div>
		<?php get_footer(); ?>
	</div>