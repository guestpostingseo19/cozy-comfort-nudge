<?php
/**
 * Front page template — replicates the React homepage design.
 * @package theovenpizza
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();

$b       = theovenpizza_business();
$img_dir = get_template_directory_uri() . '/assets/images/';
$sellers = theovenpizza_best_sellers();
?>

<!-- ============ HERO ============ -->
<section class="hero">
    <div class="container-x grid">
        <div class="reveal">
            <span class="eyebrow">Authentic Wood-Fired</span>
            <h1>
                Artisanal Magic<br />
                <span class="italic">from the heart.</span>
            </h1>
            <p class="lead">
                Hand-tossed dough, wood-fired ovens and toppings piled high.
                Dine-in, take-away or free home delivery — open daily until 2 AM.
            </p>
            <div class="hero-actions">
                <a class="cta-yellow" href="<?php echo esc_url( theovenpizza_tel_link() ); ?>">&#9742; Order Now</a>
                <a class="cta-outline" href="<?php echo esc_url( theovenpizza_wa_link() ); ?>" target="_blank" rel="noopener">&#128172; WhatsApp</a>
                <a href="<?php echo esc_url( home_url( '/menu/' ) ); ?>" style="color:var(--brand);font-weight:900;font-size:12px;letter-spacing:.2em;text-transform:uppercase">See Menu &rsaquo;</a>
            </div>
            <div class="hero-meta">
                <div><span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span> <strong><?php echo esc_html( $b['rating'] ); ?></strong> <span style="color:var(--muted)">(<?php echo esc_html( $b['reviews'] ); ?>+ reviews)</span></div>
                <span style="color:var(--muted)">Free delivery in Chichawatni</span>
            </div>
        </div>

        <div class="hero-visual reveal">
            <div class="glow" aria-hidden="true"></div>
            <div class="ring" aria-hidden="true"></div>
            <img src="<?php echo esc_url( $img_dir . 'hero-pizza.jpg' ); ?>" alt="Wood-fired signature pizza from The Oven" />
            <div class="badge-open">Open Until 2 AM</div>
            <div class="badge-rating">
                <div class="star-chip">&#9733;</div>
                <div>
                    <div style="font-size:10px;letter-spacing:.2em;text-transform:uppercase;color:rgba(255,255,255,.7)">Rated</div>
                    <div style="font-weight:900"><?php echo esc_html( $b['rating'] ); ?> · <?php echo esc_html( $b['reviews'] ); ?>+ reviews</div>
                </div>
            </div>
            <div class="badge-deal">Deals<br/>from Rs 400</div>
        </div>
    </div>
</section>

<!-- ============ MARQUEE ============ -->
<div class="marquee" aria-hidden="true">
    <div class="marquee-track">
        <span>&#128293; Free Delivery in Chichawatni &nbsp;·&nbsp; &#128293; Open Until 2 AM &nbsp;·&nbsp; &#128293; Hand-Tossed Dough &nbsp;·&nbsp; &#128293; Wood-Fired &nbsp;·&nbsp;</span>
        <span>&#128293; Free Delivery in Chichawatni &nbsp;·&nbsp; &#128293; Open Until 2 AM &nbsp;·&nbsp; &#128293; Hand-Tossed Dough &nbsp;·&nbsp; &#128293; Wood-Fired &nbsp;·&nbsp;</span>
    </div>
</div>

<!-- ============ FEATURES ============ -->
<section class="features">
    <div class="container-x">
        <div class="grid">
            <?php
            $features = array(
                array( '&#128293;', 'Wood-Fired',    'Real oven-baked crust, crispy edges, molten centre.' ),
                array( '&#128666;', 'Free Delivery', 'Free home delivery across Chichawatni city.' ),
                array( '&#127942;', '4.8&#9733; Rated', 'Loved by 140+ happy customers and counting.' ),
                array( '&#128737;', 'Fresh Daily',   'Dough, sauces and toppings made fresh every day.' ),
            );
            foreach ( $features as $f ) : ?>
                <div class="feature reveal">
                    <div class="icon"><?php echo $f[0]; // emoji ?></div>
                    <h3><?php echo $f[1]; ?></h3>
                    <p><?php echo $f[2]; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ BEST SELLERS ============ -->
<section class="section">
    <div class="container-x">
        <header class="section-head reveal" style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:20px">
            <div>
                <span class="kicker">Chichawatni Favourites</span>
                <h2>Best Sellers</h2>
            </div>
            <a href="<?php echo esc_url( home_url( '/menu/' ) ); ?>" style="color:var(--brand);font-weight:900;letter-spacing:.2em;text-transform:uppercase;font-size:12px">Explore All &rsaquo;</a>
        </header>

        <div class="card-grid">
            <?php foreach ( $sellers as $item ) : ?>
                <article class="card reveal">
                    <div class="img">
                        <span class="top-rated">Top Rated</span>
                        <img src="<?php echo esc_url( $item['img'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy" />
                        <button class="add" aria-label="Add <?php echo esc_attr( $item['name'] ); ?>">+</button>
                    </div>
                    <div class="body">
                        <h3><?php echo esc_html( $item['name'] ); ?> <span class="price"><?php echo esc_html( $item['price'] ); ?></span></h3>
                        <div class="desc"><?php echo esc_html( $item['desc'] ); ?></div>
                        <div class="row-b">
                            <span class="spice">
                                <?php for ( $i = 0; $i < max( 1, $item['spice'] ); $i++ ) echo '&#128293;'; ?>
                                &nbsp;Spice
                            </span>
                            <a class="order-link" href="<?php echo esc_url( theovenpizza_tel_link() ); ?>">Order &rsaquo;</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ STORY STRIP ============ -->
<section class="section" style="background:#faf7f2;padding-top:80px;padding-bottom:80px">
    <div class="container-x" style="display:grid;gap:40px;grid-template-columns:1fr;align-items:center">
        <div style="display:grid;gap:24px;grid-template-columns:1fr 1fr;align-items:center">
            <img src="<?php echo esc_url( $img_dir . 'chef.jpg' ); ?>" alt="Our chef at the wood-fired oven" style="border-radius:20px" class="reveal" />
            <div class="reveal">
                <span class="kicker">Our Story</span>
                <h2 style="font-size:clamp(30px,4vw,44px)">Fired by passion, served with love.</h2>
                <p style="color:var(--muted);font-size:16px">
                    Every base is stretched by hand, every sauce simmered slow, every pizza kissed by real wood fire.
                    From the busiest weeknight to a family celebration, The Oven has been Chichawatni's neighbourhood pizzeria — proudly rated 4.8&#9733; by 140+ locals.
                </p>
                <a class="cta-yellow" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- ============ CTA BAND ============ -->
<section style="background:var(--brand);color:#fff;padding:70px 0;text-align:center">
    <div class="container-x reveal">
        <span class="kicker" style="color:var(--gold)">Hungry?</span>
        <h2 style="color:#fff;font-size:clamp(34px,5vw,56px);margin-top:10px">Order in 60 seconds.</h2>
        <p style="max-width:560px;margin:0 auto 26px;color:rgba(255,255,255,.85);font-size:16px">
            Call, WhatsApp or drop by — free delivery across Chichawatni, open daily until 2 AM.
        </p>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
            <a class="cta-yellow" href="<?php echo esc_url( theovenpizza_tel_link() ); ?>">&#9742; Call <?php echo esc_html( $b['phone'] ); ?></a>
            <a class="cta-outline" style="border-color:#fff;color:#fff" href="<?php echo esc_url( theovenpizza_wa_link() ); ?>" target="_blank" rel="noopener">&#128172; WhatsApp</a>
        </div>
    </div>
</section>

<?php get_footer();
