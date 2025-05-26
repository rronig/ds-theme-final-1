<?php 
// Template Name: Home Page
// This template is used for the homepage of the site.
?>

<?php get_header(); ?>

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
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['class' => 'absolute w-full h-full object-cover']); ?>
                        <?php else : ?>
                            <img src="https://source.unsplash.com/random/1200x600/?world" class="w-full h-full object-cover news-image" alt="Fallback Image">
                        <?php endif; ?>
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



    </main>

    <!-- Footer -->
    <?php get_footer(); ?>