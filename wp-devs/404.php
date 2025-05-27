<?php get_header(); ?>
<main class="container mx-auto px-4 py-8">
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
                        <span class="ml-1 text-sm font-medium text-blue-600 md:ml-2">404 Not Found</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8">
            <div class="bg-white rounded-xl shadow-md p-8 mb-8">
                <h1 class="headline-font text-3xl font-bold text-gray-900 mb-4">Page not found</h1>
                <p class="text-gray-700 mb-6">Unfortunately, the page you tried to reach does not exist on this site.</p>
                <div class="mb-6">
                    <p class="text-gray-600 mb-2">How about doing a search?</p>
                </div>
            </div>
        </div>
        <aside class="lg:col-span-4">
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
        <div class="mb-12 lg:col-span-12">
            <h2 class="headline-font text-2xl font-bold mb-6 pb-2 border-b border-gray-200">More</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php
                $more_args = array(
                    'post__not_in' => array(),
                    'posts_per_page' => 4,
                    'ignore_sticky_posts' => 1
                );
                $more_query = new WP_Query($more_args);
                if($more_query->have_posts()):
                    while($more_query->have_posts()): $more_query->the_post(); ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-40 object-cover">
                            <?php else: ?>
                                <img src="https://source.unsplash.com/random/600x400/?news" alt="<?php the_title_attribute(); ?>" class="w-full h-40 object-cover">
                            <?php endif; ?>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p class="text-xs text-gray-500"><?php echo get_the_date(); ?></p>
                            </div>
                        </div>
                <?php endwhile; wp_reset_postdata(); else: ?>
                    <p>No more articles found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>