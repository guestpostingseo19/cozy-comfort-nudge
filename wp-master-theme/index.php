<?php
/** index.php — generic fallback template (posts / archives / single). */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>
<section class="container-x py-16">
  <?php if ( have_posts() ) : ?>
    <div class="grid gap-8 lg:grid-cols-3">
      <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class( 'rounded-3xl overflow-hidden border border-border bg-card shadow-sm hover:shadow-2xl transition' ); ?>>
          <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" class="block aspect-[4/3] overflow-hidden">
              <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
            </a>
          <?php endif; ?>
          <div class="p-6">
            <h2 class="font-display text-2xl font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="mt-3 text-muted-foreground text-sm"><?php the_excerpt(); ?></div>
            <a class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-brand" href="<?php the_permalink(); ?>">Read more →</a>
          </div>
        </article>
      <?php endwhile; ?>
    </div>
    <div class="mt-10"><?php the_posts_pagination(); ?></div>
  <?php else : ?>
    <p class="text-muted-foreground">No posts yet.</p>
  <?php endif; ?>
</section>
<?php get_footer();
