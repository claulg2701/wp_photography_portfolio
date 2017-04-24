<?php get_header(); ?>
	<section class="row">
    <?php
    if ( has_post_thumbnail() ) {
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
      <div class="featured img twelve columns" style="background-image: url('<?php echo $thumb['0'];?>')">
        <h2><?php the_title(); ?></h2>
      </div>
    <?php
  }else {?>
    <div class="twelve columns"><h2><?php the_title(); ?></h2></div>
  <?php }
      /* Begin page content */

      if ( have_posts() ) {
            the_post();
            the_content();
      } ?>
      <!-- End page PHP -->

    <!-- Begin sidebar -->
  	<div class="twelve columns">
  		<?php get_sidebar(); ?>
  	</div>
    <!-- End sidebar -->
	</section>
<?php get_footer(); ?>
