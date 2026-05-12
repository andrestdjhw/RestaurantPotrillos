<?php
/*
 * Template Name: Our Story Template
 */

get_header(); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap');

.os-eyebrow {
  font-family: 'Oswald', sans-serif; text-transform: uppercase;
  letter-spacing: 0.18em; font-size: 0.62rem; font-weight: 600;
  color: #C0392B; margin: 0 0 14px 0;
}

/* ── HERO ───────────────────────────────────────── */
.os-hero {
  display: grid; grid-template-columns: 1fr 1fr; min-height: 88vh;
}
.os-hero-text {
  display: flex; flex-direction: column; justify-content: center;
  padding: 60px 56px 60px 5vw; background: #fff;
}
.os-hero-img { position: relative; overflow: hidden; }
.os-hero-img img { width: 100%; height: 100%; object-fit: cover; display: block; }

/* ── VALUES ─────────────────────────────────────── */
.os-values-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 0;
}
.os-value-item {
  padding: 52px 40px;
  border-right: 1px solid #ece8e2;
}
.os-value-item:last-child { border-right: none; }

/* ── TIMELINE ───────────────────────────────────── */
.os-timeline { position: relative; max-width: 700px; margin: 0 auto; }
.os-timeline::before {
  content: '';
  position: absolute; top: 0; bottom: 0; left: 20px;
  width: 2px; background: #ece8e2;
}
.os-timeline-item {
  display: flex; gap: 32px; margin-bottom: 48px; position: relative;
}
.os-timeline-dot {
  width: 42px; height: 42px; border-radius: 50%;
  background: #fff; border: 2px solid #C0392B;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0; position: relative; z-index: 1;
  font-family: 'Oswald', sans-serif; font-size: 0.6rem;
  font-weight: 700; color: #C0392B; letter-spacing: 0.05em;
}

/* ── SPLIT — PHOTO + COPY ───────────────────────── */
.os-split {
  display: grid; grid-template-columns: 1fr 1fr; min-height: 560px;
}
.os-split-img { overflow: hidden; }
.os-split-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.os-split-text {
  display: flex; flex-direction: column; justify-content: center;
  padding: 64px 56px;
}

