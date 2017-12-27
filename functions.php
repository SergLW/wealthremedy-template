<?php
/**
 * WealthRemedy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WealthRemedy
 */

if ( ! function_exists( 'wealthremedy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wealthremedy_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WealthRemedy, use a find and replace
	 * to change 'wealthremedy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wealthremedy', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'wealthremedy' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wealthremedy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'wealthremedy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wealthremedy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wealthremedy_content_width', 640 );
}
add_action( 'after_setup_theme', 'wealthremedy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wealthremedy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wealthremedy' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wealthremedy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wealthremedy_widgets_init' );

/**
 * Theme options page
 */

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'post_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-option',
        'capability' => 'edit_posts',
        'parent_slug' => '',
        'position'  => false,
        'icon_utl' => false,
    ));

}


/**
 * Enqueue scripts and styles.
 */
function wealthremedy_scripts() {

    wp_register_style('wealthremedy-fontawesome', get_template_directory_uri() . '/libs/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('wealthremedy-fontawesome');

    wp_register_style('wealthremedy-owlcarousel', get_template_directory_uri() . '/libs/owlcarousel/assets/owl.carousel.min.css');
    wp_enqueue_style('wealthremedy-owlcarousel');

	wp_enqueue_style( 'wealthremedy-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wealthremedy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wealthremedy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'wealthremedy-libs', get_template_directory_uri() . '/js/libs.min.js', array(), '20151215', true );

    wp_enqueue_script( 'wealthremedy-owlcarouseljs', get_template_directory_uri() . '/libs/owlcarousel/owl.carousel.min.js', array(), '20151215', true );

    wp_enqueue_script( 'wealthremedy-common', get_template_directory_uri() . '/js/common.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wealthremedy_scripts' );

add_action('wp_enqueue_scripts', 'wpmidia_enqueue_masked_input');
function wpmidia_enqueue_masked_input(){
    wp_enqueue_script('wealthremedy-masked-input', get_template_directory_uri().'/js/jquery.maskedinput.min.js', array('jquery'));
}
/**
 * Implement the Custom Header feature.

require get_template_directory() . '/inc/custom-header.php';
 */
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

add_action('add_admin_bar_menus', function(){
    remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
    remove_action( 'admin_bar_menu', 'wp_admin_bar_new_content_menu', 70 );
    remove_action('admin_bar_menu', 'wp_admin_bar_customize_menu', 40);
    remove_action( 'admin_bar_menu', 'wp_admin_bar_search_menu', 4 );
    remove_action( 'admin_bar_menu', 'wp_admin_bar_sidebar_toggle', 0 );
    remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu', 10 );
    remove_action( 'admin_bar_menu', 'wp_admin_bar_edit_menu', 80 );
    remove_action( 'admin_bar_menu', 'wp_admin_bar_updates_menu', 50 );
});
function remove_menus(){
    remove_menu_page( 'index.php' );
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'users.php' );
    remove_submenu_page( 'themes.php', 'widgets.php' );
}
add_action( 'admin_menu', 'remove_menus' );

function remove_customize() {
    $customize_url_arr = array();
    $customize_url_arr[] = 'customize.php'; // 3.x
    $customize_url = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
    $customize_url_arr[] = $customize_url; // 4.0 & 4.1
    if ( current_theme_supports( 'custom-header' ) && current_user_can( 'customize') ) {
        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'header_image', $customize_url ); // 4.1
        $customize_url_arr[] = 'custom-header'; // 4.0
    }
    if ( current_theme_supports( 'custom-background' ) && current_user_can( 'customize') ) {
        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'background_image', $customize_url ); // 4.1
        $customize_url_arr[] = 'custom-background'; // 4.0
    }
    foreach ( $customize_url_arr as $customize_url ) {
        remove_submenu_page( 'themes.php', $customize_url );
    }
}
add_action( 'admin_menu', 'remove_customize', 999 );

add_action('wp_footer', 'wpmidia_activate_masked_input');
function wpmidia_activate_masked_input(){
    ?>
    <script type="text/javascript">
        jQuery( function($){
            $(".data").mask("99/99/9999");
            $(".tel").mask("1 999-999-9999");
            $(".cpf").mask("999.999.999-99");
            $(".cnpj").mask("99.999.999/9999-99");
        });
    </script>
    <?php
}

function my_google_analytics() {
    ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-104984032-1', 'auto');
        ga('send', 'pageview');

    </script>
    <?php
}
add_action( 'wp_head', 'my_google_analytics' );