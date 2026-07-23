<?php
/** page-gallery.php — mirrors src/routes/gallery.tsx */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$hero_eyebrow  = 'Gallery';
$hero_title    = "A taste of what's inside.";
$hero_subtitle = 'Peek into our kitchen, our dining room and the pizzas fresh out of the oven.';
include get_template_directory() . '/template-parts/page-hero.php';
$shots = array(
  array( 'hero-pizza.jpg', 'Signature wood-fired pizza', 'row-span-2 col-span-2' ),
  array( 'chef.jpg',       'Chef at wood-fired oven',   'row-span-2' ),
  array( 'pizza-2.jpg',    'Creamy chicken pizza',      '' ),
  array( 'pizza-3.jpg',    'Chicken tikka pizza',       '' ),
  array( 'interior.jpg',   'Restaurant interior',       'col-span-2' ),
  array( 'wings.jpg',      'Chicken wings',             '' ),
  array( 'burger.jpg',     'Zinger burger',             '' ),
  array( 'shawarma.jpg',   'Chicken shawarma',          '' ),
  array( 'sandwich.jpg',   'Pan sandwich with fries',   '' ),
  array( 'oven.jpg',       'Wood-fired oven flames',    '' ),
  array( 'pizza-1.jpg',    'Pepperoni pizza',           '' ),
  array( 'fries.jpg',      'Golden fries',              '' ),
  array( 'ingredients.jpg','Fresh pizza ingredients',   'col-span-2' ),
);
?>
<section class="container-x pb-16">
  <div class="grid grid-cols-2 md:grid-cols-4 auto-rows-[180px] sm:auto-rows-[220px] gap-3">
    <?php foreach ( $shots as $s ) : ?>
      <div class="overflow-hidden rounded-2xl group <?php echo esc_attr( $s[2] ); ?>">
        <img src="<?php echo oven_img( $s[0] ); ?>" alt="<?php echo esc_attr( $s[1] ); ?>" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php get_footer();
