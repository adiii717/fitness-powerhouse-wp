<?php
/**
 * Fitness Power House Theme Functions
 *
 * @package Fitness_Power_House
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('FPH_VERSION', '1.0.0');
define('FPH_DIR', get_template_directory());
define('FPH_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function fph_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Custom image sizes
    add_image_size('product-thumb', 400, 400, true);
    add_image_size('product-large', 800, 800, true);
    add_image_size('category-icon', 200, 200, true);
    add_image_size('hero-banner', 1920, 600, true);
    add_image_size('promo-banner', 600, 300, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'fitness-powerhouse'),
        'footer-1' => esc_html__('Footer Menu 1', 'fitness-powerhouse'),
        'footer-2' => esc_html__('Footer Menu 2', 'fitness-powerhouse'),
        'footer-3' => esc_html__('Footer Menu 3', 'fitness-powerhouse'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'fph_theme_setup');

/**
 * Set the content width
 */
function fph_content_width() {
    $GLOBALS['content_width'] = apply_filters('fph_content_width', 1400);
}
add_action('after_setup_theme', 'fph_content_width', 0);

/**
 * Enqueue scripts and styles
 */
function fph_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'fph-google-fonts',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'fph-style',
        get_stylesheet_uri(),
        array(),
        FPH_VERSION
    );

    // Main script
    wp_enqueue_script(
        'fph-script',
        FPH_URI . '/assets/js/main.js',
        array(),
        FPH_VERSION,
        true
    );

    // Localize script
    wp_localize_script('fph-script', 'fphData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('fph_nonce'),
        'themeUri' => FPH_URI,
    ));

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'fph_scripts');

/**
 * Register widget areas
 */
function fph_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'fitness-powerhouse'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'fitness-powerhouse'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area', 'fitness-powerhouse'),
        'id'            => 'footer-widgets',
        'description'   => esc_html__('Add footer widgets here.', 'fitness-powerhouse'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'fph_widgets_init');

/**
 * Custom Walker for Mega Menu
 */
class FPH_Mega_Menu_Walker extends Walker_Nav_Menu {
    private $current_item;
    private $dropdown_menu_alignment_values = array('dropdown-menu-start', 'dropdown-menu-end', 'dropdown-menu-center');

    function start_lvl(&$output, $depth = 0, $args = null) {
        if ($depth === 0) {
            $output .= '<div class="mega-menu"><div class="mega-menu-content">';
        } else {
            $output .= '<div class="menu-column">';
        }
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        if ($depth === 0) {
            $output .= '</div></div>';
        } else {
            $output .= '</div>';
        }
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $this->current_item = $item;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';

        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-mega-menu';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id_attr = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id_attr = $id_attr ? ' id="' . esc_attr($id_attr) . '"' : '';

        if ($depth === 0) {
            $output .= $indent . '<li' . $id_attr . $class_names . '>';
        }

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        $atts['class']  = $depth === 0 ? 'nav-link' : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        // Check for menu item image (using custom field or ACF)
        $menu_image = get_post_meta($item->ID, '_menu_item_image', true);

        if ($depth === 1 && $menu_image) {
            $item_output = '<a class="menu-category"' . $attributes . '>';
            $item_output .= '<div class="category-image"><img src="' . esc_url($menu_image) . '" alt="' . esc_attr($title) . '"></div>';
            $item_output .= '<h4>' . $title . '</h4>';
            $item_output .= '</a>';
        } else {
            $item_output = $args->before ?? '';
            $item_output .= '<a' . $attributes . '>';
            $item_output .= ($args->link_before ?? '') . $title . ($args->link_after ?? '');
            $item_output .= '</a>';
            $item_output .= $args->after ?? '';
        }

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        if ($depth === 0) {
            $output .= "</li>\n";
        }
    }
}

/**
 * Customizer additions
 */
