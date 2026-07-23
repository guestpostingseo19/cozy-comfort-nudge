<?php
/** page.php — generic page fallback for any page not routed by page-{slug}.php. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();
  $hero_title = get_the_title();
  $hero_subtitle = '';
  include get_template_directory() . '/template-parts/page-hero.php';
?>
<section class="container-x pb-16 max-w-3xl">
  <div class="prose prose-lg text-muted-foreground leading-relaxed"><?php the_content(); ?></div>
</section>
<?php endwhile; endif;
get_footer();
