import { useEffect, useState } from "react";
import { Phone, ArrowUp, MessageCircle } from "lucide-react";
import { business, telLink, waLink } from "@/lib/business";

export function FloatingActions() {
  const [show, setShow] = useState(false);
  useEffect(() => {
    const on = () => setShow(window.scrollY > 400);
    on();
    window.addEventListener("scroll", on, { passive: true });
    return () => window.removeEventListener("scroll", on);
  }, []);

  return (
    <div className="fixed bottom-4 right-4 z-50 flex flex-col gap-3">
      {show && (
        <button
          onClick={() => window.scrollTo({ top: 0, behavior: "smooth" })}
          aria-label="Back to top"
          className="grid h-11 w-11 place-items-center rounded-full bg-charcoal text-white shadow-lg hover:scale-105 transition"
        >
          <ArrowUp className="h-5 w-5" />
        </button>
      )}
      <a
        href={telLink}
        aria-label={`Call ${business.name}`}
        className="grid h-13 w-13 h-14 w-14 place-items-center rounded-full bg-brand text-white shadow-xl btn-glow hover:scale-105 transition"
      >
        <Phone className="h-6 w-6" />
      </a>
      <a
        href={waLink()}
        target="_blank"
        rel="noopener"
        aria-label="Order on WhatsApp"
        className="grid h-14 w-14 place-items-center rounded-full text-white shadow-xl hover:scale-105 transition"
        style={{ background: "#25D366" }}
      >
        <MessageCircle className="h-6 w-6" />
      </a>
    </div>
  );
}
