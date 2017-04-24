<?php
/* Template Name: Archieve Page */

get_header(); ?>

<div class = "row">
  <div class="blog twelve columns">
    <h2>
      <?php if ( have_posts() ) :
      single_cat_title("", true); ?>
    </h2>
  </div>
	<div class="post eight columns">
			<?php
			// The Loop
			while ( have_posts() ) : the_post();?>
			<!-- data context -->
      <div class="cat summary outline">
          <a href="<?php the_permalink() ?>">
    				<?php if ( has_post_thumbnail() ) {
                  the_post_thumbnail('nextPrevPost-thumb');
            }?>
            <h6 class="nextPrevTitle"><?php the_title(); ?></h6>
            <div class="center post-info">
              <?php
              $author = get_the_author();;
              echo substr($author, 0,10)." | \n\n";
              the_time('M jS, Y');?>
            </div>
            <p class="nextPrevEx"><?php echo wp_trim_words( get_the_content(), 50, '...' ); ?></p>
          </a>

      </div>
			<?php endwhile; ?> <!-- End Loop -->
      <div class="eight columns page-navigation">
        <?php
        previous_posts_link( '<i class="fa fa-chevron-circle-left fa-lg" aria-hidden="true"></i>' );
        echo "<span>&nbsp;&nbsp;</span>";
        current_paged();
        echo "<span>&nbsp;&nbsp;</span>";
        next_posts_link( '<i class="fa fa-chevron-circle-right fa-lg" aria-hidden="true"></i>' );
        ?>
      </div>

    <?php else: ?>
			<p>Sorry, no posts matched your criteria.</p>
		<?php endif; ?>
	</div> <!--end eight columns-->
  <div class="post four columns">
    <?php get_sidebar( '2' ); ?>
  </div>
</div>
<?php get_footer(); ?>