/* ── RESPONSIVE ─────────────────────────────────── */
@media (max-width: 960px) {
  .os-hero { grid-template-columns: 1fr; min-height: auto; }
  .os-hero-img { height: 340px; order: -1; }
  .os-hero-text { padding: 36px 24px 48px; }
  .os-values-grid { grid-template-columns: 1fr; }
  .os-value-item { border-right: none; border-bottom: 1px solid #ece8e2; padding: 36px 24px; }
  .os-value-item:last-child { border-bottom: none; }
  .os-split { grid-template-columns: 1fr; min-height: auto; }
  .os-split-img { height: 300px; }
  .os-split-text { padding: 40px 24px; }
}
</style>


<!-- ═══════════════════════════════════════════════
  HERO
═══════════════════════════════════════════════ -->
<section class="os-hero">

  <div class="os-hero-text">
    <p class="os-eyebrow">Our Story</p>

    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(2.2rem,4.2vw,3.3rem);font-weight:800;line-height:1.15;color:#1a1a1a;margin:0 0 24px 0;letter-spacing:-0.01em;">
      Two Brothers.<br>
      One Recipe from Puebla.<br>
      <em style="color:#C0392B;font-style:italic;">One Kitchen in Port Richmond.</em>
    </h1>

    <p style="font-family:'Lato',sans-serif;font-size:0.95rem;color:#555;line-height:1.9;margin:0 0 16px 0;max-width:460px;">
      Los Potrillos was started by two brothers who grew up cooking in their family's kitchen in Puebla, Mexico. The recipes — including the birria that put us on the map — came from their mother and her mother before her.
    </p>

    <p style="font-family:'Lato',sans-serif;font-size:0.95rem;color:#555;line-height:1.9;margin:0 0 16px 0;max-width:460px;">
      They opened the doors at 2617 E Venango Street in Port Richmond. Today, families across Northeast Philadelphia know where to come when they want food that tastes like home.
    </p>

    <p style="font-family:'Lato',sans-serif;font-size:0.95rem;color:#555;line-height:1.9;margin:0;max-width:460px;">
      We are not a chain. We are not a concept. We are a family-run kitchen serving the food we grew up eating — and we are proud to share it with you.
    </p>
  </div>

  <div class="os-hero-img">
    <img src="/wp-content/uploads/2026/05/PotrillosFamilyAtRestaurant.jpg">
  </div>

</section>


<!-- ═══════════════════════════════════════════════
  PULL QUOTE
═══════════════════════════════════════════════ -->
<div style="background:#1a0800;padding:64px 24px;text-align:center;">
  <div style="max-width:680px;margin:0 auto;">
    <blockquote style="margin:0;">
      <p style="font-family:'Playfair Display',serif;font-style:italic;font-size:clamp(1.3rem,2.8vw,1.75rem);color:#fff;line-height:1.65;margin:0 0 20px 0;">
        "We are not a chain. We are not a concept. We are a family-run kitchen serving the food we grew up eating."
      </p>
      <cite style="font-family:'Lato',sans-serif;font-size:0.72rem;color:rgba(255,255,255,0.4);font-style:normal;text-transform:uppercase;letter-spacing:0.1em;">
        — The Founders, Los Potrillos
      </cite>
    </blockquote>
  </div>
</div>


<!-- ═══════════════════════════════════════════════
  CORE VALUES
═══════════════════════════════════════════════ -->
<section style="background:#f7f4f0;padding:0;">
  <div style="max-width:1180px;margin:0 auto;">
    <div class="os-values-grid">

      <div class="os-value-item">
        <div style="width:40px;height:40px;color:#C0392B;margin-bottom:20px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22s-8-5-8-11a8 8 0 0 1 16 0c0 6-8 11-8 11z"/><circle cx="12" cy="11" r="2.5"/>
          </svg>
        </div>
        <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.12em;font-size:0.72rem;font-weight:600;color:#1a1a1a;margin:0 0 12px 0;">Rooted in Puebla</p>
        <p style="font-family:'Lato',sans-serif;font-size:0.87rem;color:#666;line-height:1.8;margin:0;">
          Every dish we serve traces back to a kitchen in Puebla. The recipes are not adapted or simplified for American tastes — they are made the way they have always been made.
        </p>
      </div>

      <div class="os-value-item">
        <div style="width:40px;height:40px;color:#C0392B;margin-bottom:20px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
          </svg>
        </div>
        <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.12em;font-size:0.72rem;font-weight:600;color:#1a1a1a;margin:0 0 12px 0;">Family First</p>
        <p style="font-family:'Lato',sans-serif;font-size:0.87rem;color:#666;line-height:1.8;margin:0;">
          Two brothers run this kitchen. Every hire, every decision, every plate that leaves the pass is a reflection of who we are as a family — not a corporation.
        </p>
      </div>

      <div class="os-value-item">
        <div style="width:40px;height:40px;color:#C0392B;margin-bottom:20px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="9"/><polyline points="12 7 12 12 15 15"/>
          </svg>
        </div>
        <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.12em;font-size:0.72rem;font-weight:600;color:#1a1a1a;margin:0 0 12px 0;">Made With Time</p>
        <p style="font-family:'Lato',sans-serif;font-size:0.87rem;color:#666;line-height:1.8;margin:0;">
          Our birria braises for 12 hours. We start before sunrise. Good food cannot be rushed, and we refuse to cut corners — ever.
        </p>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
  TIMELINE — THE JOURNEY
═══════════════════════════════════════════════ -->
<section style="background:#fff;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">

    <div style="text-align:center;margin-bottom:60px;">
      <p class="os-eyebrow" style="display:flex;justify-content:center;">The Journey</p>
      <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;margin:0;letter-spacing:-0.01em;line-height:1.2;">
        From Puebla to Port Richmond
      </h2>
    </div>

    <div class="os-timeline">
      <?php
      $timeline = [
        ['year' => 'Puebla', 'title' => 'Where It All Started',
         'desc' => 'Two brothers grow up in a family kitchen in Puebla, Mexico. Their mother cooks birria, mole, and tamales the way her mother taught her. They learn not from recipes written down, but from standing next to her and watching.'],
        ['year' => 'Philly', 'title' => 'A New City, the Same Kitchen',
         'desc' => 'The brothers arrive in Philadelphia and settle in Port Richmond — a neighborhood with deep roots in immigrant family life. They bring the recipes with them. They bring the work ethic too.'],
        ['year' => 'Day 1',  'title' => 'Opening the Doors at 2617 E Venango',
         'desc' => 'Los Potrillos opens in Port Richmond. Word spreads fast. The birria sells out on the first weekend. Families from across Northeast Philadelphia start making the trip.'],
        ['year' => 'Today',  'title' => 'Philadelphia\'s Birria Destination',
         'desc' => 'With 291+ Google reviews, a loyal customer base, and a catering program serving events across the city, Los Potrillos has become the address families trust when they want food that tastes like home.'],
      ];
      foreach ($timeline as $item) : ?>
        <div class="os-timeline-item">
          <div class="os-timeline-dot"><?php echo esc_html($item['year']); ?></div>
          <div style="padding-top:8px;">
            <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.1em;font-size:0.72rem;font-weight:600;color:#1a1a1a;margin:0 0 8px 0;">
              <?php echo esc_html($item['title']); ?>
            </p>
            <p style="font-family:'Lato',sans-serif;font-size:0.88rem;color:#555;line-height:1.85;margin:0;">
              <?php echo esc_html($item['desc']); ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ═══════════════════════════════════════════════
  THE RECIPE — BIRRIA SECTION
═══════════════════════════════════════════════ -->
<section class="os-split">

  <div class="os-split-img">
    <img src="/wp-content/uploads/2026/05/TacosBirreaHero-scaled.png" alt="Los Potrillos birria — slow cooked 12 hours, family recipe from Puebla">
  </div>

  <div class="os-split-text" style="background:#f7f4f0;">
    <p class="os-eyebrow">The Recipe</p>

    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3vw,2.4rem);font-weight:800;color:#1a1a1a;line-height:1.2;margin:0 0 24px 0;letter-spacing:-0.01em;">
      The Birria That Started Everything
    </h2>

    <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:#555;line-height:1.95;margin:0 0 16px 0;">
      The birria recipe was not written down. It was passed from their mother's hands to theirs — in the way she added the chiles, the way she judged the braise by the smell, the way she knew when it was ready without checking a clock.
    </p>

    <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:#555;line-height:1.95;margin:0 0 32px 0;">
      Twelve hours. Real chiles. A consomé that takes all day to build. Tortillas dipped and crisped on the plancha. This is not a shortcut version of birria. This is the original.
    </p>

    <a href="https://los-potrillos-restaurant.cloveronline.com/" target="_blank" rel="noopener"
      style="display:inline-flex;align-items:center;gap:8px;font-family:'Oswald',sans-serif;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;font-size:0.8rem;padding:13px 24px;border-radius:3px;text-decoration:none;border:2px solid #C0392B;background:#C0392B;color:#fff;transition:background 0.2s,transform 0.15s;align-self:flex-start;"
      onmouseover="this.style.background='#a93226';this.style.transform='translateY(-2px)'"
      onmouseout="this.style.background='#C0392B';this.style.transform='translateY(0)'">
      Order the Birria →
    </a>
  </div>

