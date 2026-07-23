<?php
/**
 * Header template
 * @package theovenpizza
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$b = theovenpizza_business();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#00A896" />
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<div class="announcement" role="banner">
    <div class="inner">
        <span><span class="dot"></span> Free Delivery in Chichawatni · Open Until 2 AM Daily</span>
        <a href="<?php echo esc_url( theovenpizza_tel_link() ); ?>">&#9742; <?php echo esc_html( $b['phone'] ); ?></a>
    </div>
</div>

<header class="site-header">
    <div class="container-x row">
        <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <span class="brand-mark">&#128293;</span>
            <span>
                <span class="brand-name"><?php echo esc_html( $b['short_name'] ); ?></span>
                <span class="brand-sub">Pizza · Chichawatni</span>
            </span>
        </a>

        <nav class="nav" aria-label="<?php esc_attr_e( 'Primary', 'theovenpizza' ); ?>">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'depth'          => 1,
                ) );
            } else {
                $links = array(
                    home_url( '/' )          => 'Home',
                    home_url( '/menu/' )     => 'Menu',
                    home_url( '/deals/' )    => 'Deals',
                    home_url( '/gallery/' )  => 'Gallery',
                    home_url( '/reviews/' )  => 'Reviews',
                    home_url( '/about/' )    => 'About',
                    home_url( '/contact/' )  => 'Contact',
                );
                foreach ( $links as $url => $label ) {
                    echo '<a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a>';
                }
            }
            ?>
        </nav>

        <a class="cta-yellow" href="<?php echo esc_url( theovenpizza_tel_link() ); ?>">
            &#9742; Order Now
        </a>
    </div>
</header>
