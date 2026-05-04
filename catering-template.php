<?php
/*
 * Template Name: Catering Template
 */

get_header(); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap');

/* ── SHARED ─────────────────────────────────────── */
.ct-eyebrow {
  font-family: 'Oswald', sans-serif; text-transform: uppercase;
  letter-spacing: 0.18em; font-size: 0.62rem; font-weight: 600;
  color: #C0392B; margin: 0 0 14px 0;
}
.ct-btn-primary {
  display: inline-flex; align-items: center; gap: 8px;
  font-family: 'Oswald', sans-serif; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.1em;
  font-size: 0.83rem; padding: 14px 26px; border-radius: 3px;
  text-decoration: none; white-space: nowrap;
  border: 2px solid #C0392B; background: #C0392B; color: #fff;
  transition: background 0.2s, border-color 0.2s, transform 0.15s;
  cursor: pointer;
}
.ct-btn-primary:hover { background: #a93226; border-color: #a93226; transform: translateY(-2px); }

.ct-btn-secondary {
  display: inline-flex; align-items: center; gap: 8px;
  font-family: 'Oswald', sans-serif; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.1em;
  font-size: 0.83rem; padding: 14px 26px; border-radius: 3px;
  text-decoration: none; white-space: nowrap;
  border: 2px solid #1a1a1a; background: transparent; color: #1a1a1a;
  transition: background 0.2s, color 0.2s, transform 0.15s;
  cursor: pointer;
}
.ct-btn-secondary:hover { background: #1a1a1a; color: #fff; transform: translateY(-2px); }

/* ── HERO ───────────────────────────────────────── */
.ct-hero {
  display: grid; grid-template-columns: 1fr 1fr;
  min-height: 82vh; background: #fff;
}
.ct-hero-left {
  display: flex; flex-direction: column; justify-content: center;
  padding: 60px 52px 60px 5vw;
}
.ct-hero-right { position: relative; overflow: hidden; }
.ct-hero-right img { width: 100%; height: 100%; object-fit: cover; display: block; }
.ct-hero-right::after {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(to right, rgba(255,255,255,0.08) 0%, transparent 40%);
}

/* ── EVENT TYPES ────────────────────────────────── */
.ct-events-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;
}
.ct-event-card {
  position: relative; height: 380px; overflow: hidden; border-radius: 4px;
}
.ct-event-card img {
  width: 100%; height: 100%; object-fit: cover;
  transition: transform 0.5s ease;
}
.ct-event-card:hover img { transform: scale(1.05); }
.ct-event-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.82) 0%, rgba(0,0,0,0.15) 55%, transparent 100%);
}
.ct-event-content {
  position: absolute; bottom: 0; left: 0; right: 0; padding: 28px;
}

/* ── HOW IT WORKS ───────────────────────────────── */
.ct-steps-grid {
  display: grid; grid-template-columns: repeat(4, 1fr); gap: 32px;
}
.ct-step-number {
  font-family: 'Playfair Display', serif;
  font-size: 3.5rem; font-weight: 800;
  color: rgba(192,57,43,0.12); line-height: 1;
  margin-bottom: 12px;
}

/* ── MENU SAMPLES ───────────────────────────────── */
.ct-menu-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
}
.ct-menu-card {
  background: #fff; border: 1px solid #e8e2d8;
  border-top: 3px solid #C0392B; padding: 24px;
}

/* ── FORM + PITCH ───────────────────────────────── */
.ct-form-section {
  display: grid; grid-template-columns: 1fr 1.1fr; gap: 64px; align-items: start;
}

/* ── GALLERY ────────────────────────────────────── */
.ct-gallery {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 260px 260px;
  gap: 8px;
}
.ct-gallery-item { overflow: hidden; }
.ct-gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
.ct-gallery-item:hover img { transform: scale(1.05); }
.ct-gallery-item:first-child { grid-row: 1 / 3; }

