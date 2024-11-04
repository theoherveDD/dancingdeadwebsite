<?php
/**
 * DancingDeadRecords functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DancingDeadRecords
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function register_artist_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Artistes',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        // Ajoutez d'autres arguments selon vos besoins
    );
	register_post_type('musician', $args);
}
add_action('init', 'register_artist_post_type');


function dancingdeadrecords_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on DancingDeadRecords, use a find and replace
		* to change 'dancingdeadrecords' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dancingdeadrecords', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'dancingdeadrecords' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dancingdeadrecords_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'dancingdeadrecords_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dancingdeadrecords_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dancingdeadrecords_content_width', 640 );
}
add_action( 'after_setup_theme', 'dancingdeadrecords_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 **/

function dancingdeadrecords_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dancingdeadrecords' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dancingdeadrecords' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dancingdeadrecords_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dancingdeadrecords_scripts() {
	wp_enqueue_style( 'dancingdeadrecords-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dancingdeadrecords-style', 'rtl', 'replace' );

	wp_enqueue_script( 'dancingdeadrecords-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	    wp_enqueue_script( 'dancingdeadrecords-spotify', get_template_directory_uri() . '/js/spotify.js', array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dancingdeadrecords_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Shortcode
function my_shortcode()
{
	// Récupérer le titre de la page actuelle
	$title = get_the_title();

	// Retourner le titre enveloppé dans une balise h2
	return '
	<div class="bande_animé">
	<div class="bande_animé_part">
	<h2 class="entry-title scroll">' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . '</h2>
	</div>
	<div class="bande_animé_part">
	<h2 class="entry-title scroll">' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . $title . ' - ' . '</h2>
	</div>
	</div>
	';
}
add_shortcode('bande_animé', 'my_shortcode');



function my_shortcode_red()
{
	// Retourner le titre enveloppé dans une balise h2
	return '
	<div class="bande_animé red">
	<div class="bande_animé_part red">
	<h3 class="entry-title scroll">READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - </h3>
	</div>
	<div class="bande_animé_part red">
	<h3 class="entry-title scroll">READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - READY TO WORK WITH US? - </h3>
	</div>
	</div>

	<div class="redblock">
	<h2>READY TO WORK WITH US?</h2>
	<button class="btn">Contact us</button>
	<div class="redblock_img absolute">
	<img src="wp-content/themes/dancingdeadrecords/img/ICON.png" alt="ready-to-work-with-us">
	</div>
	</div>';  
}
add_shortcode('bande_animé_red', 'my_shortcode_red');





function my_shortcode_releases()
{

	// Retourner le titre enveloppé dans une balise h2
	return '
	<div class="releases_container">
	<h2>LATEST RELEASES</h2>
	<div id="releases4" class="releases">
		<div class="release reveal load r1">
			<a href="" aria-label="" target="_blank">
				<img src="" alt="" loading="lazy">
				<h3></h3>
				<p></p>
			</a>
		</div>
	   <div class="release reveal load r2">
			<a href="" aria-label="" target="_blank">
				<img src="" alt="" loading="lazy">
				<h3></h3>
				<p></p>
			</a>
		</div>
							  
		<div class="release reveal load r3">
			<a href="" aria-label="Écouter Flyman par Red Shorts Boy sur Spotify" target="_blank">
				<img src="" alt="" loading="lazy">
				<h3></h3>
				<p></p>
			</a>
		</div>
		<div class="release reveal load r4">
			<a href="" aria-label="" target="_blank">
				<img src="" alt="" loading="lazy">
				<h3></h3>
				<p></p>
			</a>
		</div>

	</div>
	
	
</div>';  
}

add_shortcode('releases', 'my_shortcode_releases');

function my_shortcode_all_releases() {
	return '
	<div class="releases_container">
	<div id="releases_all" class="releases">
	
	</div>
	</div>
	';
}

add_shortcode('all_releases', 'my_shortcode_all_releases');

function my_shortcode_artists() {
	return '
	<div class="artists_container">
	<div id="artists_all" class="artists">
	
	</div>
	</div>
	';
}

add_shortcode('artists_all', 'my_shortcode_artists');