import { createFileRoute } from "@tanstack/react-router";
import { SiteLayout, PageHero } from "@/components/SiteLayout";
import heroPizza from "@/assets/hero-pizza.jpg";
import pizza1 from "@/assets/pizza-1.jpg";
import pizza2 from "@/assets/pizza-2.jpg";
import pizza3 from "@/assets/pizza-3.jpg";
import wings from "@/assets/wings.jpg";
import burger from "@/assets/burger.jpg";
import shawarma from "@/assets/shawarma.jpg";
import sandwich from "@/assets/sandwich.jpg";
import fries from "@/assets/fries.jpg";
import chef from "@/assets/chef.jpg";
import interior from "@/assets/interior.jpg";
import oven from "@/assets/oven.jpg";
import ingredients from "@/assets/ingredients.jpg";

export const Route = createFileRoute("/gallery")({
  head: () => ({
    meta: [
      { title: "Gallery · The Oven Pizza Chichawatni" },
      { name: "description", content: "See our restaurant, our chefs at work, our fresh ingredients and the pizzas that made Chichawatni fall in love with The Oven." },
      { property: "og:title", content: "Gallery · The Oven Pizza Chichawatni" },
      { property: "og:description", content: "Restaurant, kitchen, fresh pizzas and behind-the-scenes." },
    ],
  }),
  component: Gallery,
});

const shots = [
  { src: heroPizza, alt: "Signature wood-fired pizza", cls: "row-span-2 col-span-2" },
  { src: chef, alt: "Chef at wood-fired oven", cls: "row-span-2" },
  { src: pizza2, alt: "Creamy chicken pizza" },
  { src: pizza3, alt: "Chicken tikka pizza" },
  { src: interior, alt: "Restaurant interior", cls: "col-span-2" },
  { src: wings, alt: "Chicken wings" },
  { src: burger, alt: "Zinger burger" },
  { src: shawarma, alt: "Chicken shawarma" },
  { src: sandwich, alt: "Pan sandwich with fries" },
  { src: oven, alt: "Wood-fired oven flames" },
  { src: pizza1, alt: "Pepperoni pizza" },
  { src: fries, alt: "Golden fries" },
  { src: ingredients, alt: "Fresh pizza ingredients", cls: "col-span-2" },
];

function Gallery() {
  return (
    <SiteLayout>
      <PageHero eyebrow="Gallery" title="A taste of what's inside." subtitle="Peek into our kitchen, our dining room and the pizzas fresh out of the oven." />
      <section className="container-x pb-16">
        <div className="grid grid-cols-2 md:grid-cols-4 auto-rows-[180px] sm:auto-rows-[220px] gap-3">
          {shots.map((s, i) => (
            <div key={i} className={`overflow-hidden rounded-2xl group ${s.cls ?? ""}`}>
              <img src={s.src} alt={s.alt} loading="lazy" className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
            </div>
          ))}
        </div>
      </section>
    </SiteLayout>
  );
}
