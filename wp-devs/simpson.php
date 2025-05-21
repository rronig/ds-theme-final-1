<?php
/*
Template Name: Simpson Page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --wpdevs-light-blue: #2A92D3;
            --wpdevs-deep-blue: #213C4D;
            --wpdevs-black-blue: #001E32;
            --wpdevs-yellow: #CFAF07;
            --wpdevs-gray1: #7C7C7C;
            --wpdevs-gray2: #F7F7F7;
            --wpdevs-gray3: #DDDDDD;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.jpg') no-repeat center center;
            background-size: cover;
        }
        
        .featured-post:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .menu-icon .bar {
            transition: all 0.3s ease;
        }
        
        .menu-open .bar:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }
        
        .menu-open .bar:nth-child(2) {
            opacity: 0;
        }
        
        .menu-open .bar:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }
        
        .mobile-menu {
            transition: all 0.3s ease;
            max-height: 0;
            overflow: hidden;
        }
        
        .mobile-menu.open {
            max-height: 500px;
        }
    </style>
</head>
<body <?php body_class('min-h-screen flex flex-col'); ?>>
    <?php wp_body_open(); ?>
    
    <!-- Top Navigation -->
    <header class="sticky top-0 z-50">
        <div class="glass-card py-4 px-6 shadow-sm">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold text-gray-800">
                            <?php bloginfo('name'); ?>
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'items_wrap' => '%3$s',
                        'fallback_cb' => false,
                        //'walker' => new Custom_Walker_Nav_Menu()
                    ));
                    ?>
                </nav>
                
                <!-- Search and Mobile Menu Button -->
                <div class="flex items-center space-x-4">
                    <div class="hidden md:block relative">
                        <?php get_search_form(); ?>
                    </div>
                    
                    <button id="menu-toggle" class="md:hidden focus:outline-none">
                        <div class="menu-icon w-6">
                            <div class="bar h-0.5 w-6 bg-gray-800 mb-1.5"></div>
                            <div class="bar h-0.5 w-6 bg-gray-800 mb-1.5"></div>
                            <div class="bar h-0.5 w-6 bg-gray-800"></div>
                        </div>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="mobile-menu md:hidden bg-white">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'px-2 pt-2 pb-4 space-y-1',
                    'walker' => new Custom_Mobile_Walker_Nav_Menu()
                ));
                ?>
                <div class="px-3 py-2">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section text-white py-20 md:py-32">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6"><?php echo esc_html(get_theme_mod('home_hero_title', 'Welcome to ' . get_bloginfo('name'))); ?></h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto"><?php echo esc_html(get_theme_mod('home_hero_subtitle', 'Discover insightful articles, creative ideas, and inspiring stories from our community of writers.')); ?></p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="<?php echo esc_url(get_theme_mod('home_hero_button1_link', '#')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                    <?php echo esc_html(get_theme_mod('home_hero_button1_text', 'Start Reading')); ?>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('home_hero_button2_link', '#')); ?>" class="bg-transparent hover:bg-white hover:text-blue-600 text-white font-bold py-3 px-8 border-2 border-white rounded-full transition duration-300">
                    <?php echo esc_html(get_theme_mod('home_hero_button2_text', 'Subscribe')); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Posts -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 relative inline-block">
                    <?php echo esc_html(get_theme_mod('featured_posts_title', 'Featured Posts')); ?>
                    <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-blue-600"></span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html(get_theme_mod('featured_posts_subtitle', 'Check out our most popular and trending articles')); ?></p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $featured_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'meta_key' => 'is_featured',
                    'meta_value' => '1'
                ));
                
                if ($featured_posts->have_posts()) :
                    while ($featured_posts->have_posts()) : $featured_posts->the_post();
                        $categories = get_the_category();
                        $category_name = !empty($categories) ? esc_html($categories[0]->name) : 'Uncategorized';
                        $category_link = !empty($categories) ? esc_url(get_category_link($categories[0]->term_id)) : '#';
                ?>
                <div class="bg-white rounded-xl overflow-hidden shadow-md featured-post transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumbnail.jpg" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                        <?php endif; ?>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="text-sm text-gray-500"><?php echo get_the_date(); ?></span>
                            <span class="mx-2 text-gray-400">•</span>
                            <a href="<?php echo $category_link; ?>" class="text-sm text-blue-600"><?php echo $category_name; ?></a>
                        </div>
                        <h3 class="text-xl font-bold mb-3"><?php the_title(); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" class="text-blue-600 font-medium hover:text-blue-800 inline-flex items-center">
                            <?php _e('Read More', 'textdomain'); ?>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="col-span-3 text-center">' . __('No featured posts found.', 'textdomain') . '</p>';
                endif;
                ?>
            </div>
            
            <div class="text-center mt-12">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                    <?php _e('View All Posts', 'textdomain'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 relative inline-block">
                    <?php _e('Explore Categories', 'textdomain'); ?>
                    <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-blue-600"></span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto"><?php _e('Browse our content by category', 'textdomain'); ?></p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <?php
                $categories = get_categories(array(
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'number' => 6
                ));
                
                $category_icons = array(
                    'writing' => 'fas fa-pen-fancy',
                    'technology' => 'fas fa-laptop-code',
                    'travel' => 'fas fa-plane',
                    'photography' => 'fas fa-camera',
                    'food' => 'fas fa-utensils',
                    'education' => 'fas fa-graduation-cap'
                );
                
                $category_colors = array(
                    'writing' => 'blue',
                    'technology' => 'green',
                    'travel' => 'yellow',
                    'photography' => 'purple',
                    'food' => 'red',
                    'education' => 'indigo'
                );
                
                if (!empty($categories)) :
                    $i = 0;
                    foreach ($categories as $category) :
                        $slug = $category->slug;
                        $icon = isset($category_icons[$slug]) ? $category_icons[$slug] : 'fas fa-folder';
                        $color = isset($category_colors[$slug]) ? $category_colors[$slug] : 'gray';
                ?>
                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="glass-card rounded-lg p-6 text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 mx-auto mb-4 bg-<?php echo $color; ?>-100 rounded-full flex items-center justify-center">
                        <i class="<?php echo $icon; ?> text-<?php echo $color; ?>-600 text-2xl"></i>
                    </div>
                    <h3 class="font-bold mb-1"><?php echo esc_html($category->name); ?></h3>
                    <p class="text-sm text-gray-600"><?php echo esc_html($category->count); ?> <?php _e('Articles', 'textdomain'); ?></p>
                </a>
                <?php
                        $i++;
                    endforeach;
                else :
                    echo '<p class="col-span-6 text-center">' . __('No categories found.', 'textdomain') . '</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

<!-- Latest Posts -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 relative inline-block">
                <?php _e('Latest Posts', 'textdomain'); ?>
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-blue-600"></span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto"><?php _e('Our most recent articles and updates', 'textdomain'); ?></p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <?php
            $latest_posts = new WP_Query(array(
                'posts_per_page' => 4,
                'ignore_sticky_posts' => true
            ));

            if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post();
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? esc_html($categories[0]->name) : 'Uncategorized';
                    $category_link = !empty($categories) ? esc_url(get_category_link($categories[0]->term_id)) : '#';
            ?>
            <div class="bg-white rounded-xl overflow-hidden shadow-md flex flex-col md:flex-row">
                <div class="md:w-1/3 h-48 md:h-auto">
                    <?php if (has_post_thumbnail()) :
                        the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover']);
                    else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumbnail.jpg" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                    <?php endif; ?>
                </div>
                <div class="p-6 md:w-2/3">
                    <div class="flex items-center mb-2">
                        <span class="text-sm text-gray-500"><?php echo get_the_date(); ?></span>
                        <span class="mx-2 text-gray-400">•</span>
                        <a href="<?php echo $category_link; ?>" class="text-sm text-blue-600"><?php echo $category_name; ?></a>
                    </div>
                    <h3 class="text-xl font-bold mb-3"><?php the_title(); ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    <a href="<?php the_permalink(); ?>" class="text-blue-600 font-medium hover:text-blue-800 inline-flex items-center">
                        <?php _e('Read More', 'textdomain'); ?>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
            <?php endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="col-span-2 text-center">' . __('No posts found.', 'textdomain') . '</p>';
            endif;
            ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="inline-block border-2 border-blue-600 hover:bg-blue-600 hover:text-white text-blue-600 font-bold py-3 px-8 rounded-full transition duration-300">
                <?php _e('Load More', 'textdomain'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6"><?php _e('Subscribe to Our Newsletter', 'textdomain'); ?></h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto"><?php _e('Get the latest articles and updates delivered straight to your inbox.', 'textdomain'); ?></p>

        <form class="max-w-md mx-auto flex flex-col sm:flex-row gap-4">
            <input type="email" placeholder="<?php _e('Your email address', 'textdomain'); ?>" class="flex-grow px-4 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-800">
            <button type="submit" class="bg-white hover:bg-gray-100 text-blue-600 font-bold py-3 px-8 rounded-full transition duration-300">
                <?php _e('Subscribe', 'textdomain'); ?>
            </button>
        </form>

        <p class="text-sm mt-4 opacity-80"><?php _e('We respect your privacy. Unsubscribe at any time.', 'textdomain'); ?></p>
    </div>
</section>

<!-- Footer -->
</body>
</html>
