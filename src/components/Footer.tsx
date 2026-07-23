import { Link } from "@tanstack/react-router";
import { Flame, MapPin, Phone, Clock, Instagram, Facebook } from "lucide-react";
import { business, telLink } from "@/lib/business";

export function Footer() {
  return (
    <footer className="mt-24 bg-charcoal text-cream/90">
      <div className="container-x py-16 grid gap-10 md:grid-cols-2 lg:grid-cols-4">
        <div>
          <div className="flex items-center gap-2.5">
            <div className="grid h-11 w-11 place-items-center rounded-full bg-gradient-to-br from-brand to-flame text-white">
              <Flame className="h-5 w-5" />
            </div>
            <div>
              <div className="font-display text-xl font-bold text-white">The Oven Pizza</div>
              <div className="text-xs uppercase tracking-widest text-gold">Chichawatni</div>
            </div>
          </div>
          <p className="mt-4 text-sm text-cream/70 leading-relaxed">
            Wood-fired pizzas, loaded burgers and Arabic bites — freshly baked and served with love in the heart of Chichawatni.
          </p>
          <div className="mt-5 flex gap-3">
            <a href={business.social.facebook} aria-label="Facebook" className="grid h-10 w-10 place-items-center rounded-full bg-white/10 hover:bg-brand transition">
              <Facebook className="h-4 w-4" />
            </a>
            <a href={business.social.instagram} aria-label="Instagram" className="grid h-10 w-10 place-items-center rounded-full bg-white/10 hover:bg-brand transition">
              <Instagram className="h-4 w-4" />
            </a>
          </div>
        </div>

        <div>
          <h4 className="text-white font-semibold text-sm uppercase tracking-widest">Explore</h4>
          <ul className="mt-4 space-y-2.5 text-sm">
            {[
              ["/menu", "Menu"],
              ["/deals", "Deals & Offers"],
              ["/gallery", "Gallery"],
              ["/reviews", "Reviews"],
              ["/about", "About Us"],
              ["/faq", "FAQ"],
            ].map(([to, label]) => (
              <li key={to}>
                <Link to={to} className="text-cream/70 hover:text-gold transition">
                  {label}
                </Link>
              </li>
            ))}
          </ul>
        </div>

        <div>
          <h4 className="text-white font-semibold text-sm uppercase tracking-widest">Visit</h4>
          <ul className="mt-4 space-y-3 text-sm text-cream/80">
            <li className="flex gap-2.5"><MapPin className="h-4 w-4 mt-0.5 shrink-0 text-gold" /><span>{business.address}</span></li>
            <li className="flex gap-2.5"><Phone className="h-4 w-4 mt-0.5 shrink-0 text-gold" /><a href={telLink} className="hover:text-white">{business.phone}</a></li>
            <li className="flex gap-2.5"><Clock className="h-4 w-4 mt-0.5 shrink-0 text-gold" /><span>{business.hours}</span></li>
          </ul>
        </div>

        <div>
          <h4 className="text-white font-semibold text-sm uppercase tracking-widest">Legal</h4>
          <ul className="mt-4 space-y-2.5 text-sm">
            <li><Link to="/privacy" className="text-cream/70 hover:text-gold">Privacy Policy</Link></li>
            <li><Link to="/terms" className="text-cream/70 hover:text-gold">Terms & Conditions</Link></li>
            <li><Link to="/contact" className="text-cream/70 hover:text-gold">Contact</Link></li>
          </ul>
        </div>
      </div>

      <div className="border-t border-white/10">
        <div className="container-x py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-cream/60">
          <p>© {new Date().getFullYear()} The Oven Pizza Chichawatni. All rights reserved.</p>
          <p>Handcrafted with 🔥 in Chichawatni, Punjab.</p>
        </div>
      </div>
    </footer>
  );
}
