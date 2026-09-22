<?php
/*
 * Template Name: Catering Template
 */

get_header();

/*
 * Catering menu — edit here.
 * Each item: name, price, optional serves / detail lines.
 * Prices and items come from the owner's catering menu PDF — confirm before changing.
 */
$m_a = 'Chicken, Deep Fried Pork, Chorizo, Ground Beef, Lamb';
$m_b = 'Season Pork, Steak, Beef Tongue, Tripe, Chicken Breast, Chorizo & Chicken, Chorizo & Egg, Shrimp & Steak, Shrimp, Salmon, or Fish (Pollock)';
$m_c = 'Season Pork, Grilled Steak, Chorizo & Steak, Cow Tongue, Beef Tripe, Chicken Breast, Chorizo & Chicken, Chorizo & Eggs, Shrimp & Steak, Shrimp, Salmon, Fish (Pollock)';
$t_plain   = 'Includes onion, cilantro, lime, red salsa, and green salsa.';
$t_supreme = 'Includes cheese, lettuce, avocado, pico de gallo, sour cream, lime, red salsa, and green salsa.';
$plat      = 'Comes with yellow rice, beans, lettuce, pico de gallo, and tortillas.';

$menu = [
  [
    'title' => 'Tacos',
    'sub'   => 'Includes onion, cilantro, lime, red salsa and green salsa.',
    'icon'  => 'taco',
    'items' => [
      ['name' => '30 Tacos',         'serves' => 'Serves 10 people', 'price' => '$75',  'detail' => [$t_plain,   "Meat options: $m_a."]],
      ['name' => '30 Supreme Tacos', 'serves' => 'Serves 10 people', 'price' => '$105', 'detail' => [$t_supreme, "Meat options: $m_a."]],
      ['name' => '30 Tacos',         'serves' => 'Serves 10 people', 'price' => '$105', 'detail' => [$t_plain,   "Meat options: $m_b."]],
      ['name' => '30 Supreme Tacos', 'serves' => 'Serves 10 people', 'price' => '$135', 'detail' => [$t_supreme, "Meat options: $m_c."]],
      ['name' => '60 Tacos',         'serves' => 'Serves 20 people', 'price' => '$150', 'detail' => [$t_plain,   "Meat options: $m_a."]],
      ['name' => '60 Supreme Tacos', 'serves' => 'Serves 20 people', 'price' => '$210', 'detail' => [$t_supreme, "Meat options: $m_a."]],
      ['name' => '60 Tacos',         'serves' => 'Serves 20 people', 'price' => '$210', 'detail' => [$t_plain,   "Meat options: $m_c."]],
      ['name' => '60 Supreme Tacos', 'serves' => 'Serves 20 people', 'price' => '$270', 'detail' => [$t_supreme, "Meat options: $m_c."]],
    ],
  ],
  [
    'title' => 'Platters by the Dozen',
    'sub'   => 'Tacos, rice platters, fajitas and more.',
    'icon'  => 'cloche',
    'items' => [
      ['name' => '12 Orders of Fried Mojarras',              'price' => '$180', 'detail' => [$plat]],
      ['name' => '12 Orders of Chicken Breast Platters',     'price' => '$180', 'detail' => [$plat]],
      ['name' => '12 Orders of Chile Relleno Platters',      'price' => '$156', 'detail' => [$plat]],
      ['name' => '12 Orders Chicken & Rice Platters',        'price' => '$144', 'detail' => [$plat]],
      ['name' => '12 Orders Chicken Enchilada (Red or green) Platters', 'price' => '$156', 'detail' => [$plat]],
      ['name' => '12 Orders Mole Enchilada Platters',        'price' => '$156', 'detail' => [$plat]],
      ['name' => '12 Fajita Platters',                       'price' => '$180', 'detail' => ['Comes with onions, red peppers, yellow rice, beans, lettuce, pico de gallo, sour cream, tortillas.', 'Meat options: Chicken, Steak, Shrimp, Steak & Shrimp.']],
      ['name' => '12 Orders Burritos',                       'price' => '$120', 'detail' => ['Meat options: Chicken, Carnitas, Chorizo, Lamb, or Ground Beef.']],
      ['name' => '12 Orders Burritos',                       'price' => '$144', 'detail' => ['Meat options: Steak, Beef Tongue, Tripe, Chicken Breast, Chorizo & Chicken, Chorizo & Egg, Shrimp & Steak, Shrimp, Salmon, or Fish (Pollock).']],
      ['name' => '12 Orders Flauta (3 pcs each)',            'price' => '$72',  'detail' => ['Comes with salsa verde, lettuce, sour cream, pico de gallo, cotija cheese, salsa roja & verde on the side.']],
      ['name' => '12 Hard Shell Taco Orders (3 pcs each)',   'price' => '$120', 'detail' => ['Comes with cheese, lettuce, pico de gallo, sour cream, avocado, salsa roja & verde on the side.', "Meat options: $m_a, Season Pork, Steak, Beef Tongue, Tripe, Chicken Breast, Chorizo & Chicken, Chorizo & Egg, Shrimp & Steak, Shrimp, Salmon, or Fish (Pollock)."]],
      ['name' => '12 Elotes',                                'price' => '$48'],
      ['name' => '12 Birria Quesadillas',                    'price' => '$156', 'detail' => ['Comes with onion, cilantro and cheese, sour cream, salsa roja & verde on the side.', 'Meat options: Beef, Chicken, Pork. Includes 32 oz birria consommé.']],
    ],
  ],
  [
    'title' => 'Birria',
    'sub'   => 'Tacos, quesadillas and consomé.',
    'icon'  => 'bowl',
    'items' => [
      ['name' => '12 Orders (3 pcs each)', 'price' => '$156', 'detail' => ['Includes 32 oz birria consommé.']],
      ['name' => '24 Orders (3 pcs each)', 'price' => '$312', 'detail' => ['Includes 64 oz birria consommé.']],
    ],
  ],
  [
    'title' => 'Quesadillas',
    'sub'   => 'Traditional and premium meat options.',
    'icon'  => 'quesadilla',
    'note'  => 'Comes with lettuce, sour cream, pico de gallo and cheese, salsa roja & verde on the side.',
    'items' => [
      ['name' => '12 Orders', 'price' => '$108', 'detail' => ['Meat options: Cheese, Chicken, Deep Fried Pork, Chorizo, Ground Beef, Lamb.']],
      ['name' => '12 Orders', 'price' => '$132', 'detail' => ["Meat options: $m_c."]],
    ],
  ],
  [
    'title' => 'Empanadas / Tamales',
    'sub'   => 'Beef, chicken, shrimp, guava, pork and more.',
    'icon'  => 'empanada',
    'items' => [
      ['name' => '12 Empanadas', 'price' => '$36', 'detail' => ['Options: Beef, Chicken, Shrimp, Guava.']],
      ['name' => '24 Empanadas', 'price' => '$72', 'detail' => ['Options: Beef, Chicken, Shrimp, Guava.']],
      ['name' => '12 Tamales',   'price' => '$36', 'detail' => ['Options: Pork, Chicken, Rajas (Roasted peppers & onions).']],
      ['name' => '24 Tamales',   'price' => '$72', 'detail' => ['Options: Pork, Chicken, Rajas (Roasted peppers & onions).']],
    ],
  ],
  [
    'title' => 'Nachos',
    'sub'   => 'Half trays and full trays.',
    'icon'  => 'nachos',
    'note'  => 'Comes with meat, cheese wiz sauce, pico de gallo, sour cream, monterrey cheese, salsa roja & verde on the side.',
    'items' => [
      ['name' => 'Half Tray', 'price' => '$30', 'detail' => ["Meat options: $m_a."]],
      ['name' => 'Half Tray', 'price' => '$45', 'detail' => ['Meat options: Steak, Beef Tongue, Tripe, Chicken Breast, Chorizo & Chicken, Chorizo & Egg, Shrimp & Steak, Shrimp, Salmon, or Fish (Pollock).']],
      ['name' => 'Full Tray', 'price' => '$45', 'detail' => ["Meat options: $m_a."]],
      ['name' => 'Full Tray', 'price' => '$55', 'detail' => ["Meat options: $m_c."]],
      ['name' => 'Half Tray Chips & Salsa', 'price' => '$15', 'detail' => ['No meat selection.']],
    ],
  ],
  [
    'title' => 'Sides & Extras',
    'sub'   => 'Rice, beans, guacamole, chips and salsas.',
    'icon'  => 'sides',
    'items' => [
      ['name' => '32 oz Fresh Sour Cream',          'price' => '$15'],
      ['name' => '32 oz Homemade Green Salsa',      'price' => '$12'],
      ['name' => '32 oz Homemade Red Salsa',        'price' => '$12'],
      ['name' => '32 oz Fresh Pico de Gallo',       'price' => '$12'],
      ['name' => 'Guacamole with Chips - Half Tray', 'price' => '$45'],
      ['name' => 'Guacamole with Chips - Full Tray', 'price' => '$90'],
      ['name' => 'Yellow Rice - Half Tray',         'price' => '$25'],
      ['name' => 'Yellow Rice - Full Tray',         'price' => '$45'],
      ['name' => 'Beans - Half Tray',               'price' => '$20'],
      ['name' => 'Beans - Full Tray',               'price' => '$40'],
    ],
  ],
  [
    'title' => 'Desserts & Drinks',
    'sub'   => 'Churros, aguas frescas, Mexican cokes and more.',
    'icon'  => 'drink',
    'items' => [
      ['name' => '12 Orders of Churros (3 pcs each)',                'price' => '$72'],
      ['name' => '1 Gallon of Horchata, Passion Fruit, or Tamarind', 'price' => '$20'],
      ['name' => '12 Jarritos',                                      'price' => '$36'],
      ['name' => '12 Mexican Cokes',                                 'price' => '$48'],
      ['name' => '12 Canned Sodas',                                  'price' => '$18'],
    ],
  ],
];

