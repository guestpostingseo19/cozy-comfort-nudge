<?php
/** page-faq.php — mirrors src/routes/faq.tsx */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$hero_eyebrow  = 'FAQ';
$hero_title    = 'Frequently asked questions.';
$hero_subtitle = 'Everything you need to know about ordering, delivery and dining at The Oven Pizza.';
include get_template_directory() . '/template-parts/page-hero.php';
$faqs = array(
  array( 'Do you offer free home delivery?', 'Yes — we offer free home delivery across Chichawatni city on all orders. Just call or WhatsApp us to place your order.' ),
  array( 'What are your opening hours?',     "We're open every single day from 11:00 AM until 2:00 AM. Perfect for lunch, dinner or a late-night craving." ),
  array( 'How can I place an order?',        'Call us at +92 300 1580250 or send us a message on WhatsApp. You can also drop by our restaurant on Kamboh Road for dine-in or take-away.' ),
  array( 'Do you have deals for students?',  'Yes! Our Happy Student Deals run every day from 10 AM to 5 PM, starting from just Rs 400 for a 2-shawarma combo.' ),
  array( 'Is dine-in available?',            "Absolutely. Our cosy restaurant on Kamboh Road has family seating and a kids' play area. Walk-ins welcome." ),
  array( 'What payment methods do you accept?', 'Cash on delivery, cash at counter, and mobile wallet payments (Easypaisa / JazzCash) are all accepted.' ),
  array( 'How long does delivery take?',     'Most orders reach you within 30–45 minutes inside Chichawatni city. Peak hours may take slightly longer.' ),
  array( 'Can I customise my pizza?',        "Of course. Just tell us your favourite toppings when ordering and we'll build it exactly how you like it." ),
  array( 'Do you cater for parties and events?', 'Yes — we cater for birthdays, family gatherings and corporate events. Call ahead so we can plan the menu with you.' ),
  array( 'Are the ingredients fresh?',       'Every day. Our dough is made fresh each morning, our vegetables are hand-cut daily, and we use real mozzarella cheese.' ),
);

// FAQ JSON-LD.
$ld = array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array() );
foreach ( $faqs as $f ) {
  $ld['mainEntity'][] = array( '@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $f[1] ) );
}
echo '<script type="application/ld+json">' . wp_json_encode( $ld ) . '</script>';
?>
<section class="container-x pb-16 max-w-3xl">
  <div class="rounded-3xl border border-border bg-card">
    <?php foreach ( $faqs as $i => $f ) : ?>
      <div data-acc-item class="acc-item">
        <button class="acc-trigger" type="button" aria-expanded="false">
          <span><?php echo esc_html( $f[0] ); ?></span>
          <span class="chev text-muted-foreground"><?php echo oven_icon( 'chevron-down', 'h-4 w-4' ); ?></span>
        </button>
        <div class="acc-content" style="max-height:0;">
          <p><?php echo esc_html( $f[1] ); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php get_footer();
