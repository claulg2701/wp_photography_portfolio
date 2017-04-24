<?php
/* Template Name: Category Page */

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
			<?php endwhile;
      endif; ?>
      <!-- End Loop -->
	</div> <!--end eight columns-->
  <div class="post four columns">
    <?php get_sidebar('2'); ?>
  </div>
</div>
<?php get_footer(); ?>
