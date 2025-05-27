<?php get_header(); ?>
<!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="headline-font text-3xl md:text-4xl font-bold text-gray-900 mb-2">Latest News</h1>
            <div class="flex items-center text-sm text-gray-500">
                <span>Home</span>
                <span class="mx-2">/</span>
                <span class="text-blue-600">All News</span>
            </div>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $news_query = new WP_Query([
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged
            ]);
            if ($news_query->have_posts()):
                while ($news_query->have_posts()): $news_query->the_post();
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? $categories[0]->name : '';
                    $category_color = strtolower($category_name);
                    $author_name = get_the_author();
                    $time_diff = human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
                    $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://source.unsplash.com/random/600x400/?news';
            ?>
            <div class="news-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="<?php echo esc_url($featured_img); ?>" alt="News" class="w-full h-full object-cover news-image">
                    <?php if ($category_name): ?>
                        <span class="category-badge bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full"><?php echo esc_html($category_name); ?></span>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-xs text-gray-500 mb-3">
                        <span><?php echo esc_html($time_diff); ?></span>
                        <span class="mx-2">•</span>
                        <span><?php echo ceil(str_word_count(strip_tags(get_the_content())) / 200); ?> min read</span>
                    </div>
                    <h3 class="font-bold text-xl mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="text-gray-600 mb-4"><?php echo get_the_excerpt(); ?></p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img src="https://source.unsplash.com/random/30x30/?person" alt="Author" class="w-8 h-8 rounded-full mr-2">
                            <span class="text-sm text-gray-600"><?php echo esc_html($author_name); ?></span>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More →</a>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); else: ?>
                <p>No news found.</p>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mb-12">
            <?php
            $big = 999999999;
            $pagination = paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => $paged,
                'total' => $news_query->max_num_pages,
                'prev_text' => __('Previous'),
                'next_text' => __('Next'),
                'type' => 'array',
                'end_size' => 1,
                'mid_size' => 1,
            ));
            if ($pagination) {
                echo '<ul class="pagination flex space-x-2">';
                foreach ($pagination as $page) {
                    if (strpos($page, 'current') !== false) {
                        $page = str_replace('page-numbers current', 'page-numbers current bg-blue-600 text-white rounded px-4 py-2', $page);
                    } else {
                        $page = str_replace('page-numbers', 'page-numbers bg-white text-blue-600 border border-blue-600 rounded px-4 py-2 hover:bg-blue-600 hover:text-white transition', $page);
                    }
                    echo '<li>' . $page . '</li>';
                }
                echo '</ul>';
            }
            ?>
        </div>
        <style>
        .pagination .page-numbers {
            font-weight: 500;
            margin: 0 2px;
            transition: background 0.2s, color 0.2s;
        }
        .pagination .page-numbers.current {
            background: #2563eb;
            color: #fff;
            border: none;
        }
        .pagination .page-numbers:hover:not(.current) {
            background: #2563eb;
            color: #fff;
        }
        </style>

        <!-- Newsletter Subscription -->
        <div class="bg-blue-50 rounded-xl p-8 mb-12">
            <div class="max-w-3xl mx-auto text-center">
                <h3 class="headline-font text-2xl font-bold text-gray-900 mb-4">Stay Updated with Our Newsletter</h3>
                <p class="text-gray-600 mb-6">Get the latest news delivered directly to your inbox. No spam, ever.</p>
                <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300">Subscribe</button>
                </div>
            </div>
        </div>

        <!-- Trending Now Section -->
        <div class="mb-12">
            <h2 class="headline-font text-2xl font-bold mb-6 pb-2 border-b border-gray-200">Trending Now</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php
                $trending = new WP_Query([
                    'posts_per_page' => 4,
                    'post_status' => 'publish',
                    'orderby' => 'comment_count',
                    'order' => 'DESC'
                ]);
                $trend_count = 1;
                if ($trending->have_posts()):
                    while ($trending->have_posts()): $trending->the_post();
                        $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://source.unsplash.com/random/600x400/?trending' . $trend_count;
                ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative h-40 overflow-hidden">
                        <img src="<?php echo esc_url($featured_img); ?>" alt="Trending" class="w-full h-full object-cover">
                        <span class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent h-16"></span>
                        <span class="absolute bottom-3 left-3 text-white font-bold text-sm">#<?php echo $trend_count; ?> Trending</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                    </div>
                </div>
                <?php $trend_count++; endwhile; wp_reset_postdata(); else: ?>
                    <p>No trending posts found.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>