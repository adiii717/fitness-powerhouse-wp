<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="desktop-overlay"></div>

<?php fph_benefits_bar(); ?>

<header class="primary-header">
    <div class="container">
        <nav class="primary-nav">
            <?php fph_site_logo(); ?>

            <div class="search-bar">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" name="s" placeholder="<?php esc_attr_e('What are you looking for?', 'fitness-powerhouse'); ?>" value="<?php echo get_search_query(); ?>">
                    <button type="submit">
                        <?php echo fph_get_svg_icon('search'); ?>
                    </button>
                </form>
            </div>

            <div class="header-actions">
                <a href="#" class="lang-switch">العربية</a>
                <a href="tel:<?php echo esc_attr(fph_get_option('fph_phone_number', '+971508429475')); ?>" class="phone-link">
                    <?php echo fph_get_svg_icon('phone'); ?>
                    <?php echo esc_html(fph_get_option('fph_phone_number', '+971 50 842 9475')); ?>
                </a>
                <?php if (class_exists('WooCommerce')) : ?>
                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="action-icon">
                        <?php echo fph_get_svg_icon('user'); ?>
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>wishlist" class="action-icon">
                        <?php echo fph_get_svg_icon('heart'); ?>
                        <span class="badge">0</span>
                    </a>
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="action-icon cart-icon">
                        <?php echo fph_get_svg_icon('cart'); ?>
                        <span class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                <?php else : ?>
                    <a href="#" class="action-icon">
                        <?php echo fph_get_svg_icon('user'); ?>
                    </a>
                    <a href="#" class="action-icon">
                        <?php echo fph_get_svg_icon('heart'); ?>
                        <span class="badge">0</span>
                    </a>
                    <a href="#" class="action-icon cart-icon">
                        <?php echo fph_get_svg_icon('cart'); ?>
                        <span class="badge">0</span>
                    </a>
                <?php endif; ?>
            </div>

            <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e('Toggle Menu', 'fitness-powerhouse'); ?>">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </div>
</header>

<nav class="secondary-nav">
    <div class="container">
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-menu',
                'walker'         => new FPH_Mega_Menu_Walker(),
                'fallback_cb'    => false,
            ));
        } else {
            // Default menu for demo
            ?>
            <ul class="nav-menu">
                <li class="nav-item has-mega-menu">
                    <a href="#" class="nav-link">Cardio</a>
                    <div class="mega-menu">
                        <div class="mega-menu-content">
                            <?php
                            $cardio_items = array(
                                array('name' => 'Treadmills', 'image' => 'treadmills.jpg'),
                                array('name' => 'Cross Trainers', 'image' => 'exercise-bikes.jpg'),
                                array('name' => 'Spinning Bikes', 'image' => 'exercise-bikes.jpg'),
                                array('name' => 'Upright Bikes', 'image' => 'exercise-bikes.jpg'),
                                array('name' => 'Recumbent Bikes', 'image' => 'exercise-bikes.jpg'),
                                array('name' => 'Rowing Machines', 'image' => 'accessories.jpg'),
                                array('name' => 'Air Bikes', 'image' => 'exercise-bikes.jpg'),
                                array('name' => 'Steppers', 'image' => 'accessories.jpg'),
                            );
                            foreach ($cardio_items as $item) :
                                ?>
                                <a href="#" class="menu-category">
                                    <div class="category-image">
                                        <img src="<?php echo esc_url(FPH_URI . '/assets/images/categories/' . $item['image']); ?>" alt="<?php echo esc_attr($item['name']); ?>">
                                    </div>
                                    <h4><?php echo esc_html($item['name']); ?></h4>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li class="nav-item has-mega-menu">
                    <a href="#" class="nav-link">Strength</a>
                    <div class="mega-menu mega-menu-list">
                        <div class="mega-menu-content">
                            <div class="menu-column">
                                <h5 class="column-title">Single Gym Station</h5>
                                <a href="#">Ab Machine</a>
                                <a href="#">Chest Press</a>
                                <a href="#">Dips</a>
                                <a href="#">Chest Fly</a>
                                <a href="#">Preacher Curl</a>
                                <a href="#">Shoulder Press</a>
                            </div>
                            <div class="menu-column">
                                <h5 class="column-title">Categories</h5>
                                <a href="#">Multi Gym Stations</a>
                                <a href="#">Cable Machines</a>
                                <a href="#">Power Cage</a>
                                <a href="#">Smith Machine</a>
                                <a href="#">Functional Trainers</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Bench & Rack</a>
                </li>
                <li class="nav-item has-mega-menu">
                    <a href="#" class="nav-link">Weights</a>
                    <div class="mega-menu">
                        <div class="mega-menu-content">
                            <?php
                            $weight_items = array(
                                array('name' => 'Kettlebells', 'image' => 'dumbbells.jpg'),
                                array('name' => 'Dumbbells', 'image' => 'dumbbells.jpg'),
                                array('name' => 'Weight Plates', 'image' => 'weight-plates.jpg'),
                                array('name' => 'Barbells', 'image' => 'weight-plates.jpg'),
                                array('name' => 'Medicine Balls', 'image' => 'accessories.jpg'),
                            );
                            foreach ($weight_items as $item) :
                                ?>
                                <a href="#" class="menu-category">
                                    <div class="category-image">
                                        <img src="<?php echo esc_url(FPH_URI . '/assets/images/categories/' . $item['image']); ?>" alt="<?php echo esc_attr($item['name']); ?>">
                                    </div>
                                    <h4><?php echo esc_html($item['name']); ?></h4>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Game Tables</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Yoga & Pilates</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Body Massagers</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Outdoor</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Sports</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Accessories</a>
                </li>
                <li class="nav-item nav-commercial">
                    <a href="#" class="nav-link">Commercial</a>
                </li>
                <li class="nav-item nav-brands">
                    <a href="#" class="nav-link">Brands</a>
                </li>
            </ul>
            <?php
        }
        ?>
    </div>
</nav>

<main id="main-content" class="site-main">
