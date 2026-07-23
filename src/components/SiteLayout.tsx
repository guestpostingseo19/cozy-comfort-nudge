import type { ReactNode } from "react";
import { Header } from "./Header";
import { Footer } from "./Footer";
import { FloatingActions } from "./FloatingActions";

export function SiteLayout({ children }: { children: ReactNode }) {
  return (
    <div className="flex min-h-dvh flex-col bg-background">
      <Header />
      <main className="flex-1">{children}</main>
      <Footer />
      <FloatingActions />
    </div>
  );
}

export function PageHero({
  eyebrow,
  title,
  subtitle,
}: {
  eyebrow?: string;
  title: string;
  subtitle?: string;
}) {
  return (
    <section className="relative overflow-hidden bg-gradient-to-b from-brand/5 via-background to-background pt-14 pb-12 sm:pt-20 sm:pb-16">
      <div className="absolute inset-0 opacity-[0.04] pointer-events-none"
        style={{
          backgroundImage:
            "radial-gradient(circle at 20% 20%, var(--brand) 0, transparent 40%), radial-gradient(circle at 80% 60%, var(--flame) 0, transparent 40%)",
        }}
      />
      <div className="container-x relative text-center">
        {eyebrow && (
          <div className="inline-flex items-center gap-2 rounded-full bg-brand/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-brand">
            {eyebrow}
          </div>
        )}
        <h1 className="mt-4 font-display text-4xl sm:text-5xl md:text-6xl font-bold text-charcoal">
          {title}
        </h1>
        {subtitle && (
          <p className="mx-auto mt-4 max-w-2xl text-base sm:text-lg text-muted-foreground">
            {subtitle}
          </p>
        )}
      </div>
    </section>
  );
}
