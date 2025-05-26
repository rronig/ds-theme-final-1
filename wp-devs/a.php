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
                <!-- Search Filters (static UI, not functional) -->
                <div class="bg-white rounded-xl shadow-md p-4 mb-6">
                    <div class="flex flex-wrap gap-2">
                        <button class="search-filter active px-4 py-2 rounded-full text-sm font-medium transition-all">
                            <i class="fas fa-globe mr-1"></i> All Results
                        </button>
                        <button class="search-filter px-4 py-2 rounded-full text-sm font-medium transition-all">
                            <i class="fas fa-newspaper mr-1"></i> News
                        </button>
                        <button class="search-filter px-4 py-2 rounded-full text-sm font-medium transition-all">
                            <i class="fas fa-image mr-1"></i> Images
                        </button>
                        <button class="search-filter px-4 py-2 rounded-full text-sm font-medium transition-all">
                            <i class="fas fa-video mr-1"></i> Videos
                        </button>
                        <button class="search-filter px-4 py-2 rounded-full text-sm font-medium transition-all">
                            <i class="fas fa-map-marker-alt mr-1"></i> Local
                        </button>
                    </div>
                </div>

                <!-- Time Filter (static UI, not functional) -->
                <div class="bg-white rounded-xl shadow-md p-4 mb-6">
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="text-sm font-medium text-gray-700">Time:</span>
                        <button class="text-sm px-3 py-1 rounded-full hover:bg-gray-100">Any time</button>
                        <button class="text-sm px-3 py-1 rounded-full hover:bg-gray-100">Past hour</button>
                        <button class="text-sm px-3 py-1 rounded-full hover:bg-gray-100">Past 24 hours</button>
                        <button class="text-sm px-3 py-1 rounded-full hover:bg-gray-100">Past week</button>
                        <button class="text-sm px-3 py-1 rounded-full hover:bg-gray-100">Past month</button>
                        <button class="text-sm px-3 py-1 rounded-full hover:bg-gray-100">Past year</button>
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
                    the_posts_pagination([
                        'mid_size' => 2,
                        'prev_text' => __('<i class="fas fa-chevron-left"></i>'),
                        'next_text' => __('<i class="fas fa-chevron-right"></i>'),
                        'screen_reader_text' => ' '
                    ]);
                    ?>
                </div>
            </div>

            <!-- Sidebar Column -->
            <aside class="lg:col-span-4">
                <!-- Knowledge Panel (static) -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <div class="flex items-start mb-4">
                        <img src="https://source.unsplash.com/random/80x80/?ai" alt="AI" class="w-16 h-16 rounded-lg mr-4">
                        <div>
                            <h3 class="font-bold text-xl">Artificial Intelligence</h3>
                            <p class="text-sm text-gray-600">Field of study</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">Artificial intelligence is intelligence demonstrated by machines, as opposed to the natural intelligence displayed by animals including humans.</p>
                    <div class="space-y-3 text-sm">
                        <div>
                            <span class="font-medium text-gray-700">Also known as:</span>
                            <span class="text-gray-600 ml-2">AI</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Parent field:</span>
                            <span class="text-gray-600 ml-2">Computer Science</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Key people:</span>
                            <span class="text-gray-600 ml-2">Alan Turing, John McCarthy, Geoffrey Hinton</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <a href="#" class="text-blue-600 hover:underline text-sm font-medium">See more about AI <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Related Searches (static) -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <h3 class="font-bold text-xl mb-4">Related searches</h3>
                    <div class="space-y-3">
                        <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                            <i class="fas fa-search text-gray-400 mr-3 w-5"></i>
                            <span>Artificial intelligence examples</span>
                        </a>
                        <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                            <i class="fas fa-search text-gray-400 mr-3 w-5"></i>
                            <span>Artificial intelligence vs machine learning</span>
                        </a>
                        <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                            <i class="fas fa-search text-gray-400 mr-3 w-5"></i>
                            <span>Artificial intelligence companies</span>
                        </a>
                        <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                            <i class="fas fa-search text-gray-400 mr-3 w-5"></i>
                            <span>Artificial intelligence in healthcare</span>
                        </a>
                        <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                            <i class="fas fa-search text-gray-400 mr-3 w-5"></i>
                            <span>Artificial intelligence courses</span>
                        </a>
                        <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                            <i class="fas fa-search text-gray-400 mr-3 w-5"></i>
                            <span>Artificial intelligence definition</span>
                        </a>
                        <a href="#" class="flex items-center text-gray-700 hover:text-blue-600">
                            <i class="fas fa-search text-gray-400 mr-3 w-5"></i>
                            <span>Artificial intelligence stocks</span>
                        </a>
                    </div>
                </div>

                <!-- Trending Now (dynamic) -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-xl mb-4">Trending in Technology</h3>
                    <div class="space-y-4">
                        <?php
                        $trending = new WP_Query([
                            'category_name' => 'technology',
                            'posts_per_page' => 3,
                            'orderby' => 'comment_count',
                            'order' => 'DESC'
                        ]);
                        $trend_count = 1;
                        if($trending->have_posts()):
                            while($trending->have_posts()): $trending->the_post(); ?>
                                <div>
                                    <span class="text-xs font-semibold px-2 py-1 bg-gray-100 text-gray-800 rounded-full">#<?php echo $trend_count; ?></span>
                                    <h4 class="font-medium text-gray-900 hover:text-blue-600 mt-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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