<?php get_header(); ?>
	<section class="row">
		<div class="twelve columns">
      <!-- Begin page PHP-->
      <?php
      /*---- Set page featured image---*/
      if ( has_post_thumbnail() ) {
        the_post_thumbnail();
      }

      /* Posts loop */
			 if (have_posts()) :
				/* data context	*/
				while (have_posts()) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_content();
				endwhile;
			endif; ?>
      <!-- End page PHP -->
		</div>
    <!--Testing Unslider-->
    <div class="unslider-banner">
      <ul>
        <li>This is my slider.</li>
        <li>Pretty cool, huh?</li>
        <li>Let's see...</li>
      </ul>
    </div>

    <!-- Begin sidebar -->
  	<div class="twelve columns">
  		<?php get_sidebar(); ?>
  	</div>
    <!-- End sidebar -->

	</section>

<?php get_footer(); ?>
