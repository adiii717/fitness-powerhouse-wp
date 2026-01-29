<?php
/**
 * The front page template
 *
 * @package Fitness_Power_House
 */

get_header();

// Hero Slider
fph_hero_slider();

// Category Shortcuts
fph_category_shortcuts();

// Featured Products
fph_products_section(__('Featured Products', 'fitness-powerhouse'), 'featured', 'slider');

// Promo Banners
fph_promo_banners();

// Best Sellers
fph_products_section(__('Best Sellers', 'fitness-powerhouse'), 'bestseller', 'grid');

// Brands Section
fph_brands_section();

get_footer();
