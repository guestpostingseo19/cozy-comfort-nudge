import { createFileRoute } from "@tanstack/react-router";
import { MapPin, Phone, Clock, MessageCircle, Mail } from "lucide-react";
import { useState } from "react";
import { SiteLayout, PageHero } from "@/components/SiteLayout";
import { business, telLink, waLink } from "@/lib/business";

export const Route = createFileRoute("/contact")({
  head: () => ({
    meta: [
      { title: "Contact · The Oven Pizza Chichawatni" },
      { name: "description", content: `Call ${business.phone}, WhatsApp us or visit The Oven Pizza on Kamboh Road, Chichawatni. Open daily until 2 AM.` },
      { property: "og:title", content: "Contact The Oven Pizza Chichawatni" },
      { property: "og:description", content: "Call, WhatsApp or visit us on Kamboh Road, Chichawatni. Open daily till 2 AM." },
    ],
  }),
  component: Contact,
});

function Contact() {
  const [sent, setSent] = useState(false);
  return (
    <SiteLayout>
      <PageHero eyebrow="Get in touch" title="We'd love to hear from you." subtitle="Questions, bookings, feedback or big-order enquiries — reach out any time." />

      <section className="container-x pb-16 grid gap-8 lg:grid-cols-5">
        <div className="lg:col-span-2 space-y-4">
          {[
            { icon: MapPin, label: "Address", value: business.address, href: business.mapLink },
            { icon: Phone, label: "Phone", value: business.phone, href: telLink },
            { icon: MessageCircle, label: "WhatsApp", value: "Chat with us now", href: waLink() },
            { icon: Clock, label: "Hours", value: business.hours },
            { icon: Mail, label: "Plus Code", value: business.plusCode },
          ].map((c, i) => (
            <a key={i} href={c.href ?? "#"} className="flex gap-4 rounded-2xl border border-border bg-card p-5 hover:shadow-lg transition">
              <div className="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand/10 text-brand">
                <c.icon className="h-5 w-5" />
              </div>
              <div className="min-w-0">
                <div className="text-xs font-semibold uppercase tracking-widest text-muted-foreground">{c.label}</div>
                <div className="mt-0.5 font-medium">{c.value}</div>
              </div>
            </a>
          ))}
        </div>

        <div className="lg:col-span-3 rounded-3xl border border-border bg-card p-6 sm:p-8 shadow-sm">
          <h2 className="font-display text-2xl font-bold">Send us a message</h2>
          <p className="mt-1 text-sm text-muted-foreground">We usually reply within a few hours. For orders, WhatsApp is fastest.</p>
          {sent ? (
            <div className="mt-6 rounded-2xl bg-brand/10 border border-brand/20 p-6 text-center">
              <div className="font-display text-2xl font-bold text-brand">Thanks!</div>
              <p className="mt-2 text-sm text-muted-foreground">We've received your message and will get back to you soon.</p>
            </div>
          ) : (
            <form onSubmit={(e) => { e.preventDefault(); setSent(true); }} className="mt-6 grid gap-4 sm:grid-cols-2">
              <label className="grid gap-1.5 text-sm">
                <span className="font-medium">Name</span>
                <input required name="name" className="rounded-xl border border-input bg-background px-4 py-3 outline-none focus:ring-2 focus:ring-brand/40" placeholder="Your name" />
              </label>
              <label className="grid gap-1.5 text-sm">
                <span className="font-medium">Phone</span>
                <input required name="phone" type="tel" className="rounded-xl border border-input bg-background px-4 py-3 outline-none focus:ring-2 focus:ring-brand/40" placeholder="03xx xxxxxxx" />
              </label>
              <label className="grid gap-1.5 text-sm sm:col-span-2">
                <span className="font-medium">Email (optional)</span>
                <input name="email" type="email" className="rounded-xl border border-input bg-background px-4 py-3 outline-none focus:ring-2 focus:ring-brand/40" placeholder="you@example.com" />
              </label>
              <label className="grid gap-1.5 text-sm sm:col-span-2">
                <span className="font-medium">Message</span>
                <textarea required name="message" rows={5} className="rounded-xl border border-input bg-background px-4 py-3 outline-none focus:ring-2 focus:ring-brand/40" placeholder="How can we help?" />
              </label>
              <div className="sm:col-span-2 flex flex-wrap gap-3">
                <button type="submit" className="inline-flex items-center gap-2 rounded-full bg-brand text-white px-6 py-3 text-sm font-bold btn-glow hover:brightness-110">Send message</button>
                <a href={waLink()} target="_blank" rel="noopener" className="inline-flex items-center gap-2 rounded-full border border-border px-6 py-3 text-sm font-bold hover:bg-accent/20">
                  <MessageCircle className="h-4 w-4" /> WhatsApp instead
                </a>
              </div>
            </form>
          )}
        </div>
      </section>

      <section className="container-x pb-20">
        <div className="rounded-3xl overflow-hidden border border-border shadow-lg">
          <iframe
            src={business.mapEmbed}
            title="The Oven Pizza Chichawatni map"
            className="w-full h-[420px]"
            loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
          />
        </div>
      </section>
    </SiteLayout>
  );
}
