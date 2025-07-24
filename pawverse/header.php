<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="navbar">
    <div class="logo"><span class="material-icons">pets</span> Pawverse</div>
    <nav>
      <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
      <a href="<?php echo esc_url(home_url('/shop')); ?>">Shop</a>
      <a href="<?php echo esc_url(home_url('/academy')); ?>">Pet Academy</a>
      <a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a>
      <a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a>
      <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a>
      <a href="<?php echo esc_url(home_url('/order-tracking')); ?>">Order Tracking</a>
      <a href="<?php echo esc_url(home_url('/cart')); ?>" class="cart-icon"><span class="material-icons">shopping_cart</span><span class="cart-badge"></span></a>
      <a href="<?php echo esc_url(home_url('/profile')); ?>" class="account-icon"><span class="material-icons">account_circle</span></a>
    </nav>
  </header>
  <div class="mobile-nav">
    <button id="open-mobile-nav" class="hamburger"><span class="material-icons">menu</span></button>
    <div id="side-panel" class="side-panel">
      <div class="side-panel-header">
        <span class="material-icons">pets</span> Pawverse
        <button id="close-mobile-nav" class="close-btn"><span class="material-icons">close</span></button>
      </div>
      <nav class="side-panel-links">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
        <a href="<?php echo esc_url(home_url('/shop')); ?>">Shop</a>
        <a href="<?php echo esc_url(home_url('/academy')); ?>">Pet Academy</a>
        <a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a>
        <a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a>
        <a href="<?php echo esc_url(home_url('/order-tracking')); ?>">Order Tracking</a>
        <a href="<?php echo esc_url(home_url('/cart')); ?>">Cart</a>
        <a href="<?php echo esc_url(home_url('/profile')); ?>">Profile</a>
      </nav>
    </div>
    <div id="side-panel-backdrop" class="side-panel-backdrop"></div>
  </div> 