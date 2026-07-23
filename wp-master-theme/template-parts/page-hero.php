<?php
/**
 * Shared PageHero component (mirrors <PageHero /> in SiteLayout.tsx).
 * Usage: set $hero_eyebrow, $hero_title, $hero_subtitle before include.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$eyebrow  = isset( $hero_eyebrow )  ? $hero_eyebrow  : '';
$title    = isset( $hero_title )    ? $hero_title    : '';
$subtitle = isset( $hero_subtitle ) ? $hero_subtitle : '';
?>
<section class="relative overflow-hidden pt-14 pb-12 sm:pt-20 sm:pb-16" style="background:linear-gradient(to bottom, rgba(0,168,150,0.05), var(--background), var(--background));">
  <div class="absolute inset-0 pointer-events-none" style="opacity:0.04;background-image:radial-gradient(circle at 20% 20%, var(--brand) 0, transparent 40%), radial-gradient(circle at 80% 60%, var(--flame) 0, transparent 40%);"></div>
  <div class="container-x relative text-center">
    <?php if ( $eyebrow ) : ?>
      <div class="inline-flex items-center gap-2 rounded-full bg-brand/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-brand">
        <?php echo esc_html( $eyebrow ); ?>
      </div>
    <?php endif; ?>
    <h1 class="mt-4 font-display text-4xl sm:text-5xl md:text-6xl font-bold text-charcoal">
      <?php echo esc_html( $title ); ?>
    </h1>
    <?php if ( $subtitle ) : ?>
      <p class="mx-auto mt-4 max-w-2xl text-base sm:text-lg text-muted-foreground">
        <?php echo esc_html( $subtitle ); ?>
      </p>
    <?php endif; ?>
  </div>
</section>
