<?php
get_header(); ?>
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
                <?php
                $category = get_the_category();
                if ($category && isset($category[0])): ?>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2"><?php echo esc_html($category[0]->name); ?></a>
                    </div>
                </li>
                <?php endif; ?>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="ml-1 text-sm font-medium text-blue-600 md:ml-2"><?php the_title(); ?></span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <?php while ( have_posts() ) : the_post(); ?>
    <!-- Article Header -->
    <div class="mb-8">
        <?php if ($category && isset($category[0])): ?>
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full"><?php echo esc_html($category[0]->name); ?></span>
        <?php endif; ?>
        <h1 class="headline-font text-3xl md:text-4xl font-bold text-gray-900 mt-4 mb-2"><?php the_title(); ?></h1>
        <div class="flex items-center mt-6">
            <?php echo get_avatar(get_the_author_meta('ID'), 60, '', 'Author', ['class' => 'w-10 h-10 rounded-full mr-3']); ?>
            <div>
                <p class="text-sm font-medium text-gray-900"><?php the_author(); ?></p>
                <div class="flex items-center text-xs text-gray-500">
                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                    <span class="mx-2">•</span>
                    <span><?php echo do_shortcode('[rt_reading_time]'); ?></span>
                    <span class="mx-2">•</span>
                    <span><i class="fas fa-eye mr-1"></i> <?php if(function_exists('the_views')) { the_views(); } ?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Main Content Column -->
        <article class="lg:col-span-8 content">
            <div class="entry-content bg-white rounded-xl shadow-md p-6 mb-8">
                <?php the_content(); ?>
            </div>

            <!-- Tags -->
            <?php $post_tags = get_the_tags(); if ($post_tags): ?>
            <div class="mb-8">
                <h3 class="font-bold text-lg mb-3">Tags:</h3>
                <div class="flex flex-wrap gap-2">
                    <?php foreach($post_tags as $tag): ?>
                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm px-3 py-1 rounded-full"><?php echo esc_html($tag->name); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </article>

        <!-- Sidebar Column -->
        <aside class="lg:col-span-4">
            <!-- Related Articles -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <h3 class="font-bold text-xl mb-4">Related Articles</h3>
                <div class="space-y-4">
                    <?php
                    $related = new WP_Query([
                        'category__in' => wp_get_post_categories(get_the_ID()),
                        'post__not_in' => [get_the_ID()],
                        'posts_per_page' => 4,
                        'ignore_sticky_posts' => 1
                    ]);
                    if($related->have_posts()):
                        while($related->have_posts()): $related->the_post(); ?>
                            <div class="flex items-start">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" alt="Related" class="w-16 h-16 rounded-lg mr-3">
                                <?php else: ?>
                                    <img src="https://source.unsplash.com/random/80x80/?tech" alt="Related" class="w-16 h-16 rounded-lg mr-3">
                                <?php endif; ?>
                                <div>
                                    <h4 class="font-medium text-gray-900 hover:text-blue-600"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p class="text-xs text-gray-500"><?php echo get_the_date(); ?></p>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); else: ?>
                        <p>No related articles found.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Trending Now -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-bold text-xl mb-4">Trending in Technology</h3>
                <div class="space-y-4">
                    <?php
                    $trending = new WP_Query([
                        'category_name' => 'technology',
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
                            </div>
                    <?php $trend_count++; endwhile; wp_reset_postdata(); else: ?>
                        <p>No trending posts found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </aside>
    </div>

    <!-- More From Category -->
    <div class="mb-12">
        <h2 class="headline-font text-2xl font-bold mb-6 pb-2 border-b border-gray-200">More</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $more_args = array(
                'post__not_in' => array(get_the_ID()),
                'posts_per_page' => 4,
                'ignore_sticky_posts' => 1
            );
            if (is_array($category) && isset($category[0]) && is_object($category[0]) && isset($category[0]->term_id)) {
                $more_args['category__in'] = array($category[0]->term_id);
            } else {
                $more_args['category__in'] = array(); // empty array, will return no posts
            }
            $more_query = new WP_Query($more_args);
            if($more_query->have_posts()):
                while($more_query->have_posts()): $more_query->the_post(); ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-40 object-cover">
                        <?php else: ?>
                            <img src="https://source.unsplash.com/random/600x400/?<?php echo (is_array($category) && isset($category[0]) && is_object($category[0]) && isset($category[0]->slug)) ? esc_attr($category[0]->slug) : 'news'; ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-40 object-cover">
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
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
