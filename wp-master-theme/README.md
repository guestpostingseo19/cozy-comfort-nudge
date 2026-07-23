# The Oven Pizza — WP Master Theme

A pixel-perfect WordPress port of the React/Vite build for The Oven Pizza Chichawatni.
Same layout, same fonts, same colours, same animations — every page from the original app,
converted to native WordPress PHP templates.

## What's inside

```
wp-master-theme/
├─ style.css                    # WP theme header + design tokens + custom utilities + all keyframe animations
├─ functions.php                # Theme setup, enqueue, Tailwind CDN config, JSON-LD schema, page bootstrap + template routing
├─ header.php                   # <head>, wp_head(), announcement bar, sticky animated nav (desktop + mobile)
├─ footer.php                   # Footer, floating Call / WhatsApp / Back-to-Top buttons, wp_footer()
├─ front-page.php               # Home  (mirrors src/routes/index.tsx — hero, marquee, features, best sellers, deals, about, steps, testimonials, map, CTA)
├─ page-menu.php                # Menu  (category filter + full item grid — mirrors src/routes/menu.tsx)
├─ page-deals.php               # Deals (mirrors src/routes/deals.tsx + Weekend Family Feast block)
├─ page-gallery.php             # Gallery (bento image grid — mirrors src/routes/gallery.tsx)
├─ page-reviews.php             # Reviews (rating card + 12 testimonials — mirrors src/routes/reviews.tsx)
├─ page-about.php               # About (story, values, ingredients, dine-in banner — mirrors src/routes/about.tsx)
├─ page-contact.php             # Contact (info cards, form with thank-you, Google Map — mirrors src/routes/contact.tsx)
├─ page-faq.php                 # FAQ (10 questions, accordion, FAQPage JSON-LD — mirrors src/routes/faq.tsx)
├─ page-privacy.php             # Privacy policy
├─ page-terms.php               # Terms & conditions
├─ page.php                     # Generic page fallback
├─ index.php                    # Generic posts fallback
├─ 404.php                      # 404 (mirrors NotFoundComponent in __root.tsx)
├─ template-parts/
│  ├─ page-hero.php             # PageHero component (eyebrow / title / subtitle)
│  └─ marquee.php               # Wood-fire marquee ticker
├─ inc/
│  └─ data.php                  # Business info, categories, menu items, deals, Lucide-compatible inline-SVG icon helper
└─ assets/
   ├─ images/                   # All hero, chef, food, oven, interior, ingredients JPEGs
   └─ js/theme-animations.js    # Vanilla JS: reveal-on-scroll, sticky-scroll header, mobile nav, floating actions, menu filter, FAQ accordion, contact form
```

## Animations preserved

Every animation from the React build is present as either a CSS keyframe (defined in `style.css`)
or a Vanilla JS behaviour (in `assets/js/theme-animations.js`). Nothing was dropped.

| Effect                          | Where                                                        |
| ------------------------------- | ------------------------------------------------------------ |
| Reveal on scroll                | `.reveal` + IntersectionObserver in `theme-animations.js`    |
| Floating pizza                  | `@keyframes float-slow` / `.animate-float`                   |
| Floating tilted badge           | `@keyframes float-tilt` / `.animate-float-tilt`              |
| Slow rotating dashed ring       | `@keyframes spin-slow` / `.animate-spin-slow`                |
| Heat shimmer                    | `@keyframes heat-shimmer` / `.animate-heat`                  |
| Wood-fire ticker marquee        | `@keyframes marquee` / `.animate-marquee`                    |
| Pulsing "Deals" sticker         | `@keyframes pulse-ring` / `.animate-pulse-ring`              |
| Best-seller card shine sweep    | `.shine::after` + `@keyframes shine-sweep` on `.group:hover` |
| 3D tilt on hover                | `.card-3d` + `.card-3d-hover`                                |
| Chunky Order-Now CTA press      | `.btn-chunky` + `.btn-chunky-hover`                          |
| Pinging status dot              | `@keyframes ping` / `.animate-ping`                          |
| Announcement pulse dot          | `@keyframes pulse-soft` / `.animate-pulse`                   |
| Sticky-scroll header background | `[data-site-header].is-scrolled` toggled in JS               |
| Menu filter transition          | Vanilla JS chip toggling with animated visibility            |
| FAQ accordion open/close        | `max-height` transition on `.acc-content`                    |
| Mobile nav open/close           | Vanilla JS toggle with icon swap                             |

## Pages preserved

| Original route | WP template |
| -------------- | ----------- |
| `/`            | `front-page.php` (route: **Home** → set as static front page) |
| `/menu`        | `page-menu.php` |
| `/deals`       | `page-deals.php` |
| `/gallery`     | `page-gallery.php` |
| `/reviews`     | `page-reviews.php` |
| `/about`       | `page-about.php` |
| `/contact`     | `page-contact.php` |
| `/faq`         | `page-faq.php` |
| `/privacy`     | `page-privacy.php` |
| `/terms`       | `page-terms.php` |
| unmatched      | `404.php` |

The theme auto-creates all these pages on activation (via `after_switch_theme`) and sets the correct static front page.

## Design system

Design tokens live as CSS custom properties on `:root` in `style.css` and are mirrored in a
Tailwind CDN config injected from `functions.php` — so utility classes like `bg-brand`,
`text-charcoal`, `border-border` resolve to the exact same values used in the React build.

| Token           | Value       | Use                                   |
| --------------- | ----------- | ------------------------------------- |
| `--brand`       | `#00A896`   | Primary teal — headers, buttons, links |
| `--gold`        | `#FCE300`   | High-contrast CTAs & badges           |
| `--flame`       | `#D62828`   | Accent red — announcements, spice     |
| `--charcoal`    | `#1E2522`   | Body typography + dark sections       |
| `--cream`       | `#FFFFFF`   | White backgrounds & text-on-dark      |

Type pair: **Playfair Display** (display) + **Inter** (body) — loaded via Google Fonts in `functions.php`.

## Installation

1. Zip the `wp-master-theme/` folder:
   ```bash
   cd wp-master-theme && zip -r ../wp-master-theme.zip . && cd ..
   ```
   Or download the folder via **Dev → Files** and zip it locally.
2. In WordPress admin: **Appearance → Themes → Add New → Upload Theme** → upload `wp-master-theme.zip` → **Activate**.
3. On activation the theme automatically:
   - creates every page (Home, Menu, Deals, Gallery, Reviews, About, Contact, FAQ, Privacy, Terms),
   - sets **Home** as the static front page,
   - registers the Primary & Footer menu locations.
4. Optional: **Appearance → Menus** → build a menu (Home / Menu / Deals / Gallery / Reviews / About / Contact) and assign it to **Primary Menu**.
5. **Settings → Permalinks** → pick **Post name** so the pretty URLs (`/menu/`, `/deals/`, …) work.

Business info (phone, WhatsApp, address, hours, social) all lives in
`inc/data.php` inside `oven_business()` — edit once and it updates the entire theme.

## Note about Tailwind

For fastest installation the theme uses the Tailwind Play CDN so every utility class in the
templates resolves at runtime. If you want a fully offline build, replace the CDN script in
`functions.php` → `oven_inject_tailwind_cdn()` with a compiled `assets/css/tailwind.css`
produced by running the Tailwind CLI against the `wp-master-theme/` directory.
