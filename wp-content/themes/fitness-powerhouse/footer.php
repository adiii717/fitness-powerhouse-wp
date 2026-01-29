</main><!-- #main-content -->

<footer class="footer-sub-section">
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo FPH_URI; ?>/assets/images/logo.svg" alt="<?php bloginfo('name'); ?>" width="200" onerror="this.outerHTML='<span style=\'font-weight:800;font-size:24px;color:#fff;\'>FITNESS<br><small style=\'color:#ec1c24;font-size:12px;letter-spacing:3px;\'>POWERHOUSE</small></span>'">
                </a>
                <p class="mt-4 has-text-light" style="opacity:0.8;font-size:14px;">
                    <?php esc_html_e('Your one-stop destination for premium gym & sports equipment. 200+ brands, free delivery, and genuine warranty on all products.', 'fitness-powerhouse'); ?>
                </p>
                <div class="social-links mt-4">
                    <a href="#" class="mr-3"><span class="ti-facebook" style="color:#fff;font-size:20px;"></span></a>
                    <a href="#" class="mr-3"><span class="ti-instagram" style="color:#fff;font-size:20px;"></span></a>
                    <a href="#" class="mr-3"><span class="ti-twitter" style="color:#fff;font-size:20px;"></span></a>
                    <a href="#" class="mr-3"><span class="ti-youtube" style="color:#fff;font-size:20px;"></span></a>
                </div>
            </div>

            <div class="column is-2">
                <h4 class="has-text-light has-text-weight-bold mb-4"><?php esc_html_e('Quick Links', 'fitness-powerhouse'); ?></h4>
                <ul class="menu-list">
                    <li><a href="#"><?php esc_html_e('About Us', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Contact Us', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Store Locations', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Track Order', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Blog', 'fitness-powerhouse'); ?></a></li>
                </ul>
            </div>

            <div class="column is-2">
                <h4 class="has-text-light has-text-weight-bold mb-4"><?php esc_html_e('Categories', 'fitness-powerhouse'); ?></h4>
                <ul class="menu-list">
                    <li><a href="#"><?php esc_html_e('Cardio Equipment', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Strength Training', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Weights & Bars', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Game Tables', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Yoga & Pilates', 'fitness-powerhouse'); ?></a></li>
                </ul>
            </div>

            <div class="column is-2">
                <h4 class="has-text-light has-text-weight-bold mb-4"><?php esc_html_e('Customer Service', 'fitness-powerhouse'); ?></h4>
                <ul class="menu-list">
                    <li><a href="#"><?php esc_html_e('FAQ', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Shipping Policy', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Return Policy', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Privacy Policy', 'fitness-powerhouse'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Terms & Conditions', 'fitness-powerhouse'); ?></a></li>
                </ul>
            </div>

            <div class="column is-3">
                <h4 class="has-text-light has-text-weight-bold mb-4"><?php esc_html_e('Newsletter', 'fitness-powerhouse'); ?></h4>
                <p class="has-text-light mb-3" style="opacity:0.8;font-size:14px;"><?php esc_html_e('Subscribe to get special offers and updates.', 'fitness-powerhouse'); ?></p>
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input class="input" type="email" placeholder="<?php esc_attr_e('Your email address', 'fitness-powerhouse'); ?>">
                    </div>
                    <div class="control">
                        <button class="button is-warning has-text-weight-bold"><?php esc_html_e('Subscribe', 'fitness-powerhouse'); ?></button>
                    </div>
                </div>
                <p class="mt-4 has-text-light has-text-weight-bold"><?php esc_html_e('We Accept', 'fitness-powerhouse'); ?></p>
                <div class="payment-icons mt-2">
                    <span class="tag is-white mr-1">Visa</span>
                    <span class="tag is-white mr-1">Mastercard</span>
                    <span class="tag is-white mr-1">Amex</span>
                </div>
            </div>
        </div>

        <hr style="background-color:#333;">

        <div class="has-text-centered has-text-light" style="opacity:0.7;font-size:13px;">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'fitness-powerhouse'); ?></p>
        </div>
    </div>
</footer>

<!-- WhatsApp Float Button -->
<div class="floating-container">
    <a href="https://wa.me/<?php echo esc_attr(fph_get_option('fph_whatsapp_number', '971508429475')); ?>" class="floating-button" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo FPH_URI; ?>/assets/images/icons/whatsapp.svg" width="24" alt="WhatsApp">
        <span><?php esc_html_e('Chat Support?', 'fitness-powerhouse'); ?></span>
    </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
