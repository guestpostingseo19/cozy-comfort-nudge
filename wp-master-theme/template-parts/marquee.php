<?php
/**
 * Marquee ticker (mirrors src/components/Marquee.tsx).
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$items = array(
  'Wood-Fired Daily','Free Delivery in Chichawatni','Open Until 2 AM','Hand-Tossed Dough',
  'Fresh Ingredients','Loved by 140+ Families','Since Day One',
);
$row = array_merge( $items, $items );
?>
<div class="relative overflow-hidden bg-charcoal py-4 border-y border-white/5">
  <div class="flex w-max animate-marquee gap-10 whitespace-nowrap">
    <?php foreach ( $row as $t ) : ?>
      <span class="flex items-center gap-3 font-display italic text-2xl sm:text-3xl text-cream/90">
        <span class="text-gold shrink-0"><?php echo oven_icon( 'flame', 'h-5 w-5' ); ?></span>
        <span><?php echo esc_html( $t ); ?></span>
        <span class="text-gold">·</span>
      </span>
    <?php endforeach; ?>
  </div>
  <div class="pointer-events-none absolute inset-y-0 left-0 w-20" style="background:linear-gradient(to right, var(--charcoal), transparent);"></div>
  <div class="pointer-events-none absolute inset-y-0 right-0 w-20" style="background:linear-gradient(to left, var(--charcoal), transparent);"></div>
</div>
