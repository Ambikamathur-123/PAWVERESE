<?php get_header(); ?>
<main>
  <section class="hero">
    <div class="hero-content">
      <h1>Welcome to Pawverse</h1>
      <p>Your one-stop shop for all things pets! Discover top products, expert advice, and a loving community for your furry friends.</p>
      <a href="<?php echo esc_url(home_url('/shop')); ?>" class="cta-btn">Shop Now</a>
    </div>
    <div class="hero-img">
      <img src="https://images.unsplash.com/photo-1518717758536-85ae29035b6d?auto=format&fit=crop&w=600&q=80" alt="Happy dog and cat" />
    </div>
  </section>
  <!-- You can add the rest of the homepage content here, such as highlights, testimonials, newsletter, etc. -->
</main>
<?php get_footer(); ?> 