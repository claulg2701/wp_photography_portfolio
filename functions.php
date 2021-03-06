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

    /*-------Blog Sidebar ------*/
    register_sidebar( array(
  		'name' => ('Blog Sidebar'),
  		'id' => 'blog-sidebar',
  		'description' => 'Widget for blog sidebar',
  		'before_widget' => '<div class="blog-sidebar">',
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

/*------------Clean p tags from shortcode ------*/
function wpex_clean_shortcodes($content){
$array = array (
    '<p>[' => '[',
    ']</p>' => ']',
    ']<br />' => ']'
);
$content = strtr($content, $array);
return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');

/*-----------Call to Action Shortcode----------*/
function call_action( $atts, $content = null ) {
  extract(shortcode_atts(array('class' => ''), $atts));
	return '<div class="'.$class.'">'.do_shortcode($content).'</div>';
}
add_shortcode( 'caption', 'call_action' );

/*-----------Shortcode Button ----------*/
function button_shortcode($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#'), $atts));
   return '<a class="button" href="'.$link.'">'.do_shortcode($content).'</a>';
}
add_shortcode('button', 'button_shortcode');

/*-----------Enqueue Unslider----------*/
function enqueue_unslider() {
    wp_enqueue_style( 'unslider-css', get_template_directory_uri() . '/stylesheets/unslider.css' );
    wp_enqueue_style( 'unslider-dots-css', get_template_directory_uri() . '/stylesheets/unslider-dots.css' );
    wp_enqueue_script( 'unslider', get_template_directory_uri() . '/js/unslider.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'enqueue_unslider');

/*---------- Unslider Custom Post -------------*/
function slider_unslider() {

  $labels = array(
    'name'               => _x( 'Slides', 'post type general name' ),
    'singular_name'      => _x( 'Slide', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'slides' ),
    'add_new_item'       => __( 'Add Slide' ),
    'edit_item'          => __( 'Edit Slides' ),
    'new_item'           => __( 'New Slide' ),
    'all_items'          => __( 'All Slides' ),
    'view_item'          => __( 'View Slides' ),
    'search_items'       => __( 'Search Slides' ),
    'not_found'          => __( 'No slides found' ),
    'not_found_in_trash' => __( 'No slides found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Slider'
  );

  $args = array(
    /*--- Begin Arguments Options ---*/
    'labels'        => $labels,
    'description'   => 'Slides for our Unslider integration',
    'public'        => true,
    'menu_position' => 6,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => true,
  );

  register_post_type( 'slider', $args );
}

add_action( 'init', 'slider_unslider' );

/* ----------Get post by category ------------*/
function get_Galleries($content){
  $category = get_category_by_slug( $content );

  $parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
  $parent_cat = get_terms('category',$category);//category name

  foreach ($parent_cat as $catVal) {
    echo '<h2 class="visuallyhidden">'.$catVal->name.'</h2>'; //Parent Category
    $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
    $child_cat = get_terms( 'category', $child_arg );
    echo '<div class="featured my-container">';
        foreach( $child_cat as $child_term ) {
        echo '<div class="featured my-three columns">';
        $args = array(
        'posts_per_page' => 1, //only display the latest post for this category
        'cat' => $child_term->term_id,
          );
          $q = new WP_Query( $args);
          if ( $q->have_posts() ) {
            while ( $q->have_posts() ) {
              $q->the_post();
              if(has_post_thumbnail()) {?>
                <a class="my-img" href="<?php the_permalink();?>">
                  <?php the_post_thumbnail( 'full');?></a>
              <?php
              } else {
                echo '<img src="'.get_template_directory_uri().'/images/default_post.jpg" atl="" title=""/>';
              }?>
              <div class="show-title">
                <p class="cat-title">
                <?php
                $thetitle = get_the_title();
                $getlength = strlen($thetitle);
                $thelength = 25;
                echo substr($thetitle, 0, $thelength);
                if ($getlength > $thelength) echo "...";

                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                  echo '<a class="my-img-cat" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                }
                ?>
              </p>
            </div>
              <?php
              }
          wp_reset_postdata();
        }
          echo '</div>';
        }
    echo '</div>';
    }
}


/* custom url menu from latest post */
add_filter( 'wp_get_nav_menu_items', 'replace_placeholder_nav_menu_item_with_latest_post', 10, 3 );
function replace_placeholder_nav_menu_item_with_latest_post( $items, $menu, $args ) {
    foreach ( $items as $item ) {
        if ( '#latestpost' != $item->url )
            continue;
        // Get the latest post
        $latestpost = get_posts( array(
            'numberposts' => 1,
            'category_name' => 'blog'
        ) );
        if ( empty( $latestpost ) )
            continue;
        // Replace the placeholder with the real URL
        $item->url = get_permalink( $latestpost[0]->ID );
    }
    return $items;
}

?>
