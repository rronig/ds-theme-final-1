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
                        <li><a href="terms-of-service" class="text-gray-400 hover:text-white">Terms of Service</a></li>
                        <li><a href="privacy-policy" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                        <li><a href="cookie-policy" class="text-gray-400 hover:text-white">Cookie Policy</a></li>
                        <li><a href="gdpr-compliance" class="text-gray-400 hover:text-white">GDPR Compliance</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2025 Insight News Network. All rights reserved.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>