$icons = [
  'taco'       => '<path d="M3 18a9 9 0 0 1 18 0z"/><path d="M7 15l1.5-3M11.5 15l1.5-4M16 15l1-2.5"/>',
  'cloche'     => '<path d="M3 18h18M5 18a7 7 0 0 1 14 0M12 8.5V6.5M10 6.5h4"/>',
  'bowl'       => '<path d="M3 12h18a9 7 0 0 1-18 0zM9 4c-1.2 1.2 1.2 2.4 0 3.6M13 4c-1.2 1.2 1.2 2.4 0 3.6"/>',
  'quesadilla' => '<path d="M3 17a9 9 0 0 1 18 0zM3 17h18M8 13l1.5 4M12.5 11.5l.5 5.5"/>',
  'empanada'   => '<path d="M3 17c0-5.5 4-10 9-10s9 4.5 9 10z"/><path d="M5.5 17v2M9 17v2M12.5 17v2M16 17v2M19 17v2"/>',
  'nachos'     => '<path d="M3 19l5-10 5 10zM11 19l5-10 5 10z"/>',
  'sides'      => '<path d="M3 11h18a9 7 0 0 1-18 0zM8 8c1-2.5 3-2.5 4 0 1-2.5 3-2.5 4 0"/>',
  'drink'      => '<path d="M7 8h10l-1.2 12H8.2zM12 8V3.5L15.5 2"/>',
];

