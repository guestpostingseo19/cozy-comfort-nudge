<?php
/**
 * Header — announcement bar + sticky nav (mirrors src/components/Header.tsx).
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$b = oven_business();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#00A896" />
  <meta name="description" content="<?php echo esc_attr( $b['name'] ); ?> — wood-fired pizzas, burgers & Arabic bites. Free delivery in Chichawatni. Open daily till 2 AM." />
  <link rel="icon" href="<?php echo oven_img( 'pizza-1.jpg' ); ?>" />
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'flex min-h-dvh flex-col bg-background' ); ?>>

  <!-- Announcement bar -->
  <div class="site-announcement bg-flame text-white text-xs sm:text-sm">
    <div class="container-x flex items-center justify-between py-2 gap-3">
      <span class="flex items-center gap-2 truncate">
        <span class="inline-block h-1.5 w-1.5 rounded-full bg-gold animate-pulse shrink-0"></span>
        <span class="truncate font-bold uppercase tracking-[0.18em] text-[10px] sm:text-xs">
          Free delivery in Chichawatni · Open until 2 AM daily
        </span>
      </span>
      <a href="<?php echo oven_tel_link(); ?>" class="hidden sm:inline-flex items-center gap-1.5 font-bold text-white hover:text-gold transition">
        <?php echo oven_icon( 'phone', 'h-3.5 w-3.5' ); ?> <?php echo esc_html( $b['phone'] ); ?>
      </a>
    </div>
  </div>

  <header data-site-header class="sticky top-0 z-40 transition-all duration-300 bg-background/60 backdrop-blur"
          style="--pad:1rem;"
          onmouseover="" >
    <style>
      [data-site-header].is-scrolled { background: rgba(255,255,255,0.9); backdrop-filter: blur(12px); box-shadow: 0 4px 20px -8px rgba(0,0,0,0.15); }
    </style>
    <div class="container-x grid grid-cols-[minmax(0,1fr)_auto] items-center gap-4 py-4 lg:grid-cols-[auto_1fr_auto]">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2.5 min-w-0" aria-label="The Oven Pizza — Home">
        <div class="grid h-11 w-11 shrink-0 place-items-center rounded-full text-white shadow-lg" style="background:linear-gradient(135deg,var(--brand),var(--flame));">
          <?php echo oven_icon( 'flame', 'h-5 w-5' ); ?>
        </div>
        <div class="min-w-0 leading-tight">
          <div class="font-display text-lg sm:text-xl font-bold truncate">The Oven</div>
          <div class="text-[10px] sm:text-xs uppercase tracking-[0.18em] text-muted-foreground">
            Pizza · Chichawatni
          </div>
        </div>
      </a>

      <nav class="hidden lg:flex items-center justify-center gap-1">
        <?php
          $nav = array(
            '/'        => 'Home',
            '/menu/'   => 'Menu',
            '/deals/'  => 'Deals',
            '/gallery/'=> 'Gallery',
            '/reviews/'=> 'Reviews',
            '/about/'  => 'About',
            '/contact/'=> 'Contact',
          );
          $current = trailingslashit( wp_parse_url( home_url( add_query_arg( array() ) ), PHP_URL_PATH ) );
          foreach ( $nav as $path => $label ) {
            $href = esc_url( home_url( $path ) );
            $active = ( $current === $path ) ? ' text-brand bg-brand/10' : '';
            echo '<a href="' . $href . '" class="px-3.5 py-2 rounded-full text-sm font-medium text-foreground/80 hover:text-brand hover:bg-brand/5 transition' . $active . '">' . esc_html( $label ) . '</a>';
          }
        ?>
      </nav>

      <div class="flex items-center gap-2 justify-end">
        <a href="<?php echo oven_tel_link(); ?>"
           class="hidden md:inline-flex items-center gap-2 rounded-xl bg-gold px-5 py-2.5 text-sm font-black uppercase tracking-widest text-charcoal btn-chunky btn-chunky-hover">
          <?php echo oven_icon( 'phone', 'h-4 w-4' ); ?> Order Now
        </a>

        <button data-nav-toggle
                class="lg:hidden inline-flex h-11 w-11 items-center justify-center rounded-full border border-border bg-background"
                aria-label="Toggle menu" aria-expanded="false">
          <span data-nav-icon-open style="display:inline-flex;"><?php echo oven_icon( 'menu', 'h-5 w-5' ); ?></span>
          <span data-nav-icon-close style="display:none;"><?php echo oven_icon( 'x', 'h-5 w-5' ); ?></span>
        </button>
      </div>
    </div>

    <!-- Mobile nav panel -->
    <div data-mobile-nav class="lg:hidden border-t border-border bg-background" style="display:none;">
      <div class="container-x py-4 flex flex-col gap-1">
        <?php foreach ( $nav as $path => $label ) : ?>
          <a href="<?php echo esc_url( home_url( $path ) ); ?>"
             class="px-4 py-3 rounded-xl text-base font-medium hover:bg-brand/5 hover:text-brand">
            <?php echo esc_html( $label ); ?>
          </a>
        <?php endforeach; ?>
        <a href="<?php echo oven_tel_link(); ?>"
           class="mt-2 inline-flex items-center justify-center gap-2 rounded-full bg-brand px-5 py-3 text-sm font-semibold text-white">
          <?php echo oven_icon( 'phone', 'h-4 w-4' ); ?> <?php echo esc_html( $b['phone'] ); ?>
        </a>
      </div>
    </div>
  </header>

  <main class="flex-1">
