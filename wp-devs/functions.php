<?php

require get_template_directory() . '/inc/customizer.php';

function wpdevs_load_scripts(){
    wp_enqueue_style( 'wpdevs-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_enqueue_style( 'google-fonts', '
    https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap
    ', array(), null );
    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdevs_load_scripts' );

function wpdevs_config() {
    register_nav_menus(array(
        'wp_devs_main_menu'   => __('Main Menu', 'textdomain'),
        'wp_devs_footer_menu' => __('Footer Menu', 'textdomain'),
    ));

    $args = array(
        'height'    => 230,
        'width'     => 3840
    );
    add_theme_support( 'custom-header', $args );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'width' => 200,
        'height'    => 110,
        'flex-height'   => true,
        'flex-width'    => true
    ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
    add_theme_support( 'title-tag' );
    //add_theme_support ('align-wide');
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles ' );
    add_editor_style( 'style-editor.css' );
    add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'wpdevs_config', 0 );

add_action( 'widgets_init', 'wpdevs_sidebars' );
function wpdevs_sidebars(){
    register_sidebar(
        array(
            'name'  => 'Blog Sidebar',
            'id'    => 'sidebar-blog',
            'description'   => 'This is the Blog Sidebar. You can add your widgets here.',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name'  => 'Service 1',
            'id'    => 'services-1',
            'description'   => 'First Service Area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name'  => 'Service 2',
            'id'    => 'services-2',
            'description'   => 'Second Service Area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name'  => 'Service 3',
            'id'    => 'services-3',
            'description'   => 'Third Service Area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
}

if ( ! function_exists( 'wp_body_open' ) ){
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}
function get_video_thumbnail($video_url, $post_id) {
    $upload_dir = wp_upload_dir();
    $video_path = str_replace(home_url('/'), ABSPATH, $video_url);

    $thumbnail_path = $upload_dir['basedir'] . "/video-thumbs/thumb-{$post_id}.jpg";
    $thumbnail_url = $upload_dir['baseurl'] . "/video-thumbs/thumb-{$post_id}.jpg";

    if (!file_exists($thumbnail_path)) {
        // Make sure video file exists locally
        if (file_exists($video_path)) {
            // Make sure the directory exists
            if (!file_exists(dirname($thumbnail_path))) {
                mkdir(dirname($thumbnail_path), 0755, true);
            }

            // Run ffmpeg command to grab frame at 2 seconds
            $cmd = "ffmpeg -ss 00:00:02 -i " . escapeshellarg($video_path) . " -vframes 1 " . escapeshellarg($thumbnail_path) . " 2>&1";
            exec($cmd, $output, $return_var);

            if ($return_var !== 0) {
                // FFmpeg failed, fallback to placeholder
                return false;
            }
        } else {
            return false; // video file missing
        }
    }
    return $thumbnail_url;
}
?>