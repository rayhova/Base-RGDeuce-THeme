<?php
/**
 * RGDeuce functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RGDeuce
 */

if ( ! function_exists( 'rgdeuce_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rgdeuce_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on RGDeuce, use a find and replace
	 * to change 'rgdeuce' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rgdeuce', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'rgdeuce' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rgdeuce_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // rgdeuce_setup
add_action( 'after_setup_theme', 'rgdeuce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rgdeuce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rgdeuce_content_width', 640 );
}
add_action( 'after_setup_theme', 'rgdeuce_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rgdeuce_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rgdeuce' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer – Left', 'rgdeuce' ),
		'id' => 'footer-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer – Center', 'rgdeuce' ),
		'id' => 'footer-center',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer – Right', 'rgdeuce' ),
		'id' => 'footer-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Bucket 1', 'rgdeuce' ),
		'id' => 'home-bucket-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Bucket 2', 'rgdeuce' ),
		'id' => 'home-bucket-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Bucket 3', 'rgdeuce' ),
		'id' => 'home-bucket-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Bucket 4', 'rgdeuce' ),
		'id' => 'home-bucket-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Bucket 5', 'rgdeuce' ),
		'id' => 'home-bucket-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Bucket 6', 'rgdeuce' ),
		'id' => 'home-bucket-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Utility Bar Widget', 'rgdeuce' ),
		'id' => 'utility-bar-widget',
		'before_widget' => '<aside id="%1$s" class="utility-bar-widget widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

}
add_action( 'widgets_init', 'rgdeuce_widgets_init' );


/**
 * Custom Menus
 */

function register_footer_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );

function register_top_menu() {
  register_nav_menu('top-menu',__( 'Top Menu' ));
}
add_action( 'init', 'register_top_menu' );
function register_mobile_menu() {
  register_nav_menu('mobile-menu',__( 'Mobile Menu' ));
}
add_action( 'init', 'register_mobile_menu' );


/**
 * Enqueue scripts and styles.
 */
function rgdeuce_scripts() {
	wp_enqueue_style( 'rgdeuce-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );

	wp_enqueue_script( 'rgdeuce-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	/*wp_enqueue_script( 'header-resize', get_template_directory_uri() . '/js/header-resize.js', array(), '1.0', true ); */

	wp_enqueue_script( 'rgdeuce-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), 'v3.3.5', true );
}
add_action( 'wp_enqueue_scripts', 'rgdeuce_scripts' );
function google_fonts() {
	$query_args = array(
		'family' => 'Open+Sans:400,300,400italic,600,700,800,700italic', 'Raleway:400,700,300,100,500,800,400italic,100italic,500italic,700italic,800italic','Roboto:400,100,100italic,300,300italic,400italic,900italic,500,500italic,700,700italic,900','Slabo+27px','Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic','Montserrat:400,700|Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic',
		'subset' => 'latin,latin-ext',
	);
	wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }
            
add_action('wp_enqueue_scripts', 'google_fonts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load packaged plugins file
 */
require get_template_directory() . '/inc/plugin-include.php';

add_filter('widget_text', 'do_shortcode');
//Opengraph for FB
function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');
function fb_opengraph() {
    global $post;
 
    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
        } else {
            $img_src = get_stylesheet_directory_uri() . '/images/logo.jpg';
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>
 
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>
 
<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);




add_action( 'wp_enqueue_scripts', 'add_jquery' );
add_action( 'wp_footer', 'fixed_menu_onscroll' );

function add_jquery()
{
	wp_enqueue_script( 'jquery' );
}

function fixed_menu_onscroll()
{
?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$(window).bind('scroll', function() {
			if ($(window).scrollTop() > 100) {
				 $('header#masthead').addClass('fixed');
    } else {
        $('header#masthead').removeClass('fixed');
			}
		});
	});
	</script>
<?php
}

function slide_out_mobile_nav()
{
?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#menu-toggle').click(function() {
        if($('#menu-toggle').hasClass('closed')) {
            $('#mobile-nav').animate({left: "0"}, 400);
            $(this).removeClass('closed').addClass('open');
         }
        else if($('#menu-toggle').hasClass('open')) {
            $('#mobile-nav').animate({left: "-250px"}, 400);
            $(this).removeClass('open').addClass('closed');
          }  
    });
});
</script>
<?php
}

add_image_size( 'team-thumb', 250, 250, array( 'center', 'center' ) ); // Hard crop left top

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
 
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'team-thumb' => __( 'Team Thumbnail' ),
    ) );
}
function rgdeuce_sanitize_copyright( $input ) {
    return strip_tags( stripslashes( $input ) );
}
function page_title_bg()
{

// declare $post global if used outside of the loop
    global $post;

    // check to see if the theme supports Featured Images, and one is set
    if (current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID )) {
            
        // specify desired image size in place of 'full'
        $page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image

    } else {
        // the fallback – our current active theme's default bg image
        $page_bg_image_url = get_background_image();
    }

    // And below, spit out the <style> tag... ?>
    <style type="text/css" id="custom-background-css-override">
        .page-template-interior header.entry-header { background: url('<?php echo $page_bg_image_url; ?>') center; }
    </style>
<?php
}
/*
* Creating a function to create our CPT
*/

/*
* Creating a function to create our CPT
*/

function team_members_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Team Members', 'Post Type General Name', 'rgdeuce' ),
		'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'rgdeuce' ),
		'menu_name'           => __( 'Team Members', 'rgdeuce' ),
		'parent_item_colon'   => __( 'Parent Team Member', 'rgdeuce' ),
		'all_items'           => __( 'All Team Members', 'rgdeuce' ),
		'view_item'           => __( 'View Team Members', 'rgdeuce' ),
		'add_new_item'        => __( 'Add New Team Members', 'rgdeuce' ),
		'add_new'             => __( 'Add New', 'rgdeuce' ),
		'edit_item'           => __( 'Edit Team Member', 'rgdeuce' ),
		'update_item'         => __( 'Update Team Member', 'rgdeuce' ),
		'search_items'        => __( 'Search Team Members', 'rgdeuce' ),
		'not_found'           => __( 'Not Found', 'rgdeuce' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'rgdeuce' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'team-members	', 'rgdeuce' ),
		'description'         => __( 'Team Members', 'rgdeuce' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'departments' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'team-members', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'team_members_post_type', 0 );


/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/


// register two taxonomies to go with the post type
function team_register_taxonomy() {
	// set up labels
	$labels = array(
		'name'              => 'Team Departments',
		'singular_name'     => 'Team Department',
		'search_items'      => 'Search Team Departments',
		'all_items'         => 'All Team Departments',
		'edit_item'         => 'Edit Team Department',
		'update_item'       => 'Update Team Departments',
		'add_new_item'      => 'Add New Team Department',
		'new_item_name'     => 'New Team Department',
		'menu_name'         => 'Team Departments'
	);
	// register taxonomy
	register_taxonomy( 'teamcat', 'team-members', array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'team_register_taxonomy' );
