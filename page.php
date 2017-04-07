<?php get_header(); ?>
	<section class="row">
		<div class="twelve columns">
      <!-- Begin page PHP-->
      <?php
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

    <!-- Begin sidebar -->
  	<div class="twelve columns">
  		<?php get_sidebar(); ?>
  	</div>
    <!-- End sidebar -->

	</section>

<?php get_footer(); ?>
