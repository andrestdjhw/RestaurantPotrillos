import React, { useState, useEffect } from "react"

function FloatingOrderBar() {
  const [visible,   setVisible]   = useState(false)
  const [dismissed, setDismissed] = useState(false)

  // Aparece después de 2 segundos
  useEffect(() => {
    const timer = setTimeout(() => {
      if (!dismissed) setVisible(true)
    }, 2000)
    return () => clearTimeout(timer)
  }, [dismissed])

  if (dismissed) return null

  return (
    <>
      <style>{`
        .pfloat-bar {
          position: fixed;
          bottom: 24px;
          left: 50%;
          transform: translateX(-50%) translateY(${visible ? "0" : "120px"});
          opacity: ${visible ? "1" : "0"};
          transition: transform 0.45s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.35s ease;
          z-index: 9999;
          display: flex;
          align-items: center;
          gap: 12px;
          background: #1a0800;
          border-radius: 50px;
          padding: 10px 10px 10px 14px;
          box-shadow: 0 8px 32px rgba(0,0,0,0.28), 0 2px 8px rgba(0,0,0,0.18);
          white-space: nowrap;
          max-width: calc(100vw - 32px);
        }

        .pfloat-logo {
          width: 40px;
          height: 40px;
          border-radius: 10px;
          background: #fff;
          display: flex;
          align-items: center;
          justify-content: center;
          flex-shrink: 0;
          overflow: hidden;
        }
        .pfloat-logo img {
          width: 28px;
          height: 28px;
          object-fit: contain;
          display: block;
        }

        .pfloat-text {
          display: flex;
          flex-direction: column;
          gap: 1px;
          min-width: 0;
        }
        .pfloat-title {
          font-family: 'Oswald', sans-serif;
          font-size: 0.8rem;
          font-weight: 600;
          color: #ffffff;
          letter-spacing: 0.04em;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }
        .pfloat-sub {
          font-family: 'Lato', sans-serif;
          font-size: 0.68rem;
          color: rgba(255,255,255,0.55);
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }

        .pfloat-cta {
          font-family: 'Oswald', sans-serif;
          font-weight: 700;
          font-size: 0.72rem;
          text-transform: uppercase;
          letter-spacing: 0.08em;
          color: #fff;
          background: #C0392B;
          border: none;
          border-radius: 40px;
          padding: 10px 18px;
          cursor: pointer;
          text-decoration: none;
          display: inline-block;
          flex-shrink: 0;
          transition: background 0.2s, transform 0.15s;
          white-space: nowrap;
        }
        .pfloat-cta:hover {
          background: #a93226;
          transform: scale(1.04);
        }

        .pfloat-dismiss {
          width: 24px;
          height: 24px;
          border-radius: 50%;
          background: rgba(255,255,255,0.1);
          border: none;
          cursor: pointer;
          display: flex;
          align-items: center;
          justify-content: center;
          flex-shrink: 0;
          color: rgba(255,255,255,0.5);
          transition: background 0.2s, color 0.2s;
          padding: 0;
          margin-left: 2px;
        }
        .pfloat-dismiss:hover {
          background: rgba(255,255,255,0.2);
          color: #fff;
        }

        @media (max-width: 480px) {
          .pfloat-bar {
            bottom: 16px;
            padding: 8px 8px 8px 12px;
            gap: 10px;
          }
          .pfloat-title { font-size: 0.75rem; }
          .pfloat-sub   { display: none; }
          .pfloat-cta   { font-size: 0.68rem; padding: 9px 14px; }
        }
      `}</style>

      <div className="pfloat-bar" role="complementary" aria-label="Order pickup">

        {/* Logo */}
        <div className="pfloat-logo">
          <img
            src="/wp-content/uploads/2026/05/Horses-_WB-Photoroom.png"
            alt="Los Potrillos"
          />
        </div>

        {/* Text */}
        <div className="pfloat-text">
          <span className="pfloat-title">Los Potrillos Restaurant</span>
          <span className="pfloat-sub">Order pickup · Port Richmond, Philadelphia</span>
        </div>

        {/* CTA */}
        <a
          href="https://los-potrillos-restaurant.cloveronline.com/menu/all"
          target="_blank"
          rel="noopener noreferrer"
          className="pfloat-cta"
        >
          Order Now
        </a>

        {/* Dismiss */}
        <button
          className="pfloat-dismiss"
          onClick={() => {
            setVisible(false)
            setTimeout(() => setDismissed(true), 400)
          }}
          aria-label="Close"
        >
          <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" strokeWidth="2.5" strokeLinecap="round">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6"  y1="6" x2="18" y2="18"/>
          </svg>
        </button>

      </div>
    </>
  )
}

export default FloatingOrderBar