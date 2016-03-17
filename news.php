<?php
global $options;
$options = get_option('sam_theme_options'); 
?>
<?php if ( isset($options['hide_announcement']) && ($options['hide_announcement']!="") ){ ?>
<?php } else { ?>
<div id="news">
	<div class="newsbg">
		<p><?php echo(stripslashes ($options['announcement']));?></p>
	</div>
	<div class="newsright">
		<?php if ( isset($options['announcement_url']) && ($options['announcement_url']!="") ){ ?>
		<a href="<?php echo(stripslashes ($options['announcement_url']));?>"><img src="<?php echo get_template_directory_uri(); ?>/images/newsright.png" alt="" /></a>
		<?php } else { ?>
		<img src="<?php echo get_template_directory_uri(); ?>/images/newsright.png" alt="" />
		<?php } ?>
	</div>
</div>
<?php } ?>
<div class="clear"></div>