$events = [
  ['label' => 'Family',    'title' => 'Family Celebrations', 'copy' => 'Quinceañeras · Weddings · Birthdays · Baptisms · Anniversaries',        'img' => '/wp-content/uploads/2026/05/FamilyCelebrationsResPotrillos-scaled.jpg', 'alt' => 'Family celebrations catering — quinceañeras, weddings, birthdays'],
  ['label' => 'Corporate', 'title' => 'Corporate Events',    'copy' => 'Office Lunches · Team Gatherings · Holiday Parties · Conferences',         'img' => '/wp-content/uploads/2026/05/CorporateEventsResPotrillos-scaled.jpg',    'alt' => 'Corporate catering — office lunches, team gatherings, holiday parties'],
  ['label' => 'Community', 'title' => 'Community Events',    'copy' => 'Church Gatherings · School Functions · Block Parties · Festivals',          'img' => '/wp-content/uploads/2026/05/ComunityEventsResPotrillos-scaled.jpg',     'alt' => 'Community events catering — church gatherings, school functions, block parties'],
];

$faqs = [
  ['q' => 'How far in advance do I need to place my catering order?',
   'a' => 'Catering orders must be placed at least 24 hours in advance. We need that time to prepare your order properly in our kitchen. Requests submitted less than 24 hours before the requested event or pickup time cannot be accommodated. For large events, we recommend contacting us even earlier.'],
  ['q' => 'Do you have a minimum guest count?',
   'a' => 'Our catering starts at 20 guests. For smaller gatherings, you are welcome to order pickup through our online store.'],
  ['q' => 'Do you offer delivery for catering?',
   'a' => 'Delivery may be available depending on the event location, date and order. Our team will confirm delivery options and any applicable fee when we review your catering request. The $3 / $4 / $6 local delivery fees advertised on the Home page are for qualifying regular phone orders and should not be automatically applied to catering.'],
  ['q' => 'Can you accommodate dietary restrictions?',
   'a' => 'We offer vegetarian, gluten-aware, and dairy-free options. Let us know when you request your quote and we will build your menu accordingly.'],
  ['q' => 'What is included in the catering service?',
   'a' => 'Every catering package includes food, serving equipment, and setup at your event location. Staffing and additional equipment are available on request - ask us for details.'],
  ['q' => 'How do I pay, and is a deposit required?',
   'a' => 'We require a 30% deposit to confirm your booking, with the balance due on the day of the event. We accept cash, Zelle, and major credit cards.'],
];
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap');

