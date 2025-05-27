<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php wp_head(); ?>
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
        
        .category-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            z-index: 10;
        }
        
        .pagination .active {
            background-color: #2563eb;
            color: white;
        }
        .sasa{
  background-image: url('<?php echo esc_url( get_header_image() ); ?>');background-position: center;}
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body <?php body_class('bg-gray-50'); ?>>
<?php wp_body_open(); ?>
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
                    <?php
                    // Query the latest 6 published posts for the ticker
                    $breaking_news = new WP_Query([
                        'posts_per_page' => 15,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ]);
                    if ($breaking_news->have_posts()) :
                        while ($breaking_news->have_posts()) : $breaking_news->the_post(); ?>
                            <span class="mr-8">
                                <a href="<?php the_permalink(); ?>" class="hover:underline text-white"><?php the_title(); ?></a>
                            </span>
                        <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <span>No breaking news at the moment.</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <!-- Header -->
    <header class="sasa text-white">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h1 class="headline-font text-4xl font-bold">INSIGHT</h1>
                    <p class="text-sm opacity-80">Your Window to the World</p>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="relative">
                        <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <input type="text" name="s" placeholder="Search for news..." class="w-full py-2 px-4 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button class="absolute right-0 top-0 h-full px-4 text-gray-600 hover:text-blue-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
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
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Home</a>
                    <?php asda() ?>
                    <a href="<?php echo esc_url(home_url('/news')); ?>" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">All News</a>
                </div>
                <button class="md:hidden py-4 px-3">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>
    <script>
    function setTheme(theme, redirectUrl) {
        if (theme) {
            document.cookie = "preferred_theme=" + theme + "; path=/";
        }
        window.location.href = redirectUrl;
    }
    </script>
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