/* ── RESPONSIVE ─────────────────────────────────── */
@media (max-width: 960px) {
  .ct-hero { grid-template-columns: 1fr; min-height: auto; }
  .ct-hero-right { height: 300px; order: -1; }
  .ct-hero-left { padding: 36px 24px 44px; }
  .ct-events-grid { grid-template-columns: 1fr; }
  .ct-event-card { height: 300px; }
  .ct-steps-grid { grid-template-columns: 1fr 1fr; }
  .ct-menu-grid { grid-template-columns: 1fr; }
  .ct-form-section { grid-template-columns: 1fr; gap: 36px; }
  .ct-gallery {
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto;
  }
  .ct-gallery-item:first-child { grid-row: auto; }
}
@media (max-width: 600px) {
  .ct-steps-grid { grid-template-columns: 1fr; }
  .ct-gallery { grid-template-columns: 1fr; }
}
</style>


<!-- ═══════════════════════════════════════════════
  HERO
═══════════════════════════════════════════════ -->
<section class="ct-hero">

  <div class="ct-hero-left">
    <p class="ct-eyebrow">Catering — For Events That Matter</p>

    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(2.2rem,4.2vw,3.4rem);font-weight:800;line-height:1.15;color:#1a1a1a;margin:0 0 20px 0;letter-spacing:-0.01em;">
      Real Puebla Flavor.<br>
      <em style="color:#C0392B;font-style:italic;">For Your Most Important Events.</em>
    </h1>

    <p style="font-family:'Lato',sans-serif;font-size:0.95rem;color:#555;line-height:1.85;margin:0 0 28px 0;max-width:440px;">
      From intimate family dinners to quinceañeras with 300 guests — we bring the same family recipe, the same generous portions, and the same care to every table we serve.
    </p>

    <div style="display:flex;align-items:center;gap:8px;margin-bottom:32px;">
      <span style="color:#e6a817;font-size:0.9rem;">★★★★★</span>
      <span style="font-family:'Lato',sans-serif;font-size:0.77rem;color:#555;font-weight:700;">Trusted by hundreds of Philadelphia families</span>
    </div>

    <div style="display:flex;flex-wrap:wrap;gap:12px;">
      <a href="#catering-form" class="ct-btn-primary">Get a Free Quote →</a>
      <a href="tel:+12673232669" class="ct-btn-secondary">Call Us Directly</a>
    </div>
  </div>

  <div class="ct-hero-right">
    <img src="/wp-content/uploads/2026/05/CateringTacosService-scaled.jpg" alt="Los Potrillos catering — Puebla-style food for events and celebrations in Philadelphia">
  </div>

</section>


<!-- ═══════════════════════════════════════════════
  TRUST BAR
═══════════════════════════════════════════════ -->
<div style="background:#1a0800;padding:22px 24px;">
  <div style="max-width:1180px;margin:0 auto;display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:12px 40px;">
    <?php
    $trust_items = [
      '✓  Custom menus for any event size',
      '✓  On-time delivery, every time',
      '✓  We respond within 24 hours',
      '✓  Family-owned — not a catering company',
    ];
    foreach ($trust_items as $item) : ?>
      <span style="font-family:'Lato',sans-serif;font-size:0.78rem;color:rgba(255,255,255,0.75);white-space:nowrap;">
        <?php echo esc_html($item); ?>
      </span>
    <?php endforeach; ?>
  </div>
</div>


<!-- ═══════════════════════════════════════════════
  EVENT TYPES
