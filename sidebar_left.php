<aside id="sidebar1">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Left Sidebar") ) : ?>
		<h2><?php _e("Categories", "SamTv"); ?></h2>		
		<ul>
			<?php wp_list_cats(); ?>
		</ul>
<?php endif; ?>
</aside>