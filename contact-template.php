<?php
/*
 * Template Name: Contact Template
 */

get_header(); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap');

.co-eyebrow {
  font-family: 'Oswald', sans-serif; text-transform: uppercase;
  letter-spacing: 0.18em; font-size: 0.62rem; font-weight: 600;
  color: #C0392B; margin: 0 0 14px 0;
}

/* ── HERO ───────────────────────────────────────── */
.co-hero {
  background: #f7f4f0;
  padding: 80px 24px 72px;
  text-align: center;
  border-bottom: 1px solid #ece8e2;
}

/* ── MAIN GRID ──────────────────────────────────── */
.co-main {
  display: grid;
  grid-template-columns: 1fr 1.1fr;
  gap: 64px;
  align-items: start;
  max-width: 1180px;
  margin: 0 auto;
  padding: 80px 24px;
}

/* ── CONTACT CARDS ──────────────────────────────── */
.co-card {
  display: flex; align-items: flex-start; gap: 18px;
  padding: 24px; background: #fff;
  border: 1px solid #e8e2d8;
  border-radius: 3px;
  text-decoration: none;
  transition: border-color 0.2s, box-shadow 0.2s;
}
.co-card:hover {
  border-color: #C0392B;
  box-shadow: 0 4px 20px rgba(192,57,43,0.08);
}
.co-card-icon {
  width: 44px; height: 44px; border-radius: 50%;
  background: #fdf0ee; flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
}

