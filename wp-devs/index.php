<?php get_header(); ?>
<?php 
if ( ! is_child_theme() && get_header_image() ) : 
?>
    <div class="custom-header-wrapper">
        <img src="<?php echo get_header_image(); ?>" alt="Header Image" style="width: 100%;object-fit: fill;">
    </div>

<?php 
endif; 
?>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <h1>News</h1>
                    <div class="container">
                        <div class="blog-items">
                            <?php 
                                if( have_posts() ):
                                    while( have_posts() ) : the_post();
                                    get_template_part( 'parts/content' );
                                    endwhile;
                                    ?>
                                        <div class="wpdevs-pagination">
                                            <div class="pages new">
                                                <?php previous_posts_link( "<< Newer posts" ); ?>
                                            </div>
                                            <div class="pages old">
                                                <?php next_posts_link( "Older posts >>" ); ?>
                                            </div>
                                        </div>
                                    <?php
                                else: ?>
                                    <p>Nothing yet to be displayed!</p>
                            <?php endif; ?>                                
                        </div>
                        <?php get_sidebar(); ?>
                    </div>
                </main>
            </div>
        </div>
<?php get_footer(); ?>