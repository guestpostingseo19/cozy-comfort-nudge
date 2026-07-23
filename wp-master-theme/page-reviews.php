<?php
/** page-reviews.php — mirrors src/routes/reviews.tsx */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$hero_eyebrow  = 'Customer Reviews';
$hero_title    = 'Loved by Chichawatni.';
$hero_subtitle = 'Rated 4.8 out of 5 by 140+ verified customers across Google, Facebook and in-store.';
include get_template_directory() . '/template-parts/page-hero.php';
$reviews = array(
  array('Ahmed R.',"Best pizza in Chichawatni, no question. The crown crust is unreal — cheese pull for days.",5),
  array('Sana K.',"Delivery was fast, food was piping hot. My kids ask for The Oven every weekend.",5),
  array('Bilal M.',"Great deals, great taste. The Rs 400 shawarma combo is a steal for lunch.",5),
  array('Ayesha F.',"Cosy interior, friendly staff, and the kids love the play area. Family dinner sorted.",5),
  array('Hamza S.',"Late-night lifesaver. Open till 2 AM and the wings are seriously addictive.",5),
  array('Iqra J.',"Fresh ingredients, real oven — you can taste the difference in every bite.",5),
  array('Usman T.',"The Arabic Bite is my new favourite. Perfectly spiced, generous toppings.",5),
  array('Mariam A.',"Ordered for a birthday — pizzas arrived hot, on time, beautifully packed.",5),
  array('Farhan Q.',"Consistent quality every visit. That's what earns my loyalty.",4),
  array('Nida H.',"The creamy chicken pizza is chef's kiss. So rich and cheesy.",5),
  array('Zain B.',"Fair prices, big portions, warm service. Everything a local pizza place should be.",5),
  array('Rabia S.',"I've tried them all — The Oven is on top. Their dough is next-level.",5),
);
?>
<section class="container-x pb-8">
  <div class="mx-auto max-w-md rounded-3xl border border-border bg-card p-6 text-center shadow-sm">
    <div class="font-display text-6xl font-bold text-brand">4.8</div>
    <div class="mt-2 flex justify-center gap-1"><?php for ( $i=0;$i<5;$i++ ) echo oven_icon('star','h-5 w-5 fill-gold text-gold'); ?></div>
    <div class="mt-1 text-sm text-muted-foreground">Based on 140+ verified reviews</div>
  </div>
</section>

<section class="container-x pb-16">
  <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
    <?php foreach ( $reviews as $r ) : ?>
      <blockquote class="rounded-3xl border border-border bg-card p-6 shadow-sm">
        <div class="flex gap-0.5">
          <?php for ( $i=0;$i<$r[2];$i++ ) echo oven_icon('star','h-4 w-4 fill-gold text-gold'); ?>
          <?php for ( $i=0;$i<(5-$r[2]);$i++ ) echo oven_icon('star','h-4 w-4 text-muted'); ?>
        </div>
        <p class="mt-3 text-foreground/90">"<?php echo esc_html( $r[1] ); ?>"</p>
        <footer class="mt-4 flex items-center gap-3">
          <div class="grid h-9 w-9 place-items-center rounded-full bg-brand/10 text-brand font-bold text-sm"><?php echo esc_html( substr( $r[0], 0, 1 ) ); ?></div>
          <div>
            <div class="text-sm font-semibold"><?php echo esc_html( $r[0] ); ?></div>
            <div class="text-xs text-muted-foreground">Verified customer</div>
          </div>
        </footer>
      </blockquote>
    <?php endforeach; ?>
  </div>
</section>
<?php get_footer();
