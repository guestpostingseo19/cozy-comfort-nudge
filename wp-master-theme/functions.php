<?php
/**
 * The Oven Pizza — WP Master Theme
 * Full-fidelity port of the React/Vite build.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

require_once get_template_directory() . '/inc/data.php';

if ( ! function_exists( 'oven_setup' ) ) :
    function oven_setup() {
        load_theme_textdomain( 'oven-master', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
        add_theme_support( 'custom-logo', array( 'height' => 60, 'width' => 60, 'flex-height' => true, 'flex-width' => true ) );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'align-wide' );

        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'oven-master' ),
            'footer'  => __( 'Footer Menu', 'oven-master' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'oven_setup' );

/**
 * Enqueue styles, fonts and animation JS.
 */
function oven_enqueue_assets() {
    // Google Fonts.
    wp_enqueue_style(
        'oven-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,700;1,900&display=swap',
        array(),
        null
    );

    // Main stylesheet (design tokens + custom animations + custom utilities).
    wp_enqueue_style(
        'oven-style',
        get_stylesheet_uri(),
        array( 'oven-fonts' ),
        wp_get_theme()->get( 'Version' )
    );

    // Vanilla-JS animations & interactivity.
    wp_enqueue_script(
        'oven-animations',
        get_template_directory_uri() . '/assets/js/theme-animations.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'oven_enqueue_assets' );

/**
 * Inject Tailwind Play CDN + theme extension in <head>.
 * This gives us 1:1 parity with the React build's utility classes without
 * requiring a Node build step to ship the theme. If you prefer a fully offline
 * build, swap this for a compiled Tailwind CSS file in /assets/css/.
 */
function oven_inject_tailwind_cdn() { ?>
    <script src="https://cdn.tailwindcss.com?plugins=typography,line-clamp,forms"></script>
    <script>
      // Mirror the tokens defined in style.css so Tailwind utility classes
      // like bg-brand, text-charcoal, border-border resolve to the same values.
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              brand: 'var(--brand)',
              'brand-foreground': 'var(--brand-foreground)',
              flame: 'var(--flame)',
              gold: 'var(--gold)',
              charcoal: 'var(--charcoal)',
              cream: 'var(--cream)',
              background: 'var(--background)',
              foreground: 'var(--foreground)',
              card: 'var(--card)',
              'card-foreground': 'var(--card-foreground)',
              muted: { DEFAULT: 'var(--muted)', foreground: 'var(--muted-foreground)' },
              accent: { DEFAULT: 'var(--accent)', foreground: 'var(--accent-foreground)' },
              border: 'var(--border)',
              input: 'var(--input)',
              ring: 'var(--ring)',
              primary: 'var(--primary)',
              destructive: 'var(--destructive)',
            },
            fontFamily: {
              display: ['"Playfair Display"', 'ui-serif', 'Georgia', 'serif'],
              sans: ['"Inter"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            borderRadius: { xl: '1rem', '2xl': '1.25rem', '3xl': '1.75rem' },
          },
        },
      };
    </script>
<?php }
add_action( 'wp_head', 'oven_inject_tailwind_cdn', 1 );

/**
 * Emit JSON-LD Restaurant schema in <head>.
 */
function oven_json_ld() {
    $b = oven_business();
    $data = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'Restaurant',
        'name'       => $b['name'],
        'image'      => oven_img( 'hero-pizza.jpg' ),
        'address'    => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Kamboh Road, Street No. 12, Block 12',
            'addressLocality' => 'Chichawatni',
            'addressRegion'   => 'Punjab',
            'addressCountry'  => 'PK',
        ),
        'telephone'    => $b['phone_raw'],
        'servesCuisine'=> array( 'Pizza', 'Fast Food', 'Arabic', 'Burgers' ),
        'priceRange'   => $b['price_range'],
        'aggregateRating' => array(
            '@type'       => 'AggregateRating',
            'ratingValue' => $b['rating'],
            'reviewCount' => (string) $b['reviews'],
        ),
        'openingHours' => 'Mo-Su 11:00-02:00',
    );
    echo '<script type="application/ld+json">' . wp_json_encode( $data ) . '</script>';
}
add_action( 'wp_head', 'oven_json_ld', 5 );

/**
 * Register the primary page slugs used by the theme's page-{slug}.php templates.
 * On first activation, create the pages so the site works out of the box.
 */
function oven_bootstrap_pages() {
    if ( get_option( 'oven_bootstrap_done' ) ) { return; }
    $pages = array(
        'menu'    => 'Menu',
        'deals'   => 'Deals',
        'gallery' => 'Gallery',
        'reviews' => 'Reviews',
        'about'   => 'About',
        'contact' => 'Contact',
        'faq'     => 'FAQ',
        'privacy' => 'Privacy Policy',
        'terms'   => 'Terms & Conditions',
        'home'    => 'Home',
    );
    foreach ( $pages as $slug => $title ) {
        if ( ! get_page_by_path( $slug ) ) {
            wp_insert_post( array(
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ) );
        }
    }
    $home = get_page_by_path( 'home' );
    if ( $home ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $home->ID );
    }
    update_option( 'oven_bootstrap_done', 1 );
}
add_action( 'after_switch_theme', 'oven_bootstrap_pages' );

/**
 * Route each page slug to its dedicated template file.
 */
function oven_template_router( $template ) {
    if ( is_page() ) {
        $slug = get_post_field( 'post_name', get_post() );
        $map = array(
            'menu'    => 'page-menu.php',
            'deals'   => 'page-deals.php',
            'gallery' => 'page-gallery.php',
            'reviews' => 'page-reviews.php',
            'about'   => 'page-about.php',
            'contact' => 'page-contact.php',
            'faq'     => 'page-faq.php',
            'privacy' => 'page-privacy.php',
            'terms'   => 'page-terms.php',
        );
        if ( isset( $map[ $slug ] ) ) {
            $candidate = locate_template( $map[ $slug ] );
            if ( $candidate ) { return $candidate; }
        }
    }
    return $template;
}
add_filter( 'template_include', 'oven_template_router' );
