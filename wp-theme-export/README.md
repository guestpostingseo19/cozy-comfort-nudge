# The Oven Pizza Chichawatni — WordPress Theme

Classic PHP/CSS WordPress theme replicating the "Editorial Craft" design of the React site.

## Files

- `style.css` — theme header + full stylesheet (tokens, hero, features, cards, footer, animations)
- `functions.php` — enqueues styles/fonts, registers menus, exposes `theovenpizza_business()` helpers
- `header.php` — `<head>`, announcement bar, sticky header, nav, primary CTA
- `footer.php` — footer, floating call/WhatsApp buttons, reveal-on-scroll script, `wp_footer()`
- `index.php` — fallback archive/blog template
- `front-page.php` — homepage: hero, marquee, features, best sellers, story strip, CTA band
- `assets/images/*.jpg` — all food/interior photos used by the theme

## Install

1. Zip the `wp-theme-export` folder → `wp-theme-export.zip`.
2. WordPress admin → **Appearance → Themes → Add New → Upload Theme** → choose the zip → **Install** → **Activate**.
3. **Settings → Reading → Your homepage displays →** *A static page* → set a page (e.g. "Home") as the front page. WordPress will automatically render `front-page.php`.
4. **Appearance → Menus** → create a menu and assign it to **Primary Menu** location (Home / Menu / Deals / Gallery / Reviews / About / Contact). Without a menu, the theme falls back to built-in default links.

## Notes

- All asset paths use `get_template_directory_uri()` — safe to rename or move the theme folder.
- Google Fonts (Playfair Display + Inter) are enqueued from `functions.php`.
- Business details (phone, WhatsApp, address, hours) live in `theovenpizza_business()` — edit that one function to update everywhere.
