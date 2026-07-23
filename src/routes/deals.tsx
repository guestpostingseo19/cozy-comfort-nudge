import { createFileRoute } from "@tanstack/react-router";
import { MessageCircle, Phone } from "lucide-react";
import { SiteLayout, PageHero } from "@/components/SiteLayout";
import { deals } from "@/lib/menu";
import { telLink, waLink } from "@/lib/business";

export const Route = createFileRoute("/deals")({
  head: () => ({
    meta: [
      { title: "Deals & Offers · The Oven Pizza Chichawatni" },
      { name: "description", content: "Happy Student Deals, family combos and weekend offers at The Oven Pizza Chichawatni. Pizzas from Rs 500, shawarma combos from Rs 400." },
      { property: "og:title", content: "Deals & Offers · The Oven Pizza Chichawatni" },
      { property: "og:description", content: "Student deals, family combos and weekend offers from Rs 400." },
    ],
  }),
  component: Deals,
});

function Deals() {
  return (
    <SiteLayout>
      <PageHero eyebrow="Deals & Offers" title="Big flavours. Little prices." subtitle="Happy Student Deals available 10 AM – 5 PM every day. Family combos and weekend offers all week long." />

      <section className="container-x pb-16">
        <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
          {deals.map(d => (
            <div key={d.tag} className={`relative overflow-hidden rounded-3xl border p-8 shadow-sm hover:-translate-y-1 hover:shadow-2xl transition ${d.highlight ? "bg-brand text-white border-brand" : "bg-card border-border"}`}>
              <div className={`text-xs font-bold uppercase tracking-widest ${d.highlight ? "text-white/80" : "text-brand"}`}>{d.tag}</div>
              <h3 className="mt-2 font-display text-2xl font-bold">{d.title}</h3>
              <div className="mt-4 font-display text-5xl font-bold">{d.price}</div>
              <ul className={`mt-6 space-y-2 text-sm ${d.highlight ? "text-white/90" : "text-muted-foreground"}`}>
                {d.perks.map(p => <li key={p}>· {p}</li>)}
              </ul>
              <div className="mt-6 flex gap-2">
                <a href={waLink(`Hi! I'd like ${d.tag}: ${d.title}`)} target="_blank" rel="noopener" className={`inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-bold ${d.highlight ? "bg-white text-brand" : "bg-brand text-white"}`}>
                  <MessageCircle className="h-3.5 w-3.5" /> WhatsApp
                </a>
                <a href={telLink} className={`inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-bold border ${d.highlight ? "border-white/40 text-white" : "border-border"}`}>
                  <Phone className="h-3.5 w-3.5" /> Call
                </a>
              </div>
            </div>
          ))}
        </div>
      </section>

      <section className="container-x pb-16">
        <div className="rounded-3xl bg-gradient-to-br from-gold/20 to-flame/10 border border-gold/40 p-8 sm:p-12">
          <div className="grid gap-6 sm:grid-cols-[1fr_auto] items-center">
            <div>
              <div className="text-xs font-bold uppercase tracking-widest text-brand">Weekend Special</div>
              <h3 className="mt-2 font-display text-3xl font-bold">Family Feast · Serves 4</h3>
              <p className="mt-2 text-muted-foreground max-w-xl">Large Signature Pizza + 6 Wings + Fries + 1.5L Drink. Available Friday to Sunday only.</p>
            </div>
            <div className="text-center">
              <div className="font-display text-5xl font-bold text-brand">Rs 2999</div>
              <a href={waLink("Hi! I'd like the Weekend Family Feast (Rs 2999).")} target="_blank" rel="noopener" className="mt-3 inline-flex items-center gap-2 rounded-full bg-brand text-white px-6 py-3 text-sm font-bold">
                <MessageCircle className="h-4 w-4" /> Order this deal
              </a>
            </div>
          </div>
        </div>
      </section>
    </SiteLayout>
  );
}
