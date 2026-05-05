<?php
/*
 * Template Name: Menu Template
 */

get_header(); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap');

.mn-eyebrow {
  font-family: 'Oswald', sans-serif; text-transform: uppercase;
  letter-spacing: 0.18em; font-size: 0.62rem; font-weight: 600;
  color: #C0392B; margin: 0 0 14px 0;
}

/* ── HERO ───────────────────────────────────────── */
.mn-hero {
  background: #1a0800;
  padding: 80px 24px 72px;
  text-align: center;
}

/* ── CATEGORY FILTERS ───────────────────────────── */
.mn-filters {
  display: flex; flex-wrap: wrap;
  justify-content: center; gap: 8px;
}
.mn-filter-btn {
  font-family: 'Oswald', sans-serif; text-transform: uppercase;
  letter-spacing: 0.1em; font-size: 0.68rem; font-weight: 600;
  padding: 9px 20px; border-radius: 2px; cursor: pointer;
  border: 2px solid #e8e2d8; background: transparent; color: #888;
  transition: all 0.2s;
}
.mn-filter-btn:hover  { border-color: #C0392B; color: #C0392B; }
.mn-filter-btn.active { border-color: #C0392B; background: #C0392B; color: #fff; }

/* ── CAROUSEL WRAPPER ───────────────────────────── */
.mn-carousel-section { padding: 56px 0 72px; background: #fff; }
.mn-carousel-outer {
  position: relative;
  overflow: hidden;
}
.mn-carousel-track {
  display: flex;
  gap: 20px;
  transition: transform 0.45s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  will-change: transform;
  padding: 8px 0 16px;
}

/* ── CARDS ──────────────────────────────────────── */
.mn-card {
  flex-shrink: 0;
  width: 280px;
  background: #fff;
  border: 1px solid #ece8e2;
  border-radius: 4px;
  overflow: hidden;
  transition: transform 0.28s ease, box-shadow 0.28s ease;
  cursor: pointer;
}
.mn-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 16px 40px rgba(0,0,0,0.12);
}
.mn-card-img {
  width: 100%; height: 200px; object-fit: cover; display: block;
  background: #f0ebe3;
}
.mn-card-body { padding: 18px 20px 22px; }
.mn-card-category {
  font-family: 'Oswald', sans-serif; text-transform: uppercase;
  letter-spacing: 0.14em; font-size: 0.58rem; font-weight: 600;
  color: #C0392B; margin: 0 0 6px 0;
}
.mn-card-name {
  font-family: 'Playfair Display', serif; font-size: 1.05rem;
  font-weight: 700; color: #1a1a1a; margin: 0 0 8px 0; line-height: 1.3;
}
.mn-card-desc {
  font-family: 'Lato', sans-serif; font-size: 0.78rem;
  color: #888; line-height: 1.65; margin: 0 0 14px 0;
}
.mn-card-price {
  font-family: 'Oswald', sans-serif; font-size: 1rem;
  font-weight: 700; color: #1a1a1a; letter-spacing: 0.02em;
}

/* ── ARROWS ─────────────────────────────────────── */
.mn-arrow {
  position: absolute; top: 50%; transform: translateY(-50%);
  width: 44px; height: 44px; border-radius: 50%;
  background: #fff; border: 1px solid #e8e2d8;
  display: flex; align-items: center; justify-content: center;
  cursor: pointer; z-index: 10;
  box-shadow: 0 2px 12px rgba(0,0,0,0.1);
  transition: background 0.2s, border-color 0.2s, transform 0.2s;
  color: #1a1a1a;
}
.mn-arrow:hover { background: #C0392B; border-color: #C0392B; color: #fff; transform: translateY(-50%) scale(1.05); }
.mn-arrow:disabled { opacity: 0.3; pointer-events: none; }
.mn-arrow-prev { left: 16px; }
.mn-arrow-next { right: 16px; }

/* ── DOTS ───────────────────────────────────────── */
.mn-dots {
  display: flex; justify-content: center; gap: 7px; margin-top: 28px;
}
.mn-dot {
  width: 7px; height: 7px; border-radius: 50%;
  background: #ddd; border: none; cursor: pointer;
  transition: background 0.2s, transform 0.2s; padding: 0;
}
.mn-dot.active { background: #C0392B; transform: scale(1.3); }

/* ── LIGHTBOX ───────────────────────────────────── */
.mn-lightbox {
  position: fixed; inset: 0; z-index: 9999;
  background: rgba(0,0,0,0.88);
  display: none; align-items: center; justify-content: center;
  padding: 24px;
  animation: mnFadeIn 0.2s ease;
}
.mn-lightbox.open { display: flex; }
@keyframes mnFadeIn { from { opacity: 0; } to { opacity: 1; } }
.mn-lightbox-inner {
  background: #fff; border-radius: 4px; overflow: hidden;
  max-width: 680px; width: 100%;
  display: grid; grid-template-columns: 1fr 1fr;
  position: relative;
}
.mn-lightbox-img { width: 100%; height: 100%; object-fit: cover; min-height: 320px; display: block; }
.mn-lightbox-body { padding: 36px 32px; display: flex; flex-direction: column; justify-content: center; }
.mn-lightbox-close {
  position: absolute; top: 12px; right: 12px;
  width: 32px; height: 32px; border-radius: 50%;
  background: rgba(0,0,0,0.5); border: none; cursor: pointer;
  color: #fff; display: flex; align-items: center; justify-content: center;
  transition: background 0.2s;
}
.mn-lightbox-close:hover { background: #C0392B; }

/* ── ORDER CTA ──────────────────────────────────── */
.mn-order-bar {
  background: #C0392B; padding: 52px 24px; text-align: center;
}

/* ── RESPONSIVE ─────────────────────────────────── */
@media (max-width: 768px) {
  .mn-card { width: 240px; }
  .mn-card-img { height: 170px; }
  .mn-lightbox-inner { grid-template-columns: 1fr; }
  .mn-lightbox-img { min-height: 220px; }
  .mn-arrow-prev { left: 6px; }
  .mn-arrow-next { right: 6px; }
}
</style>


<!-- ═══════════════════════════════════════════════
  HERO
═══════════════════════════════════════════════ -->
<section class="mn-hero">
  <div style="max-width:600px;margin:0 auto;">
    <p class="mn-eyebrow" style="color:rgba(212,160,23,0.85);display:flex;justify-content:center;">Our Menu</p>
    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#fff;margin:0 0 16px 0;letter-spacing:-0.01em;line-height:1.2;">
      Made Fresh.<br>
      <em style="color:#e8c07a;font-style:italic;">Every Single Day.</em>
    </h1>
    <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:rgba(255,255,255,0.6);line-height:1.85;margin:0;">
      Everything on our menu is prepared in-house every morning. No frozen food. No shortcuts. Just the real thing.
    </p>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
  FILTERS + CAROUSEL
═══════════════════════════════════════════════ -->
<section class="mn-carousel-section">
  <div style="max-width:1280px;margin:0 auto;padding:0 60px;">

    <!-- Category filter tabs -->
    <div style="margin-bottom:44px;">
      <div class="mn-filters" id="mn-filters">
        <button class="mn-filter-btn active" data-cat="all">All</button>
        <button class="mn-filter-btn" data-cat="birria">Birria</button>
        <button class="mn-filter-btn" data-cat="tacos">Tacos</button>
        <button class="mn-filter-btn" data-cat="quesadillas">Quesadillas</button>
        <button class="mn-filter-btn" data-cat="tortas">Tortas &amp; Burritos</button>
        <button class="mn-filter-btn" data-cat="sides">Sides</button>
        <button class="mn-filter-btn" data-cat="drinks">Drinks</button>
      </div>
    </div>

    <!-- Carousel -->
    <div class="mn-carousel-outer" id="mn-carousel-outer">
      <button class="mn-arrow mn-arrow-prev" id="mn-prev" aria-label="Previous">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <polyline points="15 18 9 12 15 6"/>
        </svg>
      </button>

      <div class="mn-carousel-track" id="mn-track">
        <?php
        /*
         * MENU ITEMS
         * To add or edit items: update the $menu_items array below.
         * 'cat'   → must match a data-cat value in the filter buttons above
         * 'img'   → URL from WordPress Media Library
         * 'price' → display string, e.g. '$14.99' or 'Market Price'
         * 'desc'  → short 1-line description shown on the card and lightbox
         */
        $menu_items = [
          /* ── BIRRIA ── */
          ['cat' => 'birria',      'name' => 'Quesabirria Tacos',       'desc' => 'Slow-cooked birria, Oaxacan cheese, consomé for dipping.',          'price' => '$16.99', 'img' => '/wp-content/uploads/2026/05/QuesaBirria-scaled.png'],
          ['cat' => 'birria',      'name' => 'Birria Ramen',            'desc' => 'Our birria broth, ramen noodles, egg, cilantro, onion.',             'price' => '$15.99', 'img' => '/wp-content/uploads/2026/05/BirriaRamen-scaled.jpg'],
          ['cat' => 'birria',      'name' => 'Birria Bowl',             'desc' => 'Rice, birria de res, consomé, fresh garnishes.',                     'price' => '$14.99', 'img' => '/wp-content/uploads/2026/05/BirriaRamen-scaled.png'],
          ['cat' => 'birria',      'name' => 'Consomé Cup',             'desc' => 'Pure birria broth with cilantro, onion, and lime.',                  'price' => '$4.99',  'img' => '/wp-content/uploads/2026/05/ConsomeCup-scaled.jpg'],
          /* ── TACOS ── */
          ['cat' => 'tacos',       'name' => 'Tacos de Pastor',         'desc' => 'Marinated pork, pineapple, cilantro, onion.',                       'price' => '$13.99', 'img' => ''],
          ['cat' => 'tacos',       'name' => 'Tacos de Carnitas',       'desc' => 'Slow-braised pork, pickled jalapeño, crema, cilantro.',              'price' => '$13.99', 'img' => ''],
          ['cat' => 'tacos',       'name' => 'Tacos de Barbacoa',       'desc' => 'Slow-cooked lamb, salsa verde, avocado.',                           'price' => '$14.99', 'img' => ''],
          ['cat' => 'tacos',       'name' => 'Tacos de Rajas',          'desc' => 'Roasted poblano strips, crema, Oaxacan cheese. Vegetarian.',         'price' => '$12.99', 'img' => ''],
          ['cat' => 'tacos',       'name' => 'Flautas Doradas',         'desc' => 'Crispy rolled tacos, chicken or potato, crema, salsa.',              'price' => '$12.99', 'img' => ''],
          /* ── QUESADILLAS ── */
          ['cat' => 'quesadillas', 'name' => 'Quesadilla de Birria',    'desc' => 'Hand-pressed quesadilla, birria filling, Oaxacan cheese.',           'price' => '$14.99', 'img' => ''],
          ['cat' => 'quesadillas', 'name' => 'Quesadilla de Pastor',    'desc' => 'Al pastor, mozzarella, caramelized onion, pineapple.',               'price' => '$13.99', 'img' => ''],
          ['cat' => 'quesadillas', 'name' => 'Quesadilla de Flor',      'desc' => 'Squash blossom, Oaxacan cheese, epazote. Vegetarian.',               'price' => '$13.99', 'img' => ''],
          /* ── TORTAS & BURRITOS ── */
          ['cat' => 'tortas',      'name' => 'Torta de Birria',         'desc' => 'Telera roll, slow-cooked birria, cheese, avocado, chipotle.',        'price' => '$14.99', 'img' => ''],
          ['cat' => 'tortas',      'name' => 'Torta de Carnitas',       'desc' => 'Braised pork, refried beans, jalapeño, crema, tomato.',              'price' => '$13.99', 'img' => ''],
          ['cat' => 'tortas',      'name' => 'Burrito de Pastor',       'desc' => 'Flour tortilla, al pastor, rice, beans, cheese, pico de gallo.',     'price' => '$14.99', 'img' => ''],
          ['cat' => 'tortas',      'name' => 'Burrito de Birria',       'desc' => 'Flour tortilla, birria, rice, beans, consomé on the side.',          'price' => '$15.99', 'img' => ''],
          /* ── SIDES ── */
          ['cat' => 'sides',       'name' => 'Arroz Rojo',              'desc' => 'Puebla-style red rice, tomato, garlic, cilantro.',                   'price' => '$4.99',  'img' => ''],
          ['cat' => 'sides',       'name' => 'Frijoles de la Olla',     'desc' => 'Slow-cooked black beans, epazote, fresh cream.',                     'price' => '$4.99',  'img' => ''],
          ['cat' => 'sides',       'name' => 'Guacamole & Chips',       'desc' => 'Fresh avocado, lime, cilantro, serrano, tomato.',                    'price' => '$8.99',  'img' => ''],
          ['cat' => 'sides',       'name' => 'Elotes Locos',            'desc' => 'Grilled corn, mayo, cotija cheese, chili powder, lime.',             'price' => '$6.99',  'img' => ''],
          /* ── DRINKS ── */
          ['cat' => 'drinks',      'name' => 'Agua de Jamaica',         'desc' => 'Hibiscus flower water, lightly sweetened.',                          'price' => '$3.99',  'img' => ''],
          ['cat' => 'drinks',      'name' => 'Horchata',                'desc' => 'Classic rice milk, cinnamon, vanilla.',                              'price' => '$3.99',  'img' => ''],
          ['cat' => 'drinks',      'name' => 'Agua de Tamarindo',       'desc' => 'Tamarind water with a hint of chili and lime.',                      'price' => '$3.99',  'img' => ''],
          ['cat' => 'drinks',      'name' => 'Jarritos',                'desc' => 'Mandarin, tamarind, or lime — your choice.',                         'price' => '$2.99',  'img' => ''],
        ];

        $cat_labels = [
          'birria'      => 'Birria',
          'tacos'       => 'Tacos',
          'quesadillas' => 'Quesadillas',
          'tortas'      => 'Tortas & Burritos',
          'sides'       => 'Sides',
          'drinks'      => 'Drinks',
        ];

        foreach ($menu_items as $item) :
          $cat_label = $cat_labels[$item['cat']] ?? ucfirst($item['cat']);
        ?>
          <div class="mn-card"
            data-cat="<?php echo esc_attr($item['cat']); ?>"
            data-name="<?php echo esc_attr($item['name']); ?>"
            data-desc="<?php echo esc_attr($item['desc']); ?>"
            data-price="<?php echo esc_attr($item['price']); ?>"
            data-img="<?php echo esc_attr($item['img']); ?>"
            data-catlabel="<?php echo esc_attr($cat_label); ?>"
            role="button" tabindex="0"
            aria-label="<?php echo esc_attr($item['name']); ?>">
            <img
              class="mn-card-img"
              src="<?php echo esc_attr($item['img']); ?>"
              alt="<?php echo esc_attr($item['name']); ?> — Los Potrillos"
              loading="lazy">
            <div class="mn-card-body">
              <p class="mn-card-category"><?php echo esc_html($cat_label); ?></p>
              <p class="mn-card-name"><?php echo esc_html($item['name']); ?></p>
              <p class="mn-card-desc"><?php echo esc_html($item['desc']); ?></p>
              <span class="mn-card-price"><?php echo esc_html($item['price']); ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <button class="mn-arrow mn-arrow-next" id="mn-next" aria-label="Next">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <polyline points="9 18 15 12 9 6"/>
        </svg>
      </button>
    </div>

    <!-- Dots -->
    <div class="mn-dots" id="mn-dots"></div>

    <!-- Visible count -->
    <p id="mn-count" style="font-family:'Lato',sans-serif;font-size:0.75rem;color:#bbb;text-align:center;margin-top:16px;"></p>

  </div>
</section>


<!-- ═══════════════════════════════════════════════
  LIGHTBOX
═══════════════════════════════════════════════ -->
<div class="mn-lightbox" id="mn-lightbox" role="dialog" aria-modal="true" aria-label="Dish detail">
  <div class="mn-lightbox-inner">
    <button class="mn-lightbox-close" id="mn-lightbox-close" aria-label="Close">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
      </svg>
    </button>
    <img class="mn-lightbox-img" id="mn-lb-img" src="" alt="">
    <div class="mn-lightbox-body">
      <p id="mn-lb-cat" style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.14em;font-size:0.6rem;font-weight:600;color:#C0392B;margin:0 0 8px 0;"></p>
      <h3 id="mn-lb-name" style="font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:800;color:#1a1a1a;margin:0 0 12px 0;line-height:1.2;"></h3>
      <p id="mn-lb-desc" style="font-family:'Lato',sans-serif;font-size:0.87rem;color:#666;line-height:1.75;margin:0 0 20px 0;"></p>
      <p id="mn-lb-price" style="font-family:'Oswald',sans-serif;font-size:1.3rem;font-weight:700;color:#1a1a1a;margin:0 0 24px 0;"></p>
      <a href="https://los-potrillos-restaurant.cloveronline.com/" target="_blank" rel="noopener"
        style="display:inline-flex;align-items:center;gap:8px;font-family:'Oswald',sans-serif;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;font-size:0.78rem;padding:12px 22px;border-radius:3px;text-decoration:none;border:2px solid #C0392B;background:#C0392B;color:#fff;transition:background 0.2s;"
        onmouseover="this.style.background='#a93226'" onmouseout="this.style.background='#C0392B'">
        Order Now →
      </a>
    </div>
  </div>
</div>


<!-- ═══════════════════════════════════════════════
  ORDER CTA BAR
═══════════════════════════════════════════════ -->
<!-- <div class="mn-order-bar">
  <div style="max-width:640px;margin:0 auto;">
    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.6rem,3.2vw,2.2rem);font-weight:800;color:#fff;margin:0 0 20px 0;line-height:1.2;letter-spacing:-0.01em;">
      Ready to Order?
    </h2>
    <p style="font-family:'Lato',sans-serif;font-size:0.88rem;color:rgba(255,255,255,0.75);margin:0 0 28px 0;line-height:1.75;">
      Order pickup online and have your food ready in 15 minutes. No third-party fees.
    </p>
    <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:14px;">
      <a href="https://los-potrillos-restaurant.cloveronline.com/" target="_blank" rel="noopener"
        style="display:inline-flex;align-items:center;gap:8px;font-family:'Oswald',sans-serif;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;font-size:0.82rem;padding:14px 28px;border-radius:3px;text-decoration:none;border:2px solid #fff;background:#fff;color:#C0392B;transition:background 0.2s,color 0.2s;"
        onmouseover="this.style.background='transparent';this.style.color='#fff'"
        onmouseout="this.style.background='#fff';this.style.color='#C0392B'">
        Order Pickup Now →
      </a>
      <a href="/catering"
        style="display:inline-flex;align-items:center;gap:8px;font-family:'Oswald',sans-serif;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;font-size:0.82rem;padding:14px 28px;border-radius:3px;text-decoration:none;border:2px solid rgba(255,255,255,0.5);background:transparent;color:#fff;transition:border-color 0.2s,background 0.2s;"
        onmouseover="this.style.borderColor='#fff';this.style.background='rgba(255,255,255,0.1)'"
        onmouseout="this.style.borderColor='rgba(255,255,255,0.5)';this.style.background='transparent'">
        Catering Inquiries
      </a>
    </div>
  </div>
</div> -->


<script>
(function () {

  /* ─── DATA ─────────────────────────────────────── */
  const track      = document.getElementById('mn-track')
  const allCards   = Array.from(track.querySelectorAll('.mn-card'))
  const prevBtn    = document.getElementById('mn-prev')
  const nextBtn    = document.getElementById('mn-next')
  const dotsWrap   = document.getElementById('mn-dots')
  const countEl    = document.getElementById('mn-count')
  const filters    = document.getElementById('mn-filters')
  const lightbox   = document.getElementById('mn-lightbox')
  const lbClose    = document.getElementById('mn-lightbox-close')

  let currentIndex  = 0
  let visibleCards  = []
  let cardWidth     = 0
  let visibleCount  = 4

  /* ─── CARD WIDTH ────────────────────────────────── */
  function getVisibleCount () {
    const w = window.innerWidth
    if (w < 480)  return 1
    if (w < 720)  return 2
    if (w < 1024) return 3
    return 4
  }

  function getGap () { return 20 }

  /* ─── FILTER ────────────────────────────────────── */
  function filterCards (cat) {
    visibleCards = cat === 'all'
      ? allCards
      : allCards.filter(c => c.dataset.cat === cat)

    // remove all cards from DOM, re-append only visible ones
    allCards.forEach(c => c.remove())
    visibleCards.forEach(c => track.appendChild(c))

    currentIndex = 0
    buildDots()
    render()
  }

  /* ─── BUILD DOTS ────────────────────────────────── */
  function buildDots () {
    dotsWrap.innerHTML = ''
    visibleCount = getVisibleCount()
    const total = Math.ceil(visibleCards.length / visibleCount)
    for (let i = 0; i < total; i++) {
      const dot = document.createElement('button')
      dot.className = 'mn-dot' + (i === 0 ? ' active' : '')
      dot.setAttribute('aria-label', 'Go to slide ' + (i + 1))
      dot.addEventListener('click', () => { currentIndex = i; render() })
      dotsWrap.appendChild(dot)
    }
  }

  /* ─── RENDER ────────────────────────────────────── */
  function render () {
    visibleCount = getVisibleCount()
    const gap    = getGap()

    // compute card width from outer container
    const outer  = document.getElementById('mn-carousel-outer')
    const outerW = outer.clientWidth - 80  // minus arrow space
    cardWidth    = (outerW - gap * (visibleCount - 1)) / visibleCount

    // clamp index
    const maxIndex = Math.max(0, Math.ceil(visibleCards.length / visibleCount) - 1)
    if (currentIndex > maxIndex) currentIndex = maxIndex

    const offset = currentIndex * (cardWidth * visibleCount + gap * visibleCount)
    track.style.transform = `translateX(-${offset}px)`

    // update dots
    dotsWrap.querySelectorAll('.mn-dot').forEach((d, i) => {
      d.classList.toggle('active', i === currentIndex)
    })

    // update arrows
    prevBtn.disabled = currentIndex === 0
    nextBtn.disabled = currentIndex >= maxIndex

    // count label
    const from = currentIndex * visibleCount + 1
    const to   = Math.min(from + visibleCount - 1, visibleCards.length)
    countEl.textContent = `Showing ${from}–${to} of ${visibleCards.length} items`
  }

  /* ─── ARROWS ────────────────────────────────────── */
  prevBtn.addEventListener('click', () => { if (currentIndex > 0) { currentIndex--; render() } })
  nextBtn.addEventListener('click', () => {
    const maxIndex = Math.ceil(visibleCards.length / visibleCount) - 1
    if (currentIndex < maxIndex) { currentIndex++; render() }
  })

  /* ─── KEYBOARD NAVIGATION ───────────────────────── */
  document.addEventListener('keydown', e => {
    if (e.key === 'ArrowLeft')  prevBtn.click()
    if (e.key === 'ArrowRight') nextBtn.click()
    if (e.key === 'Escape' && lightbox.classList.contains('open')) closeLightbox()
  })

  /* ─── TOUCH SWIPE ───────────────────────────────── */
  let touchStartX = 0
  track.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX }, { passive: true })
  track.addEventListener('touchend',   e => {
    const delta = touchStartX - e.changedTouches[0].clientX
    if (Math.abs(delta) > 40) {
      if (delta > 0) nextBtn.click()
      else           prevBtn.click()
    }
  })

  /* ─── FILTERS ───────────────────────────────────── */
  filters.addEventListener('click', e => {
    const btn = e.target.closest('.mn-filter-btn')
    if (!btn) return
    filters.querySelectorAll('.mn-filter-btn').forEach(b => b.classList.remove('active'))
    btn.classList.add('active')
    filterCards(btn.dataset.cat)
  })

  /* ─── LIGHTBOX ──────────────────────────────────── */
  function openLightbox (card) {
    document.getElementById('mn-lb-img').src         = card.dataset.img   || ''
    document.getElementById('mn-lb-img').alt         = card.dataset.name  || ''
    document.getElementById('mn-lb-cat').textContent = card.dataset.catlabel || ''
    document.getElementById('mn-lb-name').textContent= card.dataset.name  || ''
    document.getElementById('mn-lb-desc').textContent= card.dataset.desc  || ''
    document.getElementById('mn-lb-price').textContent= card.dataset.price || ''
    lightbox.classList.add('open')
    document.body.style.overflow = 'hidden'
  }
  function closeLightbox () {
    lightbox.classList.remove('open')
    document.body.style.overflow = ''
  }

  track.addEventListener('click', e => {
    const card = e.target.closest('.mn-card')
    if (card) openLightbox(card)
  })
  track.addEventListener('keydown', e => {
    if (e.key === 'Enter') {
      const card = e.target.closest('.mn-card')
      if (card) openLightbox(card)
    }
  })
  lbClose.addEventListener('click', closeLightbox)
  lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox() })

  /* ─── RESIZE ────────────────────────────────────── */
  let resizeTimer
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer)
    resizeTimer = setTimeout(() => { buildDots(); render() }, 120)
  })

  /* ─── INIT ──────────────────────────────────────── */
  filterCards('all')

})()
</script>


<?php get_footer(); ?>