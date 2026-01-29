</main><!-- #main-content -->

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <div class="footer-logo">
                    <span class="logo-text">FITNESS</span>
                    <span class="logo-accent">POWERHOUSE</span>
                </div>
                <p class="footer-desc">
                    <?php esc_html_e('Your one-stop destination for premium gym & sports equipment. 200+ brands, free delivery, and genuine warranty on all products.', 'fitness-powerhouse'); ?>
                </p>
                <?php fph_social_links(); ?>
            </div>

            <div class="footer-col">
                <h4><?php esc_html_e('Quick Links', 'fitness-powerhouse'); ?></h4>
                <?php
                if (has_nav_menu('footer-1')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer-1',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                } else {
                    ?>
                    <ul>
                        <li><a href="#"><?php esc_html_e('About Us', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Contact Us', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Store Locations', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Track Order', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Blog', 'fitness-powerhouse'); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <div class="footer-col">
                <h4><?php esc_html_e('Categories', 'fitness-powerhouse'); ?></h4>
                <?php
                if (has_nav_menu('footer-2')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer-2',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                } else {
                    ?>
                    <ul>
                        <li><a href="#"><?php esc_html_e('Cardio Equipment', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Strength Training', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Weights & Bars', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Game Tables', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Yoga & Pilates', 'fitness-powerhouse'); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <div class="footer-col">
                <h4><?php esc_html_e('Customer Service', 'fitness-powerhouse'); ?></h4>
                <?php
                if (has_nav_menu('footer-3')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer-3',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                } else {
                    ?>
                    <ul>
                        <li><a href="#"><?php esc_html_e('FAQ', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Shipping Policy', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Return Policy', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Privacy Policy', 'fitness-powerhouse'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Terms & Conditions', 'fitness-powerhouse'); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <div class="footer-col">
                <h4><?php esc_html_e('Newsletter', 'fitness-powerhouse'); ?></h4>
                <p><?php esc_html_e('Subscribe to get special offers and updates.', 'fitness-powerhouse'); ?></p>
                <form class="newsletter-form" method="post">
                    <input type="email" name="email" placeholder="<?php esc_attr_e('Your email address', 'fitness-powerhouse'); ?>" required>
                    <button type="submit"><?php esc_html_e('Subscribe', 'fitness-powerhouse'); ?></button>
                </form>
                <div class="payment-methods">
                    <img src="https://via.placeholder.com/50x30?text=Visa" alt="Visa">
                    <img src="https://via.placeholder.com/50x30?text=MC" alt="Mastercard">
                    <img src="https://via.placeholder.com/50x30?text=Amex" alt="Amex">
                    <img src="https://via.placeholder.com/50x30?text=Apple" alt="Apple Pay">
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'fitness-powerhouse'); ?></p>
        </div>
    </div>
</footer>

<?php fph_whatsapp_float(); ?>

<?php wp_footer(); ?>
</body>
</html>
