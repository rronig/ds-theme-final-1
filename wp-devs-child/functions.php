<?php

function wpdevs_child_scripts(){
    wp_enqueue_style( 'wpdevs-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'wpdevs-child-style', get_stylesheet_uri(), array(), wp_get_theme() -> get( 'Version') );
}

add_action( 'wp_enqueue_scripts', 'wpdevs_child_scripts' ); ?>
