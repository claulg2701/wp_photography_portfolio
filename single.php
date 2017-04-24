<?php get_header(); ?>
	<div class="row">
    <div class="blog twelve columns">
      <h2>Blog</h2>
    </div>
		<div class="post eight columns">
<!-- Begin single PHP -->
			<?php if (have_posts()) :
				/* Data Context is defined here	*/
				while (have_posts()) : the_post();?>
          <h2><?php the_title(); ?></h2>
          <div class="post-info">
              <?php
              $author = get_the_author();
              echo substr($author, 0,10);
              echo "\n\n";
              the_time('M jS, Y');
              echo "\n\n"; ?>
          </div>
					<?php the_content();?>

          <div class="post-nav">
              <?php
              $prevPost = get_previous_post(true);
              $nextPost = get_next_post(true);

              if($prevPost) {
                previous_post_link('%link',"
                <p>&larr; Previous Post</p>", TRUE);
              }
              if($nextPost) {
                next_post_link('%link',"<p>Next Post &rarr;</p>", TRUE);
              }
              ?>

            </div><!--end post nav -->

				<?php endwhile;
			endif; ?>
<!-- End single PHP -->
		</div>
    <div class="four columns">
      <?php get_sidebar( '2' ); ?>
    </div>
	</div>
<?php get_footer(); ?>
