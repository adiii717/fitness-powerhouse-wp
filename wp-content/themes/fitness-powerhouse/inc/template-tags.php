<?php
/**
 * Custom template tags for this theme
 *
 * @package Fitness_Power_House
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Display site logo
 */
function fph_site_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
            <span class="logo-text">FITNESS</span>
            <span class="logo-accent">POWERHOUSE</span>
        </a>
        <?php
    }
}

/**
 * Display benefits bar
 */
function fph_benefits_bar() {
    $benefits = array(
        array('icon' => 'truck', 'text' => __('Free Delivery', 'fitness-powerhouse')),
        array('icon' => 'home', 'text' => __('Free Home Trial*', 'fitness-powerhouse')),
        array('icon' => 'wrench', 'text' => __('Free Installation*', 'fitness-powerhouse')),
        array('icon' => 'credit-card', 'text' => __('Buy Now Pay Later', 'fitness-powerhouse')),
        array('icon' => 'shield', 'text' => __('Genuine Product Warranty', 'fitness-powerhouse')),
    );
    ?>
    <div class="benefits-bar">
        <div class="container">
            <div class="benefits-list">
                <?php foreach ($benefits as $benefit) : ?>
                    <div class="benefit-item">
                        <?php echo fph_get_svg_icon($benefit['icon']); ?>
                        <span><?php echo esc_html($benefit['text']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Display hero slider
 */
function fph_hero_slider() {
    $slides = array();

    for ($i = 1; $i <= 3; $i++) {
        $image = fph_get_option('fph_hero_image_' . $i, FPH_URI . '/assets/images/hero/hero-' . $i . '.jpg');
        $title = fph_get_option('fph_hero_title_' . $i, '');
        $subtitle = fph_get_option('fph_hero_subtitle_' . $i, '');
        $url = fph_get_option('fph_hero_url_' . $i, '#');

        if ($image) {
            $slides[] = array(
                'image'    => $image,
                'title'    => $title ?: __('New Year Sale', 'fitness-powerhouse'),
                'subtitle' => $subtitle ?: __('Up to 50% OFF on Premium Equipment', 'fitness-powerhouse'),
                'url'      => $url,
            );
        }
    }

    if (empty($slides)) {
        // Default slides if none configured
        $slides = array(
            array(
                'image'    => FPH_URI . '/assets/images/hero/hero-1.jpg',
                'title'    => __('New Year Sale', 'fitness-powerhouse'),
                'subtitle' => __('Up to 50% OFF on Premium Equipment', 'fitness-powerhouse'),
                'url'      => '#',
            ),
            array(
                'image'    => FPH_URI . '/assets/images/hero/hero-2.jpg',
                'title'    => __('Build Your Home Gym', 'fitness-powerhouse'),
                'subtitle' => __('Premium Equipment from 200+ Brands', 'fitness-powerhouse'),
                'url'      => '#',
            ),
            array(
                'image'    => FPH_URI . '/assets/images/hero/hero-3.jpg',
                'title'    => __('Cardio Equipment', 'fitness-powerhouse'),
                'subtitle' => __('Treadmills, Bikes & More', 'fitness-powerhouse'),
                'url'      => '#',
            ),
        );
    }
    ?>
    <section class="hero-section">
        <div class="hero-slider">
            <?php foreach ($slides as $index => $slide) : ?>
                <div class="hero-slide<?php echo $index === 0 ? ' active' : ''; ?>">
                    <img src="<?php echo esc_url($slide['image']); ?>" alt="<?php echo esc_attr($slide['title']); ?>">
                    <div class="slide-content">
                        <h2><?php echo esc_html($slide['title']); ?></h2>
                        <p><?php echo esc_html($slide['subtitle']); ?></p>
                        <a href="<?php echo esc_url($slide['url']); ?>" class="btn-primary"><?php esc_html_e('Shop Now', 'fitness-powerhouse'); ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="slider-btn prev"><?php echo fph_get_svg_icon('chevron-left'); ?></button>
        <button class="slider-btn next"><?php echo fph_get_svg_icon('chevron-right'); ?></button>
        <div class="slider-dots">
            <?php foreach ($slides as $index => $slide) : ?>
                <button class="dot<?php echo $index === 0 ? ' active' : ''; ?>" data-slide="<?php echo $index; ?>"></button>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

/**
 * Display category shortcuts
 */
function fph_category_shortcuts() {
    $categories = array(
        array('name' => __('Treadmills', 'fitness-powerhouse'), 'image' => 'treadmills.jpg', 'url' => '#'),
        array('name' => __('Exercise Bikes', 'fitness-powerhouse'), 'image' => 'exercise-bikes.jpg', 'url' => '#'),
        array('name' => __('Dumbbells', 'fitness-powerhouse'), 'image' => 'dumbbells.jpg', 'url' => '#'),
        array('name' => __('Weight Plates', 'fitness-powerhouse'), 'image' => 'weight-plates.jpg', 'url' => '#'),
        array('name' => __('Home Gym', 'fitness-powerhouse'), 'image' => 'home-gym.jpg', 'url' => '#'),
        array('name' => __('Yoga & Pilates', 'fitness-powerhouse'), 'image' => 'yoga.jpg', 'url' => '#'),
        array('name' => __('Game Tables', 'fitness-powerhouse'), 'image' => 'game-tables.jpg', 'url' => '#'),
        array('name' => __('Accessories', 'fitness-powerhouse'), 'image' => 'accessories.jpg', 'url' => '#'),
    );

    // If WooCommerce is active, get actual product categories
    if (class_exists('WooCommerce')) {
        $product_categories = get_terms(array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'number'     => 8,
            'orderby'    => 'count',
            'order'      => 'DESC',
        ));

        if (!is_wp_error($product_categories) && !empty($product_categories)) {
            $categories = array();
            foreach ($product_categories as $cat) {
                $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
                $image = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : FPH_URI . '/assets/images/categories/accessories.jpg';
                $categories[] = array(
                    'name'  => $cat->name,
                    'image' => $image,
                    'url'   => get_term_link($cat),
                );
            }
        }
    }
    ?>
    <section class="category-shortcuts">
        <div class="container">
            <div class="shortcuts-grid">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="shortcut-item">
                        <div class="shortcut-icon">
                            <?php
                            $image_url = is_array($category['image']) ? $category['image'] : (strpos($category['image'], 'http') === 0 ? $category['image'] : FPH_URI . '/assets/images/categories/' . $category['image']);
                            ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category['name']); ?>">
                        </div>
                        <span><?php echo esc_html($category['name']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Display products section
 */
function fph_products_section($title = '', $type = 'featured', $layout = 'slider') {
    if (empty($title)) {
        $title = __('Featured Products', 'fitness-powerhouse');
    }

    // Sample products if WooCommerce isn't active
    $products = array(
        array(
            'name'     => 'Commercial 2450 Treadmill',
            'brand'    => 'NordicTrack',
            'price'    => 'AED 8,999',
            'original' => 'AED 12,499',
            'image'    => 'treadmill.jpg',
            'badge'    => 'Sale',
        ),
        array(
            'name'     => 'SelectTech 552 Dumbbells',
            'brand'    => 'Bowflex',
            'price'    => 'AED 1,899',
            'original' => '',
            'image'    => 'dumbbells.jpg',
            'badge'    => '',
        ),
        array(
            'name'     => 'Bike+ Indoor Exercise Bike',
            'brand'    => 'Peloton',
            'price'    => 'AED 6,499',
            'original' => 'AED 9,299',
            'image'    => 'spinning-bike.jpg',
            'badge'    => '-30%',
            'badge_type' => 'sale',
        ),
        array(
            'name'     => 'Model D Indoor Rower',
            'brand'    => 'Concept2',
            'price'    => 'AED 4,299',
            'original' => '',
            'image'    => 'rowing-machine.jpg',
            'badge'    => '',
        ),
        array(
            'name'     => 'Competition Kettlebell Set',
            'brand'    => 'Rogue Fitness',
            'price'    => 'AED 899',
            'original' => '',
            'image'    => 'kettlebell.jpg',
            'badge'    => 'New',
            'badge_type' => 'new',
        ),
    );
    ?>
    <section class="products-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html($title); ?></h2>
                <a href="#" class="view-all">
                    <?php esc_html_e('View All', 'fitness-powerhouse'); ?>
                    <?php echo fph_get_svg_icon('arrow-right'); ?>
                </a>
            </div>
            <div class="products-<?php echo $layout === 'slider' ? 'slider' : 'grid'; ?>">
                <?php foreach ($products as $product) : ?>
                    <div class="product-card">
                        <?php if (!empty($product['badge'])) : ?>
                            <span class="product-badge <?php echo !empty($product['badge_type']) ? esc_attr($product['badge_type']) : ''; ?>">
                                <?php echo esc_html($product['badge']); ?>
                            </span>
                        <?php endif; ?>
                        <div class="product-image">
                            <img src="<?php echo esc_url(FPH_URI . '/assets/images/products/' . $product['image']); ?>" alt="<?php echo esc_attr($product['name']); ?>">
                            <div class="product-actions">
                                <button class="product-action-btn" title="<?php esc_attr_e('Add to Wishlist', 'fitness-powerhouse'); ?>">
                                    <?php echo fph_get_svg_icon('heart'); ?>
                                </button>
                                <button class="product-action-btn" title="<?php esc_attr_e('Quick View', 'fitness-powerhouse'); ?>">
                                    <?php echo fph_get_svg_icon('eye'); ?>
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-brand"><?php echo esc_html($product['brand']); ?></span>
                            <h3 class="product-title">
                                <a href="#"><?php echo esc_html($product['name']); ?></a>
                            </h3>
                            <div class="product-price">
                                <span class="sale-price"><?php echo esc_html($product['price']); ?></span>
                                <?php if (!empty($product['original'])) : ?>
                                    <span class="original-price"><?php echo esc_html($product['original']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if ($layout === 'slider') : ?>
                <button class="slider-nav prev"><?php echo fph_get_svg_icon('chevron-left'); ?></button>
                <button class="slider-nav next"><?php echo fph_get_svg_icon('chevron-right'); ?></button>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

/**
 * Display promo banners
 */
function fph_promo_banners() {
    $promos = array(
        array(
            'title'    => __('Home Gym Setup', 'fitness-powerhouse'),
            'subtitle' => __('Complete packages starting AED 4,999', 'fitness-powerhouse'),
            'image'    => FPH_URI . '/assets/images/hero/hero-1.jpg',
            'url'      => '#',
        ),
        array(
            'title'    => __('Cardio Equipment', 'fitness-powerhouse'),
            'subtitle' => __('Up to 40% OFF on select items', 'fitness-powerhouse'),
            'image'    => FPH_URI . '/assets/images/hero/hero-3.jpg',
            'url'      => '#',
        ),
    );
    ?>
    <section class="promo-section">
        <div class="container">
            <div class="promo-grid">
                <?php foreach ($promos as $promo) : ?>
                    <a href="<?php echo esc_url($promo['url']); ?>" class="promo-card">
                        <img src="<?php echo esc_url($promo['image']); ?>" alt="<?php echo esc_attr($promo['title']); ?>">
                        <div class="promo-content">
                            <h3><?php echo esc_html($promo['title']); ?></h3>
                            <p><?php echo esc_html($promo['subtitle']); ?></p>
                            <span class="promo-link"><?php esc_html_e('Shop Now', 'fitness-powerhouse'); ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Display brands section
 */
function fph_brands_section() {
    $brands = array(
        'NordicTrack',
        'Life Fitness',
        'Technogym',
        'Precor',
        'Bowflex',
        'Rogue',
        'Peloton',
        'Concept2',
    );
    ?>
    <section class="brands-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Shop by Brand', 'fitness-powerhouse'); ?></h2>
            <div class="brands-grid">
                <?php foreach ($brands as $brand) : ?>
                    <a href="#" class="brand-item">
                        <img src="https://via.placeholder.com/150x50?text=<?php echo urlencode($brand); ?>" alt="<?php echo esc_attr($brand); ?>">
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Display WhatsApp float button
 */
function fph_whatsapp_float() {
    $whatsapp = fph_get_option('fph_whatsapp_number', '971508429475');
    if (empty($whatsapp)) {
        return;
    }
    ?>
    <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" class="whatsapp-float" target="_blank" rel="noopener noreferrer">
        <?php echo fph_get_svg_icon('whatsapp'); ?>
        <span><?php esc_html_e('Chat Support?', 'fitness-powerhouse'); ?></span>
    </a>
    <?php
}

/**
 * Display social links
 */
function fph_social_links() {
    $networks = array('facebook', 'instagram', 'twitter', 'youtube', 'linkedin');
    ?>
    <div class="social-links">
        <?php foreach ($networks as $network) :
            $url = fph_get_option('fph_social_' . $network, '');
            if (!empty($url)) :
                ?>
                <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" title="<?php echo esc_attr(ucfirst($network)); ?>">
                    <?php echo fph_get_svg_icon($network); ?>
                </a>
            <?php else : ?>
                <a href="#" title="<?php echo esc_attr(ucfirst($network)); ?>">
                    <?php echo fph_get_svg_icon($network); ?>
                </a>
            <?php endif;
        endforeach; ?>
    </div>
    <?php
}
