import { createFileRoute, Link } from "@tanstack/react-router";
import { Star, Flame, Clock, MapPin, Phone, MessageCircle, ChevronRight, ShieldCheck, Truck, Award, ChefHat, Plus } from "lucide-react";
import { SiteLayout } from "@/components/SiteLayout";
import { Marquee } from "@/components/Marquee";
import { useReveal } from "@/hooks/use-reveal";

import { business, telLink, waLink } from "@/lib/business";
import { menu, deals } from "@/lib/menu";
import heroPizza from "@/assets/hero-pizza.jpg";
import chef from "@/assets/chef.jpg";
import interior from "@/assets/interior.jpg";
import oven from "@/assets/oven.jpg";
import ingredients from "@/assets/ingredients.jpg";

export const Route = createFileRoute("/")({
  head: () => ({
    meta: [
      { title: "The Oven Pizza Chichawatni · Best Pizza · Free Delivery" },
      { name: "description", content: "Rated 4.8★ by 140+ customers. Wood-fired pizzas, stuffed crust, burgers & Arabic bites. Free home delivery in Chichawatni. Order now — open till 2 AM." },
      { property: "og:title", content: "The Oven Pizza Chichawatni · Best Pizza in Town" },
      { property: "og:description", content: "Wood-fired pizzas, stuffed crust, burgers & Arabic bites. Free home delivery in Chichawatni." },
    ],
  }),
  component: Home,
});

