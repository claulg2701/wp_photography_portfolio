<?php
/*-------------- Enqueue latest jQuery--------------- */
wp_deregister_script('jquery'); //dequeue default
wp_enqueue_script('jquery', 'http://code.jquery.com/jquery-latest.min.js','','',true); //enqueue latest

/*-------------- Enable Widgets--------------- */

function theme_widgets_init() {
/*-------Recent Posts ------*/
  register_sidebar( array(
		'name' => ('Recent Posts Widget'),
		'id' => 'recent-posts',
		'description' => 'Widget for recent posts',
		'before_widget' => '<div class="posts-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
		));
}

add_action('widgets_init', 'theme_widgets_init');

/*-------------Enqueue Google Fonts -------------*/
function load_google_fonts() {
	$query_args = array(
		'family' => 'Open+Sans:400|Cookie:400|Oswald:700',
		'subset' => 'latin,latin-ext',
	);
	wp_enqueue_style( 'load_google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }

add_action('wp_enqueue_scripts', 'google_fonts');


/*---------------- Site Logo -----------------*/

add_theme_support( 'custom-logo' );

function theme_prefix_setup() {

	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 200,
		'flex-width' => true,
    'flex-height' => true,
	) );

}

add_action( 'after_setup_theme', 'theme_prefix_setup' );

/*-------------- Enable Menu --------------- */
add_theme_support('menus');

/*--- Enable Post Thumbnails ---*/
add_theme_support( 'post-thumbnails' );

/*--- Allow SVG image uploads ---*/
function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/*-----------Call to Action ribbon----------*/
function call_to_action_shortcode( $atts, $content = null ) {
	return '<div class="cta_shortcode">' . $content . '</div>';
}
add_shortcode( 'caption', 'call_to_action_shortcode' );

/*-----------Enqueue Unslider----------*/
function enqueue_unslider() {
    wp_enqueue_style( 'unslider-css', get_template_directory_uri() . '/stylesheets/unslider.css' );
    wp_enqueue_style( 'unslider-css', get_template_directory_uri() . '/stylesheets/unslider-dots.css' );
    wp_enqueue_script( 'unslider', get_template_directory_uri() . '/js/unslider-min.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_unslider');
?>
