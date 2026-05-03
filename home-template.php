<?php
/*
 * Template Name: Home Template
 */

get_header(); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap');

/* ═══════════════════════════════════════════════════
   HOMEPAGE — CUSTOM STYLES
═══════════════════════════════════════════════════ */

/* Font roles:
   Playfair Display  → H1, H2 display headings (editorial, warm)
   Oswald            → buttons, eyebrows, labels, nav (strong, clean)
   Lato              → body copy, sub-text (readable, neutral)
*/

/* ── SHARED BUTTONS ────────────────────────────── */
.hp-btn-primary {
  display: inline-flex; align-items: center; gap: 8px;
  font-family: 'Oswald', sans-serif; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.1em;
  font-size: 0.83rem; padding: 14px 26px; border-radius: 3px;
  text-decoration: none; white-space: nowrap;
  border: 2px solid #C0392B; background: #C0392B; color: #fff;
  transition: background 0.2s, border-color 0.2s, transform 0.15s;
  cursor: pointer;
}
.hp-btn-primary:hover { background: #a93226; border-color: #a93226; transform: translateY(-2px); }

.hp-btn-secondary {
  display: inline-flex; align-items: center; gap: 8px;
  font-family: 'Oswald', sans-serif; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.1em;
  font-size: 0.83rem; padding: 14px 26px; border-radius: 3px;
  text-decoration: none; white-space: nowrap;
  border: 2px solid #1a1a1a; background: transparent; color: #1a1a1a;
  transition: background 0.2s, color 0.2s, transform 0.15s;
  cursor: pointer;
}
.hp-btn-secondary:hover { background: #1a1a1a; color: #fff; transform: translateY(-2px); }

.hp-eyebrow {
  font-family: 'Oswald', sans-serif; text-transform: uppercase;
  letter-spacing: 0.18em; font-size: 0.62rem; font-weight: 600;
  color: #C0392B; margin: 0 0 14px 0;
}

/* ── 4.2 HERO ──────────────────────────────────── */
.hp-hero {
  display: grid; grid-template-columns: 1fr 1fr;
  min-height: 88vh; background: #fff;
}
.hp-hero-left {
  display: flex; flex-direction: column; justify-content: center;
  padding: 60px 52px 60px 5vw;
}
.hp-hero-right { position: relative; overflow: hidden; }
.hp-hero-right img { width: 100%; height: 100%; object-fit: cover; display: block; }

/* ── 4.3 TWO PILLARS ───────────────────────────── */
.hp-pillars { display: grid; grid-template-columns: 1fr 1fr; }
.hp-pillar-card { position: relative; height: 520px; overflow: hidden; }
.hp-pillar-card img {
  width: 100%; height: 100%; object-fit: cover;
  transition: transform 0.55s ease;
}
.hp-pillar-card:hover img { transform: scale(1.05); }
.hp-pillar-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.82) 0%, rgba(0,0,0,0.2) 55%, transparent 100%);
}
.hp-pillar-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 36px; }

/* ── 4.4 BIRRIA ────────────────────────────────── */
.hp-birria { display: grid; grid-template-columns: 1fr 1fr; min-height: 620px; }
.hp-birria-img { position: relative; overflow: hidden; }
.hp-birria-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.hp-birria-text {
  display: flex; flex-direction: column; justify-content: center;
  padding: 64px 56px; background: #1a0800;
}

