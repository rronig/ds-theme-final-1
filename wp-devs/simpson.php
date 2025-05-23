<?php
/*
Template Name: Simpson Page
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insight - Your Trusted News Source</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500;700&display=swap');
        
        body {
            font-family: 'Roboto', sans-serif;
        }
        
        .headline-font {
            font-family: 'Playfair Display', serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        }
        
        .news-card:hover .news-image {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
        
        .news-image {
            transition: transform 0.3s ease;
        }
        
        .breaking-news-ticker {
            animation: ticker 30s linear infinite;
        }
        
        @keyframes ticker {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Bar -->
    <div class="bg-black text-white text-sm py-1 px-4 flex justify-between items-center">
        <div class="flex space-x-4">
            <span><i class="fas fa-calendar-alt mr-1"></i> <span id="current-date"></span></span>
            <span><i class="fas fa-clock mr-1"></i> <span id="current-time"></span></span>
        </div>
        <div class="flex space-x-4">
            <a href="#" class="hover:text-blue-300"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-blue-400"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-red-500"><i class="fab fa-youtube"></i></a>
            <a href="#" class="hover:text-pink-500"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <!-- Breaking News Ticker -->
    <div class="bg-red-600 text-white py-2 px-4 overflow-hidden">
        <div class="flex items-center">
            <span class="font-bold mr-3 whitespace-nowrap">BREAKING NEWS:</span>
            <div class="whitespace-nowrap breaking-news-ticker">
                <span class="mr-8">Russia-Ukraine peace talks show progress as ceasefire negotiations continue</span>
                <span class="mr-8">Stock markets rally as inflation fears ease globally</span>
                <span class="mr-8">Major tech company announces revolutionary AI breakthrough</span>
                <span>Climate change summit reaches historic agreement on emissions</span>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="gradient-bg text-white">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h1 class="headline-font text-4xl font-bold">INSIGHT</h1>
                    <p class="text-sm opacity-80">Your Window to the World</p>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="relative">
                        <input type="text" placeholder="Search for news..." class="w-full py-2 px-4 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="absolute right-0 top-0 h-full px-4 text-gray-600 hover:text-blue-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="hidden md:flex space-x-1">
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Home</a>
                    
                    <div class="dropdown relative">
                        <button class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600 flex items-center">
                            World <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div class="dropdown-menu absolute hidden bg-white shadow-lg rounded-md mt-1 w-48">
                            <a href="#" class="block px-4 py-2 hover:bg-blue-50">Europe</a>
                            <a href="#" class="block px-4 py-2 hover:bg-blue-50">Americas</a>
                            <a href="#" class="block px-4 py-2 hover:bg-blue-50">Asia</a>
                            <a href="#" class="block px-4 py-2 hover:bg-blue-50">Africa</a>
                            <a href="#" class="block px-4 py-2 hover:bg-blue-50">Middle East</a>
                        </div>
                    </div>
                    
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Politics</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Business</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Technology</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Science</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Health</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Entertainment</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Sports</a>
                </div>
                <button class="md:hidden py-4 px-3">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Featured Story -->
        <div class="mb-12">
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="md:flex">
            <?php
            $featured = new WP_Query([
                'category_name' => '', // change to 'art', 'tech', etc. if needed
                'posts_per_page' => 1,
                'post_status' => 'publish'
            ]);

            if ($featured->have_posts()) :
                while ($featured->have_posts()) : $featured->the_post();
                    $author_id = get_the_author_meta('ID');
                    $reading_time = ceil(str_word_count(strip_tags(get_the_content())) / 200); // ~200 wpm
            ?>
                    <!-- Image -->
                    <div class="md:w-2/3">
                        <div class="h-full overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover news-image']); ?>
                            <?php else : ?>
                                <img src="https://source.unsplash.com/random/1200x600/?world" class="w-full h-full object-cover news-image" alt="Fallback Image">
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8 md:w-1/3">
                        <div class="uppercase tracking-wide text-sm text-blue-600 font-semibold mb-1">
                            <?php echo esc_html(get_the_category()[0]->name); ?>
                        </div>
                        <h2 class="headline-font text-3xl font-bold text-gray-900 mb-4">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="mt-2 text-gray-600"><?php echo get_the_excerpt(); ?></p>

                        <!-- Author -->
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <?php echo get_avatar($author_id, 40, '', 'Author Avatar', ['class' => 'h-10 w-10 rounded-full']); ?>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900"><?php the_author(); ?></p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                    <span aria-hidden="true">&middot;</span>
                                    <span><?php echo $reading_time; ?> min read</span>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="mt-6">
                            <a href="<?php the_permalink(); ?>" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                                Read Full Story
                            </a>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="p-8">No featured story available.</p>';
            endif;
            ?>
        </div>
    </div>
</div>


        <!-- News Grid -->
        <div class="mb-12">
    <h2 class="headline-font text-2xl font-bold mb-6 pb-2 border-b border-gray-200">Latest Updates</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $latest_posts = new WP_Query([
            'posts_per_page' => 3,
            'post_status' => 'publish'
        ]);

        if ($latest_posts->have_posts()):
            while ($latest_posts->have_posts()): $latest_posts->the_post();
                $categories = get_the_category();
                $category_name = !empty($categories) ? $categories[0]->name : 'Uncategorized';
                $category_class = strtolower($category_name);
                $author_name = get_the_author();
                $time_diff = human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
                $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://source.unsplash.com/random/600x400/?news';
        ?>
        <div class="news-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
            <div class="relative h-48 overflow-hidden">
                <img src="<?php echo esc_url($featured_img); ?>" alt="News" class="w-full h-full object-cover news-image">
            </div>
            <div class="p-4">
                <div class="flex items-center text-xs text-gray-500 mb-2">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded mr-2"><?php echo esc_html($category_name); ?></span>
                    <span><?php echo esc_html($time_diff); ?></span>
                </div>
                <h3 class="font-bold text-lg mb-2"><?php the_title(); ?></h3>
                <p class="text-gray-600 text-sm"><?php echo get_the_excerpt(); ?></p>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="https://source.unsplash.com/random/30x30/?person" alt="Author" class="w-6 h-6 rounded-full mr-2">
                        <span class="text-xs text-gray-600"><?php echo esc_html($author_name); ?></span>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More →</a>
                </div>
            </div>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else:
        ?>
        <p>No recent posts found.</p>
        <?php endif; ?>
    </div>
</div>


        <!-- More News Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">

    <!-- Art Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-pink-600 text-white px-4 py-3">
            <h3 class="font-bold flex items-center">
                <i class="fas fa-paint-brush mr-2"></i> Art
            </h3>
        </div>
        <div class="p-4">
            <?php
            $art_posts = new WP_Query([
                'category_name' => 'art',
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ]);
            if ($art_posts->have_posts()):
                while ($art_posts->have_posts()): $art_posts->the_post(); ?>
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <p class="text-sm text-gray-600 mt-1"><?php echo get_the_excerpt(); ?></p>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p>No recent art posts found.</p>
            <?php endif; ?>
            <div class="pt-2">
                <a href="<?php echo esc_url(get_category_link(get_cat_ID('Art'))); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All Art News →</a>
            </div>
        </div>
    </div>

    <!-- Food Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-green-600 text-white px-4 py-3">
            <h3 class="font-bold flex items-center">
                <i class="fas fa-utensils mr-2"></i> Food
            </h3>
        </div>
        <div class="p-4">
            <?php
            $food_posts = new WP_Query([
                'category_name' => 'food',
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ]);
            if ($food_posts->have_posts()):
                while ($food_posts->have_posts()): $food_posts->the_post(); ?>
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <p class="text-sm text-gray-600 mt-1"><?php echo get_the_excerpt(); ?></p>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p>No recent food posts found.</p>
            <?php endif; ?>
            <div class="pt-2">
                <a href="<?php echo esc_url(get_category_link(get_cat_ID('Food'))); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All Food News →</a>
            </div>
        </div>
    </div>

    <!-- Tech Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-purple-600 text-white px-4 py-3">
            <h3 class="font-bold flex items-center">
                <i class="fas fa-microchip mr-2"></i> Tech
            </h3>
        </div>
        <div class="p-4">
            <?php
            $tech_posts = new WP_Query([
                'category_name' => 'tech',
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ]);
            if ($tech_posts->have_posts()):
                while ($tech_posts->have_posts()): $tech_posts->the_post(); ?>
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <p class="text-sm text-gray-600 mt-1"><?php echo get_the_excerpt(); ?></p>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p>No recent tech posts found.</p>
            <?php endif; ?>
            <div class="pt-2">
                <a href="<?php echo esc_url(get_category_link(get_cat_ID('Tech'))); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All Tech News →</a>
            </div>
        </div>
    </div>

</div>


        <!-- Video Section -->
        <div class="mb-12">
    <h2 class="headline-font text-2xl font-bold mb-6 pb-2 border-b border-gray-200">Featured Videos</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <?php
    $video_posts = new WP_Query([
        'posts_per_page' => 12,
        'post_status' => 'publish',
    ]);

    $count = 0;
    if ($video_posts->have_posts()) :
        while ($video_posts->have_posts() && $count < 6) : $video_posts->the_post();

            $content = get_the_content();

            // Check if content has a <video> tag with src
            if (preg_match('/<video[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $content, $matches)) {
                $video_url = $matches[1];

                // Use your function here to get dynamic thumbnail
                $thumb_url = get_video_thumbnail($video_url, get_the_ID());

                if (!$thumb_url) {
                    $thumb_url = "https://source.unsplash.com/random/600x400/?video"; // fallback
                }

                $duration = '5:00'; // you can customize if you want to extract video duration
                $views = rand(500000, 2000000);
                $views_formatted = number_format($views / 1000, 1) . 'K views';
    ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative pb-[56.25%] overflow-hidden">
                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" class="absolute w-full h-full object-cover">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <a href="<?php the_permalink(); ?>" class="bg-red-600 text-white rounded-full w-14 h-14 flex items-center justify-center hover:bg-red-700 transition duration-300" aria-label="Watch <?php the_title_attribute(); ?>">
                                <i class="fas fa-play text-xl"></i>
                            </a>
                        </div>
                        <div class="absolute bottom-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded"><?php echo esc_html($duration); ?></div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2"><?php the_title(); ?></h3>
                        <p class="text-gray-600 text-sm"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs text-gray-500"><?php echo esc_html($views_formatted); ?> • <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></span>
                            <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Watch Now →</a>
                        </div>
                    </div>
                </div>

    <?php
                $count++;
            }
        endwhile;
        wp_reset_postdata();
    endif;

    if ($count === 0) {
        echo '<p>No video posts found.</p>';
    }
    ?>

    </div>
</div>



        <!-- Newsletter Subscription -->
        <div class="bg-blue-50 rounded-xl p-8 mb-12">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="headline-font text-2xl font-bold mb-2">Stay Informed with Our Newsletter</h2>
                <p class="text-gray-600 mb-6">Get the day's top stories delivered straight to your inbox every morning.</p>
                <div class="flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input type="email" placeholder="Your email address" class="flex-grow px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 whitespace-nowrap">
                        Subscribe
                    </button>
                </div>
                <p class="text-xs text-gray-500 mt-3">We respect your privacy. Unsubscribe at any time.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- Column 1 -->
                <div>
                    <h3 class="headline-font text-xl font-bold mb-4">INSIGHT</h3>
                    <p class="text-gray-400 mb-4">Delivering accurate, unbiased news from around the globe since 1995.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="font-bold text-lg mb-4"><?php _e('Categories', 'textdomain'); ?></h4>
                    <ul class="space-y-2">
                        <?php
                        $categories = get_categories(array(
                            'orderby' => 'name',
                            'number' => 5,
                        ));
                        foreach ($categories as $category) {
                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>

                <!-- Quick links-->
                <div>
                    <h4 class="font-bold text-lg mb-4"><?php _e('Quick Links', 'textdomain'); ?></h4>
                    <ul class="space-y-2" >
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'wp_devs_footer_menu',
                            'container'      => false,
                            'menu_class'     => 'footer-menu',
                            'depth'          => 1,
                            'fallback_cb'    => false
                        ));
                        ?>
                    </ul>
                </div>

                <!-- Column 4 -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="http://localhost/wordpress/terms-of-service/" class="text-gray-400 hover:text-white">Terms of Service</a></li>
                        <li><a href="http://localhost/wordpress/privacy-policy/" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                        <li><a href="http://localhost/wordpress/cookie-policy/" class="text-gray-400 hover:text-white">Cookie Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">GDPR Compliance</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2023 Insight News Network. All rights reserved.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Update current date and time
        function updateDateTime() {
            const now = new Date();
            
            // Format date
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('current-date').textContent = now.toLocaleDateString('en-US', options);
            
            // Format time
            let hours = now.getHours();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds} ${ampm}`;
        }
        
        // Update immediately and then every second
        updateDateTime();
        setInterval(updateDateTime, 1000);
        
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.md\\:hidden');
            const navMenu = document.querySelector('.hidden.md\\:flex');
            
            if (mobileMenuButton && navMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    navMenu.classList.toggle('hidden');
                    navMenu.classList.toggle('flex');
                    navMenu.classList.toggle('flex-col');
                    navMenu.classList.toggle('absolute');
                    navMenu.classList.toggle('bg-white');
                    navMenu.classList.toggle('w-full');
                    navMenu.classList.toggle('left-0');
                    navMenu.classList.toggle('top-full');
                    navMenu.classList.toggle('shadow-lg');
                    navMenu.classList.toggle('p-4');
                    navMenu.classList.toggle('space-y-2');
                });
            }
        });
    </script>
</body>
</html>