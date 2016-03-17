<?php
global $options;
$options = get_option('sam_theme_options');
//theme options
$functions_path = TEMPLATEPATH . '/functions/';
require_once ($functions_path . 'theme-options.php');
require_once ($functions_path . 'post-panel.php');
//languages
add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('my_theme', get_template_directory() . '/languages');
//rss
	add_theme_support( 'automatic-feed-links' );	
}
// menus
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'top-menu' => __( 'Top Menu','SamTv' ),		
			'primary-menu' => __( 'Main Menu','SamTv' ),
		)
	);
}
//Languages
load_theme_textdomain( 'SamTv', TEMPLATEPATH.'/languages' );
//Popular posts
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');
//Redirect to Theme Options Page on Activation
if ( is_admin() && isset($_GET['activated'] ) && $pagenow =="themes.php" )
	wp_redirect( 'admin.php?page=theme-options.php' );
// thumbs
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 200, 200 ); 
add_image_size( 'index-thumb', 138, 93, true ); 
add_image_size( 'single-thumb', 358, 224, true );  
add_image_size( 'pop-thumb', 58, 38, true ); 
add_image_size( 'soft-thumb', 400, 300, true ); 
// excerpt
add_filter('excerpt_more', 'new_excerpt_more');
function custom_excerpt_length( $length ) {
	return 5;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Devamı...</a>';
}
//style
function wpsam_scripts_styles() {
	global $wp_styles;
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'wpsam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
	wp_enqueue_style( 'wpsam-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'wpsam-ie', get_template_directory_uri() . '/css/ie.css', array( 'wpsam-style' ), '20121010' );
	$wp_styles->add_data( 'wpsam-ie', 'conditional', 'lt IE 9' );
}
// widgets
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Left Sidebar',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Right Sidebar',
'before_widget' => '<div id="sider">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
// comments
function mytheme_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		
		<div class="amkcom">
			<div class="comavatar">
				<?php echo get_avatar( $comment, 48 ); ?>
			</div>
			<div class="compart">
				<div class="yorumbaslik">
				<div class="comment-author vcard">
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				</div>
				<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
				?>
				</div>
				</div>
			</div>
			<div class="clear"></div>
				<?php comment_text() ?>
					<?php if ($comment->comment_approved == '0') : ?>
					<em class="comment-awaiting-moderation"><?php _e("Your comment is awaiting moderation.", "SamTv"); ?></em>
					<?php endif; ?>
		</div>
		

		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
<?php
        }
?>