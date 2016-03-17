<?php
global $options;
$options = get_option('sam_theme_options'); 
?>
<div class="clear"></div>
</div>
	<footer id="colophon" role="contentinfo">
		<div id="footer-top">
			<div class="footer-logo">
				<?php if ( isset($options['b_logourl']) && ($options['b_logourl']!="") ){ ?>
				<a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php echo(stripslashes ($options['b_logourl']));?>" alt="<?php bloginfo('name'); ?>" /></a>
				<?php } else { ?>
				<a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/logo/flogo.png" alt="<?php bloginfo('name'); ?>" /></a>
				<?php } ?>
			</div>
			<div class="footer-info">
				<p><?php echo(stripslashes ($options['footer_text']));?></p>
			</div>
		</div>
		<div id="footer-bottom">
			<div id="footer-bot">
			<div class="footer-copyright">
				<?php if ( isset($options['about_text']) && ($options['about_text']!="") ){ ?>
				<?php echo(stripslashes ($options['about_text']));?>
				<?php } else { ?>
				<p>&copy; <?php bloginfo('name'); ?> 2013. All Rights Reserved.</p>
				<?php } ?>
			</div>
			<div class="site-socials">
				<ul>
					<?php if ( isset($options['facebookurl']) && ($options['facebookurl']!="") ){ ?>
						<li><a href="<?php echo(stripslashes ($options['facebookurl']));?>" title="Follow us on Facebok"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook.png" alt="Facebook"></a></li>
					<?php } ?>
					<?php if ( isset($options['twitterid']) && ($options['twitterid']!="") ){ ?>
						<li><a href="<?php echo $options['twitterid'];?>" title="Follow us on Twitter"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter.png" alt="Twitter"></a></li>
					<?php } ?>
					<?php if ( isset($options['googleid']) && ($options['googleid']!="") ){ ?>
						<li><a href="<?php echo $options['googleid'];?>" title="Follow us on Google+"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/googleplus.png" alt="Google+"></a></li>
					<?php } ?>
					
					<?php if ( isset($options['linkedinid']) && ($options['linkedinid']!="") ){ ?>
						<li><a href="<?php echo $options['linkedinid'];?>" title="Follow us on Linkedin"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/linkedin.png" alt="Linkedin"></a></li>
					<?php } ?>
					<?php if ( isset($options['instagramid']) && ($options['instagramid']!="") ){ ?>
						<li><a href="<?php echo $options['instagramid'];?>" title="Follow us on Google+"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/instagram.png" alt="Instagram"></a></li>
					<?php } ?>
					<?php if ( isset($options['tumblrid']) && ($options['tumblrid']!="") ){ ?>
						<li><a href="<?php echo $options['tumblrid'];?>" title="Follow us on Google+"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tumblr.png" alt="Tumblr"></a></li>
					<?php } ?>
				</ul>
			</div>
			</div>
		</div>		
	</footer>
<?php wp_footer(); ?>
<?php echo(stripslashes ($options['analytics_code']));?>
</body>
</html>