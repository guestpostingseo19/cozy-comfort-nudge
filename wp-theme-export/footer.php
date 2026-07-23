<?php
/**
 * Footer template
 * @package theovenpizza
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$b = theovenpizza_business();
?>
<footer class="site-footer">
    <div class="container-x">
        <div class="cols">
            <div class="brand-block">
                <div class="brand">
                    <span class="brand-mark">&#128293;</span>
                    <span>
                        <span class="brand-name"><?php echo esc_html( $b['short_name'] ); ?></span>
                        <span class="brand-sub">Pizza · Chichawatni</span>
                    </span>
                </div>
                <p style="margin-top:18px;max-width:340px;font-size:14px">
                    Wood-fired pizzas, stuffed crust, burgers &amp; Arabic bites. Free home delivery in Chichawatni — open daily until 2 AM.
                </p>
            </div>

            <div>
                <h4>Visit</h4>
                <ul>
                    <li><?php echo esc_html( $b['address'] ); ?></li>
                    <li><?php echo esc_html( $b['hours'] ); ?></li>
                </ul>
            </div>

            <div>
                <h4>Order</h4>
                <ul>
                    <li><a href="<?php echo esc_url( theovenpizza_tel_link() ); ?>"><?php echo esc_html( $b['phone'] ); ?></a></li>
                    <li><a href="<?php echo esc_url( theovenpizza_wa_link() ); ?>" target="_blank" rel="noopener">WhatsApp</a></li>
                </ul>
            </div>

            <div>
                <h4>Explore</h4>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/menu/' ) ); ?>">Menu</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/deals/' ) ); ?>">Deals</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Gallery</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="bottom">
            <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( $b['name'] ); ?>. All rights reserved.</span>
            <span>Rated <?php echo esc_html( $b['rating'] ); ?>&#9733; by <?php echo esc_html( $b['reviews'] ); ?>+ customers</span>
        </div>
    </div>
</footer>

<div class="floating" aria-hidden="false">
    <a class="wa" href="<?php echo esc_url( theovenpizza_wa_link() ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp">&#128172;</a>
    <a class="call" href="<?php echo esc_url( theovenpizza_tel_link() ); ?>" aria-label="Call">&#9742;</a>
</div>

<script>
// Reveal-on-scroll
document.addEventListener('DOMContentLoaded',function(){
  var io=new IntersectionObserver(function(entries){
    entries.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('visible'); io.unobserve(e.target); } });
  },{threshold:.12});
  document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
