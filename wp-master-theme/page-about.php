<?php
/** page-about.php — mirrors src/routes/about.tsx */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$hero_eyebrow  = 'Our Story';
$hero_title    = 'Real pizza. Real fire. Real people.';
$hero_subtitle = "Since day one, we've had one mission: bring premium wood-fired pizza to the heart of Chichawatni.";
include get_template_directory() . '/template-parts/page-hero.php';
?>
<section class="container-x py-14 grid gap-10 lg:grid-cols-2 items-center">
  <img src="<?php echo oven_img( 'chef.jpg' ); ?>" alt="Chef preparing pizza at The Oven" width="1200" height="1400" loading="lazy" class="rounded-3xl shadow-xl w-full" />
  <div>
    <h2 class="font-display text-4xl font-bold">A neighbourhood pizzeria with a big-city soul.</h2>
    <p class="mt-4 text-muted-foreground leading-relaxed">
      The Oven Pizza started as a family dream on Kamboh Road — a place where Chichawatni families could gather over food that felt special without feeling far away. We invested in real wood-fired ovens, trained our chefs in classic pizza technique, and paired it with flavours our community actually loves.
    </p>
    <p class="mt-4 text-muted-foreground leading-relaxed">
      Today, we're proudly rated 4.8 stars by 140+ neighbours who keep coming back for the tikka pizza, the crown crust, the late-night wings and the warm welcome that comes with every order.
    </p>
  </div>
</section>

<section class="container-x py-14">
  <div class="text-center max-w-2xl mx-auto">
    <div class="text-xs font-semibold uppercase tracking-widest text-brand">What we stand for</div>
    <h2 class="mt-2 font-display text-4xl font-bold">Our promise to Chichawatni</h2>
  </div>
  <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
    <?php foreach ( array(
      array('flame','Wood-fired every time','No shortcuts. Real oven, real fire, real crust.'),
      array('heart','Made with love','Family recipes, fresh ingredients, honest prices.'),
      array('award','Quality-obsessed','Imported cheese, hand-cut vegetables, dough made daily.'),
      array('users','For families',"Cosy dining, a kids' play area and warm service."),
    ) as $v ) : ?>
      <div class="rounded-2xl border border-border bg-card p-6">
        <div class="grid h-12 w-12 place-items-center rounded-xl bg-brand/10 text-brand">
          <?php echo oven_icon( $v[0], 'h-5 w-5' ); ?>
        </div>
        <h3 class="mt-4 font-display text-lg font-bold"><?php echo esc_html( $v[1] ); ?></h3>
        <p class="mt-1 text-sm text-muted-foreground"><?php echo esc_html( $v[2] ); ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="container-x py-14 grid gap-10 lg:grid-cols-2 items-center">
  <div class="order-2 lg:order-1">
    <h2 class="font-display text-4xl font-bold">Fresh ingredients, always.</h2>
    <p class="mt-4 text-muted-foreground leading-relaxed">
      Our dough is made fresh every single morning. Our vegetables are hand-chopped on the day. Our cheese is real mozzarella that melts into that unforgettable pull. If it isn't fresh, it doesn't leave our kitchen.
    </p>
    <ul class="mt-6 space-y-3 text-sm">
      <?php foreach ( array(
        'Fresh dough made every morning',
        'Real mozzarella and imported cheddar',
        'Farm-fresh vegetables and herbs',
        'House-made sauces & marinades',
        'Chicken marinated for 24 hours',
      ) as $t ) : ?>
        <li class="flex gap-2"><span class="text-brand">✓</span><?php echo esc_html( $t ); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <img src="<?php echo oven_img( 'ingredients.jpg' ); ?>" alt="Fresh pizza ingredients" width="1200" height="900" loading="lazy" class="rounded-3xl shadow-xl w-full order-1 lg:order-2" />
</section>

<section class="container-x py-14">
  <div class="relative overflow-hidden rounded-[2rem]">
    <img src="<?php echo oven_img( 'interior.jpg' ); ?>" alt="The Oven Pizza restaurant interior" width="1400" height="1000" loading="lazy" class="w-full h-[380px] object-cover" />
    <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(30,37,34,0.85), rgba(30,37,34,0.30), transparent);"></div>
    <div class="absolute inset-0 flex flex-col justify-end p-8 sm:p-12 text-white">
      <h2 class="font-display text-3xl sm:text-4xl font-bold max-w-xl">Come dine with us in the heart of Chichawatni.</h2>
      <p class="mt-3 max-w-lg text-white/85">Cosy seating, a kids' play area and pizza fresh out of the oven — every day until 2 AM.</p>
      <div class="mt-6"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="inline-flex items-center rounded-full bg-white text-charcoal px-6 py-3 text-sm font-bold">Get directions</a></div>
    </div>
  </div>
</section>
<?php get_footer();
