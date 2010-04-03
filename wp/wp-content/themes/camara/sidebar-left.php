<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
	<div id="sidebar-left">
		<div id="left-nav">
			<ul>
				<?php wp_list_pages('child_of=9&depth=1&title_li=&sort_column=menu_order'); ?>
				<li><a href="<?php bloginfo('siteurl'); ?>/links">Links</a></li>
			</ul>
		</div>
	</div>