═══════════════════════════════════════════════ -->
<section style="background:#fff;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">

    <div style="text-align:center;margin-bottom:52px;">
      <p class="ct-eyebrow" style="justify-content:center;display:flex;">Events We Cater</p>
      <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;margin:0;letter-spacing:-0.01em;line-height:1.2;">
        Every Event. Every Size. Every Guest.
      </h2>
    </div>

    <div class="ct-events-grid">

      <div class="ct-event-card">
        <img src="" alt="Family celebrations catering — quinceañeras, weddings, birthdays">
        <div class="ct-event-overlay"></div>
        <div class="ct-event-content">
          <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.14em;font-size:0.62rem;font-weight:600;color:rgba(232,192,122,0.9);margin:0 0 6px 0;">Family</p>
          <h3 style="font-family:'Playfair Display',serif;font-size:1.55rem;font-weight:800;color:#fff;margin:0 0 8px 0;line-height:1.15;">
            Family Celebrations
          </h3>
          <p style="font-family:'Lato',sans-serif;font-size:0.78rem;color:rgba(255,255,255,0.72);margin:0;line-height:1.6;">
            Quinceañeras · Weddings · Birthdays · Baptisms · Anniversaries
          </p>
        </div>
      </div>

      <div class="ct-event-card">
        <img src="" alt="Corporate catering — office lunches, team gatherings, holiday parties">
        <div class="ct-event-overlay"></div>
        <div class="ct-event-content">
          <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.14em;font-size:0.62rem;font-weight:600;color:rgba(232,192,122,0.9);margin:0 0 6px 0;">Corporate</p>
          <h3 style="font-family:'Playfair Display',serif;font-size:1.55rem;font-weight:800;color:#fff;margin:0 0 8px 0;line-height:1.15;">
            Corporate Events
          </h3>
          <p style="font-family:'Lato',sans-serif;font-size:0.78rem;color:rgba(255,255,255,0.72);margin:0;line-height:1.6;">
            Office Lunches · Team Gatherings · Holiday Parties · Conferences
          </p>
        </div>
      </div>

      <div class="ct-event-card">
        <img src="" alt="Community events catering — church gatherings, school functions, block parties">
        <div class="ct-event-overlay"></div>
        <div class="ct-event-content">
          <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.14em;font-size:0.62rem;font-weight:600;color:rgba(232,192,122,0.9);margin:0 0 6px 0;">Community</p>
          <h3 style="font-family:'Playfair Display',serif;font-size:1.55rem;font-weight:800;color:#fff;margin:0 0 8px 0;line-height:1.15;">
            Community Events
          </h3>
          <p style="font-family:'Lato',sans-serif;font-size:0.78rem;color:rgba(255,255,255,0.72);margin:0;line-height:1.6;">
            Church Gatherings · School Functions · Block Parties · Festivals
          </p>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
  HOW IT WORKS
═══════════════════════════════════════════════ -->
<section style="background:#f7f4f0;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">

    <div style="text-align:center;margin-bottom:56px;">
      <p class="ct-eyebrow" style="display:flex;justify-content:center;">The Process</p>
      <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;margin:0;letter-spacing:-0.01em;line-height:1.2;">
        How Catering With Us Works
      </h2>
    </div>

    <div class="ct-steps-grid">
      <?php
      $steps = [
        ['num' => '01', 'title' => 'Request Your Quote',    'desc' => 'Fill out our form or give us a call. Tell us your event date, guest count, and any preferences. We reply within 24 hours.'],
        ['num' => '02', 'title' => 'We Build Your Menu',    'desc' => 'We put together a custom menu around your event, your guests, and your budget. No templates — every event is different.'],
        ['num' => '03', 'title' => 'We Handle Everything',  'desc' => 'On the day of your event, we arrive on time with everything ready. Hot food, proper portions, and a team that cares.'],
        ['num' => '04', 'title' => 'Your Guests Eat Well',  'desc' => 'From the first taco to the last consomé, your guests get the real Los Potrillos experience — the same one we serve every day.'],
      ];
      foreach ($steps as $step) : ?>
        <div>
          <div class="ct-step-number"><?php echo esc_html($step['num']); ?></div>
          <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.1em;font-size:0.75rem;font-weight:600;color:#1a1a1a;margin:0 0 10px 0;">
            <?php echo esc_html($step['title']); ?>
          </p>
          <p style="font-family:'Lato',sans-serif;font-size:0.85rem;color:#666;line-height:1.8;margin:0;">
            <?php echo esc_html($step['desc']); ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ═══════════════════════════════════════════════
  MENU SAMPLES
