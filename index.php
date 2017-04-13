<?php get_header(); ?>

<section class="row">
	<h2 class="visuallyhidden">Homepage</h2>

  <!--begin unslider-->
  <div class="twelve columns my-unslider banner">
    <ul>
      <?php
          $args   = array( 'post_type' => 'Slider' );
          $slides = new WP_Query( $args );

          if( $slides->have_posts() ) {
            while( $slides->have_posts() ) {
              $slides->the_post();

              /*--- Build Thumbnail URL ---*/
              $thumb_id        = get_post_thumbnail_id();
              $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
              $thumb_url       = $thumb_url_array[0];
              ?>
        <li style="background-image: url('<?php echo $thumb_url ?>'); min-height:600px;" class="slide-container">
            <div class="slides-message">
                <!--h1><?php the_title() ?></h1-->
                <p><?php the_excerpt() ?></p>
            </div>
        </li>
      <?php
    }
  }
  else {
    echo 'No Slides';
  }
?>
  </ul>
</div> <!-- end unslider -->

<div class="cta twelve columns">
  <p>Taking an image, freezing the moment, reveals how rich reality truly is.</p>
  <a class="button" href="/photography-site/contact/">Book Online</a>
</div>
</section>
<section class="row">
  <?php get_Galleries("Gallery");?>
  <div class="intro twelve columns">
    <h1>Our Phylosophy</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet orci mollis,
      ullamcorper tellus at, luctus justo. Quisque vitae lacus pharetra, tempus libero vel,
      tempus neque. Sed sagittis id justo sed rutrum. In eget risus sit amet nisl mattis porta.
    </p>
  </div>
  <div class="intro twelve columns">
    <img src="/photography-site/wp-content/uploads/2017/04/wedding-promo.jpg" alt="">
    <p>Wedding Packages from $799</p>
    <a href="#">Contact Us</a>
  </div>

  <div class="my-unslider text twelve columns">
    <h1>What Clients are Saying</h1>
    <ul>
      <li>This is my slider.</li>
      <li>Pretty cool, huh?</li>
      <li>Let's see...</li>
    </ul>
  </div>
</section>

<?php get_footer(); ?>
