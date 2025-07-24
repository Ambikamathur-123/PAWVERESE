<?php get_header(); ?>
<main>
  <div class="container">
    <h1 class="page-title">Blog</h1>
    <?php if ( have_posts() ) : ?>
      <ul class="blog-list">
        <?php while ( have_posts() ) : the_post(); ?>
          <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <div class="excerpt"><?php the_excerpt(); ?></div>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else : ?>
      <p>No posts found.</p>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?> 