═══════════════════════════════════════════════ -->
<section style="background:#fff;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">

    <div style="text-align:center;margin-bottom:52px;">
      <p class="ct-eyebrow" style="display:flex;justify-content:center;">What We Serve</p>
      <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;margin:0 0 14px 0;letter-spacing:-0.01em;line-height:1.2;">
        Sample Catering Menu
      </h2>
      <p style="font-family:'Lato',sans-serif;font-size:0.88rem;color:#888;max-width:520px;margin:0 auto;line-height:1.75;">
        Every menu is customized for your event. These are examples of what we commonly serve — tell us your preferences and we'll build around you.
      </p>
    </div>

    <div class="ct-menu-grid">
      <?php
      $menu_items = [
        [
          'category' => 'Signature Proteins',
          'items'    => ['Birria de Res (slow-cooked beef)', 'Pollo en Mole Rojo', 'Carnitas estilo Michoacán', 'Pastor al trompo', 'Barbacoa de borrego'],
        ],
        [
          'category' => 'Tacos & Handhelds',
          'items'    => ['Quesabirria tacos with consomé', 'Tacos de canasta', 'Flautas doradas', 'Tostadas de tinga', 'Gorditas rellenas'],
        ],
        [
          'category' => 'Sides & Accompaniments',
          'items'    => ['Arroz rojo estilo Puebla', 'Frijoles de la olla', 'Guacamole fresco', 'Salsas (roja, verde, habanero)', 'Cebollitas asadas'],
        ],
        [
          'category' => 'Drinks & Aguas',
          'items'    => ['Agua de jamaica', 'Agua de tamarindo', 'Horchata', 'Agua de limón', 'Ponche caliente (seasonal)'],
        ],
        [
          'category' => 'Desserts',
          'items'    => ['Tres leches cake', 'Flan napolitano', 'Churros con chocolate', 'Buñuelos', 'Arroz con leche'],
        ],
        [
          'category' => 'Vegetarian Options',
          'items'    => ['Tacos de rajas con crema', 'Quesadillas de flor de calabaza', 'Enchiladas verdes de queso', 'Pozole verde de hongos', 'Nopales a la mexicana'],
        ],
      ];
      foreach ($menu_items as $section) : ?>
        <div class="ct-menu-card">
          <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.12em;font-size:0.68rem;font-weight:600;color:#C0392B;margin:0 0 14px 0;">
            <?php echo esc_html($section['category']); ?>
          </p>
          <ul style="list-style:none;padding:0;margin:0;">
            <?php foreach ($section['items'] as $item) : ?>
              <li style="font-family:'Lato',sans-serif;font-size:0.83rem;color:#444;padding:6px 0;border-bottom:1px solid #f3ede6;line-height:1.5;display:flex;align-items:flex-start;gap:8px;">
                <span style="color:#C0392B;flex-shrink:0;margin-top:2px;">—</span>
                <?php echo esc_html($item); ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>

    <p style="font-family:'Lato',sans-serif;font-size:0.78rem;color:#aaa;text-align:center;margin-top:28px;">
      Menu items and availability vary by season and event size. All menus are confirmed at time of booking.
    </p>

  </div>
</section>


<!-- ═══════════════════════════════════════════════
  PHOTO GALLERY
═══════════════════════════════════════════════ -->
<section style="background:#f7f4f0;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">

    <div style="text-align:center;margin-bottom:40px;">
      <p class="ct-eyebrow" style="display:flex;justify-content:center;">Past Events</p>
      <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;margin:0;letter-spacing:-0.01em;line-height:1.2;">
        Real Events. Real Food. Real People.
      </h2>
    </div>

    <div class="ct-gallery">
      <div class="ct-gallery-item"><img src="" alt="Los Potrillos catering event 1"></div>
      <div class="ct-gallery-item"><img src="" alt="Los Potrillos catering event 2"></div>
      <div class="ct-gallery-item"><img src="" alt="Los Potrillos catering event 3"></div>
      <div class="ct-gallery-item"><img src="" alt="Los Potrillos catering event 4"></div>
      <div class="ct-gallery-item"><img src="" alt="Los Potrillos catering event 5"></div>
    </div>

  </div>