function fph_customize_register($wp_customize) {
    // Theme Options Panel
    $wp_customize->add_panel('fph_theme_options', array(
        'title'       => __('Theme Options', 'fitness-powerhouse'),
        'description' => __('Customize theme settings', 'fitness-powerhouse'),
        'priority'    => 30,
    ));

    // Header Section
    $wp_customize->add_section('fph_header_section', array(
        'title'    => __('Header Settings', 'fitness-powerhouse'),
        'panel'    => 'fph_theme_options',
        'priority' => 10,
    ));

    // Phone Number
    $wp_customize->add_setting('fph_phone_number', array(
        'default'           => '+971 50 842 9475',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('fph_phone_number', array(
        'label'   => __('Phone Number', 'fitness-powerhouse'),
        'section' => 'fph_header_section',
        'type'    => 'text',
    ));

    // WhatsApp Number
    $wp_customize->add_setting('fph_whatsapp_number', array(
        'default'           => '971508429475',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('fph_whatsapp_number', array(
        'label'   => __('WhatsApp Number (without +)', 'fitness-powerhouse'),
        'section' => 'fph_header_section',
        'type'    => 'text',
    ));

    // Hero Section
    $wp_customize->add_section('fph_hero_section', array(
        'title'    => __('Hero Slider', 'fitness-powerhouse'),
        'panel'    => 'fph_theme_options',
        'priority' => 20,
    ));

    for ($i = 1; $i <= 3; $i++) {
        // Hero Image
        $wp_customize->add_setting('fph_hero_image_' . $i, array(
            'default'           => FPH_URI . '/assets/images/hero/hero-' . $i . '.jpg',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fph_hero_image_' . $i, array(
            'label'   => sprintf(__('Hero Image %d', 'fitness-powerhouse'), $i),
            'section' => 'fph_hero_section',
        )));

        // Hero Title
        $wp_customize->add_setting('fph_hero_title_' . $i, array(
            'default'           => 'Hero Title ' . $i,
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('fph_hero_title_' . $i, array(
            'label'   => sprintf(__('Hero Title %d', 'fitness-powerhouse'), $i),
            'section' => 'fph_hero_section',
            'type'    => 'text',
        ));

        // Hero Subtitle
        $wp_customize->add_setting('fph_hero_subtitle_' . $i, array(
            'default'           => 'Hero subtitle text',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('fph_hero_subtitle_' . $i, array(
            'label'   => sprintf(__('Hero Subtitle %d', 'fitness-powerhouse'), $i),
            'section' => 'fph_hero_section',
            'type'    => 'text',
        ));

        // Hero Button URL
        $wp_customize->add_setting('fph_hero_url_' . $i, array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('fph_hero_url_' . $i, array(
            'label'   => sprintf(__('Hero Button URL %d', 'fitness-powerhouse'), $i),
            'section' => 'fph_hero_section',
            'type'    => 'url',
        ));
    }

    // Social Links Section
    $wp_customize->add_section('fph_social_section', array(
        'title'    => __('Social Links', 'fitness-powerhouse'),
        'panel'    => 'fph_theme_options',
        'priority' => 30,
    ));

    $social_networks = array('facebook', 'instagram', 'twitter', 'youtube', 'linkedin');

    foreach ($social_networks as $network) {
        $wp_customize->add_setting('fph_social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('fph_social_' . $network, array(
            'label'   => sprintf(__('%s URL', 'fitness-powerhouse'), ucfirst($network)),
            'section' => 'fph_social_section',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'fph_customize_register');

/**
 * Get theme mod with default
 */
function fph_get_option($key, $default = '') {
    return get_theme_mod($key, $default);
}

/**
 * Include template parts
 */
require_once FPH_DIR . '/inc/template-tags.php';

/**
 * SVG Icons helper
 */
function fph_get_svg_icon($icon) {
    $icons = array(
        'search' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>',
        'user' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
        'heart' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>',
        'cart' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>',
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>',
        'truck' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 17a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/><path d="M19 17a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/><path d="M5 17H3v-4a1 1 0 0 1 1-1h14l3 4v1h-2"/><path d="M14 17H9"/><path d="M21 11l-3-4H4"/></svg>',
        'home' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9,22 9,12 15,12 15,22"/></svg>',
        'wrench' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
        'credit-card' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>',
        'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9,12 11,14 15,10"/></svg>',
        'chevron-left' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>',
        'chevron-right' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>',
        'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
        'eye' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>',
        'whatsapp' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>',
        'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>',
        'twitter' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
        'youtube' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>',
        'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',
    );

    return isset($icons[$icon]) ? $icons[$icon] : '';
}

/**
 * Add body classes
 */
function fph_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }

    if (class_exists('WooCommerce')) {
        $classes[] = 'woocommerce-active';
    }

    return $classes;
}
add_filter('body_class', 'fph_body_classes');
