<?php
/** page-contact.php — mirrors src/routes/contact.tsx */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$hero_eyebrow  = 'Get in touch';
$hero_title    = "We'd love to hear from you.";
$hero_subtitle = 'Questions, bookings, feedback or big-order enquiries — reach out any time.';
include get_template_directory() . '/template-parts/page-hero.php';
$b = oven_business();
$cards = array(
  array( 'map-pin',        'Address',   $b['address'],        $b['map_link'] ),
  array( 'phone',          'Phone',     $b['phone'],          oven_tel_link() ),
  array( 'message-circle', 'WhatsApp',  'Chat with us now',   oven_wa_link() ),
  array( 'clock',          'Hours',     $b['hours'],          '' ),
  array( 'mail',           'Plus Code', $b['plus_code'],      '' ),
);
?>
<section class="container-x pb-16 grid gap-8 lg:grid-cols-5">
  <div class="lg:col-span-2 space-y-4">
    <?php foreach ( $cards as $c ) : ?>
      <a href="<?php echo esc_url( $c[3] ?: '#' ); ?>" class="flex gap-4 rounded-2xl border border-border bg-card p-5 hover:shadow-lg transition">
        <div class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand/10 text-brand"><?php echo oven_icon( $c[0], 'h-5 w-5' ); ?></div>
        <div class="min-w-0">
          <div class="text-xs font-semibold uppercase tracking-widest text-muted-foreground"><?php echo esc_html( $c[1] ); ?></div>
          <div class="mt-0.5 font-medium"><?php echo esc_html( $c[2] ); ?></div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <div class="lg:col-span-3 rounded-3xl border border-border bg-card p-6 sm:p-8 shadow-sm">
    <h2 class="font-display text-2xl font-bold">Send us a message</h2>
    <p class="mt-1 text-sm text-muted-foreground">We usually reply within a few hours. For orders, WhatsApp is fastest.</p>

    <div data-contact-thanks class="mt-6 rounded-2xl bg-brand/10 border border-brand/20 p-6 text-center" style="display:none;">
      <div class="font-display text-2xl font-bold text-brand">Thanks!</div>
      <p class="mt-2 text-sm text-muted-foreground">We've received your message and will get back to you soon.</p>
    </div>

    <form data-contact-form class="mt-6 grid gap-4 sm:grid-cols-2">
      <label class="grid gap-1.5 text-sm">
        <span class="font-medium">Name</span>
        <input required name="name" class="rounded-xl border border-input bg-background px-4 py-3 outline-none focus:ring-2 focus:ring-brand/40" placeholder="Your name" />
      </label>
      <label class="grid gap-1.5 text-sm">
        <span class="font-medium">Phone</span>
        <input required name="phone" type="tel" class="rounded-xl border border-input bg-background px-4 py-3 outline-none focus:ring-2 focus:ring-brand/40" placeholder="03xx xxxxxxx" />
      </label>
      <label class="grid gap-1.5 text-sm sm:col-span-2">
        <span class="font-medium">Email (optional)</span>
        <input name="email" type="email" class="rounded-xl border border-input bg-background px-4 py-3 outline-none focus:ring-2 focus:ring-brand/40" placeholder="you@example.com" />
      </label>
      <label class="grid gap-1.5 text-sm sm:col-span-2">
        <span class="font-medium">Message</span>
        <textarea required name="message" rows="5" class="rounded-xl border border-input bg-background px-4 py-3 outline-none focus:ring-2 focus:ring-brand/40" placeholder="How can we help?"></textarea>
      </label>
      <div class="sm:col-span-2 flex flex-wrap gap-3">
        <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-brand text-white px-6 py-3 text-sm font-bold btn-glow hover:brightness-110">Send message</button>
        <a href="<?php echo esc_url( oven_wa_link() ); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full border border-border px-6 py-3 text-sm font-bold hover:bg-accent/20">
          <?php echo oven_icon( 'message-circle', 'h-4 w-4' ); ?> WhatsApp instead
        </a>
      </div>
    </form>
  </div>
</section>

<section class="container-x pb-20">
  <div class="rounded-3xl overflow-hidden border border-border shadow-lg">
    <iframe src="<?php echo esc_url( $b['map_embed'] ); ?>" title="The Oven Pizza Chichawatni map" class="w-full h-[420px]" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>
<?php get_footer();
