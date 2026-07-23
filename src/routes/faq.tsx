import { createFileRoute } from "@tanstack/react-router";
import { SiteLayout, PageHero } from "@/components/SiteLayout";
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from "@/components/ui/accordion";

export const Route = createFileRoute("/faq")({
  head: () => ({
    meta: [
      { title: "FAQ · The Oven Pizza Chichawatni" },
      { name: "description", content: "Answers to common questions about delivery, hours, dine-in, deals and ordering at The Oven Pizza Chichawatni." },
      { property: "og:title", content: "FAQ · The Oven Pizza Chichawatni" },
      { property: "og:description", content: "Everything you need to know about ordering, delivery and dining with us." },
    ],
    scripts: [{
      type: "application/ld+json",
      children: JSON.stringify({
        "@context": "https://schema.org",
        "@type": "FAQPage",
        mainEntity: faqs.map(f => ({
          "@type": "Question",
          name: f.q,
          acceptedAnswer: { "@type": "Answer", text: f.a }
        }))
      })
    }]
  }),
  component: FAQ,
});

const faqs = [
  { q: "Do you offer free home delivery?", a: "Yes — we offer free home delivery across Chichawatni city on all orders. Just call or WhatsApp us to place your order." },
  { q: "What are your opening hours?", a: "We're open every single day from 11:00 AM until 2:00 AM. Perfect for lunch, dinner or a late-night craving." },
  { q: "How can I place an order?", a: "Call us at +92 300 1580250 or send us a message on WhatsApp. You can also drop by our restaurant on Kamboh Road for dine-in or take-away." },
  { q: "Do you have deals for students?", a: "Yes! Our Happy Student Deals run every day from 10 AM to 5 PM, starting from just Rs 400 for a 2-shawarma combo." },
  { q: "Is dine-in available?", a: "Absolutely. Our cosy restaurant on Kamboh Road has family seating and a kids' play area. Walk-ins welcome." },
  { q: "What payment methods do you accept?", a: "Cash on delivery, cash at counter, and mobile wallet payments (Easypaisa / JazzCash) are all accepted." },
  { q: "How long does delivery take?", a: "Most orders reach you within 30–45 minutes inside Chichawatni city. Peak hours may take slightly longer." },
  { q: "Can I customise my pizza?", a: "Of course. Just tell us your favourite toppings when ordering and we'll build it exactly how you like it." },
  { q: "Do you cater for parties and events?", a: "Yes — we cater for birthdays, family gatherings and corporate events. Call ahead so we can plan the menu with you." },
  { q: "Are the ingredients fresh?", a: "Every day. Our dough is made fresh each morning, our vegetables are hand-cut daily, and we use real mozzarella cheese." },
];

function FAQ() {
  return (
    <SiteLayout>
      <PageHero eyebrow="FAQ" title="Frequently asked questions." subtitle="Everything you need to know about ordering, delivery and dining at The Oven Pizza." />
      <section className="container-x pb-16 max-w-3xl">
        <Accordion type="single" collapsible className="rounded-3xl border border-border bg-card divide-y divide-border">
          {faqs.map((f, i) => (
            <AccordionItem key={i} value={`i${i}`} className="px-5 border-0">
              <AccordionTrigger className="text-left font-semibold hover:no-underline py-5">{f.q}</AccordionTrigger>
              <AccordionContent className="text-muted-foreground pb-5">{f.a}</AccordionContent>
            </AccordionItem>
          ))}
        </Accordion>
      </section>
    </SiteLayout>
  );
}
