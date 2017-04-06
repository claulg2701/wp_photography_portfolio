<?php
/*-------------- Enable Widgets--------------- */

function theme_widgets_init() {
	register_sidebar( array(
		'name' => ('Recent Posts Widget'),
		'id' => 'recent-posts',
		'description' => 'Widget for recent posts',
		'before_widget' => '<div class="posts-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
		));

    /*--- New Widget --- */
	register_sidebar( array(
		'name' => ('Footer Widget One'),
		'id' => 'footer-widget-one',
		'description' => 'First widget for our footer',
		'before_widget' => '<div class="widget-footer">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
		));
	/*--- Second New Widget --- */
	register_sidebar( array(
		'name' => ('Footer Widget Two'),
		'id' => 'footer-widget-two',
		'description' => 'Second widget for our footer',
		'before_widget' => '<div class="widget-footer">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
		));

  /*--- Third New Widget --- */
	register_sidebar( array(
		'name' => ('Footer Widget Three'),
		'id' => 'footer-widget-three',
		'description' => 'Third widget for our footer',
		'before_widget' => '<div class="widget-footer">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
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

?>
