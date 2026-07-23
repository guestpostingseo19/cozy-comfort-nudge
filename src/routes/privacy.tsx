import { createFileRoute } from "@tanstack/react-router";
import { SiteLayout, PageHero } from "@/components/SiteLayout";

export const Route = createFileRoute("/privacy")({
  head: () => ({
    meta: [
      { title: "Privacy Policy · The Oven Pizza Chichawatni" },
      { name: "description", content: "How The Oven Pizza Chichawatni collects, uses and protects your information when you order or contact us." },
      { property: "og:title", content: "Privacy Policy · The Oven Pizza Chichawatni" },
      { property: "og:description", content: "Our privacy policy and how we handle customer information." },
    ],
  }),
  component: Privacy,
});

function Privacy() {
  return (
    <SiteLayout>
      <PageHero title="Privacy Policy" subtitle="Last updated: January 2026" />
      <section className="container-x pb-16 max-w-3xl prose prose-lg">
        <div className="space-y-6 text-muted-foreground leading-relaxed">
          <p>The Oven Pizza Chichawatni ("we", "us") respects your privacy. This page explains what information we collect and how we use it.</p>
          <h2 className="text-foreground font-display text-2xl font-bold mt-8">Information we collect</h2>
          <p>When you place an order or contact us, we may collect your name, phone number, delivery address and message. We do not collect payment card details — payments are handled at delivery or in-store.</p>
          <h2 className="text-foreground font-display text-2xl font-bold mt-8">How we use it</h2>
          <p>We use your information only to process your order, arrange delivery and respond to your enquiries. We may occasionally send you updates about our menu or deals if you have opted in.</p>
          <h2 className="text-foreground font-display text-2xl font-bold mt-8">Sharing</h2>
          <p>We do not sell or rent your data. Your information stays with our team and is shared only with delivery staff to fulfil your order.</p>
          <h2 className="text-foreground font-display text-2xl font-bold mt-8">Cookies</h2>
          <p>Our website may use minimal cookies to remember your preferences and improve performance. You can disable cookies in your browser settings.</p>
          <h2 className="text-foreground font-display text-2xl font-bold mt-8">Your rights</h2>
          <p>You may request access to, correction of, or deletion of your personal data at any time by contacting us on +92 300 1580250.</p>
          <h2 className="text-foreground font-display text-2xl font-bold mt-8">Contact</h2>
          <p>For any privacy questions, reach us at +92 300 1580250 or visit us at Kamboh Road, Block 12, Chichawatni.</p>
        </div>
      </section>
    </SiteLayout>
  );
}
