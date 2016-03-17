<?php
global $options;
$options = get_option('sam_theme_options'); 
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Cuprum:400,700&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/player/jwplayer.js"></script>

<script type="text/javascript" src="http://www.trt.net.tr/js/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="OLt0hutFdsI99VbUahuSZ4tiX8eM+DK9W1bqRw==";</script>

<?php ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body>
<div id="wrapper">

	<header>
		<nav id="top-nav">
			<?php wp_nav_menu(array('theme_location' => 'top-menu', 'container_class' => 'topmenu')); ?>
		</nav>
		<div class="headeritems">
			<div class="logo">
				<?php if ( isset($options['logourl']) && ($options['logourl']!="") ){ ?>
				<h1><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php echo(stripslashes ($options['logourl']));?>" alt="<?php bloginfo('name'); ?>" /></a></h1>
				<?php } else { ?>
				<h1><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/logo/logo.png" alt="<?php bloginfo('name'); ?>" /></a></h1>
				<?php } ?>
			</div>		
			<?php if ( isset($options['top_banner']) && ($options['top_banner']!="") ){ ?>
			<div class="headerad">
					<?php echo(stripslashes ($options['top_banner']));?>
			</div>
			<?php } else { ?>
			<?php } ?>			
		</div>
	</header>
	<div id="bb">
	<nav id="main-nav">
		<div class="menu">
			<div id="primary-nav" class="clearfix">
				<?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'sf-menu')); ?>
			</div>
			<div class="searchpart">
				<div class="headerarama">		
					<form method="get" id="searchform" action="<?php bloginfo('home'); ?>" >
						<input id="s" type="text" name="s" placeholder="<?php _e("Search in website...", "SamTv"); ?>" />
                            <div class="gradient-turuncu gradient">
                                <input type="submit" class="" value="">
                            </div>   
					</form>             
				</div>
			</div>
		</div>
	</nav>
	</div>
	<div class="clear"></div>