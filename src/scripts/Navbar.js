import React, { useState, useEffect } from "react"

function Navbar() {
  const [scrolled, setScrolled] = useState(false)
  const [menuOpen, setMenuOpen] = useState(false)

  useEffect(() => {
    const link = document.createElement("link")
    link.rel  = "stylesheet"
    link.href = "https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap"
    document.head.appendChild(link)

    const onScroll = () => setScrolled(window.scrollY > 200)
    window.addEventListener("scroll", onScroll)
    return () => window.removeEventListener("scroll", onScroll)
  }, [])

  const navLinks = [
    { label: "Home",      href: "/",                                                          external: false },
    { label: "Menu",      href: "https://los-potrillos-restaurant.cloveronline.com/menu/all", external: true  },
    { label: "Catering",  href: "/catering",                                                  external: false },
    { label: "Our Story", href: "/our-story",                                                 external: false },
    { label: "Contact",   href: "/contact",                                                   external: false },
  ]

  return (
    <>
      <style>{`
        .pnav * { box-sizing: border-box; }
        .pnav { font-family: 'Lato', sans-serif; }

        .pnav-link {
          font-family: 'Oswald', sans-serif;
          text-transform: uppercase;
          letter-spacing: 0.09em;
          font-size: 0.78rem;
          font-weight: 500;
          color: #1a1a1a;
          text-decoration: none;
          position: relative;
          padding-bottom: 3px;
          transition: color 0.2s;
        }
        .pnav-link::after {
          content: '';
          position: absolute;
          bottom: -1px; left: 0;
          width: 0; height: 2px;
          background: #C0392B;
          transition: width 0.25s ease;
        }
        .pnav-link:hover { color: #C0392B; }
        .pnav-link:hover::after { width: 100%; }

        .pnav-util-link {
          color: #444;
          text-decoration: none;
          font-size: 0.71rem;
          display: flex;
          align-items: center;
          gap: 5px;
          transition: color 0.2s;
          white-space: nowrap;
        }
        .pnav-util-link:hover { color: #C0392B; }

        .pnav-social-link {
          display: flex;
          align-items: center;
          justify-content: center;
          color: #666;
          text-decoration: none;
          transition: color 0.2s;
          flex-shrink: 0;
        }
        .pnav-social-link:hover { color: #C0392B; }

        .pnav-cta-primary {
          font-family: 'Oswald', sans-serif;
          font-weight: 700;
          text-transform: uppercase;
          letter-spacing: 0.1em;
          font-size: 0.72rem;
          padding: 9px 18px;
          border-radius: 3px;
          text-decoration: none;
          white-space: nowrap;
          border: 2px solid #C0392B;
          background: #C0392B;
          color: #fff;
          transition: background 0.2s, border-color 0.2s, transform 0.15s;
          cursor: pointer;
        }
        .pnav-cta-primary:hover {
          background: #a93226;
          border-color: #a93226;
          transform: translateY(-1px);
        }

        .pnav-cta-secondary {
          font-family: 'Oswald', sans-serif;
          font-weight: 700;
          text-transform: uppercase;
          letter-spacing: 0.1em;
          font-size: 0.72rem;
          padding: 9px 18px;
          border-radius: 3px;
          text-decoration: none;
          white-space: nowrap;
          border: 2px solid #1a1a1a;
          background: transparent;
          color: #1a1a1a;
          transition: background 0.2s, color 0.2s, transform 0.15s;
          cursor: pointer;
        }
        .pnav-cta-secondary:hover {
          background: #1a1a1a;
          color: #fff;
          transform: translateY(-1px);
        }

        .pnav-mobile-enter {
          animation: pnavSlideDown 0.22s ease forwards;
        }
        @keyframes pnavSlideDown {
          from { opacity: 0; transform: translateY(-6px); }
          to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 900px) {
          .pnav-desktop-links { display: none !important; }
          .pnav-hamburger      { display: flex !important; }
        }
        @media (min-width: 901px) {
          .pnav-mobile-menu    { display: none !important; }
        }
        @media (max-width: 600px) {
          .pnav-util-address { display: none; }
          .pnav-util-email   { display: none; }
          .pnav-cta-primary, .pnav-cta-secondary {
            font-size: 0.65rem !important;
            padding: 8px 11px !important;
          }
        }
        @media (max-width: 380px) {
          .pnav-cta-secondary { display: none !important; }
        }
      `}</style>

      <div
        className="pnav"
        style={{
          position:   "fixed",
          top: 0, left: 0, right: 0,
          zIndex:     1000,
          boxShadow:  scrolled ? "0 2px 16px rgba(0,0,0,0.12)" : "none",
          transition: "box-shadow 0.35s ease",
        }}
      >

        {/* ── TOP UTILITY BAR ──────────────────────────────────────────── */}
        <div style={{
          background:   "#f5f5f5",
          borderBottom: "1px solid #e0e0e0",
          padding:      "10px 0",

        }}>
          <div style={{
            maxWidth:       "1440px",
            margin:         "0 auto",
            padding:        "0 32px",
            display:        "flex",
            alignItems:     "center",
            justifyContent: "space-between",
            gap:            "16px",
          }}>

            {/* LEFT — Phone + Hours + Email */}
            <div style={{ display: "flex", alignItems: "center", gap: "20px", flexShrink: 0 }}>
              <a href="tel:+12673232669" className="pnav-util-link">
                <svg width="11" height="11" viewBox="0 0 24 24" fill="#C0392B">
                  <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                </svg>
                (267) 323-2669
              </a>

              <a href="mailto:info@restaurantpotrillos.com" className="pnav-util-link pnav-util-email">
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#C0392B" strokeWidth="2" strokeLinecap="round">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                </svg>
                info@restaurantpotrillos.com
              </a>

              <span className="pnav-util-link" style={{ cursor: "default" }}>
                <svg width="11" height="11" viewBox="0 0 24 24" fill="#C0392B">
                  <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/>
                </svg>
                Mon – Sat &nbsp; 10am – 9pm
              </span>
            </div>

            {/* CENTER — Address */}
            <div style={{ display: "flex", justifyContent: "center", flex: 1 }}>
              <a
                href="https://maps.google.com/?q=2617+E+Venango+St+Philadelphia+PA"
                target="_blank"
                rel="noopener noreferrer"
                className="pnav-util-link pnav-util-address"
              >
                <svg width="11" height="11" viewBox="0 0 24 24" fill="#C0392B">
                  <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                </svg>
                2617 E Venango St, Philadelphia, PA
              </a>
            </div>

            {/* RIGHT — Social icons */}
            <div style={{ display: "flex", alignItems: "center", gap: "16px", flexShrink: 0 }}>

              {/* TikTok */}
              <a href="https://www.tiktok.com/@lospotrillosrestaurant" target="_blank" rel="noopener noreferrer"
                aria-label="TikTok" className="pnav-social-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                </svg>
              </a>

              {/* Instagram */}
              <a href="https://www.instagram.com/potrillosrestaurantphilly/" target="_blank" rel="noopener noreferrer"
                aria-label="Instagram" className="pnav-social-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
              </a>

              {/* Facebook */}
              <a href="https://www.facebook.com/lospotrillosrestaurantphilly" target="_blank" rel="noopener noreferrer"
                aria-label="Facebook" className="pnav-social-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </a>

              {/* Google My Business */}
              <a href="https://www.google.com/maps/place/LOS+POTRILLOS+RESTAURANT/@39.9900503,-75.0937738,17z/data=!4m15!1m8!3m7!1s0x89c6c9d87bf20bf1:0x4d8435515dadc26b!2s2617+E+Venango+St,+Philadelphia,+PA+19134,+EE.+UU.!3b1!8m2!3d39.9900503!4d-75.0937738!16s%2Fg%2F11c164m9wv!3m5!1s0x89c6b7bc71190001:0xa44c7bbd8e214cdb!8m2!3d39.9900374!4d-75.0937434!16s%2Fg%2F11hbv7knck?hl=es-ES"
                target="_blank" rel="noopener noreferrer"
                aria-label="Google" className="pnav-social-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"/>
                </svg>
              </a>

            </div>
          </div>
        </div>

        {/* ── MAIN NAV BAR ─────────────────────────────────────────────── */}
        <div style={{
          background:   "#ffffff",
          borderBottom: "1px solid #e8e8e8",
          padding:      scrolled ? "10px 0" : "14px 0",
          transition:   "padding 0.35s ease",
        }}>
          <div style={{
            maxWidth:       "1440px",
            margin:         "0 auto",
            padding:        "0 32px",
            display:        "flex",
            alignItems:     "center",
            justifyContent: "space-between",
            gap:            "16px",
          }}>

            {/* LOGO — horses on top, text below, stacked */}
            <a href="/" style={{ flexShrink: 0, lineHeight: 0, display: "flex", flexDirection: "column", alignItems: "center", gap: "2px" }}>
              <img
                src="/wp-content/uploads/2026/05/Horses-_WB-Photoroom.png"
                alt="Los Potrillos — horses"
                style={{
                  height:     scrolled ? "24px" : "32px",
                  width:      "auto",
                  transition: "height 0.35s ease",
                  display:    "block",
                }}
              />
              <img
                src="/wp-content/uploads/2026/05/Los-Potrillos-_WB-scaled.png"
                alt="Los Potrillos"
                style={{
                  height:     scrolled ? "28px" : "36px",
                  width:      "auto",
                  transition: "height 0.35s ease",
                  display:    "block",
                }}
              />
            </a>

            {/* DESKTOP NAV LINKS */}
            <nav
              className="pnav-desktop-links"
              style={{ display: "flex", alignItems: "center", gap: "30px" }}
            >
              {navLinks.map(({ label, href, external }) => (
                <a
                  key={label}
                  href={href}
                  className="pnav-link"
                  {...(external ? { target: "_blank", rel: "noopener noreferrer" } : {})}
                >
                  {label}
                </a>
              ))}
            </nav>

            {/* RIGHT: CTAs + Hamburger */}
            <div style={{ display: "flex", alignItems: "center", gap: "10px", flexShrink: 0 }}>
              <a href="https://los-potrillos-restaurant.cloveronline.com/menu/all"          className="pnav-cta-primary">Order Pickup</a>
              <a href="/contact" className="pnav-cta-secondary">Catering Quote</a>

              <button
                onClick={() => setMenuOpen(o => !o)}
                aria-label={menuOpen ? "Close menu" : "Open menu"}
                className="pnav-hamburger"
                style={{
                  display:        "none",
                  alignItems:     "center",
                  justifyContent: "center",
                  background:     "transparent",
                  border:         "none",
                  cursor:         "pointer",
                  padding:        "4px",
                  color:          "#1a1a1a",
                  marginLeft:     "4px",
                }}
              >
                {menuOpen ? (
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" strokeWidth="2.5" strokeLinecap="round">
                    <line x1="18" y1="6"  x2="6"  y2="18"/>
                    <line x1="6"  y1="6"  x2="18" y2="18"/>
                  </svg>
                ) : (
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" strokeWidth="2.5" strokeLinecap="round">
                    <line x1="3" y1="7"  x2="21" y2="7"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="17" x2="21" y2="17"/>
                  </svg>
                )}
              </button>
            </div>
          </div>

          {/* ── MOBILE DROPDOWN ──────────────────────────────────────────── */}
          {menuOpen && (
            <div
              className="pnav-mobile-menu pnav-mobile-enter"
              style={{
                background:  "#ffffff",
                borderTop:   "1px solid #ebebeb",
                padding:     "8px 24px 20px",
              }}
            >
              <nav style={{ display: "flex", flexDirection: "column" }}>
                {navLinks.map(({ label, href, external }) => (
                  <a
                    key={label}
                    href={href}
                    onClick={() => setMenuOpen(false)}
                    {...(external ? { target: "_blank", rel: "noopener noreferrer" } : {})}
                    style={{
                      fontFamily:     "'Oswald', sans-serif",
                      textTransform:  "uppercase",
                      letterSpacing:  "0.09em",
                      fontSize:       "0.88rem",
                      fontWeight:     500,
                      color:          "#1a1a1a",
                      textDecoration: "none",
                      padding:        "11px 0",
                      borderBottom:   "1px solid #f0f0f0",
                      transition:     "color 0.2s",
                    }}
                    onMouseEnter={e => e.currentTarget.style.color = "#C0392B"}
                    onMouseLeave={e => e.currentTarget.style.color = "#1a1a1a"}
                  >
                    {label}
                  </a>
                ))}
              </nav>
            </div>
          )}
        </div>
      </div>

      {/* ── SPACER ───────────────────────────────────────────────────────── */}
      <div style={{
        height:     scrolled ? "64px" : "120px",
        transition: "height 0.35s ease",
      }} />
    </>
  )
}

export default Navbar