function Home() {
  useReveal();
  const bestSellers = menu.filter((m) => m.popular).slice(0, 6);
  return (
    <SiteLayout>

      {/* Hero — Editorial Craft */}
      <section className="relative overflow-hidden">
        <div aria-hidden className="pointer-events-none absolute -right-40 top-20 h-[420px] w-[420px] rounded-full bg-brand/15 blur-3xl" />
        <div aria-hidden className="pointer-events-none absolute -left-32 bottom-10 h-[320px] w-[320px] rounded-full bg-gold/25 blur-3xl" />
        <div aria-hidden className="pointer-events-none absolute right-10 top-1/3 h-24 w-24 rounded-full bg-flame/20 blur-2xl" />

        <div className="container-x grid gap-10 lg:grid-cols-2 lg:gap-14 items-center pt-10 pb-20 lg:pt-16 lg:pb-28">
          <div className="relative z-10">
            <span className="inline-flex items-center gap-2 text-flame text-[11px] font-black tracking-[0.3em] uppercase">
              <span className="h-px w-8 bg-flame" /> Authentic Wood-Fired
            </span>
            <h1 className="mt-5 font-display text-5xl sm:text-6xl lg:text-[5.25rem] font-black leading-[0.98] text-charcoal">
              Artisanal Magic <br />
              <span className="italic text-brand">from the heart.</span>
            </h1>
            <p className="mt-6 max-w-xl text-lg text-muted-foreground leading-relaxed">
              Hand-tossed dough, wood-fired ovens and toppings piled high.
              Dine-in, take-away or free home delivery — open daily until 2 AM.
            </p>

            <div className="mt-9 flex flex-wrap items-center gap-3">
              <a
                href={telLink}
                className="inline-flex items-center gap-2 rounded-xl bg-gold px-7 py-4 text-xs font-black uppercase tracking-[0.2em] text-charcoal btn-chunky btn-chunky-hover"
              >
                <Phone className="h-4 w-4" /> Order Now
              </a>
              <a
                href={waLink()}
                target="_blank"
                rel="noopener"
                className="inline-flex items-center gap-2 rounded-xl border-2 border-charcoal bg-transparent px-7 py-4 text-xs font-black uppercase tracking-[0.2em] text-charcoal hover:bg-charcoal hover:text-cream transition"
              >
                <MessageCircle className="h-4 w-4" /> WhatsApp
              </a>
              <Link
                to="/menu"
                className="inline-flex items-center gap-1.5 px-4 py-4 text-xs font-black uppercase tracking-[0.2em] text-brand relative after:content-[''] after:absolute after:left-4 after:right-4 after:bottom-3 after:h-0.5 after:bg-brand after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:origin-left"
              >
                See Menu <ChevronRight className="h-4 w-4" />
              </Link>
            </div>

            <div className="mt-10 flex flex-wrap items-center gap-6 text-sm">
              <div className="flex items-center gap-1.5">
                {[0, 1, 2, 3, 4].map((i) => (
                  <Star key={i} className="h-4 w-4 fill-gold text-gold" />
                ))}
                <span className="ml-2 font-black">4.8</span>
                <span className="text-muted-foreground">(140+ reviews)</span>
              </div>
              <div className="hidden sm:block h-4 w-px bg-border" />
              <span className="text-muted-foreground font-medium">Free delivery in Chichawatni</span>
            </div>
          </div>

          <div className="relative">
            {/* soft radial glow behind pizza */}
            <div
              aria-hidden
              className="absolute inset-0 scale-125 blur-3xl rounded-full"
              style={{ background: "radial-gradient(circle at center, color-mix(in oklab, var(--brand) 22%, transparent) 0%, transparent 65%)" }}
            />
            {/* slow rotating ring */}
            <div
              aria-hidden
              className="absolute inset-6 rounded-full border-2 border-dashed border-gold/40 animate-spin-slow"
            />
            <div className="relative mx-auto w-full max-w-[440px] drop-shadow-[0_35px_60px_rgba(0,0,0,0.28)]">
              <img
                src={heroPizza}
                alt="Signature wood-fired pizza from The Oven"
                width={1600}
                height={1200}
                className="w-full h-auto object-cover rounded-full animate-float"
              />
            </div>

            {/* Floating status badge — glassy, tilted */}
            <div className="absolute top-6 right-2 sm:right-6 bg-white/85 backdrop-blur-md border border-white/60 shadow-xl rounded-2xl px-4 py-2.5 flex items-center gap-2.5 animate-float-tilt z-20">
              <span className="relative flex h-2 w-2">
                <span className="absolute inline-flex h-full w-full rounded-full bg-flame opacity-75 animate-ping" />
                <span className="relative inline-flex h-2 w-2 rounded-full bg-flame" />
              </span>
              <span className="text-[10px] font-black uppercase tracking-[0.2em] text-charcoal">Open until 2 AM</span>
            </div>

            {/* Rating chip */}
            <div className="absolute -bottom-4 left-0 sm:left-6 rounded-2xl bg-charcoal text-cream shadow-2xl border border-white/10 px-5 py-4 flex items-center gap-4 z-20">
              <div className="grid h-11 w-11 place-items-center rounded-xl bg-gold text-charcoal">
                <Star className="h-5 w-5 fill-charcoal" />
              </div>
              <div>
                <div className="text-[10px] font-black uppercase tracking-[0.2em] text-gold">Rated</div>
                <div className="font-display text-xl font-black leading-none mt-0.5">4.8 · 140+ reviews</div>
              </div>
            </div>

            {/* Sticker badge — deals */}
            <div className="hidden sm:flex absolute -bottom-6 -right-2 h-24 w-24 rounded-full bg-flame text-white items-center justify-center rotate-[-12deg] shadow-2xl font-display font-black text-center leading-tight animate-pulse-ring">
              <span className="text-[11px] uppercase tracking-widest px-2">Deals from Rs 400</span>
            </div>
          </div>
        </div>
      </section>

      {/* Marquee ticker */}
      <Marquee />

      {/* Feature strip — dark editorial */}
      <section className="bg-charcoal text-cream">
        <div className="container-x py-14">
          <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            {[
              { icon: Flame, title: "Wood-Fired", desc: "Real oven-baked crust, crispy edges, molten centre." },
              { icon: Truck, title: "Free Delivery", desc: "Free home delivery across Chichawatni city." },
              { icon: Award, title: "4.8★ Rated", desc: "Loved by 140+ happy customers and counting." },
              { icon: ShieldCheck, title: "Fresh Daily", desc: "Dough, sauces and toppings made fresh every day." },
            ].map((f, i) => (
              <div
                key={f.title}
                className="reveal group relative rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-sm hover:bg-white/10 transition-all duration-500 hover:-translate-y-1"
                style={{ transitionDelay: `${i * 80}ms` }}
              >
                <div className="grid h-14 w-14 place-items-center rounded-2xl bg-gold text-charcoal shadow-lg shadow-gold/20 group-hover:rotate-6 transition-transform">
                  <f.icon className="h-6 w-6" />
                </div>
                <h3 className="mt-5 font-display text-xl font-black text-white">{f.title}</h3>
                <p className="mt-1.5 text-sm text-cream/70 leading-relaxed">{f.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Best Sellers */}
      <section className="container-x py-20">
        <div className="flex items-end justify-between flex-wrap gap-4 reveal">
          <div>
            <div className="text-[11px] font-black uppercase tracking-[0.3em] text-flame">Chichawatni Favourites</div>
            <h2 className="mt-3 font-display text-4xl sm:text-5xl font-black">Best Sellers</h2>
            <div className="mt-3 h-1 w-12 bg-gold" />
          </div>
          <Link to="/menu" className="text-[11px] font-black uppercase tracking-[0.25em] text-brand inline-flex items-center gap-2 group">
            Explore All
            <ChevronRight className="h-4 w-4 group-hover:translate-x-1 transition-transform" />
          </Link>
        </div>
        <div className="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          {bestSellers.map((item, i) => (
            <article
              key={item.name}
              className="reveal group card-3d card-3d-hover overflow-hidden rounded-3xl bg-card border border-border shadow-sm hover:shadow-2xl"
              style={{ transitionDelay: `${i * 70}ms` }}
            >
              <div className="relative aspect-[4/3] overflow-hidden shine">
                <img
                  src={item.img}
                  alt={item.name}
                  width={900}
                  height={675}
                  loading="lazy"
                  className="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
                {item.popular && (
                  <span className="absolute top-3 left-3 rounded-sm bg-flame text-white text-[9px] font-black uppercase tracking-[0.18em] px-2 py-1 shadow-lg">
                    Top Rated
                  </span>
                )}
                <button
                  aria-label={`Add ${item.name}`}
                  className="absolute bottom-3 right-3 h-10 w-10 rounded-full bg-white shadow-xl grid place-items-center text-brand hover:bg-gold hover:text-charcoal active:scale-90 transition"
                >
                  <Plus className="h-5 w-5" strokeWidth={2.5} />
                </button>
              </div>
              <div className="p-5">
                <div className="flex items-start justify-between gap-3">
                  <h3 className="font-display text-xl font-black">{item.name}</h3>
                  <span className="whitespace-nowrap font-black text-brand">{item.price}</span>
                </div>
                <p className="mt-1.5 text-sm text-muted-foreground line-clamp-2">{item.desc}</p>
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
                  <a
                    href={waLink(`Hi! I'd like to order ${item.name}.`)}
                    target="_blank"
                    rel="noopener"
                    className="inline-flex items-center gap-1 text-xs font-black uppercase tracking-widest text-brand hover:text-flame"
                  >
                    Order <ChevronRight className="h-3 w-3" />
                  </a>
                </div>
              </div>
            </article>
          ))}
        </div>
      </section>

      <section className="py-16 bg-gradient-to-br from-charcoal via-charcoal to-[#2a1a10] text-cream relative overflow-hidden">
        <div className="absolute inset-0 opacity-10" style={{ backgroundImage: `url(${oven})`, backgroundSize: 'cover', backgroundPosition: 'center' }} />
        <div className="container-x relative">
          <div className="max-w-2xl">
            <div className="text-xs font-semibold uppercase tracking-widest text-gold">Happy Student Deals · 10 AM – 5 PM</div>
            <h2 className="mt-2 font-display text-4xl sm:text-5xl font-bold text-white">Deals worth the drive.</h2>
            <p className="mt-3 text-cream/70">From Rs 400 shawarma combos to loaded family pizzas — fresh from our oven, easy on the wallet.</p>
          </div>
          <div className="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            {deals.slice(0, 3).map((d) => (
              <div key={d.tag} className={`rounded-2xl p-6 border transition ${d.highlight ? "bg-brand text-white border-brand" : "bg-white/5 border-white/10 hover:bg-white/10"}`}>
                <div className={`text-xs uppercase tracking-widest font-bold ${d.highlight ? "text-white/80" : "text-gold"}`}>{d.tag}</div>
                <h3 className="mt-2 font-display text-2xl font-bold">{d.title}</h3>
                <div className="mt-3 font-display text-4xl font-bold">{d.price}</div>
                <ul className="mt-4 space-y-1.5 text-sm opacity-90">
                  {d.perks.map((p) => <li key={p}>· {p}</li>)}
                </ul>
              </div>
            ))}
          </div>
          <div className="mt-8">
            <Link to="/deals" className="inline-flex items-center gap-2 rounded-full bg-gold text-charcoal px-6 py-3 text-sm font-bold hover:brightness-110 transition">
              See all deals <ChevronRight className="h-4 w-4" />
            </Link>
          </div>
        </div>
      </section>

      {/* About */}
      <section className="container-x py-16 grid gap-12 lg:grid-cols-2 items-center">
        <div className="relative">
          <img src={chef} alt="Our chef preparing a fresh pizza at The Oven Chichawatni" width={1200} height={1400} loading="lazy" className="rounded-3xl w-full h-auto object-cover shadow-xl" />
          <div className="absolute -bottom-6 -right-4 sm:right-6 rounded-2xl bg-card border border-border shadow-xl px-5 py-4">
            <div className="font-display text-3xl font-bold text-brand">10+</div>
            <div className="text-xs uppercase tracking-widest text-muted-foreground">Years serving Chichawatni</div>
          </div>
        </div>
        <div>
          <div className="text-xs font-semibold uppercase tracking-widest text-brand">Our Story</div>
          <h2 className="mt-2 font-display text-4xl sm:text-5xl font-bold">Real pizza. Real fire. Real people.</h2>
          <p className="mt-5 text-muted-foreground leading-relaxed">
            The Oven Pizza was born from a simple idea: Chichawatni deserved
            pizza as good as anything in the big cities. So we imported the
            technique — hand-tossed dough, wood-fired ovens, imported cheese —
            and paired it with the flavours our community loves.
          </p>
          <p className="mt-4 text-muted-foreground leading-relaxed">
            Today we serve hundreds of happy families every week from our home
            on Kamboh Road, with dine-in, take-away and free home delivery
            across the city.
          </p>
          <div className="mt-6 grid grid-cols-3 gap-4">
            {[
              { n: "4.8★", l: "Rating" },
              { n: "140+", l: "Reviews" },
              { n: "2 AM", l: "Open till" },
            ].map(s => (
              <div key={s.l} className="rounded-2xl bg-cream border border-border p-4 text-center">
                <div className="font-display text-2xl font-bold text-brand">{s.n}</div>
                <div className="mt-0.5 text-xs uppercase tracking-widest text-muted-foreground">{s.l}</div>
              </div>
            ))}
          </div>
          <Link to="/about" className="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-brand hover:underline">
            Read our full story <ChevronRight className="h-4 w-4" />
          </Link>
        </div>
      </section>

      {/* How ordering works */}
      <section className="container-x py-14">
        <div className="text-center">
          <div className="text-xs font-semibold uppercase tracking-widest text-brand">Simple & Fast</div>
          <h2 className="mt-2 font-display text-4xl sm:text-5xl font-bold">How ordering works</h2>
        </div>
        <div className="mt-10 grid gap-6 md:grid-cols-3">
          {[
            { n: "01", t: "Pick your favourite", d: "Browse our menu, deals and Chichawatni favourites." },
            { n: "02", t: "Call or WhatsApp", d: "Message us or ring — we'll confirm in seconds." },
            { n: "03", t: "Fresh at your door", d: "Free home delivery, hot from the oven." },
          ].map((s) => (
            <div key={s.n} className="rounded-3xl border border-border bg-card p-8 relative overflow-hidden">
              <div className="absolute -top-4 -right-4 font-display text-8xl font-bold text-brand/5">{s.n}</div>
              <div className="relative">
                <div className="font-display text-sm font-bold text-brand">{s.n}</div>
                <h3 className="mt-2 font-display text-2xl font-bold">{s.t}</h3>
                <p className="mt-2 text-muted-foreground">{s.d}</p>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* Testimonials */}
      <section className="container-x py-14">
        <div className="text-center">
          <div className="text-xs font-semibold uppercase tracking-widest text-brand">Loved locally</div>
          <h2 className="mt-2 font-display text-4xl sm:text-5xl font-bold">What Chichawatni is saying</h2>
        </div>
        <div className="mt-10 grid gap-5 md:grid-cols-3">
          {[
            { n: "Ahmed R.", t: "Best pizza in Chichawatni, no question. The crown crust is unreal." },
            { n: "Sana K.", t: "Delivery was fast, food was piping hot. My kids ask for The Oven every weekend." },
            { n: "Bilal M.", t: "Great deals, great taste. The Rs 400 shawarma combo is a steal." },
            { n: "Ayesha F.", t: "Cosy interior, friendly staff. We come here for every family dinner." },
            { n: "Hamza S.", t: "Late-night lifesaver. Open till 2 AM and the wings are addictive." },
            { n: "Iqra J.", t: "Fresh ingredients, real oven — you can tell the difference in every bite." },
          ].map((t, i) => (
            <blockquote key={i} className="rounded-3xl border border-border bg-card p-6 shadow-sm">
              <div className="flex gap-0.5">
                {[0,1,2,3,4].map(i => <Star key={i} className="h-4 w-4 fill-gold text-gold" />)}
              </div>
              <p className="mt-3 text-foreground/90">"{t.t}"</p>
              <footer className="mt-4 flex items-center gap-3">
                <div className="grid h-9 w-9 place-items-center rounded-full bg-brand/10 text-brand font-bold text-sm">
                  {t.n[0]}
                </div>
                <div>
                  <div className="text-sm font-semibold">{t.n}</div>
                  <div className="text-xs text-muted-foreground">Verified customer</div>
                </div>
              </footer>
            </blockquote>
          ))}
        </div>
        <div className="mt-8 text-center">
          <Link to="/reviews" className="inline-flex items-center gap-2 text-sm font-semibold text-brand hover:underline">
            Read all reviews <ChevronRight className="h-4 w-4" />
          </Link>
        </div>
      </section>

      {/* Location & hours */}
      <section className="container-x py-14 grid gap-8 lg:grid-cols-5">
        <div className="lg:col-span-2 space-y-6">
          <div>
            <div className="text-xs font-semibold uppercase tracking-widest text-brand">Come visit</div>
            <h2 className="mt-2 font-display text-4xl font-bold">Find us in Chichawatni</h2>
          </div>
          <div className="rounded-2xl border border-border bg-card p-5 space-y-4">
            <div className="flex gap-3">
              <MapPin className="h-5 w-5 text-brand shrink-0 mt-0.5" />
              <div>
                <div className="font-semibold">Address</div>
                <div className="text-sm text-muted-foreground">{business.address}</div>
              </div>
            </div>
            <div className="flex gap-3">
              <Phone className="h-5 w-5 text-brand shrink-0 mt-0.5" />
              <div>
                <div className="font-semibold">Phone</div>
                <a href={telLink} className="text-sm text-muted-foreground hover:text-brand">{business.phone}</a>
              </div>
            </div>
            <div className="flex gap-3">
              <Clock className="h-5 w-5 text-brand shrink-0 mt-0.5" />
              <div>
                <div className="font-semibold">Hours</div>
                <div className="text-sm text-muted-foreground">{business.hours}</div>
              </div>
            </div>
            <div className="flex gap-3">
              <ChefHat className="h-5 w-5 text-brand shrink-0 mt-0.5" />
              <div>
                <div className="font-semibold">Dining</div>
                <div className="text-sm text-muted-foreground">Dine-in · Take-away · Free home delivery</div>
              </div>
            </div>
          </div>
        </div>
        <div className="lg:col-span-3 rounded-3xl overflow-hidden border border-border shadow-lg min-h-[380px]">
          <iframe
            src={business.mapEmbed}
            title="The Oven Pizza Chichawatni location"
            className="w-full h-full min-h-[380px]"
            loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
          />
        </div>
      </section>

      {/* Final CTA */}
      <section className="container-x py-16">
        <div className="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-brand via-brand to-[#8B1A1A] px-8 sm:px-14 py-14 text-white">
          <div className="absolute inset-0 opacity-20" style={{ backgroundImage: `url(${ingredients})`, backgroundSize: 'cover', backgroundPosition: 'center' }} />
          <div className="relative max-w-2xl">
            <div className="text-xs font-semibold uppercase tracking-widest text-gold">Hungry yet?</div>
            <h2 className="mt-2 font-display text-4xl sm:text-5xl font-bold">Your favourite pizza is one call away.</h2>
            <p className="mt-4 text-white/85">Order now for free home delivery in Chichawatni, or drop by our restaurant on Kamboh Road.</p>
            <div className="mt-8 flex flex-wrap gap-3">
              <a href={telLink} className="inline-flex items-center gap-2 rounded-full bg-white text-brand px-7 py-3.5 text-sm font-bold hover:brightness-105 transition">
                <Phone className="h-4 w-4" /> Call {business.phone}
              </a>
              <a href={waLink()} target="_blank" rel="noopener" className="inline-flex items-center gap-2 rounded-full bg-charcoal text-white px-7 py-3.5 text-sm font-bold hover:bg-charcoal/80 transition">
                <MessageCircle className="h-4 w-4" /> WhatsApp Order
              </a>
            </div>
          </div>
        </div>
      </section>
    </SiteLayout>
  );
}