</section>


<!-- ═══════════════════════════════════════════════
  REVIEW — SOCIAL PROOF
═══════════════════════════════════════════════ -->
<section style="background:#1a0800;padding:72px 24px;">
  <div style="max-width:820px;margin:0 auto;text-align:center;">

    <div style="color:#e6a817;font-size:1.1rem;letter-spacing:0.1em;margin-bottom:24px;">★★★★★</div>

    <blockquote style="margin:0 0 28px 0;">
      <p style="font-family:'Playfair Display',serif;font-style:italic;font-size:clamp(1.2rem,2.5vw,1.65rem);color:#fff;line-height:1.65;margin:0;">
        "We had Los Potrillos cater our daughter's quinceañera and it was the highlight of the night. The food arrived hot, the portions were enormous, and every single guest asked us for the name of the caterer. We will never use anyone else."
      </p>
    </blockquote>

    <cite style="font-family:'Lato',sans-serif;font-size:0.78rem;color:rgba(255,255,255,0.45);font-style:normal;letter-spacing:0.05em;text-transform:uppercase;">
      — Carlos R. · Verified Google Review
    </cite>

  </div>
</section>


<!-- ═══════════════════════════════════════════════
  CATERING FORM
═══════════════════════════════════════════════ -->
<section id="catering-form" style="background:#faf7f3;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">
    <div class="ct-form-section">

      <!-- LEFT: Pitch -->
      <div style="position:sticky;top:130px;">
        <p class="ct-eyebrow">Get Your Free Quote</p>

        <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.7rem,3vw,2.3rem);font-weight:800;color:#1a1a1a;line-height:1.2;margin:0 0 20px 0;letter-spacing:-0.01em;">
          Let's Plan Your Event Together.
        </h2>

        <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:#555;line-height:1.85;margin:0 0 32px 0;">
          Tell us about your event and we'll get back to you within 24 hours with a custom quote. No obligation, no pressure — just real food and a real conversation.
        </p>

        <!-- Contact alternatives -->
        <div style="display:flex;flex-direction:column;gap:16px;">

          <a href="tel:+12673232669" style="display:flex;align-items:center;gap:14px;text-decoration:none;padding:16px 20px;background:#fff;border:1px solid #e8e2d8;border-radius:3px;transition:border-color 0.2s;"
            onmouseover="this.style.borderColor='#C0392B'" onmouseout="this.style.borderColor='#e8e2d8'">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="#C0392B">
              <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
            </svg>
            <div>
              <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.09em;font-size:0.65rem;font-weight:600;color:#888;margin:0 0 2px 0;">Call Us Directly</p>
              <p style="font-family:'Lato',sans-serif;font-size:0.92rem;font-weight:700;color:#1a1a1a;margin:0;">(267) 323-2669</p>
            </div>
          </a>

          <a href="https://wa.me/12673232669" target="_blank" rel="noopener"
            style="display:flex;align-items:center;gap:14px;text-decoration:none;padding:16px 20px;background:#fff;border:1px solid #e8e2d8;border-radius:3px;transition:border-color 0.2s;"
            onmouseover="this.style.borderColor='#25D366'" onmouseout="this.style.borderColor='#e8e2d8'">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="#25D366">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            <div>
              <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.09em;font-size:0.65rem;font-weight:600;color:#888;margin:0 0 2px 0;">Message on WhatsApp</p>
              <p style="font-family:'Lato',sans-serif;font-size:0.92rem;font-weight:700;color:#1a1a1a;margin:0;">(267) 323-2669</p>
            </div>
          </a>

          <a href="mailto:info@restaurantpotrillos.com"
            style="display:flex;align-items:center;gap:14px;text-decoration:none;padding:16px 20px;background:#fff;border:1px solid #e8e2d8;border-radius:3px;transition:border-color 0.2s;"
            onmouseover="this.style.borderColor='#C0392B'" onmouseout="this.style.borderColor='#e8e2d8'">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#C0392B" stroke-width="1.8" stroke-linecap="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
            </svg>
            <div>
              <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.09em;font-size:0.65rem;font-weight:600;color:#888;margin:0 0 2px 0;">Send an Email</p>
              <p style="font-family:'Lato',sans-serif;font-size:0.88rem;font-weight:700;color:#1a1a1a;margin:0;">info@restaurantpotrillos.com</p>
            </div>
          </a>

        </div>
      </div>

      <!-- RIGHT: React form -->
      <div id="render-catering-form-here"></div>

    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
  FAQ — CATERING SPECIFIC