/* ── 4.5 TRUST ─────────────────────────────────── */
.hp-trust-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 36px; }
.hp-trust-icon { width: 48px; height: 48px; margin: 0 auto 18px; color: #C0392B; }

/* ── 4.6 OUR STORY ─────────────────────────────── */
.hp-story { display: grid; grid-template-columns: 1fr 1fr; min-height: 560px; }
.hp-story-img { position: relative; overflow: hidden; }
.hp-story-img img { width: 100%; height: 100%; object-fit: cover; }
.hp-story-text {
  display: flex; flex-direction: column; justify-content: center;
  padding: 64px 56px; background: #fff;
}

/* ── 4.7 CATERING ──────────────────────────────── */
.hp-catering { display: grid; grid-template-columns: 1fr 1fr; gap: 56px; align-items: start; }

/* ── 4.8 REVIEWS ───────────────────────────────── */
.hp-reviews-scroll {
  display: flex; gap: 20px;
  overflow-x: auto; scroll-snap-type: x mandatory;
  scrollbar-width: none; padding-bottom: 8px;
}
.hp-reviews-scroll::-webkit-scrollbar { display: none; }
.hp-review-card { flex-shrink: 0; width: 300px; scroll-snap-align: start; }

/* ── 4.9 VISIT ─────────────────────────────────── */
.hp-visit-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 52px; align-items: start; }

