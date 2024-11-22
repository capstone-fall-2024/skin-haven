<?php
/**
 * Skin Haven functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Skin_Haven
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
function skin_haven_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Skin Haven, use a find and replace
		* to change 'skin-haven' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'skin-haven', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'skin-haven' ),
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
			'skin_haven_custom_background_args',
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
add_action( 'after_setup_theme', 'skin_haven_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skin_haven_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'skin_haven_content_width', 640 );
}
add_action( 'after_setup_theme', 'skin_haven_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skin_haven_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'skin-haven' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'skin-haven' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'skin_haven_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function skin_haven_scripts() {
	wp_enqueue_style( 'skin-haven-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'skin-haven-style', 'rtl', 'replace' );

	wp_enqueue_script( 'skin-haven-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skin_haven_scripts' );

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


 // Enqueue the AJAX script
 function enqueue_filter_events_script() {
    // Enqueue the custom script
    wp_enqueue_script('filter-events', get_template_directory_uri() . '/js/filter-events.js', array('jquery'), null, true);
    
    // Pass the AJAX URL to the script
    wp_localize_script('filter-events', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'enqueue_filter_events_script');

// AJAX function to filter events based on the selected day
function filter_events_by_day() {
	if (isset($_GET['day'])) {
$day = sanitize_text_field($_GET['day']);

// Query the events filtered by the taxonomy term
$args = array(
	'post_type' => 'event',
	'posts_per_page' => -1, // Get all posts
	'tax_query' => array(
		array(
			'taxonomy' => 'event_day',
			'field' => 'slug',
			'terms' => $day,
			'operator' => 'IN',
		),
	),
);

// The Query
$query = new WP_Query($args);

if ($query->have_posts()) :
	while ($query->have_posts()) : $query->the_post();
		// Get custom fields
		$event_field = $post_title;
		$event_image = get_field('event_image');
		?>
		<div class="event"  data-post-id="<?php the_ID(); ?>">
			<h2><?php echo get_the_title( $post_id ); ?></h2>
			<?php if ($event_image) : ?>
				<img src="<?php echo esc_url($event_image['url']); ?>" alt="<?php echo esc_attr($event_image['alt']); ?>">
			<?php endif; ?>
		</div>
		<?php
	endwhile;
else :
	echo 'No events found for this day.';
endif;

wp_reset_query();
}

die(); // Always die in the end of an AJAX function
}
add_action('wp_ajax_filter_events', 'filter_events_by_day'); // For logged-in users
add_action('wp_ajax_nopriv_filter_events', 'filter_events_by_day'); // For non-logged-in users




function get_post_details() {
    if (isset($_GET['post_id'])) {
        $post_id = intval($_GET['post_id']); // Ensure the post ID is an integer

        // Get the post object
        $post = get_post($post_id);

        if ($post) {
            // Get the custom fields
            $event_field =  get_the_title( $post_id ); // Custom field 'event'
            $event_image = get_field('event_image', $post_id);  // Custom field 'event_image'
			$event_duration= get_field('event_duration', $post_id);
			$event_location= get_field('location', $post_id);
			$description= get_field('description', $post_id);

            // Prepare event image HTML if exists
            if ($event_image) {
                $event_image_html = '<img src="' . esc_url($event_image['url']) . '" alt="' . esc_attr($event_image['alt']) . '" />';
            } else {
                $event_image_html = ''; // If no event image, leave empty
            }

            // Return the response in JSON format
            wp_send_json_success(array(
                'event_field' => $event_field,  // Return the event custom field
                'event_image' => $event_image_html,  // Return the event image HTML
				'event_duration' => $event_duration,
				'event_location' => $event_location,
				'description' => $description,
            ));
        } else {
            wp_send_json_error(array('message' => 'Post not found.'));
        }
    }

    wp_die();  // Always call wp_die() to properly end the AJAX request
}

// Hook for AJAX request to get post details
add_action('wp_ajax_get_post_details', 'get_post_details');
add_action('wp_ajax_nopriv_get_post_details', 'get_post_details');





