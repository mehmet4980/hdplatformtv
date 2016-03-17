<aside id="sidebar2">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Right Sidebar") ) : ?>
<?php if( is_single() ): ?>
	<?php if ( isset($options['f300250_banner']) && ($options['f300250_banner']!="") ){ ?>
			<div class="sidebanner-f">
					<?php echo(stripslashes ($options['f300250_banner']));?>
			</div>
	<?php } else { ?>
	<?php } ?>
<?php else: ?>
<?php endif; ?> 
		<h2><?php _e("Popular Channels", "SamTv"); ?></h2>	
		<div class="popposts">
			<?php $recent = new WP_Query("meta_key=wpb_post_views_count&showposts=7"); while($recent->have_posts()) : $recent->the_post();?>
			<div class="poppost">
				<div class="pop-thumb">
					<?php if( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'pop-thumb' ); ?></a>
					<?php } else { ?>
						<a href="<?php the_permalink() ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/defaultthumbside.png" alt="<?php the_title(); ?>" /></a>
					<?php } ?>
				</div>
				<div class="pop-name">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php $tit = the_title('','',FALSE); echo substr($tit, 0, 20); if (strlen($tit) > 20) echo " ..."; ?></a>
				</div>
			</div>
			<?php endwhile; ?>	
		</div>
		
		
<?php if( is_single() ): ?>
<?php else: ?>
	<?php if ( isset($options['f300250_banner']) && ($options['f300250_banner']!="") ){ ?>
			<div class="sidebanner-f2">
					<?php echo(stripslashes ($options['f300250_banner']));?>
			</div>
	<?php } else { ?>
	<?php } ?>
<?php endif; ?> 

<?php endif; ?>
</aside>