/* ── 4.10 FAQ ──────────────────────────────────── */
.hp-faq details { border-bottom: 1px solid #ebebeb; }
.hp-faq summary {
  list-style: none; cursor: pointer;
  display: flex; align-items: center; justify-content: space-between;
  padding: 20px 0;
  font-family: 'Lato', sans-serif; font-size: 0.95rem; font-weight: 700;
  color: #1a1a1a; user-select: none;
}
.hp-faq summary::-webkit-details-marker { display: none; }
.hp-faq summary .faq-icon {
  font-size: 1.5rem; font-weight: 300; color: #C0392B;
  transition: transform 0.22s; flex-shrink: 0; margin-left: 16px; line-height: 1;
}
.hp-faq details[open] summary .faq-icon { transform: rotate(45deg); }
.hp-faq .faq-answer { padding: 0 40px 20px 0; font-size: 0.88rem; color: #555; line-height: 1.85; font-family: 'Lato', sans-serif; }

/* ── RESPONSIVE ────────────────────────────────── */
@media (max-width: 960px) {
  .hp-hero { grid-template-columns: 1fr; min-height: auto; }
  .hp-hero-right { height: 320px; order: -1; }
  .hp-hero-left { padding: 36px 24px 44px; }
  .hp-pillars { grid-template-columns: 1fr; }
  .hp-pillar-card { height: 400px; }
  .hp-birria { grid-template-columns: 1fr; min-height: auto; }
  .hp-birria-img { height: 300px; }
  .hp-birria-text { padding: 40px 24px; }
  .hp-trust-grid { grid-template-columns: 1fr 1fr; }
  .hp-story { grid-template-columns: 1fr; min-height: auto; }
  .hp-story-img { height: 320px; order: -1; }
  .hp-story-text { padding: 40px 24px; }
  .hp-catering { grid-template-columns: 1fr; gap: 36px; }
  .hp-visit-grid { grid-template-columns: 1fr; }
  .hp-visit-grid iframe { height: 280px !important; }
}
@media (max-width: 600px) {
  .hp-trust-grid { grid-template-columns: 1fr; }
  .hp-hero-ctas { flex-direction: column !important; }
  .hp-hero-ctas a { text-align: center; justify-content: center; }
}
</style>


<!-- ═══════════════════════════════════════════════
  4.2 — HERO
═══════════════════════════════════════════════ -->
<section class="hp-hero">

  <div class="hp-hero-left">
    <p class="hp-eyebrow">Authentic Puebla-Style Mexican · Port Richmond, Philadelphia</p>

    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(2.4rem,4.8vw,3.8rem);font-weight:800;line-height:1.15;color:#1a1a1a;margin:0 0 20px 0;letter-spacing:-0.01em;">
      Real Birria Tacos.<br>
      Real Puebla Recipe.<br>
      <em style="color:#C0392B;font-style:italic;">Made Fresh in Philadelphia.</em>
    </h1>

    <p style="font-family:'Lato',sans-serif;font-size:0.95rem;color:#555;line-height:1.85;margin:0 0 24px 0;max-width:420px;">
      Slow-cooked for 12 hours using a family recipe passed down through generations. Order pickup in minutes — or let us cater your next family event.
    </p>

    <div style="display:flex;align-items:center;gap:8px;margin-bottom:28px;">
      <span style="color:#e6a817;font-size:0.9rem;">★★★★★</span>
      <span style="font-family:'Lato',sans-serif;font-size:0.77rem;color:#555;font-weight:700;">Rated Excellent — 291+ Google Reviews</span>
    </div>

    <div class="hp-hero-ctas" style="display:flex;flex-wrap:wrap;gap:12px;">
      <a href="https://los-potrillos-restaurant.cloveronline.com/" target="_blank" rel="noopener" class="hp-btn-primary">
        Order Pickup Now →
      </a>
      <a href="#catering" class="hp-btn-secondary">
        Get a Catering Quote
      </a>
    </div>
  </div>

  <div class="hp-hero-right">
    <img src="/wp-content/uploads/2026/05/TacosBirreaHero-scaled.png" alt="Birria Tacos with consomé — Los Potrillos, Philadelphia">
  </div>

</section>


<!-- ═══════════════════════════════════════════════
  4.3 — THE TWO PILLARS
═══════════════════════════════════════════════ -->
<section class="hp-pillars">

  <div class="hp-pillar-card">
    <img src="/wp-content/uploads/2026/05/OrderPickupHero-scaled.jpg" alt="Los Potrillos — Order Pickup Birria Tacos">
    <div class="hp-pillar-overlay"></div>
    <div class="hp-pillar-content">
      <h2 style="font-family:'Playfair Display',serif;font-size:2.3rem;font-weight:800;color:#fff;margin:0 0 10px 0;line-height:1.1;letter-spacing:-0.01em;">
        Order Pickup
      </h2>
      <p style="font-family:'Lato',sans-serif;color:rgba(255,255,255,0.82);font-size:0.85rem;line-height:1.7;margin:0 0 20px 0;">
        Real birria tacos, fresh from our kitchen.<br>
        Order online — pick up in 15 minutes.
      </p>
      <a href="https://los-potrillos-restaurant.cloveronline.com/" target="_blank" rel="noopener" class="hp-btn-primary">
        Order Now
      </a>
    </div>
  </div>

  <div class="hp-pillar-card">
    <img src="/wp-content/uploads/2026/05/CateringService-scaled.jpg" alt="Los Potrillos — Catering for Events and Celebrations">
    <div class="hp-pillar-overlay"></div>
    <div class="hp-pillar-content">
      <h2 style="font-family:'Playfair Display',serif;font-size:2.3rem;font-weight:800;color:#fff;margin:0 0 10px 0;line-height:1.1;letter-spacing:-0.01em;">
        Order Catering
      </h2>
      <p style="font-family:'Lato',sans-serif;color:rgba(255,255,255,0.82);font-size:0.85rem;line-height:1.7;margin:0 0 20px 0;">
        From quinceañeras to corporate events,<br>
        we bring real Puebla flavor to your table.
      </p>
      <a href="#catering" class="hp-btn-primary">
        Request a Quote
      </a>
    </div>
  </div>

</section>


<!-- ═══════════════════════════════════════════════
  4.4 — BIRRIA SIGNATURE
═══════════════════════════════════════════════ -->
<section class="hp-birria">

  <div class="hp-birria-img">
    <img src="/wp-content/uploads/2026/05/CateringServiceHero-scaled.jpg" alt="Los Potrillos signature birria tacos — slow-cooked 12 hours, Puebla recipe">
  </div>

  <div class="hp-birria-text">
    <p class="hp-eyebrow" style="color:rgba(212,160,23,0.85);">Our Signature — The dish people come looking for</p>

    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(2rem,3.8vw,2.9rem);font-weight:800;color:#fff;line-height:1.15;margin:0 0 24px 0;letter-spacing:-0.01em;">
      The Best Birria Tacos<br>
      <em style="font-style:italic;color:#e8c07a;">in Philadelphia</em>
    </h2>

    <p style="font-family:'Lato',sans-serif;font-size:0.88rem;color:rgba(255,255,255,0.72);line-height:1.95;margin:0 0 16px 0;">
      We start before sunrise. The meat braises slowly for 12 hours in a sauce built from chiles, spices, and a recipe brought from Puebla generations ago. The tortillas are dipped in the consomé and crisped on the plancha. The cheese melts inside. The cilantro goes on last.
    </p>

    <p style="font-family:'Lato',sans-serif;font-size:0.88rem;color:rgba(255,255,255,0.72);line-height:1.95;margin:0 0 28px 0;">
      This is not a trend. This is what real birria tastes like when it is made the way it has always been made — with time, with care, and with respect for where the recipe came from.
    </p>

    <blockquote style="border-left:3px solid #C0392B;padding:0 0 0 20px;margin:0 0 32px 0;">
      <p style="font-family:'Playfair Display',serif;font-style:italic;font-size:1rem;color:rgba(255,255,255,0.55);line-height:1.7;margin:0;">
        "Best birria tacos I've had outside of Mexico."
      </p>
      <cite style="font-family:'Lato',sans-serif;font-size:0.72rem;color:rgba(255,255,255,0.35);font-style:normal;display:block;margin-top:6px;">— Verified Google Review</cite>
    </blockquote>

    <a href="https://los-potrillos-restaurant.cloveronline.com/" target="_blank" rel="noopener"
      class="hp-btn-primary" style="align-self:flex-start;">
      Order Birria Tacos Now →
    </a>
  </div>

</section>


<!-- ═══════════════════════════════════════════════
  4.5 — WHY LOS POTRILLOS
═══════════════════════════════════════════════ -->
<section style="background:#f7f4f0;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">

    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;text-align:center;margin:0 0 56px 0;line-height:1.2;letter-spacing:-0.01em;">
      Why Families Across Philly<br>Choose Los Potrillos
    </h2>

    <div class="hp-trust-grid">

      <div style="text-align:center;">
        <div class="hp-trust-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22s-8-5-8-11a8 8 0 0 1 16 0c0 6-8 11-8 11z"/><circle cx="12" cy="11" r="2.5"/>
          </svg>
        </div>
        <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.12em;font-size:0.75rem;font-weight:600;color:#1a1a1a;margin:0 0 10px 0;">Puebla Recipe</p>
        <p style="font-family:'Lato',sans-serif;font-size:0.84rem;color:#666;line-height:1.75;margin:0;">A family recipe passed down through generations — not a corporate menu.</p>
      </div>

      <div style="text-align:center;">
        <div class="hp-trust-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="9"/><polyline points="12 7 12 12 15 15"/>
          </svg>
        </div>
        <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.12em;font-size:0.75rem;font-weight:600;color:#1a1a1a;margin:0 0 10px 0;">Fresh Daily</p>
        <p style="font-family:'Lato',sans-serif;font-size:0.84rem;color:#666;line-height:1.75;margin:0;">Ingredients prepared every morning. Nothing pre-packaged, nothing reheated.</p>
      </div>

      <div style="text-align:center;">
        <div class="hp-trust-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
          </svg>
        </div>
        <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.12em;font-size:0.75rem;font-weight:600;color:#1a1a1a;margin:0 0 10px 0;">Generous Portions</p>
        <p style="font-family:'Lato',sans-serif;font-size:0.84rem;color:#666;line-height:1.75;margin:0;">We feed people the way our grandmother fed her family — fully and without shortcuts.</p>
      </div>

      <div style="text-align:center;">
        <div class="hp-trust-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
          </svg>
        </div>
        <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.12em;font-size:0.75rem;font-weight:600;color:#1a1a1a;margin:0 0 10px 0;">Family-Owned</p>
        <p style="font-family:'Lato',sans-serif;font-size:0.84rem;color:#666;line-height:1.75;margin:0;">Two brothers. One kitchen. Real people behind every plate.</p>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
  4.6 — OUR STORY
═══════════════════════════════════════════════ -->
<section class="hp-story">

  <div class="hp-story-img">
    <img src="/wp-content/uploads/2026/05/Los-Potrillos-_Logos_page-0001-scaled-e1777837318744.jpg" alt="Los Potrillos family — brothers at the restaurant storefront in Port Richmond, Philadelphia">
  </div>

  <div class="hp-story-text">
    <p class="hp-eyebrow">Our Story</p>

    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.7rem,3vw,2.3rem);font-weight:800;color:#1a1a1a;line-height:1.2;margin:0 0 24px 0;letter-spacing:-0.01em;">
      Two Brothers. One Recipe from Puebla.<br>
      <em style="font-style:italic;color:#C0392B;">One Kitchen in Port Richmond.</em>
    </h2>

    <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:#555;line-height:1.9;margin:0 0 16px 0;">
      Los Potrillos was started by two brothers who grew up cooking in their family's kitchen in Puebla, Mexico. The recipes — including the birria that put us on the map — came from their mother and her mother before her.
    </p>

    <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:#555;line-height:1.9;margin:0 0 16px 0;">
      They opened the doors at 2617 E Venango Street in Port Richmond. Today, families across Northeast Philadelphia know where to come when they want food that tastes like home.
    </p>

    <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:#555;line-height:1.9;margin:0 0 28px 0;">
      We are not a chain. We are not a concept. We are a family-run kitchen serving the food we grew up eating — and we are proud to share it with you.
    </p>

    <a href="/our-story"
      style="font-family:'Lato',sans-serif;font-size:0.85rem;color:#C0392B;text-decoration:none;font-weight:700;border-bottom:2px solid #C0392B;padding-bottom:2px;transition:opacity 0.2s;display:inline-block;"
      onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
      Read the full story →
    </a>
  </div>

</section>


<!-- ═══════════════════════════════════════════════
  4.7 — CATERING SECTION
═══════════════════════════════════════════════ -->
<section id="catering" style="background:#faf7f3;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">
    <div class="hp-catering">

      <div>
        <p class="hp-eyebrow">Catering — For Events That Matter</p>

        <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.7rem,3vw,2.3rem);font-weight:800;color:#1a1a1a;line-height:1.2;margin:0 0 18px 0;letter-spacing:-0.01em;">
          Bring Los Potrillos to Your Quinceañera, Wedding, or Corporate Event
        </h2>

        <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:#555;line-height:1.85;margin:0 0 32px 0;">
          Custom menus. Generous portions. On-time delivery. We handle catering for events of any size across Philadelphia and the surrounding counties.
        </p>

        <div style="display:flex;flex-direction:column;gap:12px;">
          <div style="background:#fff;border:1px solid #e8e2d8;border-left:3px solid #C0392B;padding:16px 20px;">
            <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.09em;font-size:0.72rem;font-weight:600;color:#1a1a1a;margin:0 0 4px 0;">Family Celebrations</p>
            <p style="font-family:'Lato',sans-serif;font-size:0.78rem;color:#888;margin:0;">Quinceañeras · Weddings · Birthdays · Baptisms</p>
          </div>
          <div style="background:#fff;border:1px solid #e8e2d8;border-left:3px solid #C0392B;padding:16px 20px;">
            <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.09em;font-size:0.72rem;font-weight:600;color:#1a1a1a;margin:0 0 4px 0;">Corporate Events</p>
            <p style="font-family:'Lato',sans-serif;font-size:0.78rem;color:#888;margin:0;">Office Lunches · Team Gatherings · Holiday Parties</p>
          </div>
          <div style="background:#fff;border:1px solid #e8e2d8;border-left:3px solid #C0392B;padding:16px 20px;">
            <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.09em;font-size:0.72rem;font-weight:600;color:#1a1a1a;margin:0 0 4px 0;">Community Events</p>
            <p style="font-family:'Lato',sans-serif;font-size:0.78rem;color:#888;margin:0;">Church Gatherings · School Functions · Block Parties</p>
          </div>
        </div>
      </div>

      <!-- React catering form -->
      <div id="render-catering-form-here"></div>

    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
  4.8 — REVIEWS
