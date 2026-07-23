<?php
/**
 * The Oven Pizza Chichawatni — theme functions
 *
 * @package theovenpizza
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( 'theovenpizza_setup' ) ) :
    function theovenpizza_setup() {
        load_theme_textdomain( 'theovenpizza', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
        add_theme_support( 'custom-logo', array( 'height' => 60, 'width' => 60, 'flex-height' => true, 'flex-width' => true ) );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'align-wide' );

        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'theovenpizza' ),
            'footer'  => __( 'Footer Menu', 'theovenpizza' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'theovenpizza_setup' );

/**
 * Enqueue styles and fonts.
 */
function theovenpizza_enqueue_assets() {
    // Google Fonts — Playfair Display + Inter.
    wp_enqueue_style(
        'theovenpizza-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&family=Playfair+Display:ital,wght@0,700;0,900;1,700;1,900&display=swap',
        array(),
        null
    );

    // Main stylesheet.
    wp_enqueue_style(
        'theovenpizza-style',
        get_stylesheet_uri(),
        array( 'theovenpizza-fonts' ),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'theovenpizza_enqueue_assets' );

/**
 * Business info — mirrors src/lib/business.ts.
 */
function theovenpizza_business() {
    return array(
        'name'         => 'The Oven Pizza Chichawatni',
        'short_name'   => 'The Oven Pizza',
        'phone'        => '+92 300 1580250',
        'phone_raw'    => '+923001580250',
        'whatsapp'     => '923001580250',
        'address'      => 'Kamboh Road, Block 12, Chichawatni, Punjab, Pakistan',
        'hours'        => 'Open Daily · 11:00 AM – 2:00 AM',
        'rating'       => '4.8',
        'reviews'      => 140,
    );
}

function theovenpizza_wa_link( $msg = "Hi! I'd like to place an order." ) {
    $b = theovenpizza_business();
    return 'https://wa.me/' . $b['whatsapp'] . '?text=' . rawurlencode( $msg );
}

function theovenpizza_tel_link() {
    $b = theovenpizza_business();
    return 'tel:' . $b['phone_raw'];
}

/**
 * Menu items shown on the front page — mirrors src/lib/menu.ts (best sellers).
 */
function theovenpizza_best_sellers() {
    $dir = get_template_directory_uri() . '/assets/images/';
    return array(
        array( 'name' => 'The Oven Special',   'price' => 'Rs 1550 – 2150', 'img' => $dir . 'pizza-1.jpg', 'desc' => 'Our house special — chicken, olives, mushrooms, bell peppers, creamy garlic sauce, mozzarella.', 'spice' => 1 ),
        array( 'name' => 'Arabic Bite',        'price' => 'Rs 1300 – 1800', 'img' => $dir . 'pizza-2.jpg', 'desc' => 'Spiced chicken, onions, jalapeños, cheddar & mozzarella on a golden crust.', 'spice' => 3 ),
        array( 'name' => 'Crown Crust Supreme','price' => 'Rs 1650 – 2250', 'img' => $dir . 'pizza-3.jpg', 'desc' => 'A crown of cheese-stuffed edges around a fully-loaded chicken tikka centre.', 'spice' => 2 ),
        array( 'name' => 'Pan Sandwich',       'price' => 'Rs 550',         'img' => $dir . 'sandwich.jpg','desc' => 'Grilled pan bread stuffed with cheesy chicken, served with crispy fries.', 'spice' => 0 ),
        array( 'name' => 'Zinger Burger',      'price' => 'Rs 600',         'img' => $dir . 'burger.jpg',  'desc' => 'Crispy zinger fillet, lettuce, mayo, cheese in a soft sesame bun.', 'spice' => 2 ),
        array( 'name' => 'Chicken Wings',      'price' => 'Rs 700',         'img' => $dir . 'wings.jpg',   'desc' => 'Golden roasted wings glazed with sesame and a squeeze of lemon.', 'spice' => 2 ),
    );
}
