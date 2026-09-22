<?php
/*
 * Template Name: Home Template
 */

get_header();

$order_url = 'https://los-potrillos-restaurant.cloveronline.com/';
$delivery_url = 'https://www.ubereats.com/store/los-potrillos-restaurant/8f90E8-GRHOnsfKh0Y7SQQ?diningMode=PICKUP';
$directions_url = 'https://maps.google.com/?q=2617+E+Venango+St+Philadelphia+PA+19134';
$google_reviews_url = 'https://www.google.com/maps/place/LOS+POTRILLOS+RESTAURANT/@39.9900503,-75.0937738,17z/data=!4m15!1m8!3m7!1s0x89c6c9d87bf20bf1:0x4d8435515dadc26b!2s2617+E+Venango+St,+Philadelphia,+PA+19134,+EE.+UU.!3b1!8m2!3d39.9900503!4d-75.0937738!16s%2Fg%2F11c164m9wv!3m5!1s0x89c6b7bc71190001:0xa44c7bbd8e214cdb!8m2!3d39.9900374!4d-75.0937434!16s%2Fg%2F11hbv7knck?hl=es-ES';

$dishes = [
  ['cat' => 'Birria',     'name' => 'Birria Tacos',                 'desc' => 'Slow-cooked beef, Oaxacan cheese, consomé for dipping.',       'price' => '$15.00', 'img' => '/wp-content/uploads/2026/05/TacosBirreaHero-scaled.png',            'url' => 'https://los-potrillos-restaurant.cloveronline.com/menu/beef-birria-tacos-3-VQ29EAFQAYXHR'],
  ['cat' => 'Birria',     'name' => 'Birria Quesadilla',            'desc' => 'Hand-pressed quesadilla with birria and melted Oaxacan cheese.', 'price' => '$16.00', 'img' => '/wp-content/uploads/2026/06/QUESi_BIRRIA.jpg',                     'url' => 'https://los-potrillos-restaurant.cloveronline.com/menu/beef-birria-quesadilla-5RS5Q193RGP2M'],
  ['cat' => 'Birria',     'name' => 'Birria Torta',                 'desc' => 'Telera roll, birria, Oaxacan cheese, avocado, chipotle crema.', 'price' => '$15.00', 'img' => '/wp-content/uploads/2026/05/BirriaTorta-scaled.png',                 'url' => 'https://los-potrillos-restaurant.cloveronline.com/menu/birria-torta-DPDE6PM6CAK0T'],
  ['cat' => 'Appetizers', 'name' => 'Large Nachos Potrillo Style',  'desc' => 'Tortilla chips loaded with signature toppings, jalapeños and house-made salsas.', 'price' => '$17.00', 'img' => '/wp-content/uploads/2026/05/LargeNachosPotrilloStyle-scaled.png', 'url' => 'https://los-potrillos-restaurant.cloveronline.com/menu/steak-shrimp-fajitas-EP12PRVRMFTZ0'],
  ['cat' => 'Fajitas',    'name' => 'Steak and Shrimp Fajitas',     'desc' => 'Sizzling steak and shrimp with roasted peppers, onions and warm tortillas.', 'price' => '$18.00', 'img' => '/wp-content/uploads/2026/05/SteakShrimpFajitas-scaled.png',          'url' => 'https://los-potrillos-restaurant.cloveronline.com/menu/steak-shrimp-fajitas-EP12PRVRMFTZ0'],
  ['cat' => 'Steak',      'name' => 'Steak Tacos',                  'desc' => 'Slow-cooked steak, Oaxacan cheese, consomé for dipping.',      'price' => '$15.00', 'img' => '/wp-content/uploads/2026/06/STEAK_TACOS.jpg',                      'url' => 'https://los-potrillos-restaurant.cloveronline.com/menu/chicken-birria-tacos-3-CESTXNRFQY56J'],
];
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap');

/* ═══════════════════════════════════════════════════
   HOMEPAGE — CUSTOM STYLES
   Playfair Display → script-style accents (italic)
   Oswald           → headings, buttons, labels
   Lato             → body copy
═══════════════════════════════════════════════════ */

:root {
  --hp-red: #b71c1c;
  --hp-red-dark: #8f1414;
  --hp-brown: #2a0f08;
  --hp-cream: #f7f1e6;
  --hp-cream-2: #efe6d6;
  --hp-gold: #a9741f;
}

.hp-wrap { max-width: 1500px; margin: 0 auto; padding: 0 20px; }

