import { Link } from "@tanstack/react-router";
import { useEffect, useState } from "react";
import { Menu, Phone, X, Flame } from "lucide-react";
import { business, telLink } from "@/lib/business";

const nav = [
  { to: "/", label: "Home" },
  { to: "/menu", label: "Menu" },
  { to: "/deals", label: "Deals" },
  { to: "/gallery", label: "Gallery" },
  { to: "/reviews", label: "Reviews" },
  { to: "/about", label: "About" },
  { to: "/contact", label: "Contact" },
];

export function Header() {
  const [open, setOpen] = useState(false);
  const [scrolled, setScrolled] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 20);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  return (
    <>
      {/* Announcement bar */}
      <div className="bg-flame text-white text-xs sm:text-sm">
        <div className="container-x flex items-center justify-between py-2 gap-3">
          <span className="flex items-center gap-2 truncate">
            <span className="inline-block h-1.5 w-1.5 rounded-full bg-gold animate-pulse shrink-0" />
            <span className="truncate font-bold uppercase tracking-[0.18em] text-[10px] sm:text-xs">
              Free delivery in Chichawatni · Open until 2 AM daily
            </span>
          </span>
          <a
            href={telLink}
            className="hidden sm:inline-flex items-center gap-1.5 font-bold text-white hover:text-gold transition"
          >
            <Phone className="h-3.5 w-3.5" /> {business.phone}
          </a>
        </div>
      </div>


      <header
        className={`sticky top-0 z-40 transition-all duration-300 ${
          scrolled
            ? "bg-background/90 backdrop-blur-md shadow-[0_4px_20px_-8px_rgba(0,0,0,0.15)]"
            : "bg-background/60 backdrop-blur"
        }`}
      >
        <div className="container-x grid grid-cols-[minmax(0,1fr)_auto] items-center gap-4 py-4 lg:grid-cols-[auto_1fr_auto]">
          <Link to="/" className="flex items-center gap-2.5 min-w-0" aria-label="The Oven Pizza — Home">
            <div className="grid h-11 w-11 shrink-0 place-items-center rounded-full bg-gradient-to-br from-brand to-flame text-white shadow-lg">
              <Flame className="h-5 w-5" />
            </div>
            <div className="min-w-0 leading-tight">
              <div className="font-display text-lg sm:text-xl font-bold truncate">The Oven</div>
              <div className="text-[10px] sm:text-xs uppercase tracking-[0.18em] text-muted-foreground">
                Pizza · Chichawatni
              </div>
            </div>
          </Link>

          <nav className="hidden lg:flex items-center justify-center gap-1">
            {nav.map((n) => (
              <Link
                key={n.to}
                to={n.to}
                activeOptions={{ exact: n.to === "/" }}
                className="px-3.5 py-2 rounded-full text-sm font-medium text-foreground/80 hover:text-brand hover:bg-brand/5 transition [&.active]:text-brand [&.active]:bg-brand/10"
              >
                {n.label}
              </Link>
            ))}
          </nav>

          <div className="flex items-center gap-2 justify-end">
            <a
              href={telLink}
              className="hidden md:inline-flex items-center gap-2 rounded-xl bg-gold px-5 py-2.5 text-sm font-black uppercase tracking-widest text-charcoal btn-chunky btn-chunky-hover"
            >
              <Phone className="h-4 w-4" /> Order Now
            </a>

            <button
              onClick={() => setOpen((o) => !o)}
              className="lg:hidden inline-flex h-11 w-11 items-center justify-center rounded-full border border-border bg-background"
              aria-label="Toggle menu"
              aria-expanded={open}
            >
              {open ? <X className="h-5 w-5" /> : <Menu className="h-5 w-5" />}
            </button>
          </div>
        </div>

        {open && (
          <div className="lg:hidden border-t border-border bg-background">
            <div className="container-x py-4 flex flex-col gap-1">
              {nav.map((n) => (
                <Link
                  key={n.to}
                  to={n.to}
                  onClick={() => setOpen(false)}
                  activeOptions={{ exact: n.to === "/" }}
                  className="px-4 py-3 rounded-xl text-base font-medium hover:bg-brand/5 hover:text-brand [&.active]:bg-brand/10 [&.active]:text-brand"
                >
                  {n.label}
                </Link>
              ))}
              <a
                href={telLink}
                className="mt-2 inline-flex items-center justify-center gap-2 rounded-full bg-brand px-5 py-3 text-sm font-semibold text-white"
              >
                <Phone className="h-4 w-4" /> {business.phone}
              </a>
            </div>
          </div>
        )}
      </header>
    </>
  );
}
