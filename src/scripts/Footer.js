import React from "react"

function Footer() {
  return (
    <>
      <style>{`
        .pfooter * { box-sizing: border-box; }
        .pfooter { font-family: 'Lato', sans-serif; }

        /* Food Truck block */
        .pfooter-truck-link {
          font-size: 0.82rem;
          color: #C0392B;
          text-decoration: none;
          font-weight: 700;
          letter-spacing: 0.02em;
          transition: opacity 0.2s;
        }
        .pfooter-truck-link:hover { opacity: 0.75; }

        /* Final CTA buttons */
        .pfooter-cta-primary {
          font-family: 'Oswald', sans-serif;
          font-weight: 700;
          text-transform: uppercase;
          letter-spacing: 0.1em;
          font-size: 0.82rem;
          padding: 14px 28px;
          border-radius: 3px;
          text-decoration: none;
          white-space: nowrap;
          border: 2px solid #fff;
          background: #fff;
          color: #C0392B;
          transition: background 0.2s, color 0.2s, transform 0.15s;
          cursor: pointer;
        }
        .pfooter-cta-primary:hover {
          background: transparent;
          color: #fff;
          transform: translateY(-2px);
        }

        .pfooter-cta-secondary {
          font-family: 'Oswald', sans-serif;
          font-weight: 700;
          text-transform: uppercase;
          letter-spacing: 0.1em;
          font-size: 0.82rem;
          padding: 14px 28px;
          border-radius: 3px;
          text-decoration: none;
          white-space: nowrap;
          border: 2px solid rgba(255,255,255,0.6);
          background: transparent;
          color: #fff;
          transition: background 0.2s, border-color 0.2s, transform 0.15s;
          cursor: pointer;
        }
        .pfooter-cta-secondary:hover {
          background: rgba(255,255,255,0.12);
          border-color: #fff;
          transform: translateY(-2px);
        }

        /* Footer column links */
        .pfooter-col-link {
          color: #b0b0b0;
          text-decoration: none;
          font-size: 0.82rem;
          line-height: 1.9;
          transition: color 0.2s;
          display: block;
        }
        .pfooter-col-link:hover { color: #fff; }

        /* Footer column heading */
        .pfooter-col-heading {
          font-family: 'Oswald', sans-serif;
          text-transform: uppercase;
          letter-spacing: 0.12em;
          font-size: 0.7rem;
          font-weight: 600;
          color: #C0392B;
          margin-bottom: 14px;
        }

        /* Social icons */
        .pfooter-social {
          display: flex;
          gap: 12px;
          margin-bottom: 20px;
        }
        .pfooter-social a {
          width: 36px; height: 36px;
          border-radius: 6px;
          border: 1px solid rgba(255,255,255,0.15);
          display: flex; align-items: center; justify-content: center;
          color: #b0b0b0;
          text-decoration: none;
          transition: border-color 0.2s, color 0.2s, background 0.2s;
        }
        .pfooter-social a:hover {
          border-color: rgba(255,255,255,0.4);
          color: #fff;
          background: rgba(255,255,255,0.07);
        }

        /* Bottom bar links */
        .pfooter-bottom-link {
          color: #666;
          text-decoration: none;
          font-size: 0.7rem;
          transition: color 0.2s;
        }
        .pfooter-bottom-link:hover { color: #aaa; }

        /* Inline CTA links inside footer col */
        .pfooter-order-link {
          display: inline-flex;
          align-items: center;
          gap: 6px;
          font-family: 'Oswald', sans-serif;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.08em;
          font-size: 0.72rem;
          color: #fff;
          text-decoration: none;
          padding: 8px 14px;
          border-radius: 3px;
          border: 1px solid rgba(255,255,255,0.2);
          background: rgba(255,255,255,0.06);
          transition: background 0.2s, border-color 0.2s;
          margin-top: 4px;
        }
        .pfooter-order-link:hover {
          background: rgba(255,255,255,0.12);
          border-color: rgba(255,255,255,0.4);
        }

        @media (max-width: 768px) {
          .pfooter-truck-inner {
            flex-direction: column !important;
          }
          .pfooter-truck-img {
            width: 100% !important;
            height: 180px !important;
            object-fit: cover !important;
            border-radius: 8px !important;
          }
          .pfooter-cta-buttons {
            flex-direction: column !important;
            align-items: center !important;
          }
          .pfooter-grid {
            grid-template-columns: 1fr 1fr !important;
          }
        }
        @media (max-width: 480px) {
          .pfooter-grid {
            grid-template-columns: 1fr !important;
          }
          .pfooter-bottom-bar {
            flex-direction: column !important;
            gap: 10px !important;
            text-align: center !important;
          }
          .pfooter-bottom-links {
            flex-wrap: wrap !important;
            justify-content: center !important;
          }
        }
      `}</style>

      <div className="pfooter">

        {/* ── FOOD TRUCK MINI-BLOCK ─────────────────────────────────────── */}
        <div style={{
          background:   "#f7f4f0",
          borderTop:    "1px solid #ece8e2",
          padding:      "40px 24px",
        }}>
          <div style={{
            maxWidth: "1180px",
            margin:   "0 auto",
          }}>
            <div
              className="pfooter-truck-inner"
              style={{
                display:     "flex",
                alignItems:  "center",
                gap:         "32px",
              }}
            >
              {/* Truck image */}
              <img
                src="/wp-content/uploads/2026/05/FoodTruck-scaled.jpg"
                alt="Los Potrillos Food Truck"
                className="pfooter-truck-img"
                style={{
                  width:        "260px",
                  height:       "160px",
                  objectFit:    "cover",
                  borderRadius: "8px",
                  flexShrink:   0,
                  background:   "#e8e2da",
                }}
              />

              {/* Text */}
              <div>
                <p style={{
                  fontFamily:    "'Oswald', sans-serif",
                  textTransform: "uppercase",
                  letterSpacing: "0.14em",
                  fontSize:      "0.65rem",
                  fontWeight:    600,
                  color:         "#C0392B",
                  marginBottom:  "6px",
                  margin:        "0 0 6px 0",
                }}>
                  Also catch us on the streets
                </p>
                <h3 style={{
                  fontFamily:   "'Oswald', sans-serif",
                  fontSize:     "1.35rem",
                  fontWeight:   600,
                  color:        "#1a1a1a",
                  margin:       "0 0 8px 0",
                  lineHeight:   1.25,
                }}>
                  Find Our Food Truck Around Philadelphia
                </h3>
                <p style={{
                  fontSize:    "0.85rem",
                  color:       "#666",
                  margin:      "0 0 12px 0",
                  lineHeight:  1.6,
                }}>
                  We bring the Puebla flavor to events, festivals, and locations across the city.
                </p>
                <a href="/food-truck" className="pfooter-truck-link">
                  See where the truck is today →
                </a>
              </div>
            </div>
          </div>
        </div>

        {/* ── FINAL CTA BANNER ─────────────────────────────────────────── */}
        <div style={{
          background: "#C0392B",
          padding:    "64px 24px",
          textAlign:  "center",
        }}>
          <div style={{ maxWidth: "700px", margin: "0 auto" }}>
            <h2 style={{
              fontFamily:   "'Oswald', sans-serif",
              fontSize:     "clamp(1.6rem, 4vw, 2.4rem)",
              fontWeight:   700,
              color:        "#fff",
              lineHeight:   1.2,
              margin:       "0 0 32px 0",
              letterSpacing: "0.01em",
            }}>
              Hungry Yet? Order Now — Or Plan Your Next Event With Us.
            </h2>
            <div
              className="pfooter-cta-buttons"
              style={{ display: "flex", justifyContent: "center", gap: "16px", flexWrap: "wrap" }}
            >
              <a href="/order"          className="pfooter-cta-primary">Order Pickup Now →</a>
              <a href="/catering-quote" className="pfooter-cta-secondary">Get a Catering Quote →</a>
            </div>
          </div>
        </div>

        {/* ── MAIN FOOTER ──────────────────────────────────────────────── */}
        <div style={{ background: "#111111", padding: "60px 24px 0" }}>
          <div style={{ maxWidth: "1180px", margin: "0 auto" }}>
            <div
              className="pfooter-grid"
              style={{
                display:             "grid",
                gridTemplateColumns: "1.4fr 1fr 1fr 1fr",
                gap:                 "40px",
                paddingBottom:       "48px",
              }}
            >

              {/* COL 1 — Brand */}
              <div>
                <a href="/" style={{ display: "inline-block", marginBottom: "18px", lineHeight: 0 }}>
                  <img
                    src="/wp-content/uploads/2026/05/PotrillosNegativeBrandLogo-scaled.png"
                    alt="Los Potrillos"
                    style={{ height: "52px", width: "auto", display: "block" }}
                  />
                </a>
                <p style={{
                  fontSize:   "0.82rem",
                  color:      "#b0b0b0",
                  lineHeight: 1.7,
                  margin:     "0 0 10px 0",
                }}>
                  Authentic Puebla-style Mexican food, made fresh in Philadelphia.
                </p>
                <p style={{
                  fontSize:    "0.78rem",
                  color:       "#666",
                  lineHeight:  1.6,
                  fontStyle:   "italic",
                  margin:      0,
                }}>
                  Family-owned. Family-run. Family-fed.
                </p>
              </div>

              {/* COL 2 — Visit */}
              <div>
                <p className="pfooter-col-heading">Visit Us</p>
                <address style={{ fontStyle: "normal" }}>
                  <a
                    href="https://maps.google.com/?q=2617+E+Venango+St+Philadelphia+PA"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="pfooter-col-link"
                  >
                    2617 E Venango St<br />Philadelphia, PA 19134
                  </a>
                </address>
                <p style={{
                  fontSize:   "0.82rem",
                  color:      "#b0b0b0",
                  lineHeight: 1.9,
                  margin:     "12px 0 0 0",
                }}>
                  Mon–Sat: 10am – 9pm<br />
                  <span style={{ color: "#666" }}>Sunday: Closed</span>
                </p>
                <a href="tel:+12673232669" className="pfooter-col-link" style={{ marginTop: "10px" }}>
                  (267) 323-2669
                </a>
              </div>

              {/* COL 3 — Quick Links */}
              <div>
                <p className="pfooter-col-heading">Explore</p>
                <nav style={{ display: "flex", flexDirection: "column" }}>
                  {[
                    { label: "Menu",      href: "/menu" },
                    { label: "Catering",  href: "/catering" },
                    { label: "Our Story", href: "/our-story" },
                    { label: "Careers",   href: "/careers" },
                    { label: "Contact",   href: "/contact" },
                  ].map(({ label, href }) => (
                    <a key={label} href={href} className="pfooter-col-link">{label}</a>
                  ))}
                </nav>
              </div>

              {/* COL 4 — Social + Order */}
              <div>
                <p className="pfooter-col-heading">Follow Us</p>

                {/* Social icons */}
                <div className="pfooter-social">

                  {/* Instagram */}
                  <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                  </a>

                  {/* Facebook */}
                  <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                  </a>

                  {/* TikTok */}
                  <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                    </svg>
                  </a>

                </div>

                {/* Order online */}
                <p className="pfooter-col-heading" style={{ marginBottom: "8px" }}>Order Online</p>
                <a href="/order" className="pfooter-order-link" style={{ marginBottom: "18px", display: "inline-flex" }}>
                  Order Pickup →
                </a>

                {/* Catering */}
                <p className="pfooter-col-heading" style={{ marginTop: "16px", marginBottom: "8px" }}>Catering</p>
                <a href="/catering-quote" className="pfooter-order-link">
                  Get a Quote →
                </a>

              </div>
            </div>
          </div>

          {/* ── BOTTOM BAR ───────────────────────────────────────────────── */}
          <div style={{ borderTop: "1px solid #222", padding: "18px 24px" }}>
            <div
              className="pfooter-bottom-bar"
              style={{
                maxWidth:       "1180px",
                margin:         "0 auto",
                display:        "flex",
                alignItems:     "center",
                justifyContent: "space-between",
                gap:            "12px",
              }}
            >
              <p style={{ fontSize: "0.68rem", color: "#555", margin: 0 }}>
                © 2026 Los Potrillos Restaurant Inc. All rights reserved.
              </p>
              <div
                className="pfooter-bottom-links"
                style={{ display: "flex", gap: "18px" }}
              >
                <a href="/privacy-policy"    className="pfooter-bottom-link">Privacy Policy</a>
                <a href="/terms-conditions"  className="pfooter-bottom-link">Terms &amp; Conditions</a>
                <a href="/sitemap"           className="pfooter-bottom-link">Site Map</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </>
  )
}

export default Footer