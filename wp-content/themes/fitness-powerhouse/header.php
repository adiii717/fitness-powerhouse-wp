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

<!-- Section Top - Fixed Header -->
<div class="section-top">
    <!-- Black Top Bar with Benefits -->
    <div class="header-background mb-3 mt-2">
        <div class="container">
            <div class="columns topbar">
                <div class="column has-text-white has-text-weight-medium">
                    <img src="<?php echo FPH_URI; ?>/assets/images/icons/free-delivery.svg" width="20" onerror="this.style.display='none'">
                    &nbsp;<?php _e('Free Delivery', 'fitness-powerhouse'); ?>
                </div>
                <div class="column has-text-white has-text-weight-medium">
                    <img src="<?php echo FPH_URI; ?>/assets/images/icons/free-home-trial.svg" width="20" onerror="this.style.display='none'">
                    &nbsp;<?php _e('Free Home Trial*', 'fitness-powerhouse'); ?>
                </div>
                <div class="column has-text-white has-text-weight-medium">
                    <img src="<?php echo FPH_URI; ?>/assets/images/icons/free-installation.svg" width="20" onerror="this.style.display='none'">
                    &nbsp;<?php _e('Free Installation*', 'fitness-powerhouse'); ?>
                </div>
                <div class="column has-text-white has-text-weight-medium">
                    <img src="<?php echo FPH_URI; ?>/assets/images/icons/buy-now-pay-later.svg" width="20" onerror="this.style.display='none'">
                    &nbsp;<?php _e('Buy Now Pay Later', 'fitness-powerhouse'); ?>
                </div>
                <div class="column has-text-white has-text-weight-medium">
                    <img src="<?php echo FPH_URI; ?>/assets/images/icons/warranty.svg" width="20" onerror="this.style.display='none'">
                    &nbsp;<?php _e('Genuine Product Warranty', 'fitness-powerhouse'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Primary Navigation -->
    <div class="container">
        <nav class="navbar" id="primary-nav">
            <div class="navbar-brand">
                <a class="navbar-item" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo FPH_URI; ?>/assets/images/logo.svg" alt="<?php bloginfo('name'); ?>" width="200" height="50" onerror="this.outerHTML='<span style=\'font-weight:800;font-size:20px;\'>FITNESS<br><small style=\'color:#ec1c24;font-size:10px;letter-spacing:2px;\'>POWERHOUSE</small></span>'">
                    <?php endif; ?>
                </a>
                <div class="navbar-burger burger" data-target="navMenubd-example">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div id="navMenubd-example" class="navbar-menu ml-5 mr-5">
                <div class="navbar-end">
                    <!-- Search Bar -->
                    <div class="navbar-search control has-icons-right">
                        <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                            <input class="input is-rounded header-search" type="search" name="s" placeholder="<?php esc_attr_e('What you are looking for?', 'fitness-powerhouse'); ?>" autocomplete="off">
                            <span class="icon is-small is-right">
                                <i class="fa fas fa-search"></i>
                            </span>
                        </form>
                    </div>

                    <!-- Language Switch -->
                    <div class="navbar-item">
                        <div class="field is-grouped">
                            <span class="navbar-link">العربية</span>

                            <!-- Phone -->
                            <a class="navbar-link pr-4 has-text-weight-bold" href="tel:<?php echo esc_attr(fph_get_option('fph_phone_number', '+971508429475')); ?>">
                                <span class="ti-mobile"></span>&nbsp;
                                <?php echo esc_html(fph_get_option('fph_phone_number', '+971 50 842 9475')); ?>
                            </a>

                            <!-- User Account -->
                            <a class="navbar-link pr-4" href="<?php echo class_exists('WooCommerce') ? esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) : '#'; ?>">
                                <span class="ti-user"></span>
                            </a>

                            <!-- Wishlist -->
                            <a class="navbar-link pr-4" href="#">
                                <span class="ti-heart">
                                    <em class="roundpoint" id="wishlistcountval">0</em>
                                </span>
                            </a>

                            <!-- Cart -->
                            <a class="navbar-link" href="<?php echo class_exists('WooCommerce') ? esc_url(wc_get_cart_url()) : '#'; ?>">
                                <span class="ti-shopping-cart">
                                    <em class="roundpoint" id="productcountval"><?php echo class_exists('WooCommerce') ? WC()->cart->get_cart_contents_count() : '0'; ?></em>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- Secondary Navigation with Mega Menus -->
<nav class="navbar section-top" id="secondary-nav" style="top:100px;">
    <div class="navbar-start" style="margin-left: 10%;">

        <!-- Cardio Menu -->
        <div class="navbar-item navbar-heading has-dropdown is-hoverable is-mega">
            <div class="navbar-link menu-head-link is-arrowless flex">
                <a href="#"><?php _e('Cardio', 'fitness-powerhouse'); ?></a>
            </div>
            <div class="navbar-dropdown has-background-light">
                <div class="container is-fluid">
                    <div class="columns">
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/1-treadmills.png" alt="Treadmills">
                                <h4 class="menu-title"><?php _e('Treadmills', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/3-cross-trainer.png" alt="Cross Trainers">
                                <h4 class="menu-title"><?php _e('Cross Trainers', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/4-spinning-bike.png" alt="Spinning Bikes">
                                <h4 class="menu-title"><?php _e('Spinning Bikes', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/2-upright-bike.png" alt="Upright Bikes">
                                <h4 class="menu-title"><?php _e('Upright Bikes', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/6-recumbent-bike.png" alt="Recumbent Bike">
                                <h4 class="menu-title"><?php _e('Recumbent Bike', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/5-Air-bike.png" alt="Air Bike">
                                <h4 class="menu-title"><?php _e('Air Bike', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/7-rowing-machine.png" alt="Rowing Machine">
                                <h4 class="menu-title"><?php _e('Rowing Machine', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/8-stepper.png" alt="Stepper">
                                <h4 class="menu-title"><?php _e('Stepper', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Strength Menu -->
        <div class="navbar-item navbar-heading has-dropdown is-hoverable is-mega">
            <div class="navbar-link menu-head-link flex is-arrowless">
                <a href="#"><?php _e('Strength', 'fitness-powerhouse'); ?></a>
            </div>
            <div class="navbar-dropdown has-background-light">
                <div class="container is-fluid">
                    <div class="columns">
                        <div class="column even">
                            <h1 class="title is-6 is-mega-menu-title"><?php _e('Single Gym Station', 'fitness-powerhouse'); ?></h1>
                            <a class="navbar-item" href="#">Ab Machine</a>
                            <a class="navbar-item" href="#">Chest Press</a>
                            <a class="navbar-item" href="#">Dips</a>
                            <a class="navbar-item" href="#">Chest Fly</a>
                            <a class="navbar-item" href="#">Preacher Curl</a>
                            <a class="navbar-item" href="#">Shoulder Press</a>
                        </div>
                        <div class="column">
                            <h1 class="title is-6 is-mega-menu-title"><?php _e('Categories', 'fitness-powerhouse'); ?></h1>
                            <a class="navbar-item" href="#">Multi Gym Stations</a>
                            <a class="navbar-item" href="#">Cable Machines</a>
                            <a class="navbar-item" href="#">Power Cage & Squat Rack</a>
                            <a class="navbar-item" href="#">Smith Machine</a>
                            <a class="navbar-item" href="#">Functional Trainers</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bench & Rack -->
        <div class="navbar-item navbar-heading has-dropdown is-hoverable is-mega">
            <div class="navbar-link menu-head-link flex is-arrowless">
                <a href="#"><?php _e('Bench & Rack', 'fitness-powerhouse'); ?></a>
            </div>
            <div class="navbar-dropdown has-background-light">
                <div class="container is-fluid">
                    <div class="columns">
                        <div class="column">
                            <h1 class="title is-6 is-mega-menu-title"><?php _e('Benches', 'fitness-powerhouse'); ?></h1>
                            <a class="navbar-item" href="#">Adjustable Bench</a>
                            <a class="navbar-item" href="#">Ab Bench</a>
                            <a class="navbar-item" href="#">Flat Bench</a>
                            <a class="navbar-item" href="#">Incline Bench</a>
                            <a class="navbar-item" href="#">Decline Bench</a>
                        </div>
                        <div class="column">
                            <h1 class="title is-6 is-mega-menu-title"><?php _e('Racks', 'fitness-powerhouse'); ?></h1>
                            <a class="navbar-item" href="#">Dumbbell Racks</a>
                            <a class="navbar-item" href="#">Barbell Racks</a>
                            <a class="navbar-item" href="#">Plate Rack</a>
                            <a class="navbar-item" href="#">Kettlebell Rack</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Weights Menu -->
        <div class="navbar-item navbar-heading has-dropdown is-hoverable is-mega">
            <div class="navbar-link menu-head-link is-arrowless flex">
                <a href="#"><?php _e('Weights', 'fitness-powerhouse'); ?></a>
            </div>
            <div class="navbar-dropdown has-background-light">
                <div class="container is-fluid">
                    <div class="columns">
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/Weights-01.jpg" alt="Kettlebells">
                                <h4 class="menu-title"><?php _e('Kettlebells', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/Weights-02.jpg" alt="Dumbbells">
                                <h4 class="menu-title"><?php _e('Dumbbells', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/Weights-04.jpg" alt="Weight Plates">
                                <h4 class="menu-title"><?php _e('Weight Plates', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/Bars-&-Barbells.jpg" alt="Barbells">
                                <h4 class="menu-title"><?php _e('Barbells', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/Slam-Ball.jpg" alt="Medicine Ball">
                                <h4 class="menu-title"><?php _e('Medicine Ball', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                        <div class="column">
                            <a class="nav-item" href="#">
                                <img src="<?php echo FPH_URI; ?>/assets/images/menu/Weights-05.jpg" alt="Weight Sets">
                                <h4 class="menu-title"><?php _e('Weight Sets', 'fitness-powerhouse'); ?></h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Game Tables -->
        <div class="navbar-item navbar-heading has-dropdown is-hoverable">
            <div class="navbar-link menu-head-link is-arrowless flex">
                <a href="#"><?php _e('Game Tables', 'fitness-powerhouse'); ?></a>
            </div>
        </div>

        <!-- Yoga & Pilates -->
        <div class="navbar-item navbar-heading has-dropdown is-hoverable">
            <div class="navbar-link menu-head-link is-arrowless flex">
                <a href="#"><?php _e('Yoga & Pilates', 'fitness-powerhouse'); ?></a>
            </div>
        </div>

        <!-- Body Massagers -->
        <div class="navbar-item navbar-heading">
            <div class="navbar-link menu-head-link flex is-arrowless">
                <a href="#"><?php _e('Body Massagers', 'fitness-powerhouse'); ?></a>
            </div>
        </div>

        <!-- Outdoor -->
        <div class="navbar-item navbar-heading">
            <div class="navbar-link menu-head-link flex is-arrowless">
                <a href="#"><?php _e('Outdoor', 'fitness-powerhouse'); ?></a>
            </div>
        </div>

        <!-- Sports -->
        <div class="navbar-item navbar-heading">
            <div class="navbar-link menu-head-link flex is-arrowless">
                <a href="#"><?php _e('Sports', 'fitness-powerhouse'); ?></a>
            </div>
        </div>

        <!-- Accessories -->
        <div class="navbar-item navbar-heading">
            <div class="navbar-link menu-head-link flex is-arrowless">
                <a href="#"><?php _e('Accessories', 'fitness-powerhouse'); ?></a>
            </div>
        </div>

        <!-- Commercial -->
        <div class="navbar-item navbar-heading">
            <div class="navbar-link menu-head-link menu-commercial is-arrowless flex">
                <a href="#" style="color:#ec1c24;font-weight:600;"><?php _e('Commercial', 'fitness-powerhouse'); ?></a>
            </div>
        </div>

        <!-- Brands - Red Background -->
        <div class="navbar-item navbar-heading brands-menu">
            <div class="navbar-link menu-head-link is-arrowless flex">
                <a href="#"><?php _e('Brands', 'fitness-powerhouse'); ?></a>
            </div>
        </div>

    </div>
</nav>

<main id="main-content" class="site-main" style="margin-top: 160px;">
