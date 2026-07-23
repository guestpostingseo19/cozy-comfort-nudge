import { Flame } from "lucide-react";

const items = [
  "Wood-Fired Daily",
  "Free Delivery in Chichawatni",
  "Open Until 2 AM",
  "Hand-Tossed Dough",
  "Fresh Ingredients",
  "Loved by 140+ Families",
  "Since Day One",
];

export function Marquee() {
  const row = [...items, ...items];
  return (
    <div className="relative overflow-hidden bg-charcoal py-4 border-y border-white/5">
      <div className="flex w-max animate-marquee gap-10 whitespace-nowrap">
        {row.map((t, i) => (
          <span
            key={i}
            className="flex items-center gap-3 font-display italic text-2xl sm:text-3xl text-cream/90"
          >
            <Flame className="h-5 w-5 text-gold shrink-0" />
            <span>{t}</span>
            <span className="text-gold">·</span>
          </span>
        ))}
      </div>
      <div className="pointer-events-none absolute inset-y-0 left-0 w-20 bg-gradient-to-r from-charcoal to-transparent" />
      <div className="pointer-events-none absolute inset-y-0 right-0 w-20 bg-gradient-to-l from-charcoal to-transparent" />
    </div>
  );
}
