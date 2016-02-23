<?php
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );
	register_nav_menu( 'footer-mini-nav', __( 'Footer Mini Nav', 'twentytwelve' ) );
	
	register_nav_menu( 'footer-nav1', __( 'Footer Nav1', 'twentytwelve' ) );
	register_nav_menu( 'footer-nav2', __( 'Footer Nav2', 'twentytwelve' ) );
	register_nav_menu( 'footer-nav3', __( 'Footer Nav3', 'twentytwelve' ) );
	register_nav_menu( 'footer-nav4', __( 'Footer Nav4', 'twentytwelve' ) );
	register_nav_menu( 'footer-nav5', __( 'Footer Nav5', 'twentytwelve' ) );
	register_nav_menu( 'footer-nav6', __( 'Footer Nav6', 'twentytwelve' ) );
	
	
	//Dutch
	register_nav_menu( 'dutch-primary', __( 'Dutch Primary Menu', 'twentytwelve' ) );
	register_nav_menu( 'dutch-footer-mini-nav', __( 'Dutch Footer Mini Nav', 'twentytwelve' ) );
	
	//hebrew
	register_nav_menu( 'hebrew-primary', __( 'Hebrew Primary Menu', 'twentytwelve' ) );
	register_nav_menu( 'hebrew-footer-nav', __( 'Hebrew Footer Menu', 'twentytwelve' ) );

        //German
	register_nav_menu( 'german-primary', __( 'German Primary Menu', 'twentytwelve' ) );
	register_nav_menu( 'german-footer-mini-nav', __( 'German Footer Mini Nav', 'twentytwelve' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	$font_url = twentytwelve_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'twentytwelve-fonts', esc_url_raw( $font_url ), array(), null );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
	$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function twentytwelve_mce_css( $mce_css ) {
	$font_url = twentytwelve_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'twentytwelve_mce_css' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
	
	
	
	//English sidebar
	register_sidebar( array(
		'name' => __( 'Top Language Flags', 'twentytwelve' ),
		'id' => 'top-language-flags',
		'description' => __( 'Appears at top right corner', 'twentytwelve' ),
		'before_widget' => '<span id="%1$s" class="widget %2$s">',
		'after_widget' => '</span>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	) );
	
	//English sidebar
	register_sidebar( array(
		'name' => __( 'English Home Left Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-home-left',
		'description' => __( 'Appears at Home Left Sidebar', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'English Home Right Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-home-right',
		'description' => __( 'Appears at Home Right Sidebar', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	//for english donation
	register_sidebar( array(
		'name' => __( 'Donate: English Right sitebar 1=> About Aleh', 'twentytwelve' ),
		'id' => 'right-sidebar-for-about-aleh',
		'description' => __( 'Appears at Right sitebar for About Aleh', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Donate: English Right sitebar 2=> Branches', 'twentytwelve' ),
		'id' => 'right-sitebar-for-branches',
		'description' => __( 'Appears at Right sitebar for Branches', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Donate: English Right sitebar 3=> How You Can Help', 'twentytwelve' ),
		'id' => 'right-sitebar-for-how-you-can-help',
		'description' => __( 'Appears at Right sitebar for How You Can Help', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Donate: English Right sitebar 4=> The Aleh Family', 'twentytwelve' ),
		'id' => 'right-sitebar-for-the-aleh-family',
		'description' => __( 'English Right sitebar for The Aleh Family', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Donate: English Right sitebar 5=> Contact Us', 'twentytwelve' ),
		'id' => 'right-sitebar-for-contact-us',
		'description' => __( 'English Right sitebar for Contact us', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	
	//hebrew footer
	register_sidebar( array(
		'name' => __( 'English Footer One', 'twentytwelve' ),
		'id' => 'footer-col-1',
		'description' => __( 'Footer Sidebar One', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'English Footer Two', 'twentytwelve' ),
		'id' => 'footer-col-2',
		'description' => __( 'Appears on Footer Sidebar Two', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'English Footer Three', 'twentytwelve' ),
		'id' => 'footer-col-3',
		'description' => __( 'Appears on Footer Sidebar Three', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Top search', 'twentytwelve' ),
		'id' => 'sidebar-1',
		'description' => __( 'For top search ', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	
	
	
	//Hebrew sidebar
	register_sidebar( array(
		'name' => __( 'Hebrew Home Left Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-home-left-hebrew',
		'description' => __( 'Appears at Home Left Sidebar', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Hebrew Home Right Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-home-right-hebrew',
		'description' => __( 'Appears at Home Right Sidebar', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	//hebrew footer
	register_sidebar( array(
		'name' => __( 'Hebrew Footer One', 'twentytwelve' ),
		'id' => 'footer-col-1-hebrew',
		'description' => __( 'Footer Sidebar One', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Hebrew Footer Two', 'twentytwelve' ),
		'id' => 'footer-col-2-hebrew',
		'description' => __( 'Appears on Footer Sidebar Two', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Hebrew Footer Three', 'twentytwelve' ),
		'id' => 'footer-col-3-hebrew',
		'description' => __( 'Appears on Footer Sidebar Three', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	
	
	
	
	register_sidebar( array(
		'name' => __( 'Inner Page Sidebar Right', 'twentytwelve' ),
		'id' => 'sidebar-inner-right',
		'description' => __( 'Appears at Inner Page Right Sidebar', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Inner Page Sidebar Left', 'twentytwelve' ),
		'id' => 'sidebar-inner-left',
		'description' => __( 'Appears at Inner Page Left Sidebar', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	
	//hebrew donate sidebar
	register_sidebar( array(
		'name' => __( 'Donate: Hebrew left sitebar 1', 'twentytwelve' ),
		'id' => 'left-sidebar-for-donation-1',
		'description' => __( 'Hebrew left sitebar for donation', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Donate: Hebrew left sitebar 2', 'twentytwelve' ),
		'id' => 'left-sidebar-for-donation-2',
		'description' => __( 'Hebrew left sitebar for donation', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Donate: Hebrew left sitebar 3', 'twentytwelve' ),
		'id' => 'left-sidebar-for-donation-3',
		'description' => __( 'Hebrew left sitebar for donation', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Donate: Hebrew left sitebar 4', 'twentytwelve' ),
		'id' => 'left-sidebar-for-donation-4',
		'description' => __( 'Hebrew left sitebar for donation', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Donate: Hebrew left sitebar 5', 'twentytwelve' ),
		'id' => 'left-sidebar-for-donation-5',
		'description' => __( 'Hebrew left sitebar for donation', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Donate: Hebrew left sitebar 6', 'twentytwelve' ),
		'id' => 'left-sidebar-for-donation-6',
		'description' => __( 'Hebrew left sitebar for donation', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s donate-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentytwelve_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_customize_preview_js() {
	wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );

/* =================== Custom Post Dedication============== */

add_action( 'init', 'register_cpt_adoptachild' );

function register_cpt_adoptachild() {

    $labels = array( 
        'name' => _x( 'AdoptAChild', 'dedication' ),
        'singular_name' => _x( 'AdoptAChild', 'dedication' ),
        'add_new' => _x( 'Add New', 'dedication' ),
        'add_new_item' => _x( 'Add New AdoptAChild', 'dedication' ),
        'edit_item' => _x( 'Edit AdoptAChild', 'dedication' ),
        'new_item' => _x( 'New AdoptAChild', 'dedication' ),
        'view_item' => _x( 'View AdoptAChild', 'dedication' ),
        'search_items' => _x( 'Search AdoptAChild', 'dedication' ),
        'not_found' => _x( 'No AdoptAChild found', 'dedication' ),
        'not_found_in_trash' => _x( 'No AdoptAChild found in Trash', 'dedication' ),
        'parent_item_colon' => _x( 'Parent AdoptAChild:', 'dedication' ),
        'menu_name' => _x( 'AdoptAChild', 'dedication' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor','thumbnail','excerpt','custom-fields' ),
		'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'dedication', $args );
}


function hebrewDate($postdate){
	$months = array(
				'january' => 'ינואר',
				'february' => 'פבואר',
				'march' => 'מרץ',
				'april' => 'אפריל',
				
				'may' => 'מאי',				
				'june' => 'יוני',
				'july' => 'יולי',
				'august' => 'אוגוסט',
				
				'september' => 'ספטמבר',
				'october' => 'אוקטובר',
				'november' => 'נובמבר',
				'december' => 'דצמבר'
			  );
	
	$postdate = strtolower($postdate);
	foreach($months as $key => $value){
		$postdate = str_replace($key, $value, $postdate);
	}
	return $postdate;	
}



if(ICL_LANGUAGE_CODE=='he'):
add_action( 'init', 'register_cpt_hebrew_media' );
endif;

function register_cpt_hebrew_media() {

    $labels = array( 
        'name' => _x( 'We in the media אנחנו בתקשורת', 'casestudies' ),
        'singular_name' => _x( 'We in the media אנחנו בתקשורת', 'casestudies' ),
        'add_new' => _x( 'Add New', 'casestudies' ),
        'add_new_item' => _x( 'Add New We in the media אנחנו בתקשורת', 'casestudies' ),
        'edit_item' => _x( 'Edit We in the media אנחנו בתקשורת', 'casestudies' ),
        'new_item' => _x( 'New We in the media אנחנו בתקשורת', 'casestudies' ),
        'view_item' => _x( 'View We in the media אנחנו בתקשורת', 'casestudies' ),
        'search_items' => _x( 'Search We in the media אנחנו בתקשורת', 'casestudies' ),
        'not_found' => _x( 'No We in the media אנחנו בתקשורת found', 'casestudies' ),
        'not_found_in_trash' => _x( 'No We in the media אנחנו בתקשורת found in Trash', 'casestudies' ),
        'parent_item_colon' => _x( 'Parent We in the media אנחנו בתקשורת:', 'casestudies' ),
        'menu_name' => _x( 'We in the media אנחנו בתקשורת', 'casestudies' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title'),
		'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'weinthemedia', $args );
}

function language_names_list(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        echo '<div id="language_names_list"><ul>';
        foreach($languages as $l){
            echo '<li>';
            if($l['country_flag_url']){
                if(!$l['active']) echo '<a href="'.$l['url'].'">';
                echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                if(!$l['active']) echo '</a>';
            }
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo icl_disp_language($l['native_name'], $l['translated_name']);
            if(!$l['active']) echo '</a>';
            echo '</li>';
        }
        echo '</ul></div>';
    }
}


//shortcode
function ism_shortcode_aleh_home_newsfeed( $atts, $content = null ) {
  extract( shortcode_atts( array(
	  "pageid" => ''
  ), $atts ) );
  global $post;  
	$current_post_id=$post->ID;
	
			$args = array(
				'cat' => 14, //for aleh-happening category
				'orderby' => 'date',
				'order' => 'DESC',
				'date_query' => array(
					array(
						'after'     => 'January 1st, 2015',
						'before'    => array(
							'year'  => 2015,
							'month' => 12,
							'day'   => 30,
						),
						'inclusive' => true,
					),
				),
			);
			$the_query = new WP_Query( $args ); 
			//reverse the post array
			$allposts = $the_query->posts;
			$iter=1;
			$return = '<div class="home-newsfeed-title mt-30"><span>NEWS FEED</span> <a href="'.esc_url( home_url( '/category/aleh-happenings/' ) ).'" class="pull-right text-uppercase" style="background: #046b28; color: #fff; padding:3px;">More news & pictures</a> <div class="line-bottom"></div></div>';
			$return .= '<div id="home-newsfeed-carousel" class="carousel slide p-10" data-ride="carousel">
      <div class="carousel-inner" role="listbox">';
			foreach( $allposts as $eachpost ) {
				$iter++;
				//if($iter++>20) break;
				if($iter==2)
				$return .='<div class="item active"><a href="'.esc_url( get_permalink($eachpost->ID) ).'">'.$eachpost->post_title.'</a></div>';
				else 
				$return .='<div class="item"><a href="'.esc_url( get_permalink($eachpost->ID) ).'">'.$eachpost->post_title.'</a></div>';
			}
			$return .= '</div></div>';
	
	
  return $return;
}
remove_shortcode( 'aleh_home_newsfeed' );
add_shortcode( 'aleh_home_newsfeed', 'ism_shortcode_aleh_home_newsfeed' );


//shortcode dutch
function ism_shortcode_aleh_dutch_home_newsfeed( $atts, $content = null ) {
  extract( shortcode_atts( array(
	  "pageid" => ''
  ), $atts ) );
  global $post;  
	$current_post_id=$post->ID;
	
			$args = array(
				'cat' => 14, //for aleh-happening category
				'orderby' => 'date',
				'order' => 'DESC',
				'date_query' => array(
					array(
						'after'     => 'January 1st, 2015',
						'before'    => array(
							'year'  => 2015,
							'month' => 12,
							'day'   => 30,
						),
						'inclusive' => true,
					),
				),
			);
			$the_query = new WP_Query( $args ); 
			//reverse the post array
			$allposts = $the_query->posts;
			$iter=1;
			$return = '<div class="home-newsfeed-title mt-30"><span>ALEH NIEUWS</span> <a href="'.esc_url( home_url( '/category/aleh-happenings/' ) ).'" class="pull-right text-uppercase" style="background: #046b28; color: #fff; padding:3px;">Meer Nieuws & Foto\'s</a> <div class="line-bottom"></div></div>';
			$return .= '<div id="home-newsfeed-carousel" class="carousel slide p-10" data-ride="carousel">
      <div class="carousel-inner" role="listbox">';
			foreach( $allposts as $eachpost ) {
				$iter++;
				//if($iter++>20) break;
				if($iter==2)
				$return .='<div class="item active"><a href="'.esc_url( get_permalink($eachpost->ID) ).'">'.$eachpost->post_title.'</a></div>';
				else 
				$return .='<div class="item"><a href="'.esc_url( get_permalink($eachpost->ID) ).'">'.$eachpost->post_title.'</a></div>';
			}
			$return .= '</div></div>';
	
	
  return $return;
}
remove_shortcode( 'aleh_dutch_home_newsfeed' );
add_shortcode( 'aleh_dutch_home_newsfeed', 'ism_shortcode_aleh_dutch_home_newsfeed' );


//shortcode german
function ism_shortcode_aleh_german_home_newsfeed( $atts, $content = null ) {
  extract( shortcode_atts( array(
	  "pageid" => ''
  ), $atts ) );
  global $post;  
	$current_post_id=$post->ID;
	
			$args = array(
				'cat' => 14, //for aleh-happening category
				'orderby' => 'date',
				'order' => 'DESC',
				'date_query' => array(
					array(
						'after'     => 'January 1st, 2015',
						'before'    => array(
							'year'  => 2015,
							'month' => 12,
							'day'   => 30,
						),
						'inclusive' => true,
					),
				),
			);
			$the_query = new WP_Query( $args ); 
			//reverse the post array
			$allposts = $the_query->posts;
			$iter=1;
			$return = '<div class="home-newsfeed-title mt-30"><span>ALEH NACHRICHTEN</span> <a href="'.esc_url( home_url( '/category/aleh-happenings-de/' ) ).'" class="pull-right text-uppercase" style="background: #046b28; color: #fff; padding:3px;">Mehr Nachrichten & Fotos</a> <div class="line-bottom"></div></div>';
			$return .= '<div id="home-newsfeed-carousel" class="carousel slide p-10" data-ride="carousel">
      <div class="carousel-inner" role="listbox">';
			foreach( $allposts as $eachpost ) {
				$iter++;
				//if($iter++>20) break;
				if($iter==2)
				$return .='<div class="item active"><a href="'.esc_url( get_permalink($eachpost->ID) ).'">'.$eachpost->post_title.'</a></div>';
				else 
				$return .='<div class="item"><a href="'.esc_url( get_permalink($eachpost->ID) ).'">'.$eachpost->post_title.'</a></div>';
			}
			$return .= '</div></div>';
	
	
  return $return;
}
remove_shortcode( 'aleh_german_home_newsfeed' );
add_shortcode( 'aleh_german_home_newsfeed', 'ism_shortcode_aleh_german_home_newsfeed' );


//shortcode
function ism_shortcode_aleh_home_newsfeed_heb( $atts, $content = null ) {
  extract( shortcode_atts( array(
	  "pageid" => ''
  ), $atts ) );
  global $post;  
	$current_post_id=$post->ID;
	

			$args = array(
					'cat' => 7, //for חדשות עלה
					'orderby' => 'date',
					'order' => 'DESC',
					'date_query' => array(
							array(
									'after'     => 'January 1st, 2015',
									'before'    => array(
											'year'  => 2015,
											'month' => 12,
											'day'   => 30,
									),
									'inclusive' => true,
							),
					),
			);
			$the_query = new WP_Query( $args ); 
			//reverse the post array
			$allposts = $the_query->posts;
			$iter=1;
			$return = '<div class="home-newsfeed-title mt-30 font-18"><span><strong class="text-black">חדשות עלה</strong></span> <a href="'.esc_url( home_url( '/category/חדשות-עלה/' ) ).'" class="pull-left text-uppercase" style="background: #046b28; color: #fff; padding:3px;"><strong>לחדשות נוספות</strong></a> <div class="line-bottom line-right"></div></div>';
			$return .= '<div id="home-newsfeed-carousel" class="carousel slide p-10" data-ride="carousel">
      <div class="carousel-inner" role="listbox">';
			foreach( $allposts as $eachpost ) {
				$iter++;
				//if($iter++>20) break;
				if($iter==2)
				$return .='<div class="item active"><a href="'.esc_url( get_permalink($eachpost->ID) ).'">'.$eachpost->post_title.'</a></div>';
				else 
				$return .='<div class="item"><a href="'.esc_url( get_permalink($eachpost->ID) ).'">'.$eachpost->post_title.'</a></div>';
			}
			$return .= '</div></div>';
	
	
  return $return;
}
remove_shortcode( 'aleh_home_newsfeed_heb' );
add_shortcode( 'aleh_home_newsfeed_heb', 'ism_shortcode_aleh_home_newsfeed_heb' );


//shortcode: In the Dutch Press
function ism_shortcode_post_carousel_in_the_dutch_press( $atts, $content = null ) {
  extract( shortcode_atts( array(
	  "pageid" => ''
  ), $atts ) );
  global $post;
        global $sitepress;
        $sitepress->switch_lang('nl');
			$args = array(
					'category_name' => 'in-het-nieuws', //for In the Dutch Press
					'orderby' => 'date',
					'posts_per_page' => 1,
					'order' => 'DESC'
			);
			$the_query = new WP_Query( $args );
			
			// The Loop
			$return = '<div class="dutch-home-carousel">';
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$return .='<div class="row-fluid">
						<div class="col-md-5 pl-0 pr-0 carousel-thumb">'.get_the_post_thumbnail().'</div>
						<div class="col-md-7">
							<div class="mb-20"><a class="title" href="'.esc_url( get_permalink() ).'">'.get_the_title().'</a></div>
							<div class="font-11 excerpt mb-20">'.get_the_excerpt().'</div>
							<a class="font-11 readmore" href="'.esc_url( get_permalink() ).'">Lees meer>></a>
						</div>
					</div>';
				}
			} else {
				// no posts found
			}
			wp_reset_postdata();
			$return .= '<div class="clearfix"></div></div>';
  return $return;
}
remove_shortcode( 'post_carousel_in_the_dutch_press' );
add_shortcode( 'post_carousel_in_the_dutch_press', 'ism_shortcode_post_carousel_in_the_dutch_press' );


//shortcode: In the German Press
function ism_shortcode_post_carousel_in_the_german_press( $atts, $content = null ) {
  extract( shortcode_atts( array(
	  "pageid" => ''
  ), $atts ) );
  global $post;
        global $sitepress;
        $sitepress->switch_lang('de');
			$args = array(
					'category_name' => 'in-den-nachrichten', //for In the German Press
					'orderby' => 'date',
					'posts_per_page' => 1,
					'order' => 'DESC'
			);
			$the_query = new WP_Query( $args );
			
			// The Loop
			$return = '<div class="german-home-carousel">';
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$return .='<div class="row-fluid">
						<div class="col-md-5 pl-0 pr-0 carousel-thumb">'.get_the_post_thumbnail().'</div>
						<div class="col-md-7">
							<div class="mb-20"><a class="title" href="'.esc_url( get_permalink() ).'">'.get_the_title().'</a></div>
							<div class="font-11 excerpt mb-20">'.get_the_excerpt().'</div>
							<a class="font-11 readmore" href="'.esc_url( get_permalink() ).'">Weiter lesen>></a>
						</div>
					</div>';
				}
			} else {
				// no posts found
			}
			wp_reset_postdata();
			$return .= '<div class="clearfix"></div></div>';
  return $return;
}
remove_shortcode( 'post_carousel_in_the_german_press' );
add_shortcode( 'post_carousel_in_the_german_press', 'ism_shortcode_post_carousel_in_the_german_press' );

//shortcode: Volunteer with us (Dutch)
function ism_shortcode_category_posts_volunteerw_with_us( $atts, $content = null ) {
  extract( shortcode_atts( array(
	  "pageid" => ''
  ), $atts ) );
  global $post;  
        global $sitepress;
        $sitepress->switch_lang('nl');
			$args = array(
					'category_name' => 'vrijwilligers', //for Volunteer with us (Dutch)
					'orderby' => 'date',
					'posts_per_page' => 5,
					'order' => 'DESC'
			);
			$the_query = new WP_Query( $args ); 
			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$return .='<div class="row-fluid">
						<div class="">'.get_the_post_thumbnail().'</div>
						<div class="mb-20"><a class="title" href="'.esc_url( get_permalink() ).'">'.get_the_title().'</a></div>
					</div>';
				}
			} else {
				// no posts found
			}
			wp_reset_postdata();
  return $return;
}
remove_shortcode( 'category_posts_volunteerw_with_us' );
add_shortcode( 'category_posts_volunteerw_with_us', 'ism_shortcode_category_posts_volunteerw_with_us' );


//shortcode: Freiwillige mit uns (German)
function ism_shortcode_category_posts_german_volunteerw_with_us( $atts, $content = null ) {
  extract( shortcode_atts( array(
	  "pageid" => ''
  ), $atts ) );
  global $post;  
        global $sitepress;
        $sitepress->switch_lang('de');
			$args = array(
					'category_name' => 'freiwilligen', //for Volunteer with us (German)
					'orderby' => 'date',
					'posts_per_page' => 5,
					'order' => 'DESC'
			);
			$the_query = new WP_Query( $args ); 
			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$return .='<div class="row-fluid">
						<div class="">'.get_the_post_thumbnail().'</div>
						<div class="mb-20"><a class="title" href="'.esc_url( get_permalink() ).'">'.get_the_title().'</a></div>
					</div>';
				}
			} else {
				// no posts found
			}
			wp_reset_postdata();
  return $return;
}
remove_shortcode( 'category_posts_german_volunteerw_with_us' );
add_shortcode( 'category_posts_german_volunteerw_with_us', 'ism_shortcode_category_posts_german_volunteerw_with_us' );



/**
 * Change the thumbnail size depending on the post type
*/
function sumobi_eig_thumbnail_image_size( $image_size ) {
	$post_type = get_post_type();
	switch ( $post_type ) {
		// post's will use the 'medium' size from Settings -> Media
		case 'post':
			$image_size = 'thumbnail';
  			global $post;
			$current_post_id=$post->ID;
			if($current_post_id=="2276"){
				$image_size = 'large';
			}
			break;

		// pages's will use the a custom image size added with add_image_size
		case 'page':
			$image_size = 'thumbnail';
			break;	
		
		// all other post types will use the standard 'thumbnail' size from Settings -> Media
		default:
			$image_size = 'thumbnail';
			break;
	}
	return $image_size;
}
add_filter( 'easy_image_gallery_thumbnail_image_size', 'sumobi_eig_thumbnail_image_size' );


/**
* Declare that the ALEH custom theme is compatible with woocommerce
*/

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