/* ── FORM ───────────────────────────────────────── */
.co-form-card {
  background: #fff;
  border: 1px solid #e8e2d8;
  border-radius: 4px;
  padding: 40px 36px;
  box-shadow: 0 4px 24px rgba(0,0,0,0.06);
}
.co-label {
  display: block;
  font-family: 'Oswald', sans-serif;
  text-transform: uppercase; letter-spacing: 0.09em;
  font-size: 0.65rem; font-weight: 600; color: #444;
  margin-bottom: 6px;
}
.co-input {
  width: 100%; padding: 10px 13px;
  font-family: 'Lato', sans-serif; font-size: 0.87rem; color: #1a1a1a;
  background: #fdfcfb; border: 1px solid #ddd; border-radius: 3px;
  outline: none; box-sizing: border-box;
  transition: border-color 0.2s;
}
.co-input:focus { border-color: #C0392B; }
.co-input.error { border-color: #C0392B; background: #fff8f7; }
.co-err { font-family: 'Lato', sans-serif; font-size: 0.72rem; color: #C0392B; margin-top: 4px; display: none; }
.co-err.visible { display: block; }
.co-field { margin-bottom: 16px; }

/* ── MAP ────────────────────────────────────────── */
.co-map-section {
  background: #fff;
  padding: 0 0 80px;
}

/* ── HOURS TABLE ────────────────────────────────── */
.co-hours tr td:first-child {
  font-family: 'Oswald', sans-serif; font-size: 0.75rem;
  font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em;
  color: #888; padding: 8px 20px 8px 0; white-space: nowrap;
}
.co-hours tr td:last-child {
  font-family: 'Lato', sans-serif; font-size: 0.87rem; color: #333;
}

/* ── RESPONSIVE ─────────────────────────────────── */
@media (max-width: 900px) {
  .co-main { grid-template-columns: 1fr; gap: 40px; padding: 52px 24px; }
  .co-form-card { padding: 28px 22px; }
}
@media (max-width: 600px) {
  .co-hero { padding: 56px 24px 48px; }
  .co-two-col { grid-template-columns: 1fr !important; }
}
</style>


<!-- ═══════════════════════════════════════════════
  HERO
═══════════════════════════════════════════════ -->
<section class="co-hero">
  <div style="max-width:640px;margin:0 auto;">
    <p class="co-eyebrow" style="display:flex;justify-content:center;">Contact Us</p>
    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#1a1a1a;margin:0 0 16px 0;letter-spacing:-0.01em;line-height:1.2;">
      We're Here to Help.<br>
      <em style="color:#C0392B;font-style:italic;">Let's Talk.</em>
    </h1>
    <p style="font-family:'Lato',sans-serif;font-size:0.95rem;color:#666;line-height:1.85;margin:0;">
      Whether you have a question about our menu, want to book catering, or just want to say hello — we'd love to hear from you.
    </p>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
  MAIN — INFO LEFT + FORM RIGHT
═══════════════════════════════════════════════ -->
<div class="co-main">

  <!-- ── LEFT: Contact info ── -->
  <div>
    <p class="co-eyebrow">Get in Touch</p>
    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.6rem,2.8vw,2.1rem);font-weight:800;color:#1a1a1a;margin:0 0 10px 0;letter-spacing:-0.01em;line-height:1.2;">
      Reach Us Any Way You Like
    </h2>
    <p style="font-family:'Lato',sans-serif;font-size:0.88rem;color:#666;line-height:1.8;margin:0 0 32px 0;">
      We respond to all messages within 24 hours. For catering inquiries, calling or WhatsApp is the fastest way to get a response.
    </p>

    <!-- Contact cards -->
    <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:40px;">

      <a href="tel:+12673232669" class="co-card">
        <div class="co-card-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="#C0392B">
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
          </svg>
        </div>
        <div>
          <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.09em;font-size:0.62rem;font-weight:600;color:#888;margin:0 0 3px 0;">Call Us</p>
          <p style="font-family:'Lato',sans-serif;font-size:0.95rem;font-weight:700;color:#1a1a1a;margin:0 0 2px 0;">(267) 323-2669</p>
          <p style="font-family:'Lato',sans-serif;font-size:0.75rem;color:#aaa;margin:0;">Mon – Sat, 10am – 9pm</p>
        </div>
      </a>

      <a href="https://wa.me/12673232669" target="_blank" rel="noopener" class="co-card">
        <div class="co-card-icon" style="background:#f0fdf4;">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="#25D366">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
          </svg>
        </div>
        <div>
          <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.09em;font-size:0.62rem;font-weight:600;color:#888;margin:0 0 3px 0;">WhatsApp</p>
          <p style="font-family:'Lato',sans-serif;font-size:0.95rem;font-weight:700;color:#1a1a1a;margin:0 0 2px 0;">(267) 323-2669</p>
          <p style="font-family:'Lato',sans-serif;font-size:0.75rem;color:#aaa;margin:0;">Fastest way to reach us</p>
        </div>
      </a>

      <a href="mailto:info@restaurantpotrillos.com" class="co-card">
        <div class="co-card-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#C0392B" stroke-width="1.8" stroke-linecap="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
          </svg>
        </div>
        <div>
          <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.09em;font-size:0.62rem;font-weight:600;color:#888;margin:0 0 3px 0;">Email</p>
          <p style="font-family:'Lato',sans-serif;font-size:0.95rem;font-weight:700;color:#1a1a1a;margin:0 0 2px 0;">info@restaurantpotrillos.com</p>
          <p style="font-family:'Lato',sans-serif;font-size:0.75rem;color:#aaa;margin:0;">We reply within 24 hours</p>
        </div>
      </a>

      <a href="https://maps.google.com/?q=2617+E+Venango+St+Philadelphia+PA+19134" target="_blank" rel="noopener" class="co-card">
        <div class="co-card-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="#C0392B">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
          </svg>
        </div>
        <div>
          <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.09em;font-size:0.62rem;font-weight:600;color:#888;margin:0 0 3px 0;">Visit Us</p>
          <p style="font-family:'Lato',sans-serif;font-size:0.95rem;font-weight:700;color:#1a1a1a;margin:0 0 2px 0;">2617 E Venango St, Philadelphia, PA 19134</p>
          <p style="font-family:'Lato',sans-serif;font-size:0.75rem;color:#aaa;margin:0;">Port Richmond · Easy street parking</p>
        </div>
      </a>

    </div>

    <!-- Hours -->
    <p class="co-eyebrow">Hours</p>
    <table class="co-hours" style="border-collapse:collapse;width:100%;">
      <tr><td>Monday – Saturday</td><td>10:00 am – 9:00 pm</td></tr>
      <tr><td>Sunday</td><td style="color:#aaa;">Closed</td></tr>
    </table>

    <!-- Social -->
    <div style="margin-top:32px;">
      <p class="co-eyebrow">Follow Us</p>
      <div style="display:flex;gap:12px;">

        <a href="https://www.instagram.com/potrillosrestaurantphilly/" target="_blank" rel="noopener" aria-label="Instagram"
          style="width:40px;height:40px;border-radius:6px;border:1px solid #e8e2d8;display:flex;align-items:center;justify-content:center;color:#888;transition:color 0.2s,border-color 0.2s;"
          onmouseover="this.style.color='#C0392B';this.style.borderColor='#C0392B'"
          onmouseout="this.style.color='#888';this.style.borderColor='#e8e2d8'">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
          </svg>
        </a>

        <a href="https://www.facebook.com/lospotrillosrestaurantphilly" target="_blank" rel="noopener" aria-label="Facebook"
          style="width:40px;height:40px;border-radius:6px;border:1px solid #e8e2d8;display:flex;align-items:center;justify-content:center;color:#888;transition:color 0.2s,border-color 0.2s;"
          onmouseover="this.style.color='#C0392B';this.style.borderColor='#C0392B'"
          onmouseout="this.style.color='#888';this.style.borderColor='#e8e2d8'">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
          </svg>
        </a>

        <a href="https://www.tiktok.com/@lospotrillosrestaurant" target="_blank" rel="noopener" aria-label="TikTok"
          style="width:40px;height:40px;border-radius:6px;border:1px solid #e8e2d8;display:flex;align-items:center;justify-content:center;color:#888;transition:color 0.2s,border-color 0.2s;"
          onmouseover="this.style.color='#C0392B';this.style.borderColor='#C0392B'"
          onmouseout="this.style.color='#888';this.style.borderColor='#e8e2d8'">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
          </svg>
        </a>

      </div>
    </div>
  </div>

  <!-- ── RIGHT: Contact form ── -->
  <div class="co-form-card">
    <h3 style="font-family:'Playfair Display',serif;font-size:1.4rem;font-weight:800;color:#1a1a1a;margin:0 0 6px 0;letter-spacing:-0.01em;">
      Send Us a Message
    </h3>
    <p style="font-family:'Lato',sans-serif;font-size:0.8rem;color:#aaa;margin:0 0 28px 0;">
      We'll get back to you within 24 hours.
    </p>

    <!-- Honeypot -->
    <div style="display:none;" aria-hidden="true">
      <input type="text" id="co-honeypot" name="honeypot" tabindex="-1" autocomplete="off">
    </div>

    <div id="co-form-wrap">

      <div class="co-field">
        <label class="co-label" for="co-name">Full Name *</label>
        <input class="co-input" type="text" id="co-name" placeholder="Maria González">
        <span class="co-err" id="co-name-err">Please enter your name.</span>
      </div>

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
        <div class="co-field">
          <label class="co-label" for="co-email">Email *</label>
          <input class="co-input" type="email" id="co-email" placeholder="you@email.com">
          <span class="co-err" id="co-email-err">Enter a valid email.</span>
        </div>
        <div class="co-field">
          <label class="co-label" for="co-phone">Phone</label>
          <input class="co-input" type="tel" id="co-phone" placeholder="(267) 000-0000">
        </div>
      </div>

      <div class="co-field">
        <label class="co-label" for="co-subject">Subject *</label>
        <select class="co-input" id="co-subject" style="cursor:pointer;">
          <option value="">Select a topic…</option>
          <option>General Question</option>
          <option>Catering Inquiry</option>
          <option>Menu Information</option>
          <option>Feedback</option>
          <option>Other</option>
        </select>
        <span class="co-err" id="co-subject-err">Please select a subject.</span>
      </div>

      <div class="co-field">
        <label class="co-label" for="co-message">Message *</label>
        <textarea class="co-input" id="co-message" rows="5"
          placeholder="How can we help you?" style="resize:vertical;line-height:1.65;"></textarea>
        <span class="co-err" id="co-message-err">Please enter your message.</span>
      </div>

      <div id="co-api-error" style="display:none;background:#fdf0f0;border:1px solid #f5c6c6;border-radius:3px;padding:10px 14px;font-family:'Lato',sans-serif;font-size:0.8rem;color:#C0392B;margin-bottom:14px;"></div>

      <button id="co-submit"
        style="width:100%;font-family:'Oswald',sans-serif;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;font-size:0.8rem;padding:14px 20px;border-radius:3px;border:2px solid #C0392B;background:#C0392B;color:#fff;cursor:pointer;transition:background 0.2s;">
        Send Message →
      </button>

      <p style="font-family:'Lato',sans-serif;font-size:0.72rem;color:#aaa;text-align:center;margin:12px 0 0 0;">
        We respond within 24 hours. No spam, ever.
      </p>
    </div>

    <!-- Success state -->
    <div id="co-success" style="display:none;text-align:center;padding:24px 0;">
      <div style="width:56px;height:56px;border-radius:50%;background:#f0faf0;border:2px solid #2e7d32;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2e7d32" stroke-width="2.5" stroke-linecap="round">
          <polyline points="20 6 9 17 4 12"/>
        </svg>
      </div>
      <h4 style="font-family:'Playfair Display',serif;font-size:1.2rem;font-weight:800;color:#1a1a1a;margin:0 0 10px 0;">Message Sent!</h4>
      <p style="font-family:'Lato',sans-serif;font-size:0.85rem;color:#555;line-height:1.75;margin:0;">
        Thanks for reaching out. We'll get back to you within 24 hours.
      </p>
    </div>

  </div>

</div>


<!-- ═══════════════════════════════════════════════
  MAP
═══════════════════════════════════════════════ -->
<div class="co-map-section">
  <div style="max-width:1180px;margin:0 auto;padding:0 24px;">

    <div style="border-radius:4px;overflow:hidden;box-shadow:0 2px 20px rgba(0,0,0,0.08);">
      <!-- Replace with your actual Google Maps embed URL: Maps → Share → Embed a map -->
      <iframe
        src="https://maps.google.com/maps?q=2617+E+Venango+St+Philadelphia+PA+19134&output=embed"
        width="100%" height="420" style="border:0;display:block;"
        allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Los Potrillos Restaurant — 2617 E Venango St, Philadelphia PA">
      </iframe>
    </div>

  </div>
</div>


<script>
(function () {
  const btn     = document.getElementById('co-submit')
  const formWrap= document.getElementById('co-form-wrap')
  const success = document.getElementById('co-success')
  const apiErr  = document.getElementById('co-api-error')

  function field(id)  { return document.getElementById(id) }
  function err(id)    { return document.getElementById(id + '-err') }

  function setErr(id, show) {
    field(id).classList.toggle('error', show)
    err(id).classList.toggle('visible', show)
  }

  function validate() {
    let ok = true
    const name    = field('co-name').value.trim()
    const email   = field('co-email').value.trim()
    const subject = field('co-subject').value
    const message = field('co-message').value.trim()

    setErr('co-name',    !name)
    setErr('co-email',   !email || !/\S+@\S+\.\S+/.test(email))
    setErr('co-subject', !subject)
    setErr('co-message', !message)

    if (!name || !email || !/\S+@\S+\.\S+/.test(email) || !subject || !message) ok = false
    return ok
  }

  btn.addEventListener('click', async function () {
    // Honeypot
    if (field('co-honeypot').value) return

    apiErr.style.display = 'none'
    if (!validate()) return

    btn.textContent  = 'Sending…'
    btn.disabled     = true
    btn.style.background = '#e8857a'

    try {
      const body = new FormData()
      body.append('action',  'submit_contact_form')
      body.append('nonce',   (window.themeData && window.themeData.nonce) || '')
      body.append('name',    field('co-name').value.trim())
      body.append('email',   field('co-email').value.trim())
      body.append('phone',   field('co-phone').value.trim())
      body.append('subject', field('co-subject').value)
      body.append('message', field('co-message').value.trim())

      const ajaxUrl = (window.themeData && window.themeData.ajaxUrl) || '/wp-admin/admin-ajax.php'
      const res  = await fetch(ajaxUrl, { method: 'POST', body })
      const data = await res.json()

      if (data.success) {
        formWrap.style.display = 'none'
        success.style.display  = 'block'
      } else {
        apiErr.textContent    = data.data?.message || 'Something went wrong. Please try again.'
        apiErr.style.display  = 'block'
        btn.textContent       = 'Send Message →'
        btn.disabled          = false
        btn.style.background  = '#C0392B'
      }
    } catch {
      apiErr.textContent   = 'Network error. Please check your connection and try again.'
      apiErr.style.display = 'block'
      btn.textContent      = 'Send Message →'
      btn.disabled         = false
      btn.style.background = '#C0392B'
    }
  })
})()
</script>


<?php get_footer(); ?>