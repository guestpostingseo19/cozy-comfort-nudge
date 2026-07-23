<?php
/** page-terms.php — mirrors src/routes/terms.tsx */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$hero_title = 'Terms & Conditions';
$hero_subtitle = 'Last updated: January 2026';
include get_template_directory() . '/template-parts/page-hero.php';
?>
<section class="container-x pb-16 max-w-3xl">
  <div class="space-y-6 text-muted-foreground leading-relaxed">
    <p>By ordering from or visiting The Oven Pizza Chichawatni, you agree to the following terms.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Orders</h2>
    <p>All orders are subject to availability. We reserve the right to refuse or cancel any order at our discretion. Prices are in Pakistani Rupees and may change without notice.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Delivery</h2>
    <p>We offer free home delivery within Chichawatni city. Delivery times are estimates and may vary during peak hours or bad weather.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Payment</h2>
    <p>Payment is due on delivery or at the counter. We accept cash and mobile wallet payments.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Refunds</h2>
    <p>If your order is incorrect or unsatisfactory, please contact us within 30 minutes of receipt and we'll make it right — usually by replacing the item.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Deals &amp; Offers</h2>
    <p>Deals may have specific times and conditions (e.g. Happy Student Deals apply between 10 AM and 5 PM). Deals cannot be combined unless stated.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Intellectual property</h2>
    <p>All logos, photos and content on this website belong to The Oven Pizza Chichawatni and may not be used without permission.</p>
    <h2 class="text-foreground font-display text-2xl font-bold mt-8">Contact</h2>
    <p>Questions? Call us on +92 300 1580250 or visit our restaurant on Kamboh Road, Chichawatni.</p>
  </div>
</section>
<?php get_footer();
