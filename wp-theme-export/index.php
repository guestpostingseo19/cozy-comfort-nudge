<?php
/**
 * Main index template — fallback for all queries that don't have a more specific template.
 * @package theovenpizza
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>

<main class="section">
    <div class="container-x">
        <?php if ( have_posts() ) : ?>
            <header class="section-head reveal">
                <span class="kicker">The Oven Pizza</span>
                <h2><?php echo is_home() ? esc_html__( 'Latest from the kitchen', 'theovenpizza' ) : wp_get_document_title(); ?></h2>
            </header>

            <div class="card-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class( 'card reveal' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a class="img" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>
                        <?php endif; ?>
                        <div class="body">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></div>
                            <div class="row-b">
                                <span class="spice"><?php echo esc_html( get_the_date() ); ?></span>
                                <a class="order-link" href="<?php the_permalink(); ?>">Read &rsaquo;</a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div style="margin-top:40px"><?php the_posts_pagination(); ?></div>

        <?php else : ?>
            <header class="section-head">
                <span class="kicker">Nothing here yet</span>
                <h2><?php esc_html_e( 'No content found', 'theovenpizza' ); ?></h2>
            </header>
            <p><?php esc_html_e( 'Please check back soon or head to the menu to place an order.', 'theovenpizza' ); ?></p>
            <a class="cta-yellow" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Home</a>
        <?php endif; ?>
    </div>
</main>

<?php get_footer();