═══════════════════════════════════════════════ -->
<section style="background:#fff;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">

    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;text-align:center;margin:0 0 20px 0;letter-spacing:-0.01em;">
      Loved by Families Across Philadelphia
    </h2>

    <div style="display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:10px 24px;margin-bottom:44px;">
      <span style="color:#e6a817;font-size:1rem;font-weight:700;">★ 4.7 / 5</span>
      <span style="font-family:'Lato',sans-serif;color:#666;font-size:0.78rem;">Google Rating</span>
      <span style="color:#ddd;">|</span>
      <span style="font-family:'Lato',sans-serif;color:#666;font-size:0.78rem;">291+ Verified Reviews</span>
      <span style="color:#ddd;">|</span>
      <span style="font-family:'Lato',sans-serif;color:#666;font-size:0.78rem;">Family-Owned</span>
    </div>

    <div class="hp-reviews-scroll">
      <?php
      $reviews = [
        ['name' => 'Maria G.',    'text' => 'The birria tacos are absolutely incredible. I\'ve tried birria in so many places across Philly and nothing comes close. The consomé is rich and the meat just falls apart. This is the real deal.'],
        ['name' => 'Carlos R.',   'text' => 'We had Los Potrillos cater our daughter\'s quinceañera and it was a huge hit. The food arrived on time, portions were incredibly generous, and everyone kept asking who the caterer was.'],
        ['name' => 'Jennifer T.', 'text' => 'Best Mexican food in Port Richmond, hands down. The family behind this place truly puts love into every dish. The tortillas taste homemade and the salsa is fire.'],
        ['name' => 'David M.',    'text' => 'Ordered pickup for the first time — the app was easy, food was ready in 15 minutes, and still hot and fresh. Will definitely be back. The quesabirria is a must.'],
        ['name' => 'Sofia L.',    'text' => 'I grew up eating my grandmother\'s cooking in Mexico and this is the closest thing I\'ve found in Philadelphia. You can taste the care that goes into every plate.'],
        ['name' => 'Marcus W.',   'text' => 'Stumbled upon this place on a Saturday and it changed my lunch game forever. The portions are huge, the price is fair, and the flavor is unreal. Going back this weekend.'],
      ];
      foreach ($reviews as $r) : ?>
        <div class="hp-review-card" style="background:#f9f9f9;border:1px solid #ebebeb;padding:24px;">
          <div style="color:#e6a817;font-size:0.82rem;letter-spacing:0.05em;margin-bottom:14px;">★★★★★</div>
          <p style="font-family:'Playfair Display',serif;font-style:italic;font-size:0.88rem;color:#333;line-height:1.75;margin:0 0 18px 0;
            display:-webkit-box;-webkit-line-clamp:4;-webkit-box-orient:vertical;overflow:hidden;">
            "<?php echo esc_html($r['text']); ?>"
          </p>
          <div style="display:flex;align-items:center;justify-content:space-between;gap:8px;">
            <span style="font-family:'Lato',sans-serif;font-weight:700;font-size:0.77rem;color:#1a1a1a;"><?php echo esc_html($r['name']); ?></span>
            <div style="display:flex;align-items:center;gap:4px;">
              <svg width="11" height="11" viewBox="0 0 24 24">
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
              </svg>
              <span style="font-family:'Lato',sans-serif;font-size:0.63rem;color:#999;">Posted on Google</span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align:center;margin-top:32px;">
      <a href="https://g.page/r/los-potrillos-reviews" target="_blank" rel="noopener"
        style="font-family:'Lato',sans-serif;font-size:0.82rem;color:#C0392B;text-decoration:none;font-weight:700;border-bottom:2px solid #C0392B;padding-bottom:2px;">
        Read all 291+ reviews on Google →
      </a>
    </div>

  </div>
