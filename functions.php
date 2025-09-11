<?php
// Charger le style principal
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('efrei-style', get_stylesheet_uri());
});
