<?php
/** 404.php — mirrors NotFoundComponent in __root.tsx */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>
<section class="flex items-center justify-center bg-background px-4 py-24">
  <div class="max-w-md text-center">
    <div class="font-display text-8xl font-bold text-brand">404</div>
    <h1 class="mt-2 font-display text-2xl font-semibold">This slice got away</h1>
    <p class="mt-3 text-sm text-muted-foreground">The page you're looking for is out of the oven and gone. Let's get you back to something delicious.</p>
    <div class="mt-6 flex justify-center gap-3">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center rounded-full bg-brand px-5 py-2.5 text-sm font-semibold text-white btn-glow hover:brightness-110 transition">Back to Home</a>
      <a href="<?php echo esc_url( home_url( '/menu/' ) ); ?>" class="inline-flex items-center rounded-full border border-border bg-background px-5 py-2.5 text-sm font-semibold hover:bg-accent/20 transition">See the Menu</a>
    </div>
  </div>
</section>
<?php get_footer();
