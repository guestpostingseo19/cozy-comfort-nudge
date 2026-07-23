<?php
/** page-menu.php — mirrors src/routes/menu.tsx */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$hero_eyebrow  = 'Our Menu';
$hero_title    = 'Fresh from the oven.';
$hero_subtitle = 'Every pizza is hand-tossed, every topping is fresh, and every bite is worth it. Prices vary by size.';
include get_template_directory() . '/template-parts/page-hero.php';
$items = oven_menu_items();
$cats  = oven_categories();
?>
<section class="container-x pb-16">
  <div data-menu-filter class="sticky top-24 z-30 -mx-4 px-4 py-3 bg-background/85 backdrop-blur border-b border-border overflow-x-auto">
    <div class="flex gap-2 whitespace-nowrap">
      <?php $all = array_merge( array( 'All' ), $cats ); foreach ( $all as $c ) : ?>
        <button data-cat="<?php echo esc_attr( $c ); ?>" class="menu-chip px-4 py-2 rounded-full text-sm font-semibold transition bg-card border border-border hover:bg-accent/20">
          <?php echo esc_html( $c ); ?>
        </button>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <?php foreach ( $items as $item ) : ?>
      <article data-menu-card data-cat="<?php echo esc_attr( $item['category'] ); ?>"
               class="group overflow-hidden rounded-3xl bg-card border border-border shadow-sm hover:shadow-2xl transition-all hover:-translate-y-1">
        <div class="relative aspect-[4/3] overflow-hidden">
          <img src="<?php echo oven_img( $item['img'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" width="900" height="675" loading="lazy" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
          <?php if ( ! empty( $item['popular'] ) ) : ?>
            <span class="absolute top-3 left-3 rounded-full bg-brand text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1">Popular</span>
          <?php endif; ?>
          <span class="absolute top-3 right-3 rounded-full bg-white/95 text-charcoal text-[10px] font-bold uppercase tracking-wider px-3 py-1"><?php echo esc_html( $item['category'] ); ?></span>
        </div>
        <div class="p-5">
          <div class="flex items-start justify-between gap-3">
            <h3 class="font-display text-xl font-bold"><?php echo esc_html( $item['name'] ); ?></h3>
            <span class="whitespace-nowrap font-semibold text-brand"><?php echo esc_html( $item['price'] ); ?></span>
          </div>
          <p class="mt-1.5 text-sm text-muted-foreground"><?php echo esc_html( $item['desc'] ); ?></p>
          <div class="mt-4 flex items-center justify-between">
            <div class="flex items-center gap-1 text-xs text-muted-foreground">
              <?php if ( ! empty( $item['spice'] ) ) : for ( $s=0; $s<$item['spice']; $s++ ) echo oven_icon( 'flame', 'h-3.5 w-3.5 text-flame' ); ?>
                <span class="ml-1">Spice</span>
              <?php endif; ?>
            </div>
            <a href="<?php echo esc_url( oven_wa_link( "Hi! I'd like to order " . $item['name'] . '.' ) ); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-1 rounded-full bg-brand text-white text-xs font-semibold px-4 py-2 hover:brightness-110">
              Order <?php echo oven_icon( 'chevron-right', 'h-3 w-3' ); ?>
            </a>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>
<style>
  .menu-chip.is-active { background: var(--brand) !important; color: #fff !important; border-color: var(--brand) !important; box-shadow: 0 10px 30px -10px color-mix(in oklab, var(--brand) 55%, transparent); }
</style>
<?php get_footer();
