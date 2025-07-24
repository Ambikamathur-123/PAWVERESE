<?php
// Fallback to blog archive
get_header();
if ( have_posts() ) :
  while ( have_posts() ) : the_post();
    the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
    the_excerpt();
  endwhile;
else :
  echo '<p>No content found.</p>';
endif;
get_footer(); 