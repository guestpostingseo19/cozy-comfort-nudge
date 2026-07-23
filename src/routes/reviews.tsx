import { createFileRoute } from "@tanstack/react-router";
import { Star } from "lucide-react";
import { SiteLayout, PageHero } from "@/components/SiteLayout";

export const Route = createFileRoute("/reviews")({
  head: () => ({
    meta: [
      { title: "Reviews · The Oven Pizza Chichawatni · 4.8★ Rated" },
      { name: "description", content: "Read 140+ customer reviews of The Oven Pizza Chichawatni. Rated 4.8 stars for taste, freshness and service." },
      { property: "og:title", content: "Reviews · The Oven Pizza Chichawatni" },
      { property: "og:description", content: "140+ verified reviews. Rated 4.8★ by our neighbours in Chichawatni." },
    ],
  }),
  component: Reviews,
});

const reviews = [
  { n: "Ahmed R.", t: "Best pizza in Chichawatni, no question. The crown crust is unreal — cheese pull for days.", s: 5 },
  { n: "Sana K.", t: "Delivery was fast, food was piping hot. My kids ask for The Oven every weekend.", s: 5 },
  { n: "Bilal M.", t: "Great deals, great taste. The Rs 400 shawarma combo is a steal for lunch.", s: 5 },
  { n: "Ayesha F.", t: "Cosy interior, friendly staff, and the kids love the play area. Family dinner sorted.", s: 5 },
  { n: "Hamza S.", t: "Late-night lifesaver. Open till 2 AM and the wings are seriously addictive.", s: 5 },
  { n: "Iqra J.", t: "Fresh ingredients, real oven — you can taste the difference in every bite.", s: 5 },
  { n: "Usman T.", t: "The Arabic Bite is my new favourite. Perfectly spiced, generous toppings.", s: 5 },
  { n: "Mariam A.", t: "Ordered for a birthday — pizzas arrived hot, on time, beautifully packed.", s: 5 },
  { n: "Farhan Q.", t: "Consistent quality every visit. That's what earns my loyalty.", s: 4 },
  { n: "Nida H.", t: "The creamy chicken pizza is chef's kiss. So rich and cheesy.", s: 5 },
  { n: "Zain B.", t: "Fair prices, big portions, warm service. Everything a local pizza place should be.", s: 5 },
  { n: "Rabia S.", t: "I've tried them all — The Oven is on top. Their dough is next-level.", s: 5 },
];

function Reviews() {
  return (
    <SiteLayout>
      <PageHero eyebrow="Customer Reviews" title="Loved by Chichawatni." subtitle="Rated 4.8 out of 5 by 140+ verified customers across Google, Facebook and in-store." />

      <section className="container-x pb-8">
        <div className="mx-auto max-w-md rounded-3xl border border-border bg-card p-6 text-center shadow-sm">
          <div className="font-display text-6xl font-bold text-brand">4.8</div>
          <div className="mt-2 flex justify-center gap-1">
            {[0,1,2,3,4].map(i => <Star key={i} className="h-5 w-5 fill-gold text-gold" />)}
          </div>
          <div className="mt-1 text-sm text-muted-foreground">Based on 140+ verified reviews</div>
        </div>
      </section>

      <section className="container-x pb-16">
        <div className="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
          {reviews.map((r, i) => (
            <blockquote key={i} className="rounded-3xl border border-border bg-card p-6 shadow-sm">
              <div className="flex gap-0.5">
                {Array.from({length: r.s}).map((_, i) => <Star key={i} className="h-4 w-4 fill-gold text-gold" />)}
                {Array.from({length: 5 - r.s}).map((_, i) => <Star key={i} className="h-4 w-4 text-muted" />)}
              </div>
              <p className="mt-3 text-foreground/90">"{r.t}"</p>
              <footer className="mt-4 flex items-center gap-3">
                <div className="grid h-9 w-9 place-items-center rounded-full bg-brand/10 text-brand font-bold text-sm">{r.n[0]}</div>
                <div>
                  <div className="text-sm font-semibold">{r.n}</div>
                  <div className="text-xs text-muted-foreground">Verified customer</div>
                </div>
              </footer>
            </blockquote>
          ))}
        </div>
      </section>
    </SiteLayout>
  );
}
