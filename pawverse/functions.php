<?php
function pawverse_enqueue_scripts() {
    wp_enqueue_style('pawverse-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'pawverse_enqueue_scripts'); 