<?php get_header(); ?>

<?php 
if ( ! is_child_theme() && get_header_image() ) : 
?>
    <div class="custom-header-wrapper">
        <img src="<?php header_image(); ?>" alt="Header Image">
    </div>
<?php 
endif; 
?>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="container">
                        <div class="page-item">
                            <?php 
                                while( have_posts() ) : the_post();
                                get_template_part( 'parts/content', 'page' );

                                if( comments_open() || get_comments_number() ){
                                    comments_template();
                                }
                                endwhile;
                            ?>                                
                        </div>
                    </div>
                </main>
            </div>
        </div>
<?php get_footer(); ?>