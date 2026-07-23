<?php
/**
 * Footer + floating actions (mirrors Footer.tsx + FloatingActions.tsx).
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$b = oven_business();
?>
  </main>

  <footer class="mt-24 bg-charcoal text-cream/90">
    <div class="container-x py-16 grid gap-10 md:grid-cols-2 lg:grid-cols-4">
      <div>
        <div class="flex items-center gap-2.5">
          <div class="grid h-11 w-11 place-items-center rounded-full text-white" style="background:linear-gradient(135deg,var(--brand),var(--flame));">
            <?php echo oven_icon( 'flame', 'h-5 w-5' ); ?>
          </div>
          <div>
            <div class="font-display text-xl font-bold text-white">The Oven Pizza</div>
            <div class="text-xs uppercase tracking-widest text-gold">Chichawatni</div>
          </div>
        </div>
        <p class="mt-4 text-sm text-cream/70 leading-relaxed">
          Wood-fired pizzas, loaded burgers and Arabic bites — freshly baked and served with love in the heart of Chichawatni.
        </p>
        <div class="mt-5 flex gap-3">
          <a href="<?php echo esc_url( $b['social']['facebook'] ); ?>" aria-label="Facebook" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 hover:bg-brand transition">
            <?php echo oven_icon( 'facebook', 'h-4 w-4' ); ?>
          </a>
          <a href="<?php echo esc_url( $b['social']['instagram'] ); ?>" aria-label="Instagram" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 hover:bg-brand transition">
            <?php echo oven_icon( 'instagram', 'h-4 w-4' ); ?>
          </a>
        </div>
      </div>

      <div>
        <h4 class="text-white font-semibold text-sm uppercase tracking-widest">Explore</h4>
        <ul class="mt-4 space-y-2.5 text-sm">
          <?php
            $links = array(
              '/menu/'    => 'Menu',
              '/deals/'   => 'Deals & Offers',
              '/gallery/' => 'Gallery',
              '/reviews/' => 'Reviews',
              '/about/'   => 'About Us',
              '/faq/'     => 'FAQ',
            );
            foreach ( $links as $to => $label ) {
              echo '<li><a href="' . esc_url( home_url( $to ) ) . '" class="text-cream/70 hover:text-gold transition">' . esc_html( $label ) . '</a></li>';
            }
          ?>
        </ul>
      </div>

      <div>
        <h4 class="text-white font-semibold text-sm uppercase tracking-widest">Visit</h4>
        <ul class="mt-4 space-y-3 text-sm text-cream/80">
          <li class="flex gap-2.5"><span class="text-gold shrink-0"><?php echo oven_icon( 'map-pin', 'h-4 w-4' ); ?></span><span><?php echo esc_html( $b['address'] ); ?></span></li>
          <li class="flex gap-2.5"><span class="text-gold shrink-0"><?php echo oven_icon( 'phone', 'h-4 w-4' ); ?></span><a href="<?php echo oven_tel_link(); ?>" class="hover:text-white"><?php echo esc_html( $b['phone'] ); ?></a></li>
          <li class="flex gap-2.5"><span class="text-gold shrink-0"><?php echo oven_icon( 'clock', 'h-4 w-4' ); ?></span><span><?php echo esc_html( $b['hours'] ); ?></span></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white font-semibold text-sm uppercase tracking-widest">Legal</h4>
        <ul class="mt-4 space-y-2.5 text-sm">
          <li><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>" class="text-cream/70 hover:text-gold">Privacy Policy</a></li>
          <li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>" class="text-cream/70 hover:text-gold">Terms &amp; Conditions</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-cream/70 hover:text-gold">Contact</a></li>
        </ul>
      </div>
    </div>

    <div class="border-t border-white/10">
      <div class="container-x py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-cream/60">
        <p>© <?php echo esc_html( date( 'Y' ) ); ?> The Oven Pizza Chichawatni. All rights reserved.</p>
        <p>Handcrafted with 🔥 in Chichawatni, Punjab.</p>
      </div>
    </div>
  </footer>

  <!-- Floating actions -->
  <div class="fixed bottom-4 right-4 z-50 flex flex-col gap-3">
    <button data-to-top aria-label="Back to top"
            class="grid h-11 w-11 place-items-center rounded-full bg-charcoal text-white shadow-lg hover:scale-105 transition"
            style="display:none;">
      <?php echo oven_icon( 'arrow-up', 'h-5 w-5' ); ?>
    </button>
    <a href="<?php echo oven_tel_link(); ?>" aria-label="Call <?php echo esc_attr( $b['name'] ); ?>"
       class="grid h-14 w-14 place-items-center rounded-full bg-brand text-white shadow-xl btn-glow hover:scale-105 transition">
      <?php echo oven_icon( 'phone', 'h-6 w-6' ); ?>
    </a>
    <a href="<?php echo esc_url( oven_wa_link() ); ?>" target="_blank" rel="noopener" aria-label="Order on WhatsApp"
       class="grid h-14 w-14 place-items-center rounded-full text-white shadow-xl hover:scale-105 transition"
       style="background:#25D366;">
      <?php echo oven_icon( 'message-circle', 'h-6 w-6' ); ?>
    </a>
  </div>

  <?php wp_footer(); ?>
</body>
</html>
