import { createFileRoute } from "@tanstack/react-router";
import { useState } from "react";
import { Flame, ChevronRight } from "lucide-react";
import { SiteLayout, PageHero } from "@/components/SiteLayout";
import { menu, categories } from "@/lib/menu";
import { waLink } from "@/lib/business";

export const Route = createFileRoute("/menu")({
  head: () => ({
    meta: [
      { title: "Menu · The Oven Pizza Chichawatni" },
      { name: "description", content: "Explore our full menu: wood-fired pizzas, stuffed crust, burgers, wings, shawarma, sandwiches and more. Fresh from the oven, delivered free in Chichawatni." },
      { property: "og:title", content: "Menu · The Oven Pizza Chichawatni" },
      { property: "og:description", content: "Wood-fired pizzas, burgers, wings and Arabic bites. Full menu with prices." },
    ],
  }),
  component: MenuPage,
});

function MenuPage() {
  const [active, setActive] = useState<string>("All");
  const filtered = active === "All" ? menu : menu.filter((m) => m.category === active);

  return (
    <SiteLayout>
      <PageHero eyebrow="Our Menu" title="Fresh from the oven." subtitle="Every pizza is hand-tossed, every topping is fresh, and every bite is worth it. Prices vary by size." />
      <section className="container-x pb-16">
        <div className="sticky top-24 z-30 -mx-4 px-4 py-3 bg-background/85 backdrop-blur border-b border-border overflow-x-auto">
          <div className="flex gap-2 whitespace-nowrap">
            {["All", ...categories].map((c) => (
              <button
                key={c}
                onClick={() => setActive(c)}
                className={`px-4 py-2 rounded-full text-sm font-semibold transition ${
                  active === c
                    ? "bg-brand text-white btn-glow"
                    : "bg-card border border-border hover:bg-accent/20"
                }`}
              >
                {c}
              </button>
            ))}
          </div>
        </div>

        <div className="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          {filtered.map((item, i) => (
            <article key={item.name + i} className="group overflow-hidden rounded-3xl bg-card border border-border shadow-sm hover:shadow-2xl transition-all hover:-translate-y-1">
              <div className="relative aspect-[4/3] overflow-hidden">
                <img src={item.img} alt={item.name} width={900} height={675} loading="lazy" className="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                {item.popular && (
                  <span className="absolute top-3 left-3 rounded-full bg-brand text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1">Popular</span>
                )}
                <span className="absolute top-3 right-3 rounded-full bg-white/95 text-charcoal text-[10px] font-bold uppercase tracking-wider px-3 py-1">
                  {item.category}
                </span>
              </div>
              <div className="p-5">
                <div className="flex items-start justify-between gap-3">
                  <h3 className="font-display text-xl font-bold">{item.name}</h3>
                  <span className="whitespace-nowrap font-semibold text-brand">{item.price}</span>
                </div>
                <p className="mt-1.5 text-sm text-muted-foreground">{item.desc}</p>
                <div className="mt-4 flex items-center justify-between">
                  <div className="flex items-center gap-1 text-xs text-muted-foreground">
                    {item.spice && (
                      <>
                        {Array.from({ length: item.spice }).map((_, i) => (
                          <Flame key={i} className="h-3.5 w-3.5 text-flame" />
                        ))}
                        <span className="ml-1">Spice</span>
                      </>
                    )}
                  </div>
                  <a href={waLink(`Hi! I'd like to order ${item.name}.`)} target="_blank" rel="noopener" className="inline-flex items-center gap-1 rounded-full bg-brand text-white text-xs font-semibold px-4 py-2 hover:brightness-110">
                    Order <ChevronRight className="h-3 w-3" />
                  </a>
                </div>
              </div>
            </article>
          ))}
        </div>
      </section>
    </SiteLayout>
  );
}
