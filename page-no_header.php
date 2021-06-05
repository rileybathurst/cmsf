<?php
/*
Template Name: No Header
*/

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

  </article><!-- #post-<?php the_ID(); ?> -->


<?php
endwhile; // End of the loop.

get_footer();