</section>


<!-- ═══════════════════════════════════════════════
  4.9 — VISIT US
═══════════════════════════════════════════════ -->
<section style="background:#f7f4f0;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">

    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;text-align:center;margin:0 0 52px 0;letter-spacing:-0.01em;">
      Find Us in Port Richmond
    </h2>

    <div class="hp-visit-grid">

      <div style="border-radius:4px;overflow:hidden;box-shadow:0 2px 20px rgba(0,0,0,0.08);">
        <!-- Replace with your actual Google Maps embed URL: Maps → Share → Embed a map -->
        <iframe
          src="https://maps.google.com/maps?q=2617+E+Venango+St+Philadelphia+PA+19134&output=embed"
          width="100%" height="440" style="border:0;display:block;"
          allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          title="Los Potrillos Restaurant — 2617 E Venango St, Philadelphia PA">
        </iframe>
      </div>

      <div itemscope itemtype="https://schema.org/Restaurant">
        <meta itemprop="name" content="Los Potrillos Restaurant">
        <meta itemprop="servesCuisine" content="Mexican">

        <p class="hp-eyebrow">Visit the Restaurant</p>

        <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress" style="margin-bottom:24px;">
          <a href="https://maps.google.com/?q=2617+E+Venango+St+Philadelphia+PA+19134"
            target="_blank" rel="noopener"
            style="font-family:'Lato',sans-serif;font-size:1.05rem;color:#1a1a1a;text-decoration:none;font-weight:700;line-height:1.7;display:block;">
            <span itemprop="streetAddress">2617 E Venango St</span><br>
            <span itemprop="addressLocality">Philadelphia</span>,
            <span itemprop="addressRegion">PA</span>
            <span itemprop="postalCode">19134</span>
          </a>
        </div>

        <div style="margin-bottom:22px;">
          <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.1em;font-size:0.67rem;font-weight:600;color:#888;margin:0 0 8px 0;">Hours</p>
          <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:#444;line-height:1.85;margin:0;"
            itemprop="openingHours" content="Mo-Sa 10:00-21:00">
            Monday – Saturday: 10am – 9pm<br>
            <span style="color:#aaa;">Sunday: Closed</span>
          </p>
        </div>

        <div style="margin-bottom:32px;">
          <a href="tel:+12673232669" itemprop="telephone"
            style="font-family:'Lato',sans-serif;font-size:0.95rem;color:#1a1a1a;text-decoration:none;font-weight:700;display:flex;align-items:center;gap:7px;margin-bottom:8px;">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="#C0392B">
              <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
            </svg>
            (267) 323-2669
          </a>
          <a href="mailto:info@restaurantpotrillos.com"
            style="font-family:'Lato',sans-serif;font-size:0.82rem;color:#888;text-decoration:none;display:block;">
            info@restaurantpotrillos.com
          </a>
        </div>

        <div style="display:flex;flex-wrap:wrap;gap:12px;">
          <a href="https://maps.google.com/?q=2617+E+Venango+St+Philadelphia+PA+19134"
            target="_blank" rel="noopener" class="hp-btn-primary">
            Get Directions →
          </a>
          <a href="tel:+12673232669" class="hp-btn-secondary">Call Us</a>
        </div>

      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
  4.10 — FAQs
═══════════════════════════════════════════════ -->
<section style="background:#fff;padding:80px 24px;">
  <div style="max-width:760px;margin:0 auto;">

    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;text-align:center;margin:0 0 48px 0;letter-spacing:-0.01em;">
      Frequently Asked Questions
    </h2>

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
      foreach ($faqs as $i => $faq) : ?>
        <details <?php echo $i === 0 ? 'open' : ''; ?>>
          <summary>
            <?php echo esc_html($faq['q']); ?>
            <span class="faq-icon">+</span>
          </summary>
          <div class="faq-answer"><?php echo esc_html($faq['a']); ?></div>
        </details>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<?php get_footer(); ?>