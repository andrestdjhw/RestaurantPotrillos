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
    { label: "Home",      href: "/" },
    { label: "Menu",      href: "/menu" },
    { label: "Catering",  href: "/catering" },
    { label: "Our Story", href: "/our-story" },
    { label: "Contact",   href: "/contact" },
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
        }
        .pnav-util-link:hover { color: #C0392B; }

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
          padding:      "6px 0",
          maxHeight:    scrolled ? "0" : "44px",
          overflow:     "hidden",
          transition:   "max-height 0.35s ease",
        }}>
          <div style={{
            maxWidth:       "1180px",
            margin:         "0 auto",
            padding:        "0 24px",
            display:        "flex",
            alignItems:     "center",
            justifyContent: "space-between",
            gap:            "8px",
          }}>

            {/* Logo utility bar */}
            <a href="/" style={{ lineHeight: 0, flexShrink: 0 }}>
              <img
                src="/wp-content/uploads/2026/05/Horses-_WB-Photoroom.png"
                alt="Los Potrillos"
                style={{ height: "28px", width: "auto", display: "block" }}
              />
            </a>

            {/* Info: phone + hours + address */}
            <div style={{ display: "flex", alignItems: "center", gap: "20px" }}>

              <a href="tel:+12673232669" className="pnav-util-link">
                <svg width="11" height="11" viewBox="0 0 24 24" fill="#C0392B">
                  <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                </svg>
                (267) 323-2669
              </a>

              <span className="pnav-util-link" style={{ cursor: "default" }}>
                <svg width="11" height="11" viewBox="0 0 24 24" fill="#C0392B">
                  <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/>
                </svg>
                Mon – Sat &nbsp; 10am – 9pm
              </span>

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
            maxWidth:       "1180px",
            margin:         "0 auto",
            padding:        "0 24px",
            display:        "flex",
            alignItems:     "center",
            justifyContent: "space-between",
            gap:            "16px",
          }}>

            {/* LOGO principal */}
            <a href="/" style={{ flexShrink: 0, lineHeight: 0 }}>
              <img
                src="/wp-content/uploads/2026/05/Los-Potrillos-_WB-scaled.png"
                alt="Los Potrillos"
                style={{
                  height:     scrolled ? "42px" : "54px",
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
              {navLinks.map(({ label, href }) => (
                <a key={label} href={href} className="pnav-link">{label}</a>
              ))}
            </nav>

            {/* RIGHT: CTAs + Hamburger */}
            <div style={{ display: "flex", alignItems: "center", gap: "10px", flexShrink: 0 }}>
              <a href="/order"          className="pnav-cta-primary">Order Pickup</a>
              <a href="/catering-quote" className="pnav-cta-secondary">Catering Quote</a>

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
                {navLinks.map(({ label, href }) => (
                  <a
                    key={label}
                    href={href}
                    onClick={() => setMenuOpen(false)}
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
        height:     scrolled ? "64px" : "112px",
        transition: "height 0.35s ease",
      }} />
    </>
  )
}

export default Navbar