</section>


<!-- ═══════════════════════════════════════════════
  TEAM PHOTO
═══════════════════════════════════════════════ -->
<section style="background:#fff;padding:80px 24px;">
  <div style="max-width:1180px;margin:0 auto;">

    <div style="text-align:center;margin-bottom:40px;">
      <p class="os-eyebrow" style="display:flex;justify-content:center;">The People</p>
      <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.5rem);font-weight:800;color:#1a1a1a;margin:0;letter-spacing:-0.01em;line-height:1.2;">
        The Family Behind Every Plate
      </h2>
    </div>

    <div style="position:relative;overflow:hidden;border-radius:4px;max-height:560px;">
      <img src="http://restaurantpotrillos.local/wp-content/uploads/2026/05/CookingStaff-scaled.jpg" alt="Los Potrillos team and family — Port Richmond Philadelphia"
        style="width:100%;height:100%;object-fit:cover;display:block;">
      <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.5) 0%,transparent 50%);"></div>
      <div style="position:absolute;bottom:0;left:0;right:0;padding:36px 40px;">
        <p style="font-family:'Playfair Display',serif;font-style:italic;font-size:clamp(1rem,2vw,1.3rem);color:#fff;margin:0;line-height:1.6;">
          "Family-owned. Family-run. Family-fed."
        </p>
      </div>
    </div>

  </div>
</section>


<!-- ═══════════════════════════════════════════════
  FINAL CTA
═══════════════════════════════════════════════ -->
<section style="background:#f7f4f0;padding:80px 24px;text-align:center;">
  <div style="max-width:600px;margin:0 auto;">

    <p class="os-eyebrow" style="display:flex;justify-content:center;">Come Visit Us</p>

    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.2vw,2.4rem);font-weight:800;color:#1a1a1a;margin:0 0 16px 0;letter-spacing:-0.01em;line-height:1.2;">
      Come Taste the Story for Yourself.
    </h2>

    <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:#666;line-height:1.8;margin:0 0 32px 0;">
      2617 E Venango St, Port Richmond, Philadelphia<br>
      Monday – Saturday: 10am – 9pm
    </p>

    <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:14px;">
      <a href="https://los-potrillos-restaurant.cloveronline.com/" target="_blank" rel="noopener"
        style="display:inline-flex;align-items:center;gap:8px;font-family:'Oswald',sans-serif;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;font-size:0.82rem;padding:14px 26px;border-radius:3px;text-decoration:none;border:2px solid #C0392B;background:#C0392B;color:#fff;transition:background 0.2s,transform 0.15s;"
        onmouseover="this.style.background='#a93226';this.style.transform='translateY(-2px)'"
        onmouseout="this.style.background='#C0392B';this.style.transform='translateY(0)'">
        Order Pickup Now →
      </a>
      <a href="/catering"
        style="display:inline-flex;align-items:center;gap:8px;font-family:'Oswald',sans-serif;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;font-size:0.82rem;padding:14px 26px;border-radius:3px;text-decoration:none;border:2px solid #1a1a1a;background:transparent;color:#1a1a1a;transition:background 0.2s,color 0.2s,transform 0.15s;"
        onmouseover="this.style.background='#1a1a1a';this.style.color='#fff';this.style.transform='translateY(-2px)'"
        onmouseout="this.style.background='transparent';this.style.color='#1a1a1a';this.style.transform='translateY(0)'">
        Catering Inquiries
      </a>
    </div>

  </div>
</section>


<?php get_footer(); ?>