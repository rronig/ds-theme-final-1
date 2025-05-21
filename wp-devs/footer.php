<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-grid">

      <!-- Site Info -->
      <div class="footer-section">
        <h3 class="footer-title"><?php bloginfo('name'); ?></h3>
        <p class="footer-description">
          <?php echo esc_html(get_theme_mod('footer_description', 'Sharing knowledge, inspiring creativity, and connecting communities through quality content.')); ?>
        </p>
      </div>

      <!-- Quick Links -->
      <div class="footer-section">
        <h4 class="footer-subtitle"><?php _e('Quick Links', 'textdomain'); ?></h4>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'wp_devs_footer_menu',
            'container'      => false,
            'menu_class'     => 'footer-menu',
            'depth'          => 1,
            'fallback_cb'    => false
        ));
        ?>
      </div>

      <!-- Categories -->
      <div class="footer-section">
        <h4 class="footer-subtitle"><?php _e('Categories', 'textdomain'); ?></h4>
        <ul class="footer-menu">
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

      <!-- Social & Contact -->
      <div class="footer-section">
        <h4 class="footer-subtitle"><?php _e('Connect', 'textdomain'); ?></h4>
        <div class="social-links">
          <?php if (get_theme_mod('social_facebook')) : ?>
            <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" aria-label="Facebook" class="social-icon facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
          <?php endif; ?>
          <?php if (get_theme_mod('social_twitter')) : ?>
            <a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" aria-label="Twitter" class="social-icon twitter">
              <i class="fab fa-twitter"></i>
            </a>
          <?php endif; ?>
          <?php if (get_theme_mod('social_instagram')) : ?>
            <a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" aria-label="Instagram" class="social-icon instagram">
              <i class="fab fa-instagram"></i>
            </a>
          <?php endif; ?>
          <?php if (get_theme_mod('social_youtube')) : ?>
            <a href="<?php echo esc_url(get_theme_mod('social_youtube')); ?>" aria-label="YouTube" class="social-icon youtube">
              <i class="fab fa-youtube"></i>
            </a>
          <?php endif; ?>
        </div>
        <p class="contact-email"><?php echo esc_html(get_theme_mod('contact_email', 'contact@example.com')); ?></p>
      </div>

    </div>

    <div class="footer-bottom">
      <p class="copyright">
        <?php echo esc_html(get_theme_mod('footer_copyright', '© ' . date('Y') . ' ' . get_bloginfo('name') . '. All rights reserved.')); ?>
      </p>
      <div class="footer-links">
        <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php _e('Privacy Policy', 'textdomain'); ?></a>
        <a href="<?php echo esc_url(home_url('/terms')); ?>"><?php _e('Terms of Service', 'textdomain'); ?></a>
      </div>
    </div>
  </div>

  <style>
    
    /* Footer background and text */
    .site-footer {
      backdrop-filter: blur(10px);          /* blur behind the element */
      -webkit-backdrop-filter: blur(10px);  /* Safari support */
      border: 1px solid rgba(21, 25, 33, 0.8); /* subtle border for depth */
      background-color:rgba(26, 32, 44, 0.5); /* dark gray */
      color: #e2e8f0; /* light gray */
      padding: 4rem 1.5rem 3rem;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    }
    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
    }

    /* Grid layout */
    .footer-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 2.5rem;
    }
    @media (min-width: 768px) {
      .footer-grid {
        grid-template-columns: repeat(4, 1fr);
      }
    }

    /* Sections */
    .footer-section {
      /* spacing inside each section */
    }

    /* Titles */
    .footer-title {
      font-size: 2rem;
      font-weight: 800;
      margin-bottom: 1.25rem;
    }
    .footer-subtitle {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
    }

    /* Paragraph */
    .footer-description {
      color: #a0aec0; /* lighter gray */
      line-height: 1.6;
      max-width: 320px;
    }

    /* Menus */
    .footer-menu {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .footer-menu li {
      margin-bottom: 0.75rem;
    }
    .footer-menu li a {
      color: #a0aec0;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .footer-menu li a:hover,
    .footer-menu li a:focus {
      color: #ffffff;
      outline: none;
    }

    /* Social icons container */
    .social-links {
      display: flex;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    /* Social icons base style */
    .social-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background-color: #2d3748; /* slightly lighter than bg */
      color: #a0aec0;
      text-decoration: none;
      font-size: 1.25rem;
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    .social-icon:hover,
    .social-icon:focus {
      color: #fff;
      outline: none;
    }
    .social-icon.facebook:hover {
      background-color: #3b5998;
    }
    .social-icon.twitter:hover {
      background-color: #1da1f2;
    }
    .social-icon.instagram:hover {
      background-color: #e1306c;
    }
    .social-icon.youtube:hover {
      background-color: #ff0000;
    }

    /* Contact email */
    .contact-email {
      color: #a0aec0;
      font-family: monospace, monospace;
      font-size: 0.9rem;
    }

    /* Footer bottom bar */
    .footer-bottom {
      border-top: 1px solid #2d3748;
      margin-top: 3.5rem;
      padding-top: 2rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 0.875rem;
      color: #718096;
      gap: 1rem;
    }
    @media (min-width: 768px) {
      .footer-bottom {
        flex-direction: row;
        justify-content: space-between;
      }
    }

    /* Footer bottom links */
    .footer-links a {
      color: #718096;
      text-decoration: none;
      margin-left: 1.5rem;
      transition: color 0.3s ease;
    }
    .footer-links a:first-child {
      margin-left: 0;
    }
    .footer-links a:hover,
    .footer-links a:focus {
      color: #e2e8f0;
      outline: none;
    }
    .container .page-item article{margin-bottom:75px;}
  </style>
</footer>


    </div>
    <?php wp_footer(); ?>
</body>
</html>