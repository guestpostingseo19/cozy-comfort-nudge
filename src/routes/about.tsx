import { createFileRoute, Link } from "@tanstack/react-router";
import { Award, Flame, Heart, Users } from "lucide-react";
import { SiteLayout, PageHero } from "@/components/SiteLayout";
import chef from "@/assets/chef.jpg";
import interior from "@/assets/interior.jpg";
import ingredients from "@/assets/ingredients.jpg";

export const Route = createFileRoute("/about")({
  head: () => ({
    meta: [
      { title: "About Us · The Oven Pizza Chichawatni" },
      { name: "description", content: "The story of The Oven Pizza Chichawatni — our chefs, our wood-fired ovens, our fresh ingredients and our promise to you." },
      { property: "og:title", content: "About The Oven Pizza Chichawatni" },
      { property: "og:description", content: "Real pizza, real fire, real people — meet the family behind Chichawatni's favourite pizza." },
    ],
  }),
  component: About,
});

function About() {
  return (
    <SiteLayout>
      <PageHero eyebrow="Our Story" title="Real pizza. Real fire. Real people." subtitle="Since day one, we've had one mission: bring premium wood-fired pizza to the heart of Chichawatni." />

      <section className="container-x py-14 grid gap-10 lg:grid-cols-2 items-center">
        <img src={chef} alt="Chef preparing pizza at The Oven" width={1200} height={1400} loading="lazy" className="rounded-3xl shadow-xl w-full" />
        <div>
          <h2 className="font-display text-4xl font-bold">A neighbourhood pizzeria with a big-city soul.</h2>
          <p className="mt-4 text-muted-foreground leading-relaxed">
            The Oven Pizza started as a family dream on Kamboh Road — a place
            where Chichawatni families could gather over food that felt special
            without feeling far away. We invested in real wood-fired ovens,
            trained our chefs in classic pizza technique, and paired it with
            flavours our community actually loves.
          </p>
          <p className="mt-4 text-muted-foreground leading-relaxed">
            Today, we're proudly rated 4.8 stars by 140+ neighbours who keep
            coming back for the tikka pizza, the crown crust, the late-night
            wings and the warm welcome that comes with every order.
          </p>
        </div>
      </section>

      <section className="container-x py-14">
        <div className="text-center max-w-2xl mx-auto">
          <div className="text-xs font-semibold uppercase tracking-widest text-brand">What we stand for</div>
          <h2 className="mt-2 font-display text-4xl font-bold">Our promise to Chichawatni</h2>
        </div>
        <div className="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
          {[
            { icon: Flame, t: "Wood-fired every time", d: "No shortcuts. Real oven, real fire, real crust." },
            { icon: Heart, t: "Made with love", d: "Family recipes, fresh ingredients, honest prices." },
            { icon: Award, t: "Quality-obsessed", d: "Imported cheese, hand-cut vegetables, dough made daily." },
            { icon: Users, t: "For families", d: "Cosy dining, a kids' play area and warm service." },
          ].map(v => (
            <div key={v.t} className="rounded-2xl border border-border bg-card p-6">
              <div className="grid h-12 w-12 place-items-center rounded-xl bg-brand/10 text-brand">
                <v.icon className="h-5 w-5" />
              </div>
              <h3 className="mt-4 font-display text-lg font-bold">{v.t}</h3>
              <p className="mt-1 text-sm text-muted-foreground">{v.d}</p>
            </div>
          ))}
        </div>
      </section>

      <section className="container-x py-14 grid gap-10 lg:grid-cols-2 items-center">
        <div className="order-2 lg:order-1">
          <h2 className="font-display text-4xl font-bold">Fresh ingredients, always.</h2>
          <p className="mt-4 text-muted-foreground leading-relaxed">
            Our dough is made fresh every single morning. Our vegetables are hand-chopped on the day.
            Our cheese is real mozzarella that melts into that unforgettable pull. If it isn't fresh,
            it doesn't leave our kitchen.
          </p>
          <ul className="mt-6 space-y-3 text-sm">
            {[
              "Fresh dough made every morning",
              "Real mozzarella and imported cheddar",
              "Farm-fresh vegetables and herbs",
              "House-made sauces & marinades",
              "Chicken marinated for 24 hours",
            ].map(t => <li key={t} className="flex gap-2"><span className="text-brand">✓</span>{t}</li>)}
          </ul>
        </div>
        <img src={ingredients} alt="Fresh pizza ingredients" width={1200} height={900} loading="lazy" className="rounded-3xl shadow-xl w-full order-1 lg:order-2" />
      </section>

      <section className="container-x py-14">
        <div className="relative overflow-hidden rounded-[2rem]">
          <img src={interior} alt="The Oven Pizza restaurant interior" width={1400} height={1000} loading="lazy" className="w-full h-[380px] object-cover" />
          <div className="absolute inset-0 bg-gradient-to-t from-charcoal/85 via-charcoal/30 to-transparent" />
          <div className="absolute inset-0 flex flex-col justify-end p-8 sm:p-12 text-white">
            <h2 className="font-display text-3xl sm:text-4xl font-bold max-w-xl">Come dine with us in the heart of Chichawatni.</h2>
            <p className="mt-3 max-w-lg text-white/85">Cosy seating, a kids' play area and pizza fresh out of the oven — every day until 2 AM.</p>
            <div className="mt-6"><Link to="/contact" className="inline-flex items-center rounded-full bg-white text-charcoal px-6 py-3 text-sm font-bold">Get directions</Link></div>
          </div>
        </div>
      </section>
    </SiteLayout>
  );
}
