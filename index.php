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
          <li class="slide-container">
            <img src="<?php echo $thumb_url ?>" alt="" title=""/>
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
  <div class="wedding twelve columns">
      <p>Wedding Packages from $799</p>
      <a class="button" href="<?php echo home_url( '/contact/' );?>">Contact Us</a>
  </div>

  <div class="my-unslider text twelve columns">
    <h1>What Clients are Saying</h1>
    <ul>
      <li>Choosing Brenda and Berny as our photographers for our engagement and wedding photos was the best decision we made. <br/> - <i>Jake & July</i></li>
      <li>Congratulations! You've discovered the boldest and most talented photographer duo around. - Sophia Marshalls<br/> - <i>Nathalie Connor</i></li>
      <li>They are so much fun and keep your ideas in mind while bringing their own amazing creativity to the table. <br/>- <i>Betsy Jones</i></li>
      <li>We loved working with Brenda and Berny. It is one of the best decisions that we made in planning our wedding.<br/>- <i>Aaron & Liz</i></li>
      <li>Having newborn photos done that captured the emotion of finally having baby was very important to me. <br/>- <i>Debbie Lee</i></li>
      <li>I'm so happy that I found Brenda and Berny Photography while scouring the internet for newborn photographers.<br/> - <i>Alejandro McLure</i></li>
      <li>We LOVE how our photos turned out! Brenda is amazing and incredibly professional, organized, friendly, and so easy to work with. <br/> - <i>The Jones</i></li>
      <li>Berny is the most talented person I know. She is so friendly and made our family feel very comfortable, like we’ve known her for years!<br/> - <i>Belinda Chang</i></li>
    </ul>
  </div>
</section>

<?php get_footer(); ?>
