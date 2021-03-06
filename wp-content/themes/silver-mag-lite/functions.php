<?php
/*
Author: RAJA CRN
URL: ThemePacific.com
Theme Name:  Silver Mag Pro
*/

/*===================================================================================*/
/*  Load ThemePacific FrameWork Assets
/*==================================================================================*/

  		include (get_template_directory() . '/widgets/widgets.php' );
   
/*===================================================================================*/
/* Theme Support
/*==================================================================================*/

/*-- Post thumbnail + Menu Support + Formats + Feeds --*/
function silvermag_theme_support_image()
{
 
 		add_theme_support('post-thumbnails' );
		add_image_size('mag-image', 340, 160,true);
 		add_image_size('blog-image', 220, 180,true);		
		add_image_size('sb-post-thumbnail', 70, 70,true);
		add_image_size('sb-post-big-thumbnail', 376, 192,true);
		add_image_size('sb-post-small-thumbnail', 188, 144,true);
		add_image_size('feat-slider', 764, 336,true);
		add_theme_support( 'automatic-feed-links' );
 		load_theme_textdomain( 'silvermag', get_template_directory() . '/languages' );
  			register_nav_menus(
			array(
 				
 				'topNav' => __('Top Menu','silvermag' ),
 				'mainNav' => __('Secondary Menu','silvermag' ),
 			)		
		);
	
 }
 add_action( 'after_setup_theme', 'silvermag_theme_support_image' );

function silvermag_scripts_method() {
	if ( !is_admin() ) {
 	 
        wp_enqueue_style( 'style', get_stylesheet_uri());  		
 		wp_enqueue_style('skeleton', get_stylesheet_directory_uri().'/css/skeleton.css');
		wp_enqueue_style('flex', get_stylesheet_directory_uri().'/css/flexslider.css');
		wp_enqueue_style( 'PT-sans-tp', '//fonts.googleapis.com/css?family=PT+Sans|Oswald:400,700' );
  		wp_enqueue_script('easing', get_template_directory_uri(). '/js/jquery.easing.1.3.js'); 
   		wp_enqueue_script('css3-mediaqueries', get_template_directory_uri(). '/js/css3-mediaqueries.js','','',false); 
  		wp_enqueue_script('flexslider', get_template_directory_uri(). '/js/jquery.flexslider-min.js'); 
  		wp_enqueue_script('themepacific.script', get_template_directory_uri(). '/js/tpcrn_scripts.js', array('jquery'), '1.0', true); 	
       	wp_enqueue_script('jquery-ui-widget');	
  			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
 	
	}

}
function silvermag_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'silvermag_ie_support_header', 1 );

 function silvermag_widgets_init() {

 	register_sidebar(array(
		'name' => __('Sidebar Small','silvermag'),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-head">',
		'after_title' => '</h3>',
	)); 
	register_sidebar(array(
		'name' => __('Sidebar Big','silvermag'),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-head">',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name' => __('Magazine Style Widgets','silvermag'),
		'before_widget' => '<div id="%1$s" class="%2$s blogposts-tp-site-wrap clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
	register_sidebar(array(
		'name' => __('Footer Block 1','silvermag'),
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name' => __('Footer Block 2','silvermag'),
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name' => __('Footer Block 3','silvermag'),
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Footer Block 4','silvermag'),
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'silvermag_widgets_init' );

/*===================================================================================*/
/*  Actions + Filters + Translation
/*==================================================================================*/
  /*-- Custom Excerpts--*/
function silvermag_custom_read_more() {
    // return '... <div class="themepacific-read-more"><a class="tpcrn-read-more" href="'.get_permalink(get_the_ID()).'">'.__('Read more&nbsp;&raquo;','silvermag').'</a></div>';
} 
function silvermag_excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit, silvermag_custom_read_more());
}
     
/*-- Register and enqueue  javascripts--*/
add_action('wp_enqueue_scripts', 'silvermag_scripts_method');
  
 /**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function silvermag_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'silvermag' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'silvermag_wp_title', 10, 2 ); 
  
 
/*-- Pagination --*/

function silvermag_pagination() {
	
		global $wp_query;
		$big = 999999999;
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format' => '?paged=%#%',
			'prev_next'    => false,
			'prev_text'    => __('<i class="icon-double-angle-left"></i>'),
	        'next_text'    => __('<i class="icon-double-angle-right"></i>'),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages )
		);
	}
 
 if (!isset( $content_width )) $content_width = 620;
 /*===================================================================================*/
/*  Comments
/*==================================================================================*/

function silvermag_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'silvermag' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'silvermag' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li id="comment-<?php comment_ID(); ?>">
		<div <?php comment_class('comment-tp-site-wrap'); ?> >
 				<div class="comment-avatar">
					<?php
						$avatar_size = 65;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 65;

						echo get_avatar( $comment, $avatar_size );?>
				</div>
				<!--comment avatar-->
				<div class="comment-meta">
					<?php	
						printf( __( '%1$s  %2$s  ', 'silvermag' ),
							sprintf( '<div class="author">%s</div>', get_comment_author_link() ),
							sprintf( '%4$s<a href="%1$s"><span class="time" style="border:none;">%3$s</span></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),get_comment_date(),								
								sprintf( __( '<span class="time">%1$s </span>', 'silvermag' ),   get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'silvermag' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- /comment-meta -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'silvermag' ); ?></em>
					<br />
				<?php endif; ?>
 			<div class="comment-content">
				<?php comment_text(); ?>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( ' <span><i class="icon-reply"></i></span> Reply', 'silvermag' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div> <!--/reply -->
			</div><!--/comment-content -->	
		</div>	<!--/Comment-tp-site-wrap -->
 			 
 	<?php
			break;
	endswitch;
}
?>
