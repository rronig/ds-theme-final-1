<?php

function wpdevs_child_scripts() {
    // Load parent theme stylesheet
    wp_enqueue_style( 'wpdevs-parent-style', get_template_directory_uri() . '/style.css' );

    // Load child theme stylesheet (after parent)
    wp_enqueue_style( 'wpdevs-child-style', get_stylesheet_uri(), array('wpdevs-parent-style'), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'wpdevs_child_scripts' );

function filter_main_query_by_category($query) {
    if ($query->is_home() && $query->is_main_query() && !is_admin()) {
        $query->set('category_name', 'recipe,cooking,food,cuisine'); // Change to 'recipe,tech,art' if needed
    }
}
add_action('pre_get_posts', 'filter_main_query_by_category');

?>