═══════════════════════════════════════════════ -->
<section style="background:#fff;padding:80px 24px;">
  <div style="max-width:760px;margin:0 auto;">

    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;text-align:center;margin:0 0 48px 0;letter-spacing:-0.01em;">
      Catering Questions
    </h2>

    <div style="border-top:1px solid #ebebeb;">
      <?php
      $faqs = [
        ['q' => 'How far in advance do I need to book?',
         'a' => 'We recommend booking at least 2 weeks in advance for smaller events, and 4–6 weeks for large events like quinceañeras or weddings. We occasionally accommodate last-minute requests — call us to check availability.'],
        ['q' => 'Do you have a minimum guest count?',
         'a' => 'Our catering starts at 20 guests. For smaller gatherings, you are welcome to order pickup through our online store.'],
        ['q' => 'Do you deliver, or do we pick up?',
         'a' => 'We deliver to your event location across Philadelphia and the surrounding counties. Delivery fees vary by distance and event size — we include this in your quote.'],
        ['q' => 'Can you accommodate dietary restrictions?',
         'a' => 'Absolutely. We offer vegetarian, gluten-aware, and dairy-free options. Let us know when you request your quote and we will build your menu accordingly.'],
        ['q' => 'What is included in the catering service?',
         'a' => 'Every catering package includes food, serving equipment, and setup at your event location. Staffing and additional equipment are available on request — ask us for details.'],
        ['q' => 'How do I pay, and is a deposit required?',
         'a' => 'We require a 30% deposit to confirm your booking, with the balance due on the day of the event. We accept cash, Zelle, and major credit cards.'],
      ];
      foreach ($faqs as $i => $faq) : ?>
        <details <?php echo $i === 0 ? 'open' : ''; ?> style="border-bottom:1px solid #ebebeb;">
          <summary style="list-style:none;cursor:pointer;display:flex;align-items:center;justify-content:space-between;padding:20px 0;font-family:'Lato',sans-serif;font-size:0.95rem;font-weight:700;color:#1a1a1a;user-select:none;">
            <?php echo esc_html($faq['q']); ?>
            <span style="font-size:1.5rem;font-weight:300;color:#C0392B;flex-shrink:0;margin-left:16px;line-height:1;transition:transform 0.22s;" class="ct-faq-icon">+</span>
          </summary>
          <div style="padding:0 40px 20px 0;font-family:'Lato',sans-serif;font-size:0.88rem;color:#555;line-height:1.85;">
            <?php echo esc_html($faq['a']); ?>
          </div>
        </details>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<script>
  // FAQ icon rotation
  document.querySelectorAll('.ct-form-section details, details').forEach(el => {
    el.addEventListener('toggle', () => {
      const icon = el.querySelector('.ct-faq-icon')
      if (icon) icon.style.transform = el.open ? 'rotate(45deg)' : 'rotate(0)'
    })
  })
</script>


<?php get_footer(); ?>