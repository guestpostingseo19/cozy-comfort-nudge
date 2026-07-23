<?php
/**
 * front-page.php — mirrors src/routes/index.tsx (Home).
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$b = oven_business();
$menu = oven_menu_items();
$deals = oven_deals();
$best = array_slice( array_values( array_filter( $menu, function( $m ) { return ! empty( $m['popular'] ); } ) ), 0, 6 );
?>

<!-- HERO -->
<section class="relative overflow-hidden">
  <div aria-hidden class="pointer-events-none absolute -right-40 top-20 h-[420px] w-[420px] rounded-full bg-brand/15 blur-3xl"></div>
  <div aria-hidden class="pointer-events-none absolute -left-32 bottom-10 h-[320px] w-[320px] rounded-full bg-gold/25 blur-3xl"></div>
  <div aria-hidden class="pointer-events-none absolute right-10 top-1/3 h-24 w-24 rounded-full bg-flame/20 blur-2xl"></div>

  <div class="container-x grid gap-10 lg:grid-cols-2 lg:gap-14 items-center pt-10 pb-20 lg:pt-16 lg:pb-28">
    <div class="relative z-10">
      <span class="inline-flex items-center gap-2 text-flame text-[11px] font-black tracking-[0.3em] uppercase">
        <span class="h-px w-8 bg-flame"></span> Authentic Wood-Fired
      </span>
      <h1 class="mt-5 font-display text-5xl sm:text-6xl lg:text-[5.25rem] font-black leading-[0.98] text-charcoal">
        Artisanal Magic <br />
        <span class="italic text-brand">from the heart.</span>
      </h1>
      <p class="mt-6 max-w-xl text-lg text-muted-foreground leading-relaxed">
        Hand-tossed dough, wood-fired ovens and toppings piled high.
        Dine-in, take-away or free home delivery — open daily until 2 AM.
      </p>

      <div class="mt-9 flex flex-wrap items-center gap-3">
        <a href="<?php echo oven_tel_link(); ?>"
           class="inline-flex items-center gap-2 rounded-xl bg-gold px-7 py-4 text-xs font-black uppercase tracking-[0.2em] text-charcoal btn-chunky btn-chunky-hover">
          <?php echo oven_icon( 'phone', 'h-4 w-4' ); ?> Order Now
        </a>
        <a href="<?php echo esc_url( oven_wa_link() ); ?>" target="_blank" rel="noopener"
           class="inline-flex items-center gap-2 rounded-xl border-2 border-charcoal bg-transparent px-7 py-4 text-xs font-black uppercase tracking-[0.2em] text-charcoal hover:bg-charcoal hover:text-cream transition">
          <?php echo oven_icon( 'message-circle', 'h-4 w-4' ); ?> WhatsApp
        </a>
        <a href="<?php echo esc_url( home_url( '/menu/' ) ); ?>"
           class="inline-flex items-center gap-1.5 px-4 py-4 text-xs font-black uppercase tracking-[0.2em] text-brand">
          See Menu <?php echo oven_icon( 'chevron-right', 'h-4 w-4' ); ?>
        </a>
      </div>

      <div class="mt-10 flex flex-wrap items-center gap-6 text-sm">
        <div class="flex items-center gap-1.5">
          <?php for ( $i=0; $i<5; $i++ ) echo oven_icon( 'star', 'h-4 w-4 fill-gold text-gold' ); ?>
          <span class="ml-2 font-black">4.8</span>
          <span class="text-muted-foreground">(140+ reviews)</span>
        </div>
        <div class="hidden sm:block h-4 w-px bg-border"></div>
        <span class="text-muted-foreground font-medium">Free delivery in Chichawatni</span>
      </div>
    </div>

    <div class="relative">
      <div aria-hidden class="absolute inset-0 scale-125 blur-3xl rounded-full" style="background:radial-gradient(circle at center, color-mix(in oklab, var(--brand) 22%, transparent) 0%, transparent 65%);"></div>
      <div aria-hidden class="absolute inset-6 rounded-full border-2 border-dashed border-gold/40 animate-spin-slow"></div>
      <div class="relative mx-auto w-full max-w-[440px]" style="filter:drop-shadow(0 35px 60px rgba(0,0,0,0.28));">
        <img src="<?php echo oven_img( 'hero-pizza.jpg' ); ?>" alt="Signature wood-fired pizza from The Oven"
             width="1600" height="1200" class="w-full h-auto object-cover rounded-full animate-float" />
      </div>

      <div class="absolute top-6 right-2 sm:right-6 bg-white/85 backdrop-blur-md border border-white/60 shadow-xl rounded-2xl px-4 py-2.5 flex items-center gap-2.5 animate-float-tilt z-20">
        <span class="relative flex h-2 w-2">
          <span class="absolute inline-flex h-full w-full rounded-full bg-flame opacity-75 animate-ping"></span>
          <span class="relative inline-flex h-2 w-2 rounded-full bg-flame"></span>
        </span>
        <span class="text-[10px] font-black uppercase tracking-[0.2em] text-charcoal">Open until 2 AM</span>
      </div>

      <div class="absolute -bottom-4 left-0 sm:left-6 rounded-2xl bg-charcoal text-cream shadow-2xl border border-white/10 px-5 py-4 flex items-center gap-4 z-20">
        <div class="grid h-11 w-11 place-items-center rounded-xl bg-gold text-charcoal">
          <?php echo oven_icon( 'star', 'h-5 w-5 fill-charcoal' ); ?>
        </div>
        <div>
          <div class="text-[10px] font-black uppercase tracking-[0.2em] text-gold">Rated</div>
          <div class="font-display text-xl font-black leading-none mt-0.5">4.8 · 140+ reviews</div>
        </div>
      </div>

      <div class="hidden sm:flex absolute -bottom-6 -right-2 h-24 w-24 rounded-full bg-flame text-white items-center justify-center shadow-2xl font-display font-black text-center leading-tight animate-pulse-ring" style="transform:rotate(-12deg);">
        <span class="text-[11px] uppercase tracking-widest px-2">Deals from Rs 400</span>
      </div>
    </div>
  </div>
</section>

<?php get_template_part( 'template-parts/marquee' ); ?>

<!-- FEATURE STRIP -->
<section class="bg-charcoal text-cream">
  <div class="container-x py-14">
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      <?php
        $features = array(
          array( 'icon' => 'flame',        'title' => 'Wood-Fired',    'desc' => 'Real oven-baked crust, crispy edges, molten centre.' ),
          array( 'icon' => 'truck',        'title' => 'Free Delivery', 'desc' => 'Free home delivery across Chichawatni city.' ),
          array( 'icon' => 'award',        'title' => '4.8★ Rated',    'desc' => 'Loved by 140+ happy customers and counting.' ),
          array( 'icon' => 'shield-check', 'title' => 'Fresh Daily',   'desc' => 'Dough, sauces and toppings made fresh every day.' ),
        );
        foreach ( $features as $i => $f ) : ?>
        <div class="reveal group relative rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-sm hover:bg-white/10 transition-all duration-500 hover:-translate-y-1" style="transition-delay: <?php echo $i * 80; ?>ms">
          <div class="grid h-14 w-14 place-items-center rounded-2xl bg-gold text-charcoal shadow-lg" style="box-shadow:0 8px 20px -8px rgba(252,227,0,0.4);">
            <?php echo oven_icon( $f['icon'], 'h-6 w-6' ); ?>
          </div>
          <h3 class="mt-5 font-display text-xl font-black text-white"><?php echo esc_html( $f['title'] ); ?></h3>
          <p class="mt-1.5 text-sm text-cream/70 leading-relaxed"><?php echo esc_html( $f['desc'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- BEST SELLERS -->
<section class="container-x py-20">
  <div class="flex items-end justify-between flex-wrap gap-4 reveal">
    <div>
      <div class="text-[11px] font-black uppercase tracking-[0.3em] text-flame">Chichawatni Favourites</div>
      <h2 class="mt-3 font-display text-4xl sm:text-5xl font-black">Best Sellers</h2>
      <div class="mt-3 h-1 w-12 bg-gold"></div>
    </div>
    <a href="<?php echo esc_url( home_url( '/menu/' ) ); ?>" class="text-[11px] font-black uppercase tracking-[0.25em] text-brand inline-flex items-center gap-2 group">
      Explore All <?php echo oven_icon( 'chevron-right', 'h-4 w-4' ); ?>
    </a>
  </div>
  <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <?php foreach ( $best as $i => $item ) : ?>
      <article class="reveal group card-3d card-3d-hover overflow-hidden rounded-3xl bg-card border border-border shadow-sm hover:shadow-2xl" style="transition-delay: <?php echo $i * 70; ?>ms">
        <div class="relative aspect-[4/3] overflow-hidden shine">
          <img src="<?php echo oven_img( $item['img'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>"
               width="900" height="675" loading="lazy"
               class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" />
          <?php if ( ! empty( $item['popular'] ) ) : ?>
            <span class="absolute top-3 left-3 rounded-sm bg-flame text-white text-[9px] font-black uppercase tracking-[0.18em] px-2 py-1 shadow-lg">Top Rated</span>
          <?php endif; ?>
          <button aria-label="Add <?php echo esc_attr( $item['name'] ); ?>" class="absolute bottom-3 right-3 h-10 w-10 rounded-full bg-white shadow-xl grid place-items-center text-brand hover:bg-gold hover:text-charcoal active:scale-90 transition">
            <?php echo oven_icon( 'plus', 'h-5 w-5' ); ?>
          </button>
        </div>
        <div class="p-5">
          <div class="flex items-start justify-between gap-3">
            <h3 class="font-display text-xl font-black"><?php echo esc_html( $item['name'] ); ?></h3>
            <span class="whitespace-nowrap font-black text-brand"><?php echo esc_html( $item['price'] ); ?></span>
          </div>
          <p class="mt-1.5 text-sm text-muted-foreground line-clamp-2"><?php echo esc_html( $item['desc'] ); ?></p>
          <div class="mt-4 flex items-center justify-between">
            <div class="flex items-center gap-1 text-xs text-muted-foreground">
              <?php if ( ! empty( $item['spice'] ) ) : for ( $s=0; $s<$item['spice']; $s++ ) echo oven_icon( 'flame', 'h-3.5 w-3.5 text-flame' ); ?>
                <span class="ml-1">Spice</span>
              <?php endif; ?>
            </div>
            <a href="<?php echo esc_url( oven_wa_link( "Hi! I'd like to order " . $item['name'] . '.' ) ); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-1 text-xs font-black uppercase tracking-widest text-brand hover:text-flame">
              Order <?php echo oven_icon( 'chevron-right', 'h-3 w-3' ); ?>
            </a>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<!-- DEALS TEASER -->
<section class="py-16 text-cream relative overflow-hidden" style="background:linear-gradient(135deg, var(--charcoal), var(--charcoal), #2a1a10);">
  <div class="absolute inset-0" style="opacity:0.10; background-image:url('<?php echo oven_img( 'oven.jpg' ); ?>'); background-size:cover; background-position:center;"></div>
  <div class="container-x relative">
    <div class="max-w-2xl">
      <div class="text-xs font-semibold uppercase tracking-widest text-gold">Happy Student Deals · 10 AM – 5 PM</div>
      <h2 class="mt-2 font-display text-4xl sm:text-5xl font-bold text-white">Deals worth the drive.</h2>
      <p class="mt-3 text-cream/70">From Rs 400 shawarma combos to loaded family pizzas — fresh from our oven, easy on the wallet.</p>
    </div>
    <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      <?php foreach ( array_slice( $deals, 0, 3 ) as $d ) :
        $hl = ! empty( $d['highlight'] );
      ?>
        <div class="rounded-2xl p-6 border transition <?php echo $hl ? 'bg-brand text-white border-brand' : 'bg-white/5 border-white/10 hover:bg-white/10'; ?>">
          <div class="text-xs uppercase tracking-widest font-bold <?php echo $hl ? 'text-white/80' : 'text-gold'; ?>"><?php echo esc_html( $d['tag'] ); ?></div>
          <h3 class="mt-2 font-display text-2xl font-bold"><?php echo esc_html( $d['title'] ); ?></h3>
          <div class="mt-3 font-display text-4xl font-bold"><?php echo esc_html( $d['price'] ); ?></div>
          <ul class="mt-4 space-y-1.5 text-sm opacity-90">
            <?php foreach ( $d['perks'] as $p ) echo '<li>· ' . esc_html( $p ) . '</li>'; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="mt-8">
      <a href="<?php echo esc_url( home_url( '/deals/' ) ); ?>" class="inline-flex items-center gap-2 rounded-full bg-gold text-charcoal px-6 py-3 text-sm font-bold hover:brightness-110 transition">
        See all deals <?php echo oven_icon( 'chevron-right', 'h-4 w-4' ); ?>
      </a>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="container-x py-16 grid gap-12 lg:grid-cols-2 items-center">
  <div class="relative">
    <img src="<?php echo oven_img( 'chef.jpg' ); ?>" alt="Our chef preparing a fresh pizza at The Oven Chichawatni" width="1200" height="1400" loading="lazy" class="rounded-3xl w-full h-auto object-cover shadow-xl" />
    <div class="absolute -bottom-6 -right-4 sm:right-6 rounded-2xl bg-card border border-border shadow-xl px-5 py-4">
      <div class="font-display text-3xl font-bold text-brand">10+</div>
      <div class="text-xs uppercase tracking-widest text-muted-foreground">Years serving Chichawatni</div>
    </div>
  </div>
  <div>
    <div class="text-xs font-semibold uppercase tracking-widest text-brand">Our Story</div>
    <h2 class="mt-2 font-display text-4xl sm:text-5xl font-bold">Real pizza. Real fire. Real people.</h2>
    <p class="mt-5 text-muted-foreground leading-relaxed">
      The Oven Pizza was born from a simple idea: Chichawatni deserved pizza as good as anything in the big cities. So we imported the technique — hand-tossed dough, wood-fired ovens, imported cheese — and paired it with the flavours our community loves.
    </p>
    <p class="mt-4 text-muted-foreground leading-relaxed">
      Today we serve hundreds of happy families every week from our home on Kamboh Road, with dine-in, take-away and free home delivery across the city.
    </p>
    <div class="mt-6 grid grid-cols-3 gap-4">
      <?php foreach ( array( array('4.8★','Rating'), array('140+','Reviews'), array('2 AM','Open till') ) as $s ) : ?>
        <div class="rounded-2xl bg-cream border border-border p-4 text-center">
          <div class="font-display text-2xl font-bold text-brand"><?php echo esc_html( $s[0] ); ?></div>
          <div class="mt-0.5 text-xs uppercase tracking-widest text-muted-foreground"><?php echo esc_html( $s[1] ); ?></div>
        </div>
      <?php endforeach; ?>
    </div>
    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-brand hover:underline">
      Read our full story <?php echo oven_icon( 'chevron-right', 'h-4 w-4' ); ?>
    </a>
  </div>
</section>

<!-- HOW ORDERING WORKS -->
<section class="container-x py-14">
  <div class="text-center">
    <div class="text-xs font-semibold uppercase tracking-widest text-brand">Simple &amp; Fast</div>
    <h2 class="mt-2 font-display text-4xl sm:text-5xl font-bold">How ordering works</h2>
  </div>
  <div class="mt-10 grid gap-6 md:grid-cols-3">
    <?php foreach ( array(
      array('01','Pick your favourite',"Browse our menu, deals and Chichawatni favourites."),
      array('02','Call or WhatsApp',"Message us or ring — we'll confirm in seconds."),
      array('03','Fresh at your door','Free home delivery, hot from the oven.'),
    ) as $s ) : ?>
      <div class="rounded-3xl border border-border bg-card p-8 relative overflow-hidden">
        <div class="absolute -top-4 -right-4 font-display text-8xl font-bold text-brand/5"><?php echo esc_html( $s[0] ); ?></div>
        <div class="relative">
          <div class="font-display text-sm font-bold text-brand"><?php echo esc_html( $s[0] ); ?></div>
          <h3 class="mt-2 font-display text-2xl font-bold"><?php echo esc_html( $s[1] ); ?></h3>
          <p class="mt-2 text-muted-foreground"><?php echo esc_html( $s[2] ); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="container-x py-14">
  <div class="text-center">
    <div class="text-xs font-semibold uppercase tracking-widest text-brand">Loved locally</div>
    <h2 class="mt-2 font-display text-4xl sm:text-5xl font-bold">What Chichawatni is saying</h2>
  </div>
  <div class="mt-10 grid gap-5 md:grid-cols-3">
    <?php foreach ( array(
      array('Ahmed R.',"Best pizza in Chichawatni, no question. The crown crust is unreal."),
      array('Sana K.',"Delivery was fast, food was piping hot. My kids ask for The Oven every weekend."),
      array('Bilal M.',"Great deals, great taste. The Rs 400 shawarma combo is a steal."),
      array('Ayesha F.',"Cosy interior, friendly staff. We come here for every family dinner."),
      array('Hamza S.',"Late-night lifesaver. Open till 2 AM and the wings are addictive."),
      array('Iqra J.',"Fresh ingredients, real oven — you can tell the difference in every bite."),
    ) as $t ) : ?>
      <blockquote class="rounded-3xl border border-border bg-card p-6 shadow-sm">
        <div class="flex gap-0.5"><?php for ( $i=0;$i<5;$i++ ) echo oven_icon('star','h-4 w-4 fill-gold text-gold'); ?></div>
        <p class="mt-3 text-foreground/90">"<?php echo esc_html( $t[1] ); ?>"</p>
        <footer class="mt-4 flex items-center gap-3">
          <div class="grid h-9 w-9 place-items-center rounded-full bg-brand/10 text-brand font-bold text-sm"><?php echo esc_html( substr( $t[0], 0, 1 ) ); ?></div>
          <div>
            <div class="text-sm font-semibold"><?php echo esc_html( $t[0] ); ?></div>
            <div class="text-xs text-muted-foreground">Verified customer</div>
          </div>
        </footer>
      </blockquote>
    <?php endforeach; ?>
  </div>
  <div class="mt-8 text-center">
    <a href="<?php echo esc_url( home_url( '/reviews/' ) ); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-brand hover:underline">
      Read all reviews <?php echo oven_icon( 'chevron-right', 'h-4 w-4' ); ?>
    </a>
  </div>
</section>

<!-- LOCATION -->
<section class="container-x py-14 grid gap-8 lg:grid-cols-5">
  <div class="lg:col-span-2 space-y-6">
    <div>
      <div class="text-xs font-semibold uppercase tracking-widest text-brand">Come visit</div>
      <h2 class="mt-2 font-display text-4xl font-bold">Find us in Chichawatni</h2>
    </div>
    <div class="rounded-2xl border border-border bg-card p-5 space-y-4">
      <div class="flex gap-3"><span class="text-brand shrink-0 mt-0.5"><?php echo oven_icon('map-pin','h-5 w-5'); ?></span><div><div class="font-semibold">Address</div><div class="text-sm text-muted-foreground"><?php echo esc_html( $b['address'] ); ?></div></div></div>
      <div class="flex gap-3"><span class="text-brand shrink-0 mt-0.5"><?php echo oven_icon('phone','h-5 w-5'); ?></span><div><div class="font-semibold">Phone</div><a href="<?php echo oven_tel_link(); ?>" class="text-sm text-muted-foreground hover:text-brand"><?php echo esc_html( $b['phone'] ); ?></a></div></div>
      <div class="flex gap-3"><span class="text-brand shrink-0 mt-0.5"><?php echo oven_icon('clock','h-5 w-5'); ?></span><div><div class="font-semibold">Hours</div><div class="text-sm text-muted-foreground"><?php echo esc_html( $b['hours'] ); ?></div></div></div>
      <div class="flex gap-3"><span class="text-brand shrink-0 mt-0.5"><?php echo oven_icon('chef-hat','h-5 w-5'); ?></span><div><div class="font-semibold">Dining</div><div class="text-sm text-muted-foreground">Dine-in · Take-away · Free home delivery</div></div></div>
    </div>
  </div>
  <div class="lg:col-span-3 rounded-3xl overflow-hidden border border-border shadow-lg min-h-[380px]">
    <iframe src="<?php echo esc_url( $b['map_embed'] ); ?>" title="The Oven Pizza Chichawatni location" class="w-full h-full min-h-[380px]" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>

<!-- FINAL CTA -->
<section class="container-x py-16">
  <div class="relative overflow-hidden rounded-[2rem] px-8 sm:px-14 py-14 text-white" style="background:linear-gradient(135deg, var(--brand), var(--brand), #8B1A1A);">
    <div class="absolute inset-0" style="opacity:0.20; background-image:url('<?php echo oven_img( 'ingredients.jpg' ); ?>'); background-size:cover; background-position:center;"></div>
    <div class="relative max-w-2xl">
      <div class="text-xs font-semibold uppercase tracking-widest text-gold">Hungry yet?</div>
      <h2 class="mt-2 font-display text-4xl sm:text-5xl font-bold">Your favourite pizza is one call away.</h2>
      <p class="mt-4 text-white/85">Order now for free home delivery in Chichawatni, or drop by our restaurant on Kamboh Road.</p>
      <div class="mt-8 flex flex-wrap gap-3">
        <a href="<?php echo oven_tel_link(); ?>" class="inline-flex items-center gap-2 rounded-full bg-white text-brand px-7 py-3.5 text-sm font-bold hover:brightness-105 transition">
          <?php echo oven_icon( 'phone', 'h-4 w-4' ); ?> Call <?php echo esc_html( $b['phone'] ); ?>
        </a>
        <a href="<?php echo esc_url( oven_wa_link() ); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-charcoal text-white px-7 py-3.5 text-sm font-bold hover:bg-charcoal/80 transition">
          <?php echo oven_icon( 'message-circle', 'h-4 w-4' ); ?> WhatsApp Order
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer();
