<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>.top-bar{margin:10px;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.5); /* semi-transparent white */
    backdrop-filter: blur(10px);          /* blur behind the element */
    -webkit-backdrop-filter: blur(10px);  /* Safari support */
    border: 1px solid rgba(255, 255, 255, 0.8); /* subtle border for depth */
    overflow: hidden;}</style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <div id="page" class="site">
        <header>
            <section class="top-bar">
                <div class="container">
                    <div class="logo text-2xl font-bold text-gray-800">
                        <?php 
                        if( has_custom_logo() ){
                            the_custom_logo();
                        }else{
                            ?>
                                <a href="<?php echo home_url( '/' ); ?>"><span><?php bloginfo( 'name' ); ?></span></a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php 
                    if( ! is_page( 'landing-page' )): ?>
                    <nav class="main-menu">
                        <button class="check-button">
                            <div class="menu-icon">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </button>
                        <?php wp_nav_menu( array( 'theme_location' => 'wp_devs_main_menu', 'depth' => 2 )); ?>
                    </nav>
                    <?php endif; ?>
                    <div class="searchbox">
                        <?php get_search_form(); ?>
                    </div>                    
                </div>
            </section>
        </header>