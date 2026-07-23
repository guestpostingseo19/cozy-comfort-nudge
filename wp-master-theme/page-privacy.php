<?php
/** page-privacy.php — mirrors src/routes/privacy.tsx */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$hero_title = 'Privacy Policy';
$hero_subtitle = 'Last updated: January 2026';
include get_template_directory() . '/template-parts/page-hero.php';
?>
<section class="container-x pb-16 max-w-3xl">
  <div class="space-y-6 text-muted-foreground leading-relaxed prose prose-lg">
    <p>The Oven Pizza Chichawatni ("we", "us") respects your privacy. This page explains what information we collect and how we use it.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Information we collect</h2>
    <p>When you place an order or contact us, we may collect your name, phone number, delivery address and message. We do not collect payment card details — payments are handled at delivery or in-store.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">How we use it</h2>
    <p>We use your information only to process your order, arrange delivery and respond to your enquiries. We may occasionally send you updates about our menu or deals if you have opted in.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Sharing</h2>
    <p>We do not sell or rent your data. Your information stays with our team and is shared only with delivery staff to fulfil your order.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Cookies</h2>
    <p>Our website may use minimal cookies to remember your preferences and improve performance. You can disable cookies in your browser settings.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Your rights</h2>
    <p>You may request access to, correction of, or deletion of your personal data at any time by contacting us on +92 300 1580250.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Contact</h2>
    <p>For any privacy questions, reach us at +92 300 1580250 or visit us at Kamboh Road, Block 12, Chichawatni.</p>
  </div>
</section>
<?php get_footer();
