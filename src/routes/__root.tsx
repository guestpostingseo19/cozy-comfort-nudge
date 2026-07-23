import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import {
  Outlet,
  Link,
  createRootRouteWithContext,
  useRouter,
  HeadContent,
  Scripts,
} from "@tanstack/react-router";
import { useEffect, type ReactNode } from "react";

import appCss from "../styles.css?url";
import { reportLovableError } from "../lib/lovable-error-reporting";

function NotFoundComponent() {
  return (
    <div className="flex min-h-dvh items-center justify-center bg-background px-4">
      <div className="max-w-md text-center">
        <div className="font-display text-8xl font-bold text-brand">404</div>
        <h1 className="mt-2 font-display text-2xl font-semibold">This slice got away</h1>
        <p className="mt-3 text-sm text-muted-foreground">
          The page you're looking for is out of the oven and gone. Let's get you back to something delicious.
        </p>
        <div className="mt-6 flex justify-center gap-3">
          <Link to="/" className="inline-flex items-center rounded-full bg-brand px-5 py-2.5 text-sm font-semibold text-white btn-glow hover:brightness-110 transition">
            Back to Home
          </Link>
          <Link to="/menu" className="inline-flex items-center rounded-full border border-border bg-background px-5 py-2.5 text-sm font-semibold hover:bg-accent/20 transition">
            See the Menu
          </Link>
        </div>
      </div>
    </div>
  );
}

function ErrorComponent({ error, reset }: { error: Error; reset: () => void }) {
  console.error(error);
  const router = useRouter();
  useEffect(() => {
    reportLovableError(error, { boundary: "tanstack_root_error_component" });
  }, [error]);
  return (
    <div className="flex min-h-dvh items-center justify-center bg-background px-4">
      <div className="max-w-md text-center">
        <h1 className="font-display text-2xl font-semibold">Something didn't load</h1>
        <p className="mt-2 text-sm text-muted-foreground">
          Try again in a moment — our kitchen is still open.
        </p>
        <div className="mt-6 flex justify-center gap-3">
          <button
            onClick={() => { router.invalidate(); reset(); }}
            className="rounded-full bg-brand px-5 py-2.5 text-sm font-semibold text-white btn-glow"
          >Try again</button>
          <a href="/" className="rounded-full border border-border bg-background px-5 py-2.5 text-sm font-semibold">Go home</a>
        </div>
      </div>
    </div>
  );
}

export const Route = createRootRouteWithContext<{ queryClient: QueryClient }>()({
  head: () => ({
    meta: [
      { charSet: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      { title: "The Oven Pizza Chichawatni · Best Pizza in Chichawatni" },
      { name: "description", content: "The Oven Pizza — wood-fired pizzas, loaded burgers, wings & Arabic bites. Dine-in, take-away and free home delivery in Chichawatni. Open daily until 2 AM." },
      { name: "author", content: "The Oven Pizza Chichawatni" },
      { name: "theme-color", content: "#D62828" },
      { property: "og:site_name", content: "The Oven Pizza Chichawatni" },
      { property: "og:type", content: "restaurant" },
      { property: "og:title", content: "The Oven Pizza Chichawatni · Best Pizza in Chichawatni" },
      { property: "og:description", content: "Wood-fired pizzas, burgers & Arabic bites. Free delivery in Chichawatni. Open daily till 2 AM." },
      { name: "twitter:card", content: "summary_large_image" },
      { name: "twitter:title", content: "The Oven Pizza Chichawatni" },
      { name: "twitter:description", content: "Best pizza in Chichawatni. Fresh from the oven, straight to your table." },
    ],
    links: [
      { rel: "stylesheet", href: appCss },
      { rel: "preconnect", href: "https://fonts.googleapis.com" },
      { rel: "preconnect", href: "https://fonts.gstatic.com", crossOrigin: "anonymous" },
      { rel: "stylesheet", href: "https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" },
      { rel: "icon", href: "/favicon.ico", type: "image/x-icon" },
    ],
    scripts: [
      {
        type: "application/ld+json",
        children: JSON.stringify({
          "@context": "https://schema.org",
          "@type": "Restaurant",
          name: "The Oven Pizza Chichawatni",
          image: "/og-image.jpg",
          address: {
            "@type": "PostalAddress",
            streetAddress: "Kamboh Road, Street No. 12, Block 12",
            addressLocality: "Chichawatni",
            addressRegion: "Punjab",
            addressCountry: "PK",
          },
          telephone: "+923001580250",
          servesCuisine: ["Pizza", "Fast Food", "Arabic", "Burgers"],
          priceRange: "Rs 1 – 1000",
          aggregateRating: {
            "@type": "AggregateRating",
            ratingValue: "4.8",
            reviewCount: "140",
          },
          openingHours: "Mo-Su 11:00-02:00",
        }),
      },
    ],
  }),
  shellComponent: RootShell,
  component: RootComponent,
  notFoundComponent: NotFoundComponent,
  errorComponent: ErrorComponent,
});

function RootShell({ children }: { children: ReactNode }) {
  return (
    <html lang="en">
      <head>
        <HeadContent />
      </head>
      <body>
        {children}
        <Scripts />
      </body>
    </html>
  );
}

function RootComponent() {
  const { queryClient } = Route.useRouteContext();
  return (
    <QueryClientProvider client={queryClient}>
      <Outlet />
    </QueryClientProvider>
  );
}
