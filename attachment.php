<?php get_header(); ?>

<?php include (TEMPLATEPATH . '/news.php'); ?>

<section id="main">

<?php include (TEMPLATEPATH . '/sidebar_left.php'); ?>

	<div id="content" role="main">
	<?php if ( have_posts() ) : ?>
	
		<h2><?php the_title(); ?></h2>
		
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post">
			<div class="post-entry">
				<?php if (wp_attachment_is_image($post->id)) {
				$att_image = wp_get_attachment_image_src( $post->id, "large");
				?>
					<p class="attachment">
						<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>">
							<img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" />
						</a>
					</p>
				<?php } ?>
			</div>	
		</article>				
		<?php endwhile; ?>
		<div class="clear"></div>
		
		<?php else : ?>
		
		<h2><?php _e("Nothing Found", "SamTv"); ?></h2>
		<article id="post">
			<div class="post-entry">
			<p><?php _e("Apologies, but no results were found. Perhaps searching will help find a related channel.", "SamTv"); ?></p>
			</div>	
		</article>	

		<?php endif; ?>

	</div>
		
<?php include (TEMPLATEPATH . '/sidebar_right.php'); ?>

</section>

<?php get_footer(); ?>