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
        $query->set('category_name', 'tech,technology');
    }
}
add_action('pre_get_posts', 'filter_main_query_by_category');
function asda(){
    foreach (get_categories() as $category) : 
        $category_name = $category->name;
        $category_slug = $category->slug;
        if ($category_name === 'Uncategorized' || $category_name === '') continue;
        if (strtolower($category_name) !== 'tech' && strtolower($category_name) !== 'technology') continue;
        $category_link = esc_url(get_category_link($category->term_id));
?>
    <a href="<?php echo $category_link; ?>" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">
    <?php echo esc_html($category_name); ?>
    </a>
<?php endforeach; }
?>