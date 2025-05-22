<?php
/*
Template Name: Simpson Page
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insight - Your Trusted News Source</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    </style>
</head>
<body class="bg-gray-50">
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
                <span class="mr-8">Russia-Ukraine peace talks show progress as ceasefire negotiations continue</span>
                <span class="mr-8">Stock markets rally as inflation fears ease globally</span>
                <span class="mr-8">Major tech company announces revolutionary AI breakthrough</span>
                <span>Climate change summit reaches historic agreement on emissions</span>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="gradient-bg text-white">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h1 class="headline-font text-4xl font-bold">INSIGHT</h1>
                    <p class="text-sm opacity-80">Your Window to the World</p>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="relative">
                        <input type="text" placeholder="Search for news..." class="w-full py-2 px-4 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="absolute right-0 top-0 h-full px-4 text-gray-600 hover:text-blue-600">
                            <i class="fas fa-search"></i>
                        </button>
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
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Home</a>
                    
                    <div class="dropdown relative">
                        <button class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600 flex items-center">
                            World <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div class="dropdown-menu absolute hidden bg-white shadow-lg rounded-md mt-1 w-48">
                            <a href="#" class="block px-4 py-2 hover:bg-blue-50">Europe</a>
                            <a href="#" class="block px-4 py-2 hover:bg-blue-50">Americas</a>
                            <a href="#" class="block px-4 py-2 hover:bg-blue-50">Asia</a>
                            <a href="#" class="block px-4 py-2 hover:bg-blue-50">Africa</a>
                            <a href="#" class="block px-4 py-2 hover:bg-blue-50">Middle East</a>
                        </div>
                    </div>
                    
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Politics</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Business</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Technology</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Science</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Health</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Entertainment</a>
                    <a href="#" class="py-4 px-3 font-medium hover:bg-blue-50 hover:text-blue-600">Sports</a>
                </div>
                <button class="md:hidden py-4 px-3">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Featured Story -->
        <div class="mb-12">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-2/3">
                        <div class="h-full overflow-hidden">
                            <img src="https://source.unsplash.com/random/1200x600/?world" alt="Featured News" class="w-full h-full object-cover news-image">
                        </div>
                    </div>
                    <div class="p-8 md:w-1/3">
                        <div class="uppercase tracking-wide text-sm text-blue-600 font-semibold mb-1">World News</div>
                        <h2 class="headline-font text-3xl font-bold text-gray-900 mb-4">Global Leaders Gather for Climate Summit Amid Rising Concerns</h2>
                        <p class="mt-2 text-gray-600">World leaders are meeting in Geneva this week to address the growing climate crisis as new data shows record temperatures across multiple continents. The summit aims to establish binding agreements on carbon emissions.</p>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="https://source.unsplash.com/random/100x100/?reporter" alt="Reporter">
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Sarah Johnson</p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2023-05-16">May 16, 2023</time>
                                    <span aria-hidden="true">&middot;</span>
                                    <span>5 min read</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                                Read Full Story
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- News Grid -->
        <div class="mb-12">
            <h2 class="headline-font text-2xl font-bold mb-6 pb-2 border-b border-gray-200">Latest Updates</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- News Card 1 -->
                <div class="news-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://source.unsplash.com/random/600x400/?politics" alt="News" class="w-full h-full object-cover news-image">
                        <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">BREAKING</div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center text-xs text-gray-500 mb-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded mr-2">Politics</span>
                            <span>2 hours ago</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2">Parliament Approves Controversial Reform Bill After Marathon Session</h3>
                        <p class="text-gray-600 text-sm">The legislation passed with a narrow majority after intense debate that lasted through the night, sparking protests outside government buildings.</p>
                        <div class="mt-4 flex justify-between items-center">
                            <div class="flex items-center">
                                <img src="https://source.unsplash.com/random/30x30/?reporter" alt="Reporter" class="w-6 h-6 rounded-full mr-2">
                                <span class="text-xs text-gray-600">James Wilson</span>
                            </div>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More →</button>
                        </div>
                    </div>
                </div>

                <!-- News Card 2 -->
                <div class="news-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://source.unsplash.com/random/600x400/?technology" alt="News" class="w-full h-full object-cover news-image">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center text-xs text-gray-500 mb-2">
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded mr-2">Technology</span>
                            <span>5 hours ago</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2">New AI Model Can Predict Weather Patterns With 95% Accuracy</h3>
                        <p class="text-gray-600 text-sm">Researchers have developed an artificial intelligence system that outperforms traditional forecasting methods, potentially revolutionizing disaster preparedness.</p>
                        <div class="mt-4 flex justify-between items-center">
                            <div class="flex items-center">
                                <img src="https://source.unsplash.com/random/30x30/?scientist" alt="Reporter" class="w-6 h-6 rounded-full mr-2">
                                <span class="text-xs text-gray-600">Dr. Emily Chen</span>
                            </div>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More →</button>
                        </div>
                    </div>
                </div>

                <!-- News Card 3 -->
                <div class="news-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://source.unsplash.com/random/600x400/?economy" alt="News" class="w-full h-full object-cover news-image">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center text-xs text-gray-500 mb-2">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded mr-2">Business</span>
                            <span>8 hours ago</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2">Central Banks Coordinate Interest Rate Cuts to Stimulate Global Economy</h3>
                        <p class="text-gray-600 text-sm">In a rare synchronized move, major economies have announced reductions in borrowing costs to counter slowing growth and market volatility.</p>
                        <div class="mt-4 flex justify-between items-center">
                            <div class="flex items-center">
                                <img src="https://source.unsplash.com/random/30x30/?journalist" alt="Reporter" class="w-6 h-6 rounded-full mr-2">
                                <span class="text-xs text-gray-600">Michael Rodriguez</span>
                            </div>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More →</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- More News Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- World News Section -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-blue-600 text-white px-4 py-3">
                    <h3 class="font-bold flex items-center">
                        <i class="fas fa-globe mr-2"></i> World News
                    </h3>
                </div>
                <div class="p-4">
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">UN Security Council to Hold Emergency Meeting on Middle East Tensions</h4>
                        <p class="text-sm text-gray-600 mt-1">Diplomatic sources indicate growing concern over recent escalations in the region.</p>
                    </div>
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">Record Heatwave Sweeps Across Southern Europe</h4>
                        <p class="text-sm text-gray-600 mt-1">Temperatures exceed 40°C in multiple countries, straining energy grids.</p>
                    </div>
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">African Union Announces New Trade Agreement</h4>
                        <p class="text-sm text-gray-600 mt-1">The pact aims to boost intra-continental commerce by reducing tariffs.</p>
                    </div>
                    <div class="pt-2">
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All World News →</a>
                    </div>
                </div>
            </div>

            <!-- Business News Section -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-green-600 text-white px-4 py-3">
                    <h3 class="font-bold flex items-center">
                        <i class="fas fa-chart-line mr-2"></i> Business & Finance
                    </h3>
                </div>
                <div class="p-4">
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">Tech Giant Reports Record Quarterly Profits</h4>
                        <p class="text-sm text-gray-600 mt-1">Shares surge 8% in after-hours trading following earnings announcement.</p>
                    </div>
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">Cryptocurrency Markets Rebound After Recent Slump</h4>
                        <p class="text-sm text-gray-600 mt-1">Bitcoin climbs back above $30,000 as investor sentiment improves.</p>
                    </div>
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">Automakers Invest Billions in Electric Vehicle Production</h4>
                        <p class="text-sm text-gray-600 mt-1">New factories planned as demand for EVs continues to grow globally.</p>
                    </div>
                    <div class="pt-2">
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All Business News →</a>
                    </div>
                </div>
            </div>

            <!-- Technology News Section -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-purple-600 text-white px-4 py-3">
                    <h3 class="font-bold flex items-center">
                        <i class="fas fa-microchip mr-2"></i> Technology
                    </h3>
                </div>
                <div class="p-4">
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">New Smartphone Features Breakthrough Camera Technology</h4>
                        <p class="text-sm text-gray-600 mt-1">Low-light performance rivals professional DSLR cameras in early tests.</p>
                    </div>
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">Social Media Platform Announces Major Algorithm Changes</h4>
                        <p class="text-sm text-gray-600 mt-1">Update aims to prioritize original content over reposted material.</p>
                    </div>
                    <div class="border-b border-gray-100 pb-3 mb-3">
                        <h4 class="font-semibold text-gray-800 hover:text-blue-600 cursor-pointer">Cybersecurity Experts Warn of New Phishing Tactics</h4>
                        <p class="text-sm text-gray-600 mt-1">Sophisticated attacks targeting corporate email systems on the rise.</p>
                    </div>
                    <div class="pt-2">
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All Tech News →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Section -->
        <div class="mb-12">
            <h2 class="headline-font text-2xl font-bold mb-6 pb-2 border-b border-gray-200">Featured Videos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Video 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative pb-[56.25%] overflow-hidden">
                        <img src="https://source.unsplash.com/random/600x400/?news" alt="Video" class="absolute w-full h-full object-cover">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <button class="bg-red-600 text-white rounded-full w-14 h-14 flex items-center justify-center hover:bg-red-700 transition duration-300">
                                <i class="fas fa-play text-xl"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">3:45</div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">Exclusive: Inside the Refugee Camps at the Border</h3>
                        <p class="text-gray-600 text-sm">Our correspondent reports from the ground on the humanitarian situation.</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs text-gray-500">1.2M views • 2 days ago</span>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Watch Now →</button>
                        </div>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative pb-[56.25%] overflow-hidden">
                        <img src="https://source.unsplash.com/random/600x400/?interview" alt="Video" class="absolute w-full h-full object-cover">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <button class="bg-red-600 text-white rounded-full w-14 h-14 flex items-center justify-center hover:bg-red-700 transition duration-300">
                                <i class="fas fa-play text-xl"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">8:12</div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">Interview: CEO Discusses Company's Future Plans</h3>
                        <p class="text-gray-600 text-sm">The executive reveals upcoming products and expansion strategies.</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs text-gray-500">856K views • 3 days ago</span>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Watch Now →</button>
                        </div>
                    </div>
                </div>

                <!-- Video 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative pb-[56.25%] overflow-hidden">
                        <img src="https://source.unsplash.com/random/600x400/?science" alt="Video" class="absolute w-full h-full object-cover">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <button class="bg-red-600 text-white rounded-full w-14 h-14 flex items-center justify-center hover:bg-red-700 transition duration-300">
                                <i class="fas fa-play text-xl"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">5:30</div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">How New Medical Breakthrough Could Save Thousands</h3>
                        <p class="text-gray-600 text-sm">Scientists explain the innovative treatment showing promising results.</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs text-gray-500">1.5M views • 1 day ago</span>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Watch Now →</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter Subscription -->
        <div class="bg-blue-50 rounded-xl p-8 mb-12">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="headline-font text-2xl font-bold mb-2">Stay Informed with Our Newsletter</h2>
                <p class="text-gray-600 mb-6">Get the day's top stories delivered straight to your inbox every morning.</p>
                <div class="flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input type="email" placeholder="Your email address" class="flex-grow px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 whitespace-nowrap">
                        Subscribe
                    </button>
                </div>
                <p class="text-xs text-gray-500 mt-3">We respect your privacy. Unsubscribe at any time.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- Column 1 -->
                <div>
                    <h3 class="headline-font text-xl font-bold mb-4">INSIGHT</h3>
                    <p class="text-gray-400 mb-4">Delivering accurate, unbiased news from around the globe since 1995.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="font-bold text-lg mb-4"><?php _e('Categories', 'textdomain'); ?></h4>
                    <ul class="space-y-2">
                        <?php
                        $categories = get_categories(array(
                            'orderby' => 'name',
                            'number' => 5,
                        ));
                        foreach ($categories as $category) {
                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>

                <!-- Quick links-->
                <div>
                    <h4 class="font-bold text-lg mb-4"><?php _e('Quick Links', 'textdomain'); ?></h4>
                    <ul class="space-y-2" >
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'wp_devs_footer_menu',
                            'container'      => false,
                            'menu_class'     => 'footer-menu',
                            'depth'          => 1,
                            'fallback_cb'    => false
                        ));
                        ?>
                    </ul>
                </div>

                <!-- Column 4 -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="http://localhost/wordpress/terms-of-service/" class="text-gray-400 hover:text-white">Terms of Service</a></li>
                        <li><a href="http://localhost/wordpress/privacy-policy/" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                        <li><a href="http://localhost/wordpress/cookie-policy/" class="text-gray-400 hover:text-white">Cookie Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">GDPR Compliance</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2023 Insight News Network. All rights reserved.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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
</body>
</html>