<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<hr />
<div id="footer" role="contentinfo">
<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
	<p>
		<?php bloginfo('name'); ?> is proudly powered by
		<a href="http://wordpress.org/">WordPress</a>
		<br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
		and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
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
