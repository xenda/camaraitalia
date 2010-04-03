<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<div id="footer">
	<div class="wrapper">
			Av. 28 de Julio 1365 Miraflores - Lima 18 - Perú Telefax: (00511) 445-4278 / 447-1785 - 
            <a href="mailto:camerit@cameritpe.com">camerit@cameritpe.com</a>
			<p id="copy">
				&copy; 2009 Cámara de Comercio Italiana del Perú. &nbsp; All rights reserved<br>
				<a target="_blank" href="http://www.involucra.com">Web Design Involucra</a><br>
    		</p>
		</div>
</div>

</div> <?php //#page ?>


<!--[if gte IE 8]></div><![endif]-->
<!--[if IE 7]></div><![endif]-->
<!--[if IE 6]>
	</div>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG_0.0.8a.js"></script>
<![endif]-->
<!--[if IE]></div><![endif]-->
<?php if (is_page() && $post->ID == 28) : ?>
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAhKwPPaYdxHM1u25T5LoAGxT_gtIY0s_QE-k1U8GpydFPvtsiGhQ7adTC0SMwuYGUH6uOX3prU03ONA" type="text/javascript"></script>
<?php endif; ?>

<?php if (function_exists('load_js')):?>
	<?php load_js(get_bloginfo('template_directory')); ?>
<?php else: ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/scripts.js.php"></script>
<?php endif; ?>
<script type="text/javascript">//Cufon.now();</script>
<?php wp_footer(); ?>

</body>
</html>