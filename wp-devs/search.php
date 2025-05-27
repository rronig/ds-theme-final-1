<?php get_header(); ?>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Breadcrumbs -->
        <div class="mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm font-medium text-blue-600 md:ml-2">Search Results</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Search Header -->
        <div class="mb-8">
            <h1 class="headline-font text-2xl md:text-3xl font-bold text-gray-900 mb-4">Search Results for <span class="text-blue-600">"<?php echo esc_html(get_search_query()); ?>"</span></h1>
            <p class="text-gray-600">
                <?php global $wp_query; printf(_n('About %s result', 'About %s results', $wp_query->found_posts, 'textdomain'), number_format_i18n($wp_query->found_posts)); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Main Content Column -->
            <div class="lg:col-span-8">
                <!-- Time Filter (now functional) -->
                <div class="bg-white rounded-xl shadow-md p-4 mb-6">
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="text-sm font-medium text-gray-700">Time:</span>
                        <?php
                        $filters = [
                            '' => 'Any time',
                            'hour' => 'Past hour',
                            'day' => 'Past 24 hours',
                            'week' => 'Past week',
                            'month' => 'Past month',
                            'year' => 'Past year',
                        ];
                        $current_time_filter = isset($_GET['time']) ? (string)$_GET['time'] : '';
                        foreach ($filters as $key => $label) {
                            $active = ($current_time_filter === $key || ($key === '' && $current_time_filter === '')) ? 'bg-blue-100 text-blue-700 font-semibold' : '';
                            if (function_exists('add_query_arg') && function_exists('remove_query_arg') && function_exists('esc_url') && function_exists('esc_html')) {
                                $url = ($key === '') ? remove_query_arg('time') : add_query_arg('time', $key);
                                echo '<a href="' . esc_url($url) . '" class="text-sm px-3 py-1 rounded-full hover:bg-gray-100 ' . $active . '">' . esc_html($label) . '</a>';
                            } else {
                                // Fallback: just print label
                                echo '<span class="text-sm px-3 py-1 rounded-full ' . $active . '">' . htmlspecialchars($label) . '</span>';
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- Search Results -->
                <div class="space-y-6">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition duration-300">
                            <div class="flex items-center mb-2">
                                <?php if (get_post_type() === 'post') : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ? esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')) : 'https://source.unsplash.com/random/40x40/?news'; ?>" alt="Source" class="w-5 h-5 rounded mr-2">
                                <?php else: ?>
                                    <img src="https://source.unsplash.com/random/40x40/?document" alt="Source" class="w-5 h-5 rounded mr-2">
                                <?php endif; ?>
                                <span class="text-xs text-gray-500"><?php echo esc_url(parse_url(get_permalink(), PHP_URL_HOST)); ?></span>
                                <span class="mx-2 text-gray-400">•</span>
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="text-xs text-blue-600 hover:underline">View</a>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="text-gray-700 mb-3"><?php echo get_the_excerpt(); ?></p>
                            <div class="flex items-center text-xs text-gray-500">
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                <?php if (get_post_type() === 'post') : ?>
                                    <span class="mx-2">•</span>
                                    <span><?php echo ceil(str_word_count(strip_tags(get_the_content())) / 200); ?> min read</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; else: ?>
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-2">No results found</h2>
                            <p class="text-gray-700">Sorry, no results matched your search. Please try different keywords.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-8">
                    <?php
                    global $wp_query;
                    $big = 999999999;
                    $pagination = paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $wp_query->max_num_pages,
                        'prev_text' => __('Previous'),
                        'next_text' => __('Next'),
                        'type' => 'array',
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
            </div>

            <!-- Sidebar Column -->
            <aside class="lg:col-span-4">
                <!-- Trending Now (dynamic) -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-xl mb-4">Trending Posts</h3>
                    <div class="space-y-4">
                        <?php
                        $trending = new WP_Query([
                            'posts_per_page' => 4,
                            'orderby' => 'comment_count',
                            'order' => 'DESC'
                        ]);
                        $trend_count = 1;
                        if($trending->have_posts()):
                            while($trending->have_posts()): $trending->the_post(); ?>
                                <div>
                                    <span class="text-xs font-semibold px-2 py-1 bg-gray-100 text-gray-800 rounded-full">#<?php echo $trend_count; ?></span>
                                    <h4 class="font-medium text-gray-900 hover:text-blue-600 mt-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p class="text-gray-700 text-sm mt-1"><?php echo get_the_excerpt(); ?></p>
                                </div>
                        <?php $trend_count++; endwhile; wp_reset_postdata(); else: ?>
                            <p>No trending posts found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>
        </div>
    </main>
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

        // Search filter toggle
        document.addEventListener('DOMContentLoaded', function() {
            const filters = document.querySelectorAll('.search-filter');
            
            filters.forEach(filter => {
                filter.addEventListener('click', function() {
                    filters.forEach(f => f.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

        // People Also Ask accordion
        document.addEventListener('DOMContentLoaded', function() {
            const questions = document.querySelectorAll('.border-b button');
            
            questions.forEach(question => {
                question.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    if (icon.classList.contains('fa-chevron-down')) {
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-up');
                    } else {
                        icon.classList.remove('fa-chevron-up');
                        icon.classList.add('fa-chevron-down');
                    }
                });
            });
        });
    </script>
    <?php get_footer(); ?>

<?php
// --- Time Filter Logic for Search ---
add_action('pre_get_posts', function($query) {
    if ($query->is_main_query() && !is_admin() && is_search() && isset($_GET['time']) && $_GET['time']) {
        $now = current_time('timestamp');
        $time_filter = $_GET['time'];
        $date_query = [];
        switch ($time_filter) {
            case 'hour':
                $date_query[] = [
                    'after' => date('Y-m-d H:i:s', $now - HOUR_IN_SECONDS),
                    'inclusive' => true,
                    'column' => 'post_date',
                ]; break;
            case 'day':
                $date_query[] = [
                    'after' => date('Y-m-d H:i:s', $now - DAY_IN_SECONDS),
                    'inclusive' => true,
                    'column' => 'post_date',
                ]; break;
            case 'week':
                $date_query[] = [
                    'after' => date('Y-m-d H:i:s', $now - WEEK_IN_SECONDS),
                    'inclusive' => true,
                    'column' => 'post_date',
                ]; break;
            case 'month':
                $date_query[] = [
                    'after' => date('Y-m-d H:i:s', strtotime('-1 month', $now)),
                    'inclusive' => true,
                    'column' => 'post_date',
                ]; break;
            case 'year':
                $date_query[] = [
                    'after' => date('Y-m-d H:i:s', strtotime('-1 year', $now)),
                    'inclusive' => true,
                    'column' => 'post_date',
                ]; break;
        }
        if (!empty($date_query)) {
            $query->set('date_query', $date_query);
        }
    }
});