/* ── BUTTONS ───────────────────────────────────── */
.hp-btn {
  display: inline-flex; align-items: center; justify-content: center; gap: 8px;
  font-family: 'Oswald', sans-serif; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.08em;
  font-size: 0.85rem; padding: 14px 24px; border-radius: 3px;
  text-decoration: none; white-space: nowrap;
  border: 2px solid var(--hp-red); cursor: pointer;
  transition: background 0.2s, color 0.2s, border-color 0.2s, transform 0.15s;
}
.hp-btn:hover { transform: translateY(-2px); }
.hp-btn-primary { background: var(--hp-red); color: #fff; }
.hp-btn-primary:hover { background: var(--hp-red-dark); border-color: var(--hp-red-dark); }
.hp-btn-outline { background: transparent; color: var(--hp-red); }
.hp-btn-outline:hover { background: var(--hp-red); color: #fff; }
.hp-btn-sm { font-size: 0.72rem; padding: 10px 16px; }

.hp-script { font-family: 'Playfair Display', serif; font-style: italic; font-weight: 700; }

/* ── 1. HERO ───────────────────────────────────── */
.hp-hero {
  position: relative; background: var(--hp-cream);
  display: grid; grid-template-columns: 1fr 1.15fr;
  min-height: max(560px, calc(100vh - 230px)); min-height: max(560px, calc(100svh - 230px)); overflow: hidden;
}
.hp-hero-left {
  position: relative; z-index: 2;
  display: flex; flex-direction: column; justify-content: center;
  padding: 64px 24px 128px max(24px, calc(50vw - 730px));
}
.hp-hero-eyebrow {
  font-family: 'Oswald', sans-serif; text-transform: uppercase;
  letter-spacing: 0.3em; font-size: 0.8rem; font-weight: 600;
  color: var(--hp-brown); margin: 0 0 22px 0;
}
.hp-hero h1 {
  font-family: 'Oswald', sans-serif; font-weight: 700; text-transform: uppercase;
  font-size: clamp(2.8rem, 6.4vw, 5.6rem); line-height: 0.98; letter-spacing: -0.01em;
  color: var(--hp-brown); margin: 0 0 20px 0;
}
.hp-hero h1 span { color: var(--hp-red); display: block; }
.hp-hero-sub {
  font-family: 'Lato', sans-serif; font-size: 1.3rem; line-height: 1.6;
  color: #3a2a24; margin: 0 0 28px 0; max-width: 520px;
}
.hp-hero-rating {
  display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
  font-family: 'Lato', sans-serif; font-size: 0.95rem; font-weight: 700; color: #3a2a24;
}
.hp-hero-stars { color: #d9a441; font-size: 1.2rem; letter-spacing: 0.1em; }
.hp-hero-media { position: relative; min-height: 100%; background: var(--hp-brown); }
.hp-hero-media video {
  position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
}
.hp-hero-media::before {
  content: ''; position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background: linear-gradient(to right, var(--hp-cream) 0%, rgba(247,241,230,0) 28%);
}
.hp-hero-tag {
  position: absolute; right: 32px; bottom: 120px; z-index: 2; text-align: right;
  font-family: 'Playfair Display', serif; font-style: italic; font-weight: 700;
  font-size: clamp(1.6rem, 3vw, 2.4rem); line-height: 1.05; color: #fff;
  text-shadow: 0 2px 14px rgba(0,0,0,0.6);
}

/* ── AUTO ZOOM IN / OUT ON PHOTOS (Ken Burns) ──── */
@keyframes hp-kb {
  from { transform: scale(1) translate(0, 0); }
  to   { transform: scale(1.4) translate(-5%, -3%); }
}
.hp-dish:nth-child(even) .hp-dish-img img { animation-delay: -4s; animation-direction: alternate-reverse; }
.hp-cat-main, .hp-duo-occasion, .hp-duo-story { isolation: isolate; overflow: hidden; }
.hp-cat-main::before, .hp-duo-occasion::before, .hp-duo-story::before {
  content: ''; position: absolute; inset: 0; z-index: -2;
  background: var(--kb-img) var(--kb-pos, center) / cover no-repeat;
  animation: hp-kb 11s ease-in-out infinite alternate;
}
.hp-cat-main::after, .hp-duo-occasion::after, .hp-duo-story::after {
  content: ''; position: absolute; inset: 0; z-index: -1; pointer-events: none;
  background: var(--kb-grad);
}
.hp-cat-main { --kb-pos: right center; --kb-img: url('/wp-content/uploads/2026/05/CateringService-scaled.jpg');
  --kb-grad: linear-gradient(to right, var(--hp-cream-2) 0%, var(--hp-cream-2) 42%, rgba(239,230,214,0) 75%); background: var(--hp-cream-2); }
.hp-duo-occasion { --kb-img: url('/wp-content/uploads/2026/05/CateringServiceHero-scaled.jpg');
  --kb-grad: linear-gradient(to right, rgba(42,15,8,0.97) 0%, rgba(42,15,8,0.88) 45%, rgba(42,15,8,0.35) 100%); background: var(--hp-brown); }
.hp-duo-story { --kb-img: url('/wp-content/uploads/2026/05/TacosBirreaHero-scaled.png');
  --kb-grad: linear-gradient(to right, rgba(247,241,230,0.97) 0%, rgba(247,241,230,0.85) 45%, rgba(247,241,230,0) 100%); background: var(--hp-cream); }
@media (prefers-reduced-motion: reduce) {
  .hp-dish-img img, .hp-cat-main::before, .hp-duo-occasion::before, .hp-duo-story::before { animation: none; }
}

/* ── 2. SERVICE CARDS ──────────────────────────── */
.hp-services { position: relative; z-index: 3; margin-top: -64px; padding-bottom: 36px; }
.hp-services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
.hp-service {
  display: flex; align-items: center; gap: 18px;
  padding: 22px 24px; border-radius: 6px; color: #fff; text-decoration: none;
  box-shadow: 0 10px 28px rgba(0,0,0,0.22);
  transition: transform 0.2s, box-shadow 0.2s;
}
.hp-service:hover { transform: translateY(-4px); box-shadow: 0 16px 34px rgba(0,0,0,0.28); }
.hp-service-delivery { background: linear-gradient(135deg, #c62828, #8f1414); }
.hp-service-pickup   { background: linear-gradient(135deg, #2f1a12, #170a05); }
.hp-service-catering { background: linear-gradient(135deg, #b98a33, #8a5a14); }
.hp-service svg.hp-service-icon { width: 46px; height: 46px; flex-shrink: 0; }
.hp-service-text { flex: 1; min-width: 0; }
.hp-service-title {
  font-family: 'Oswald', sans-serif; font-weight: 700; text-transform: uppercase;
  letter-spacing: 0.06em; font-size: 1.15rem; margin: 0 0 2px 0;
}
.hp-service-desc { font-family: 'Lato', sans-serif; font-size: 0.85rem; line-height: 1.4; margin: 0; opacity: 0.9; }
.hp-service-arrow {
  width: 34px; height: 34px; border-radius: 50%; background: #fff; color: #1a1a1a;
  display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}

/* ── 3. PLATILLOS CAROUSEL ─────────────────────── */
.hp-platillos { background: var(--hp-cream); padding: 24px 0 48px; }
.hp-section-head { display: flex; align-items: center; gap: 20px; margin-bottom: 24px; }
.hp-section-title {
  font-family: 'Oswald', sans-serif; font-weight: 700; text-transform: uppercase;
  font-size: clamp(1.7rem, 3vw, 2.2rem); color: var(--hp-brown); margin: 0; letter-spacing: 0.01em;
}
.hp-brush { width: 130px; height: 6px; border-radius: 4px; background: var(--hp-gold); opacity: 0.8; flex-shrink: 0; }
.hp-section-script { margin-left: auto; font-size: clamp(1.1rem, 2.2vw, 1.6rem); color: var(--hp-red-dark); }
.hp-marquee { overflow: hidden; padding: 14px 0 52px; }
.hp-track { display: flex; width: max-content; animation: hp-scroll 45s linear infinite; }
.hp-marquee:hover .hp-track { animation-play-state: paused; }
@keyframes hp-scroll { from { transform: translateX(0); } to { transform: translateX(-50%); } }
@media (prefers-reduced-motion: reduce) {
  .hp-marquee { overflow-x: auto; }
  .hp-track { animation: none; }
}
.hp-marquee { perspective: 1200px; }
.hp-dish {
  flex: 0 0 310px; margin-right: 20px;
  background: #fff; border: 1px solid #e8dfcf; border-radius: 8px; overflow: hidden;
  display: flex; flex-direction: column;
  box-shadow: 0 2px 4px rgba(42,15,8,0.08), 0 10px 22px rgba(42,15,8,0.14), 0 22px 40px rgba(42,15,8,0.10);
  transition: transform 0.35s ease, box-shadow 0.35s ease;
}
.hp-dish:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: 0 4px 8px rgba(42,15,8,0.10), 0 18px 34px rgba(42,15,8,0.20), 0 34px 60px rgba(42,15,8,0.16);
}
.hp-dish-img { position: relative; height: 210px; overflow: hidden; background: var(--hp-brown); }
.hp-dish-img img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  animation: hp-kb 8s ease-in-out infinite alternate;
}
/* vignette + inner shadow give the photo a recessed, 3D feel */
.hp-dish-img::after {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background:
    radial-gradient(ellipse at 50% 45%, rgba(0,0,0,0) 55%, rgba(0,0,0,0.32) 100%),
    linear-gradient(to top, rgba(0,0,0,0.28) 0%, rgba(0,0,0,0) 35%);
  box-shadow: inset 0 -10px 18px -8px rgba(0,0,0,0.35), inset 0 6px 12px -6px rgba(255,255,255,0.25);
}
.hp-dish-body { padding: 18px 20px 20px; display: flex; flex-direction: column; flex: 1; }
.hp-dish-cat {
  font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 0.12em;
  font-size: 0.65rem; font-weight: 600; color: var(--hp-red); margin: 0 0 6px 0;
}
.hp-dish-name { font-family: 'Oswald', sans-serif; font-weight: 700; font-size: 1.25rem; line-height: 1.2; color: var(--hp-brown); margin: 0 0 8px 0; }
.hp-dish-desc { font-family: 'Lato', sans-serif; font-size: 0.85rem; line-height: 1.55; color: #6b5f57; margin: 0 0 18px 0; flex: 1; }
.hp-dish-foot { display: flex; align-items: center; justify-content: space-between; gap: 8px; }
.hp-dish-price { font-family: 'Oswald', sans-serif; font-weight: 700; font-size: 1.2rem; color: var(--hp-brown); }

/* ── 4. REVIEWS ────────────────────────────────── */
.hp-reviews { background: var(--hp-cream); padding: 24px 0 56px; border-top: 1px solid #e6dcc9; }
.hp-reviews-cta { text-align: center; margin-top: 28px; }

/* ── 5. CATERING BANNER ────────────────────────── */
.hp-cat-banner { display: grid; grid-template-columns: 1fr 1fr; background: var(--hp-cream-2); overflow: hidden; }
.hp-cat-main {
  position: relative; min-height: 300px;
  display: flex; flex-direction: column; justify-content: center;
  padding: 44px 24px 44px max(24px, calc(50vw - 730px));
}
.hp-cat-main > * { max-width: 470px; }
.hp-cat-main h2 {
  font-family: 'Oswald', sans-serif; font-weight: 700; text-transform: uppercase;
  color: var(--hp-red); font-size: clamp(2rem, 4vw, 3rem); line-height: 1; margin: 0 0 4px 0;
}
.hp-cat-main h3 {
  font-family: 'Oswald', sans-serif; font-weight: 700; text-transform: uppercase;
  color: var(--hp-brown); font-size: clamp(1.2rem, 2.4vw, 1.7rem); line-height: 1.1; margin: 0 0 14px 0;
}
.hp-cat-main p { font-family: 'Lato', sans-serif; font-size: 0.92rem; line-height: 1.6; color: #3a2a24; margin: 0 0 22px 0; }
.hp-cat-side {
  background: linear-gradient(135deg, #d32f2f 0%, #8f1414 50%, #111111 100%); color: #fff; min-height: 300px;
  padding: 44px max(24px, calc(50vw - 730px)) 44px 40px;
  display: flex; flex-direction: column; justify-content: center; gap: 14px;
}
.hp-cat-item { display: flex; align-items: center; gap: 14px; font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.82rem; font-weight: 600; }
.hp-cat-item svg { width: 26px; height: 26px; flex-shrink: 0; }
.hp-cat-side .hp-script { font-size: 1.35rem; line-height: 1.15; margin-top: 8px; text-align: right; opacity: 0.95; }

/* ── 6. OCCASION + STORY ───────────────────────── */
.hp-duo { display: grid; grid-template-columns: 1fr 1fr; min-height: 300px; }
.hp-duo-card { position: relative; display: flex; flex-direction: column; justify-content: center; padding: 44px 40px; overflow: hidden; }
.hp-duo-occasion {
  color: #fff; padding-left: max(24px, calc(50vw - 730px));
}
.hp-duo-story {
  color: var(--hp-brown); padding-right: max(24px, calc(50vw - 730px));
}
.hp-duo h2 {
  font-family: 'Oswald', sans-serif; font-weight: 700; text-transform: uppercase;
  font-size: clamp(1.6rem, 3vw, 2.3rem); line-height: 1.05; margin: 0 0 14px 0;
}
.hp-duo-story h2 span { color: var(--hp-red); display: block; }
.hp-duo-inner { max-width: 420px; position: relative; z-index: 1; }
.hp-check { list-style: none; padding: 0; margin: 0 0 24px 0; display: grid; gap: 9px; }
.hp-check li { display: flex; align-items: center; gap: 10px; font-family: 'Lato', sans-serif; font-size: 0.9rem; }
.hp-check li::before {
  content: '✓'; width: 18px; height: 18px; border-radius: 50%; flex-shrink: 0;
  background: #d9a441; color: var(--hp-brown); font-size: 0.7rem; font-weight: 700;
  display: flex; align-items: center; justify-content: center;
}
.hp-duo-story p { font-family: 'Lato', sans-serif; font-size: 0.95rem; line-height: 1.65; color: #3a2a24; margin: 0 0 22px 0; }
.hp-duo .hp-script { position: absolute; right: 28px; bottom: 22px; font-size: 1.5rem; line-height: 1.1; text-align: right; z-index: 1; }
.hp-duo-occasion .hp-script { color: #fff; opacity: 0.85; }
.hp-duo-story .hp-script { color: #fff; text-shadow: 0 2px 10px rgba(0,0,0,0.6); }

/* ── 7. FIND US + FAQ ──────────────────────────── */
.hp-find { background: var(--hp-cream); padding: 56px 0 64px; }
.hp-find-grid { display: grid; grid-template-columns: 1.5fr 1fr; gap: 48px; align-items: start; }
.hp-find-loc { display: grid; grid-template-columns: 1fr 1.3fr; gap: 24px; align-items: stretch; }
.hp-find h2 {
  font-family: 'Oswald', sans-serif; font-weight: 700; text-transform: uppercase;
  color: var(--hp-brown); font-size: 1.5rem; margin: 0 0 6px 0;
}
.hp-find-sub { font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.7rem; font-weight: 600; color: var(--hp-brown); margin: 0 0 18px 0; }
.hp-find-row { display: flex; gap: 12px; align-items: flex-start; margin-bottom: 16px; font-family: 'Lato', sans-serif; font-size: 0.92rem; line-height: 1.5; color: #3a2a24; }
.hp-find-row svg { width: 20px; height: 20px; color: var(--hp-red); flex-shrink: 0; margin-top: 2px; }
.hp-find-row a { color: inherit; text-decoration: none; }
.hp-map { position: relative; border-radius: 6px; overflow: hidden; border: 1px solid #ddd2bd; min-height: 240px; }
.hp-map iframe { position: absolute; inset: 0; width: 100%; height: 100%; border: 0; }
.hp-map-btn { position: absolute; left: 50%; bottom: 14px; transform: translateX(-50%); z-index: 2; }
.hp-map-btn:hover { transform: translateX(-50%) translateY(-2px); }
.hp-faq details { background: #fff; border-radius: 3px; margin-bottom: 8px; border: 1px solid #ece3d2; }
.hp-faq summary {
  list-style: none; cursor: pointer; display: flex; align-items: center; justify-content: space-between;
  padding: 12px 16px; font-family: 'Lato', sans-serif; font-size: 0.88rem; font-weight: 700;
  color: var(--hp-brown); user-select: none;
}
.hp-faq summary::-webkit-details-marker { display: none; }
.hp-faq summary .faq-icon { transition: transform 0.2s; flex-shrink: 0; margin-left: 12px; width: 14px; height: 14px; }
.hp-faq details[open] summary .faq-icon { transform: rotate(180deg); }
.hp-faq .faq-answer { padding: 0 16px 14px; font-size: 0.85rem; color: #5a4d46; line-height: 1.7; font-family: 'Lato', sans-serif; }

/* ── RESPONSIVE ────────────────────────────────── */
@media (max-width: 960px) {
  .hp-hero { grid-template-columns: 1fr; min-height: auto; }
  .hp-hero-media { order: -1; height: 42vh; min-height: 300px; }
  .hp-hero-media::before { background: linear-gradient(to top, var(--hp-cream) 0%, rgba(247,241,230,0) 30%); }
  .hp-hero-tag { bottom: 40px; right: 20px; }
  .hp-hero-left { padding: 28px 24px 100px; }
  .hp-services-grid { grid-template-columns: 1fr; }
  .hp-services { margin-top: -72px; }
  .hp-section-script, .hp-brush { display: none; }
  .hp-section-head { justify-content: space-between; }
  .hp-cat-banner { grid-template-columns: 1fr; }
  .hp-cat-main { padding: 40px 24px; --kb-pos: center; --kb-grad: linear-gradient(to right, rgba(239,230,214,0.97) 0%, rgba(239,230,214,0.85) 60%, rgba(239,230,214,0.4) 100%); }
  .hp-cat-side .hp-script { text-align: left; }
  .hp-duo { grid-template-columns: 1fr; }
  .hp-duo-card, .hp-duo-occasion, .hp-duo-story { padding: 40px 24px 64px; }
  .hp-find-grid { grid-template-columns: 1fr; gap: 40px; }
}
@media (max-width: 640px) {
  .hp-dish { flex-basis: 260px; }
  .hp-dish-img { height: 180px; }
  .hp-find-loc { grid-template-columns: 1fr; }
  .hp-map { min-height: 260px; }
}
</style>

<!-- ═══════════════════════════════════════════════
  1 — HERO
═══════════════════════════════════════════════ -->
<section class="hp-hero">
  <div class="hp-hero-left">
    <p class="hp-hero-eyebrow">Authentic Puebla-Style Mexican Food</p>
    <h1>Puebla Flavor.<span>Made in Philly.</span></h1>
    <p class="hp-hero-sub">Family recipes, real ingredients, and the flavors that bring people together.</p>
    <div class="hp-hero-rating">
      <span class="hp-hero-stars">★★★★★</span>
      <span>Rated Excellent — 291+ Google Reviews</span>
    </div>
  </div>

  <div class="hp-hero-media">
    <video autoplay muted loop playsinline aria-label="Birria tacos with consomé — Los Potrillos, Philadelphia">
      <source src="/wp-content/uploads/2026/05/RestaurantHero.mp4" type="video/mp4">
    </video>
    <div class="hp-hero-tag">Birria<br>Tacos</div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
  2 — DELIVERY / PICKUP / CATERING
═══════════════════════════════════════════════ -->
<div class="hp-services" style="background:linear-gradient(to bottom, transparent 64px, var(--hp-cream) 64px);">
  <div class="hp-wrap">
    <div class="hp-services-grid">

      <a class="hp-service hp-service-delivery" href="<?php echo esc_url($delivery_url); ?>" target="_blank" rel="noopener">
        <svg class="hp-service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M1 6h13v10H1zM14 9h4l3 3v4h-7z"/><circle cx="6" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
        <div class="hp-service-text">
          <p class="hp-service-title">Delivery</p>
          <p class="hp-service-desc">We bring Los Potrillos to you.</p>
        </div>
        <span class="hp-service-arrow"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></span>
      </a>

      <a class="hp-service hp-service-pickup" href="<?php echo esc_url($order_url); ?>" target="_blank" rel="noopener">
        <svg class="hp-service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 8h14l-1 13H6z"/><path d="M9 8a3 3 0 0 1 6 0"/></svg>
        <div class="hp-service-text">
          <p class="hp-service-title">Pickup</p>
          <p class="hp-service-desc">Order ahead. Pick it up fresh.</p>
        </div>
        <span class="hp-service-arrow"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></span>
      </a>

      <a class="hp-service hp-service-catering" href="/catering">
        <svg class="hp-service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="9" r="2.5"/><path d="M3 20v-1a5 5 0 0 1 5-5h2a5 5 0 0 1 5 5v1M16 14h1a4 4 0 0 1 4 4v2"/></svg>
        <div class="hp-service-text">
          <p class="hp-service-title">Catering</p>
          <p class="hp-service-desc">Puebla flavor for every occasion.</p>
        </div>
        <span class="hp-service-arrow"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></span>
      </a>

    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
  3 — OUR PLATILLOS
═══════════════════════════════════════════════ -->
<section class="hp-platillos">
  <div class="hp-wrap">
    <div class="hp-section-head">
      <h2 class="hp-section-title">Our Platillos</h2>
      <span class="hp-brush"></span>
      <span class="hp-script hp-section-script">Real Food. Real Flavor.</span>
    </div>
  </div>

  <div class="hp-marquee">
    <div class="hp-track">
      <?php foreach ([false, true] as $is_copy) : foreach ($dishes as $dish) : ?>
        <article class="hp-dish"<?php echo $is_copy ? ' aria-hidden="true"' : ''; ?>>
          <div class="hp-dish-img">
            <img src="<?php echo esc_url($dish['img']); ?>" alt="<?php echo $is_copy ? '' : esc_attr($dish['name'] . ' — Los Potrillos'); ?>" loading="lazy">
          </div>
          <div class="hp-dish-body">
            <p class="hp-dish-cat"><?php echo esc_html($dish['cat']); ?></p>
            <h3 class="hp-dish-name"><?php echo esc_html($dish['name']); ?></h3>
            <p class="hp-dish-desc"><?php echo esc_html($dish['desc']); ?></p>
            <div class="hp-dish-foot">
              <span class="hp-dish-price"><?php echo esc_html($dish['price']); ?></span>
              <a href="<?php echo esc_url($dish['url']); ?>" target="_blank" rel="noopener"<?php echo $is_copy ? ' tabindex="-1"' : ''; ?> class="hp-btn hp-btn-primary hp-btn-sm">Order Now</a>
            </div>
          </div>
        </article>
      <?php endforeach; endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
  4 — GOOGLE REVIEWS
═══════════════════════════════════════════════ -->
<section class="hp-reviews">
  <div class="hp-wrap">
    <?php echo do_shortcode('[trustindex no-registration=google]'); ?>

    <div class="hp-reviews-cta">
      <a href="<?php echo esc_url($google_reviews_url); ?>" target="_blank" rel="noopener" class="hp-btn hp-btn-outline">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink:0;">
          <path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"/>
        </svg>
        Read Our Reviews on Google →
      </a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
  5 — CATERING BANNER
═══════════════════════════════════════════════ -->
<section class="hp-cat-banner">
  <div class="hp-cat-main">
    <h2>Catering</h2>
    <h3>That brings people together</h3>
    <p>Family celebrations. Corporate events. Community gatherings. Let Los Potrillos bring the authentic flavors of Puebla to your next event.</p>
    <div><a href="/catering#catering-form" class="hp-btn hp-btn-primary">Get a Catering Quote →</a></div>
  </div>

  <div class="hp-cat-side">
    <div class="hp-cat-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v3M8 7v3M16 7v3M4 21v-7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v7zM4 17c3 2 5-2 8 0s5-2 8 0"/></svg>
      Family Celebrations
    </div>
    <div class="hp-cat-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2M3 13h18"/></svg>
      Corporate Events
    </div>
    <div class="hp-cat-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="9" r="2.5"/><path d="M3 20v-1a5 5 0 0 1 5-5h2a5 5 0 0 1 5 5v1M16 14h1a4 4 0 0 1 4 4v2"/></svg>
      Community Events
    </div>
    <div class="hp-script">Good Food. Brings<br>People Together.</div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
  6 — PERFECT FOR ANY OCCASION + 12 HOURS
═══════════════════════════════════════════════ -->
<section class="hp-duo">
  <div class="hp-duo-card hp-duo-occasion">
    <div class="hp-duo-inner">
      <h2>Perfect for<br>any occasion</h2>
      <ul class="hp-check">
        <li>Customizable menus</li>
        <li>Small &amp; large groups</li>
        <li>Authentic Puebla-style flavors</li>
        <li>Reliable, professional service</li>
      </ul>
      <a href="/catering" class="hp-btn hp-btn-primary">View Catering Packages →</a>
    </div>
    <div class="hp-script">Celebrate<br>with Flavor!</div>
  </div>

  <div class="hp-duo-card hp-duo-story">
    <div class="hp-duo-inner">
      <h2>12 Hours.<span>One Family Recipe.</span></h2>
      <p>Our birria is slow-cooked for 12 hours using our family's traditional recipe, creating deep, rich flavors that you can taste in every bite.</p>
      <a href="/our-story" class="hp-btn hp-btn-primary">Our Story →</a>
    </div>
    <div class="hp-script">Tradition<br>Tastes Better.</div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
  7 — FIND US + FAQ
═══════════════════════════════════════════════ -->
<section class="hp-find">
  <div class="hp-wrap">
    <div class="hp-find-grid">

      <div itemscope itemtype="https://schema.org/Restaurant">
        <meta itemprop="name" content="Los Potrillos Restaurant">
        <meta itemprop="servesCuisine" content="Mexican">

        <div class="hp-find-loc">
          <div>
            <h2>Find Us</h2>
            <p class="hp-find-sub">Visit our restaurant in Philadelphia</p>

            <div class="hp-find-row" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a7 7 0 0 0-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 0 0-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg>
              <a href="<?php echo esc_url($directions_url); ?>" target="_blank" rel="noopener">
                <span itemprop="streetAddress">2617 E Venango St</span><br>
                <span itemprop="addressLocality">Philadelphia</span>,
                <span itemprop="addressRegion">PA</span>
                <span itemprop="postalCode">19134</span>
              </a>
            </div>

            <div class="hp-find-row">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
              <a href="tel:+12673232669" itemprop="telephone">(267) 323-2669</a>
            </div>

            <div class="hp-find-row">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
              <span itemprop="openingHours" content="Mo-Sa 10:00-21:00">Mon – Sat: 10am – 9pm<br>Sunday: Closed</span>
            </div>
          </div>

          <div class="hp-map">
            <iframe
              src="https://maps.google.com/maps?q=2617+E+Venango+St+Philadelphia+PA+19134&output=embed"
              allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              title="Los Potrillos Restaurant — 2617 E Venango St, Philadelphia PA"></iframe>
            <a href="<?php echo esc_url($directions_url); ?>" target="_blank" rel="noopener" class="hp-btn hp-btn-primary hp-btn-sm hp-map-btn">Get Directions →</a>
          </div>
        </div>
      </div>

      <div>
        <h2>Frequently Asked Questions</h2>

        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "FAQPage",
          "mainEntity": [
            { "@type": "Question", "name": "What makes your birria tacos different?", "acceptedAnswer": { "@type": "Answer", "text": "Our birria is slow-cooked for 12 hours using a family recipe from Puebla, Mexico — passed down through generations. The tortillas are dipped in the consomé and crisped on the plancha. Nothing is pre-packaged. Nothing is rushed." } },
            { "@type": "Question", "name": "Do you offer pickup and delivery?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. Order pickup directly through our online ordering page for the freshest experience and no third-party fees. Delivery is also available through Uber Eats, DoorDash, and GrubHub." } },
            { "@type": "Question", "name": "Do you cater quinceañeras, weddings, and large family events?", "acceptedAnswer": { "@type": "Answer", "text": "Absolutely. Catering is one of our specialties. We build custom menus around your event size, budget, and guests' preferences. Request a free quote — we respond within 24 hours." } },
            { "@type": "Question", "name": "Do you have vegetarian options?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. Our menu includes vegetarian-friendly tacos, quesadillas, and sides. Let us know your preferences when you order or request a catering quote." } },
            { "@type": "Question", "name": "Where exactly are you located?", "acceptedAnswer": { "@type": "Answer", "text": "2617 E Venango Street, Philadelphia, PA 19134 — in the heart of Port Richmond. Easy parking on the street, just minutes from I-95." } }
          ]
        }
        </script>

        <div class="hp-faq">
          <?php
          $faqs = [
            ['q' => 'What makes your birria tacos different?',                       'a' => 'Our birria is slow-cooked for 12 hours using a family recipe from Puebla, Mexico — passed down through generations. The tortillas are dipped in the consomé and crisped on the plancha. Nothing is pre-packaged. Nothing is rushed.'],
            ['q' => 'Do you offer pickup and delivery?',                             'a' => 'Yes. Order pickup directly through our online ordering page for the freshest experience and no third-party fees. Delivery is also available through Uber Eats, DoorDash, and GrubHub.'],
            ['q' => 'Do you cater quinceañeras, weddings, and large family events?', 'a' => 'Absolutely. Catering is one of our specialties. We build custom menus around your event size, budget, and guests\' preferences. Request a free quote — we respond within 24 hours.'],
            ['q' => 'Do you have vegetarian options?',                               'a' => 'Yes. Our menu includes vegetarian-friendly tacos, quesadillas, and sides. Let us know your preferences when you order or request a catering quote.'],
            ['q' => 'Where exactly are you located?',                                'a' => '2617 E Venango Street, Philadelphia, PA 19134 — in the heart of Port Richmond. Easy parking on the street, just minutes from I-95.'],
          ];
          foreach ($faqs as $faq) : ?>
            <details>
              <summary>
                <?php echo esc_html($faq['q']); ?>
                <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
              </summary>
              <div class="faq-answer"><?php echo esc_html($faq['a']); ?></div>
            </details>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
