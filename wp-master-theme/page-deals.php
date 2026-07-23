<?php
/** page-deals.php — mirrors src/routes/deals.tsx */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$hero_eyebrow  = 'Deals & Offers';
$hero_title    = 'Big flavours. Little prices.';
$hero_subtitle = 'Happy Student Deals available 10 AM – 5 PM every day. Family combos and weekend offers all week long.';
include get_template_directory() . '/template-parts/page-hero.php';
$deals = oven_deals();
?>
<section class="container-x pb-16">
  <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
    <?php foreach ( $deals as $d ) :
      $hl = ! empty( $d['highlight'] );
    ?>
      <div class="relative overflow-hidden rounded-3xl border p-8 shadow-sm hover:-translate-y-1 hover:shadow-2xl transition <?php echo $hl ? 'bg-brand text-white border-brand' : 'bg-card border-border'; ?>">
        <div class="text-xs font-bold uppercase tracking-widest <?php echo $hl ? 'text-white/80' : 'text-brand'; ?>"><?php echo esc_html( $d['tag'] ); ?></div>
        <h3 class="mt-2 font-display text-2xl font-bold"><?php echo esc_html( $d['title'] ); ?></h3>
        <div class="mt-4 font-display text-5xl font-bold"><?php echo esc_html( $d['price'] ); ?></div>
        <ul class="mt-6 space-y-2 text-sm <?php echo $hl ? 'text-white/90' : 'text-muted-foreground'; ?>">
          <?php foreach ( $d['perks'] as $p ) echo '<li>· ' . esc_html( $p ) . '</li>'; ?>
        </ul>
        <div class="mt-6 flex gap-2">
          <a href="<?php echo esc_url( oven_wa_link( "Hi! I'd like " . $d['tag'] . ': ' . $d['title'] ) ); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-bold <?php echo $hl ? 'bg-white text-brand' : 'bg-brand text-white'; ?>">
            <?php echo oven_icon( 'message-circle', 'h-3.5 w-3.5' ); ?> WhatsApp
          </a>
          <a href="<?php echo oven_tel_link(); ?>" class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-bold border <?php echo $hl ? 'border-white/40 text-white' : 'border-border'; ?>">
            <?php echo oven_icon( 'phone', 'h-3.5 w-3.5' ); ?> Call
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="container-x pb-16">
  <div class="rounded-3xl border p-8 sm:p-12" style="background:linear-gradient(135deg, rgba(252,227,0,0.20), rgba(214,40,40,0.10)); border-color:rgba(252,227,0,0.40);">
    <div class="grid gap-6 sm:grid-cols-[1fr_auto] items-center">
      <div>
        <div class="text-xs font-bold uppercase tracking-widest text-brand">Weekend Special</div>
        <h3 class="mt-2 font-display text-3xl font-bold">Family Feast · Serves 4</h3>
        <p class="mt-2 text-muted-foreground max-w-xl">Large Signature Pizza + 6 Wings + Fries + 1.5L Drink. Available Friday to Sunday only.</p>
      </div>
      <div class="text-center">
        <div class="font-display text-5xl font-bold text-brand">Rs 2999</div>
        <a href="<?php echo esc_url( oven_wa_link( "Hi! I'd like the Weekend Family Feast (Rs 2999)." ) ); ?>" target="_blank" rel="noopener" class="mt-3 inline-flex items-center gap-2 rounded-full bg-brand text-white px-6 py-3 text-sm font-bold">
          <?php echo oven_icon( 'message-circle', 'h-4 w-4' ); ?> Order this deal
        </a>
      </div>
    </div>
  </div>
</section>
<?php get_footer();