:root {
  --ct-red: #b71c1c;
  --ct-red-dark: #8f1414;
  --ct-brown: #2a0f08;
  --ct-cream: #f7f1e6;
  --ct-cream-2: #efe6d6;
  --ct-gold: #a9741f;
}

.ct-wrap { max-width: 1400px; margin: 0 auto; padding: 0 24px; }
.ct-eyebrow {
  font-family: 'Oswald', sans-serif; text-transform: uppercase;
  letter-spacing: 0.3em; font-size: 0.75rem; font-weight: 600;
  color: var(--ct-red); margin: 0 0 14px 0;
}
.ct-h2 {
  font-family: 'Playfair Display', serif; font-weight: 800; color: var(--ct-brown);
  font-size: clamp(2rem, 3.6vw, 3rem); line-height: 1.1; margin: 0 0 12px 0; letter-spacing: -0.01em;
}
.ct-script { font-family: 'Playfair Display', serif; font-style: italic; font-weight: 700; }

/* ── HERO ───────────────────────────────────────── */
.ct-hero {
  position: relative; background: var(--ct-cream); overflow: hidden;
  display: grid; grid-template-columns: 1.05fr 1fr; min-height: 380px;
}
.ct-hero-left {
  position: relative; z-index: 2;
  display: flex; flex-direction: column; justify-content: center;
  padding: 44px 24px 44px max(24px, calc(50vw - 700px));
}
.ct-hero h1 {
  font-family: 'Playfair Display', serif; font-weight: 800; color: var(--ct-brown);
  font-size: clamp(2.2rem, 4.4vw, 3.6rem); line-height: 1.05; margin: 0 0 16px 0; letter-spacing: -0.01em;
}
.ct-hero-sub { font-family: 'Lato', sans-serif; font-size: 1.05rem; line-height: 1.6; color: #3a2a24; margin: 0 0 24px 0; max-width: 520px; }
.ct-hero-ctas { display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 14px; }
.ct-btn {
  display: inline-flex; align-items: center; justify-content: center; gap: 8px;
  font-family: 'Oswald', sans-serif; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em;
  font-size: 0.85rem; padding: 14px 24px; border-radius: 3px; text-decoration: none; white-space: nowrap;
  border: 2px solid var(--ct-red); transition: background 0.2s, color 0.2s, transform 0.15s;
}
.ct-btn:hover { transform: translateY(-2px); }
.ct-btn-primary { background: var(--ct-red); color: #fff; }
.ct-btn-primary:hover { background: var(--ct-red-dark); border-color: var(--ct-red-dark); }
.ct-btn-outline { background: transparent; color: var(--ct-red); }
.ct-btn-outline:hover { background: var(--ct-red); color: #fff; }
.ct-hero-note { font-family: 'Lato', sans-serif; font-size: 0.88rem; font-weight: 700; color: var(--ct-red-dark); margin: 0; }

/* ── EVENTS WE CATER ────────────────────────────── */
.ct-events { background: #fff; padding: 64px 0 40px; }
.ct-events-head { text-align: center; margin-bottom: 40px; }
.ct-events-head .ct-eyebrow { display: flex; justify-content: center; }
.ct-events-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.ct-event-card { position: relative; height: 380px; overflow: hidden; border-radius: 4px; }
.ct-event-card img { width: 100%; height: 100%; object-fit: cover; display: block; }
.ct-event-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.82) 0%, rgba(0,0,0,0.15) 55%, transparent 100%); }
.ct-event-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 28px; }
.ct-event-label { font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 0.14em; font-size: 0.7rem; font-weight: 600; color: rgba(232,192,122,0.95); margin: 0 0 6px 0; }
.ct-event-title { font-family: 'Playfair Display', serif; font-size: 1.55rem; font-weight: 800; color: #fff; margin: 0 0 8px 0; line-height: 1.15; }
.ct-event-copy { font-family: 'Lato', sans-serif; font-size: 0.82rem; color: rgba(255,255,255,0.8); margin: 0; line-height: 1.6; }
.ct-notice {
  margin-top: 32px; padding: 18px 24px; background: #fbeeea; border-left: 4px solid var(--ct-red); border-radius: 3px;
  font-family: 'Lato', sans-serif; font-size: 0.92rem; line-height: 1.6; color: #3a2a24;
}
.ct-notice strong { font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 0.06em; color: var(--ct-red); margin-right: 8px; font-size: 0.95rem; }

.ct-hero-media { position: relative; overflow: hidden; background: var(--ct-brown); }
.ct-hero-media img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; display: block; }
.ct-hero-media::before {
  content: ''; position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background: linear-gradient(to right, var(--ct-cream) 0%, rgba(247,241,230,0) 30%);
}
.ct-hero-tag {
  position: absolute; z-index: 2; top: 36px; right: 40px; text-align: right;
  font-size: clamp(1.3rem, 2.4vw, 2rem); line-height: 1.1; color: #fff;
  text-shadow: 0 2px 14px rgba(0,0,0,0.6);
}
.ct-hero-tag::after { content: ''; display: block; width: 70%; height: 4px; border-radius: 4px; background: #d9a441; margin: 8px 0 0 auto; }

/* ── MENU + FORM ────────────────────────────────── */
.ct-main { background: #faf6ee; padding: 56px 0 64px; }
.ct-main-grid { display: grid; grid-template-columns: 1.35fr 1fr; gap: 40px; align-items: start; }
.ct-menu-sub { font-family: 'Lato', sans-serif; font-size: 1.02rem; line-height: 1.6; color: #3a2a24; margin: 0 0 22px 0; max-width: 520px; }

.ct-acc details { background: #fff; border: 1px solid #e6dcc9; border-radius: 4px; margin-bottom: 10px; overflow: hidden; }
.ct-acc summary {
  list-style: none; cursor: pointer; display: flex; align-items: center; gap: 16px;
  padding: 14px 20px; user-select: none; color: var(--ct-brown);
}
.ct-acc summary::-webkit-details-marker { display: none; }
.ct-acc-icon { width: 44px; height: 44px; color: var(--ct-red); flex-shrink: 0; }
.ct-acc-text { flex: 1; min-width: 0; }
.ct-acc-title { display: block; font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 0.05em; font-size: 1.1rem; font-weight: 600; margin: 0; }
.ct-acc-sub { display: block; font-family: 'Lato', sans-serif; font-size: 0.85rem; margin: 2px 0 0 0; color: #5a4d46; }
.ct-acc-note { font-family: 'Lato', sans-serif; font-size: 0.88rem; line-height: 1.55; color: #5a4d46; background: #faf6ee; border-left: 3px solid var(--ct-gold); padding: 10px 14px; margin: 14px 0 4px; }
.ct-acc-chev { width: 20px; height: 20px; flex-shrink: 0; transition: transform 0.25s; }
.ct-acc details[open] > summary { background: var(--ct-red); color: #fff; }
.ct-acc details[open] .ct-acc-icon, .ct-acc details[open] .ct-acc-sub { color: #fff; }
.ct-acc details[open] .ct-acc-chev { transform: rotate(180deg); }
.ct-acc-body { padding: 4px 24px 8px; }
.ct-item { display: flex; justify-content: space-between; gap: 16px; padding: 16px 0; border-bottom: 1px solid #ece3d2; }
.ct-item:last-child { border-bottom: 0; }
.ct-item-name { font-family: 'Lato', sans-serif; font-size: 1.1rem; font-weight: 700; color: var(--ct-brown); margin: 0; }
.ct-item-serves { font-family: 'Lato', sans-serif; font-size: 0.85rem; color: #5a4d46; margin: 2px 0 0 0; }
.ct-item-detail { font-family: 'Lato', sans-serif; font-size: 0.85rem; line-height: 1.55; color: #5a4d46; margin: 2px 0 0 0; }
.ct-item-price { font-family: 'Oswald', sans-serif; font-weight: 700; font-size: 1.2rem; color: var(--ct-red); white-space: nowrap; }

.ct-form-col { position: sticky; top: 110px; }

/* ── FAQ ────────────────────────────────────────── */
.ct-faq-sec { background: #fff; padding: 64px 0; }
.ct-faq-inner { max-width: 800px; margin: 0 auto; padding: 0 24px; }
.ct-faq-inner h2 { text-align: center; margin-bottom: 32px; }
.ct-faq-inner details { border-bottom: 1px solid #ebe3d2; }
.ct-faq-inner summary {
  list-style: none; cursor: pointer; display: flex; align-items: center; justify-content: space-between;
  padding: 18px 0; font-family: 'Lato', sans-serif; font-size: 0.98rem; font-weight: 700; color: var(--ct-brown); user-select: none;
}
.ct-faq-inner summary::-webkit-details-marker { display: none; }
.ct-faq-inner summary svg { width: 16px; height: 16px; color: var(--ct-red); flex-shrink: 0; margin-left: 16px; transition: transform 0.2s; }
.ct-faq-inner details[open] summary svg { transform: rotate(180deg); }
.ct-faq-a { padding: 0 32px 18px 0; font-family: 'Lato', sans-serif; font-size: 0.9rem; color: #555; line-height: 1.8; }

/* ── BOTTOM BAND ────────────────────────────────── */
.ct-band { display: grid; grid-template-columns: 1fr 1.6fr; background: var(--ct-brown); min-height: 190px; overflow: hidden; }
.ct-band-img { position: relative; overflow: hidden; }
.ct-band-img img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; display: block; }
.ct-band-img::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to right, rgba(42,15,8,0) 60%, var(--ct-brown) 100%); }
.ct-band-body { display: grid; grid-template-columns: 1.3fr 1fr 1fr 1fr; align-items: center; padding: 28px max(24px, calc(50vw - 700px)) 28px 24px; }
.ct-band-tagline { color: #fff; font-size: clamp(1.3rem, 2.3vw, 1.9rem); line-height: 1.15; transform: rotate(-3deg); }
.ct-band-tagline::after { content: ''; display: block; width: 60%; height: 4px; border-radius: 4px; background: #d9a441; margin-top: 8px; }
.ct-band-item {
  display: flex; flex-direction: column; align-items: center; gap: 8px; text-align: center; color: #fff;
  padding: 6px 12px; border-left: 1px solid rgba(255,255,255,0.22);
  font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 0.06em; font-size: 0.85rem; font-weight: 600; line-height: 1.25;
}
.ct-band-item svg { width: 40px; height: 40px; }

/* ── RESPONSIVE ─────────────────────────────────── */
@media (max-width: 1000px) {
  .ct-hero { grid-template-columns: 1fr; }
  .ct-hero-media { order: -1; height: 240px; }
  .ct-hero-media::before { background: linear-gradient(to top, var(--ct-cream) 0%, rgba(247,241,230,0) 35%); }
  .ct-hero-left { padding: 28px 24px 36px; }
  .ct-hero-tag { top: 20px; right: 20px; }
  .ct-events-grid { grid-template-columns: 1fr; }
  .ct-event-card { height: 300px; }
  .ct-main-grid { grid-template-columns: 1fr; }
  .ct-form-col { position: static; }
  .ct-band { grid-template-columns: 1fr; }
  .ct-band-img { height: 180px; }
  .ct-band-img::after { background: linear-gradient(to bottom, rgba(42,15,8,0) 60%, var(--ct-brown) 100%); }
  .ct-band-body { grid-template-columns: repeat(3, 1fr); gap: 20px 0; padding: 28px 24px; }
  .ct-band-tagline { grid-column: 1 / -1; transform: none; }
}
@media (max-width: 600px) {
  .ct-hero-ctas .ct-btn { flex: 1 1 100%; }
  .ct-acc summary { padding: 12px 14px; gap: 12px; }
  .ct-acc-icon { width: 36px; height: 36px; }
  .ct-acc-body { padding: 4px 16px 8px; }
  .ct-band-item { font-size: 0.72rem; padding: 6px 6px; }
}
</style>

<!-- ═══════════════════════════════════════════════
  HERO
═══════════════════════════════════════════════ -->
<section class="ct-hero">
  <div class="ct-hero-left">
    <p class="ct-eyebrow">Catering — For Events That Matter</p>
    <h1>Real Puebla Flavor. For Your Most Important Events.</h1>
    <p class="ct-hero-sub">From intimate family dinners to quinceañeras with 300 guests — we bring the same family recipe, the same generous portions, and the same care to every table we serve.</p>

    <div class="ct-hero-ctas">
      <a href="#catering-form" class="ct-btn ct-btn-primary" data-track="catering_click">Get a Free Quote →</a>
      <a href="tel:+12673232669" class="ct-btn ct-btn-outline">Call Us Directly</a>
    </div>
    <p class="ct-hero-note">Catering requires at least 24 hours' advance notice.</p>
  </div>

  <div class="ct-hero-media">
    <img src="/wp-content/uploads/2026/05/CateringTacosService-scaled.jpg" alt="Mexican catering trays from Los Potrillos Restaurant in Philadelphia">
    <div class="ct-hero-tag ct-script">Good Food Brings<br>People Together.</div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
  EVENTS WE CATER
═══════════════════════════════════════════════ -->
<section class="ct-events">
  <div class="ct-wrap">
    <div class="ct-events-head">
      <p class="ct-eyebrow">Events We Cater</p>
      <h2 class="ct-h2">Every Event. Every Size. Every Guest.</h2>
    </div>

    <div class="ct-events-grid">
      <?php foreach ($events as $ev) : ?>
        <div class="ct-event-card">
          <img src="<?php echo esc_url($ev['img']); ?>" alt="<?php echo esc_attr($ev['alt']); ?>" loading="lazy">
          <div class="ct-event-overlay"></div>
          <div class="ct-event-content">
            <p class="ct-event-label"><?php echo esc_html($ev['label']); ?></p>
            <h3 class="ct-event-title"><?php echo esc_html($ev['title']); ?></h3>
            <p class="ct-event-copy"><?php echo esc_html($ev['copy']); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <p class="ct-notice"><strong>24-Hour Advance Notice Required</strong> Great catering takes preparation. Please submit your catering request at least 24 hours before your requested event or pickup time. Requests inside the 24-hour window cannot be accommodated.</p>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
  CATERING MENU + QUOTE FORM
═══════════════════════════════════════════════ -->
<section class="ct-main">
  <div class="ct-wrap">
    <div class="ct-main-grid">

      <div>
        <p class="ct-eyebrow">Catering Menu</p>
        <h2 class="ct-h2">Choose What Sounds Good.</h2>
        <p class="ct-menu-sub">Browse our catering menu below. Let us know what you're interested in, and we'll help you finalize the details. Please submit catering requests at least 24 hours in advance.</p>

        <div class="ct-acc">
          <?php foreach ($menu as $i => $cat) : ?>
            <details name="ct-menu" <?php echo $i === 0 ? 'open' : ''; ?>>
              <summary>
                <svg class="ct-acc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><?php echo $icons[$cat['icon']]; ?></svg>
                <span class="ct-acc-text">
                  <h3 class="ct-acc-title"><?php echo esc_html($cat['title']); ?></h3>
                  <span class="ct-acc-sub"><?php echo esc_html($cat['sub']); ?></span>
                </span>
                <svg class="ct-acc-chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
              </summary>
              <div class="ct-acc-body">
                <?php if (!empty($cat['note'])) : ?>
                  <p class="ct-acc-note"><?php echo esc_html($cat['note']); ?></p>
                <?php endif; ?>
                <?php foreach ($cat['items'] as $item) : ?>
                  <div class="ct-item">
                    <div>
                      <p class="ct-item-name"><?php echo esc_html($item['name']); ?></p>
                      <?php if (!empty($item['serves'])) : ?>
                        <p class="ct-item-serves"><?php echo esc_html($item['serves']); ?></p>
                      <?php endif; ?>
                      <?php foreach (($item['detail'] ?? []) as $line) : ?>
                        <p class="ct-item-detail"><?php echo esc_html($line); ?></p>
                      <?php endforeach; ?>
                    </div>
                    <?php if (!empty($item['price'])) : ?>
                      <span class="ct-item-price"><?php echo esc_html($item['price']); ?></span>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            </details>
          <?php endforeach; ?>
        </div>
      </div>

      <div id="catering-form" class="ct-form-col">
        <div id="render-catering-form-here"></div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
  FAQ
═══════════════════════════════════════════════ -->
<script type="application/ld+json">
<?php echo wp_json_encode([
  '@context'    => 'https://schema.org',
  '@type'       => 'Service',
  'serviceType' => 'Catering',
  'name'        => 'Mexican Catering in Philadelphia',
  'description' => 'Authentic Puebla-style Mexican catering for quinceañeras, weddings, office lunches and community events.',
  'areaServed'  => 'Philadelphia, PA',
  'provider'    => [
    '@type'     => 'Restaurant',
    'name'      => 'Los Potrillos Restaurant',
    'telephone' => '+1-267-323-2669',
    'address'   => [
      '@type'           => 'PostalAddress',
      'streetAddress'   => '2617 E Venango St',
      'addressLocality' => 'Philadelphia',
      'addressRegion'   => 'PA',
      'postalCode'      => '19134',
      'addressCountry'  => 'US',
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>

<section class="ct-faq-sec">
  <div class="ct-faq-inner">
    <h2 class="ct-h2">Catering Questions</h2>
    <?php foreach ($faqs as $i => $faq) : ?>
      <details <?php echo $i === 0 ? 'open' : ''; ?>>
        <summary>
          <?php echo esc_html($faq['q']); ?>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
        </summary>
        <div class="ct-faq-a"><?php echo esc_html($faq['a']); ?></div>
      </details>
    <?php endforeach; ?>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
  BOTTOM BAND
═══════════════════════════════════════════════ -->
<section class="ct-band">
  <div class="ct-band-img">
    <img class="kb-img" src="/wp-content/uploads/2026/05/TacosBirreaHero-scaled.png" alt="Los Potrillos birria tacos" loading="lazy">
  </div>
  <div class="ct-band-body">
    <div class="ct-band-tagline ct-script">Good Food.<br>Stronger Communities.</div>
    <div class="ct-band-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 19C5 10 10 5 20 4c0 10-5 15-14 15zM5 19c2-4 5-7 9-9"/></svg>
      Fresh<br>Ingredients
    </div>
    <div class="ct-band-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="3"/><circle cx="5" cy="10" r="2.2"/><circle cx="19" cy="10" r="2.2"/><path d="M6.5 20v-2.5a5.5 5.5 0 0 1 11 0V20z"/></svg>
      Generous<br>Portions
    </div>
    <div class="ct-band-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-8 9 8M5 10v10h14V10M10 20v-6h4v6"/></svg>
      Family<br>Owned
    </div>
  </div>
</section>

<?php get_footer(); ?>
