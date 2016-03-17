<?php get_header(); ?>

<?php include (TEMPLATEPATH . '/news.php'); ?>

<section id="main">

<?php include (TEMPLATEPATH . '/sidebar_left.php'); ?>

	<div id="content" role="main">
	<?php if ( have_posts() ) : ?>
	
		<h2><?php the_title(); ?></h2>
		
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post">
			<div class="post-video">	
			
<?php if( get_post_meta($post->ID, "iframe", true) ): ?>			
	<iframe src="<?php $values = get_post_custom_values("iframe"); echo $values[0]; ?>" frameborder="0" scrolling="no" width="438" height="354"></iframe>		
<?php elseif(get_post_meta($post->ID, "newwindow", true)): ?>
<a href="<?php $values = get_post_custom_values("newwindow"); echo $values[0]; ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/defaultplayer.png" alt="<?php the_title(); ?>" /></a>	
<?php elseif(get_post_meta($post->ID, "windows", true)): ?>			
	<object classid="clsid:22d6f312-b0f6-11d0-94ab-0080c74c7e95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#version=5,1,52,701" standby="Please wait..." type="application/x-ms-wmp" width="438" height="354">
	 <param name="filename" value="<?php $values = get_post_custom_values("windows"); echo $values[0]; ?>">
     <param name="animationatstart" value="true">
     <param name="transparentatstart" value="true">
     <param name="autostart" value="true">
     <param name="showcontrols" value="true">
     <param name="ShowStatusBar" value="false">
     <param name="windowlessvideo" value="true">
     <embed src="<?php $values = get_post_custom_values("windows"); echo $values[0]; ?>" type="application/x-mplayer2"  autostart="true" showcontrols="true" showstatusbar="0" bgcolor="white" width="438" height="354">
	</object>	
<?php elseif(get_post_meta($post->ID, "silverlight", true)): ?>
	<object data="data:application/x-silverlight-2," type="application/x-silverlight-2" width="438" height="354">
	<param name="source" value="<?php echo get_template_directory_uri(); ?>/player/MinoPlayer_Ver1_2.xap"/>
	<param name="minRuntimeVersion" value="5.1.10401.0" />
	<param name="onerror" value="onSilverlightError" />
	<param name="background" value="black" />
	<a href="http://go.microsoft.com/fwlink/?LinkID=124807" style="text-decoration: none;"><img src="http://go.microsoft.com/fwlink/?LinkId=108181" alt="Get Microsoft Silverlight" style="border-style: none"/></a>
	<param name="initParams" value="<?php $values = get_post_custom_values("silverlight"); echo $values[0]; ?>" />
	</object>
<?php elseif(get_post_meta($post->ID, "youtube", true)): ?>
	<iframe width="438" height="280" src="<?php $values = get_post_custom_values("youtube"); echo $values[0]; ?>" frameborder="0" allowfullscreen></iframe>		
<?php elseif(get_post_meta($post->ID, "streamer", true)): ?>
	<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="438" height="354">
	<PARAM NAME=movie VALUE="<?php echo get_template_directory_uri(); ?>/player/jwplayer58.swf">
	<PARAM NAME=quality VALUE=high>
	<PARAM NAME=bgcolor VALUE=#000000>
	<PARAM NAME=allowfullscreen VALUE="true">
	<PARAM NAME=allowscriptaccess VALUE="always">
	<PARAM NAME=flashvars VALUE="<?php $values = get_post_custom_values("streamer"); echo $values[0]; ?>">
	<EMBED
 data="<?php echo get_template_directory_uri(); ?>/player/jwplayer58.swf"
 src="<?php echo get_template_directory_uri(); ?>/player/jwplayer58.swf"
 width="438"
 height="354"
 allowscriptaccess="always"
 allowfullscreen="true"
 flashvars="<?php $values = get_post_custom_values("streamer"); echo $values[0]; ?>"
> </EMBED>
	</OBJECT>
<?php elseif(get_post_meta($post->ID, "flash", true)): ?>	
	<div id="myElement">Loading the player...</div>
	<script type="text/javascript">
		jwplayer("myElement").setup({
        file: "<?php $values = get_post_custom_values("flash"); echo $values[0]; ?>",
		autostart: 'true',
		width: '100%',
    });
	</script>	
<?php elseif(get_post_meta($post->ID, "embedcode", true)): ?>	
<?php $values = get_post_custom_values("embedcode"); echo $values[0]; ?>
<?php else: ?>		
<?php endif; ?>			
			</div>		
			<div class="post-entry">
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			</div>	
		</article>
		<div class="channel-details">
			<div class="channel-logo">
				<?php if( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'pop-thumb' ); ?></a>
				<?php } else { ?>
					<a href="<?php the_permalink() ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/defaultthumbside.png" alt="<?php the_title(); ?>" /></a>
				<?php } ?>
			</div>
			<div class="channel-info">
				<div class="channel-title">
					<strong><?php _e("Channel Name:", "SamTv"); ?></strong> <?php the_title(); ?>
				</div>
				<div class="channel-category">
					<strong><?php _e("Category:", "SamTv"); ?></strong> <?php the_category(', ') ?>
				</div>
				<div class="channel-category">
					<?php the_tags('<strong>Etiket:</strong> ', ', ', ''); ?> 
				</div>
			</div>
		</div>
		
		<div class="single-ad-area">
			<?php if ( isset($options['f300250_banner']) && ($options['f300250_banner']!="") ){ ?>
			<div class="mainad">
				<?php echo(stripslashes ($options['f300250_banner']));?>
			</div>	
			<?php } else { ?>
			<?php } ?>	
<?php if ( isset($options['hide_share']) && ($options['hide_share']!="") ){ ?>
<?php } else { ?>		
			<div class="social-single">
				<div class="twitter-shares">
					<a href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-share.png" alt="<?php _e("Share on Twitter", "SamTv"); ?>" /></a>
				</div>
				<div class="facebook-shares">
					<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-share.png" alt="<?php _e("Share on Twitter", "SamTv"); ?>" /></a>
				</div>
				<div class="google-shares">
					<a href="https://plus.google.com/share?url=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/google-share.png" alt="<?php _e("Share on Google Plus", "SamTv"); ?>" /></a>
				</div>		
				<div class="stumble-shares">
					<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/stumble-share.png" alt="<?php _e("Share on Stumbleupon", "SamTv"); ?>" /></a>
				</div>				
			</div>
<?php } ?>			
		</div>
		<?php endwhile; ?>
		<div class="clear"></div>
		<div class="comyorum">
			<?php comments_template(); ?>
		</div>		
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