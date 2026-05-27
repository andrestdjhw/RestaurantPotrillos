import React, { useState, useEffect } from "react"

function FloatingOrderBar() {
  const [visible,   setVisible]   = useState(false)
  const [dismissed, setDismissed] = useState(false)

  useEffect(() => {
    const timer = setTimeout(() => {
      if (!dismissed) setVisible(true)
    }, 2000)
    return () => clearTimeout(timer)
  }, [dismissed])

  if (dismissed) return null

  const deliveryServices = [
    {
      name:  "Uber Eats",
      url:   "https://www.ubereats.com/store/los-potrillos-restaurant/8f90E8-GRHOnsfKh0Y7SQQ?diningMode=PICKUP",
      from:  "#06C167", to: "#038a47", border: "#06C167",
      icon:  <img src="https://cdn.simpleicons.org/ubereats/white" alt="Uber Eats" style={{ width: "14px", height: "14px", objectFit: "contain", display: "block" }} />,
    },
    {
      name:  "DoorDash",
      url:   "https://www.doordash.com/store/los-potrillos-restaurant-philadelphia-520750/691091/?utm_source=mx_share",
      from:  "#FF3008", to: "#cc2606", border: "#FF3008",
      icon:  <img src="https://cdn.simpleicons.org/doordash/white" alt="DoorDash" style={{ width: "14px", height: "14px", objectFit: "contain", display: "block" }} />,
    },
    {
      name:  "Grubhub",
      url:   "https://www.grubhub.com/restaurant/los-potrillos-restaurant-2617-e-venango-st-philadelphia/1939231?utm_source=grubhub_web&utm_medium=content_owned&utm_campaign=menushare&utm_content=share-link",
      from:  "#F63440", to: "#c4101b", border: "#F63440",
      icon: (
        <svg viewBox="0 0 24 24" fill="currentColor" style={{ width: "14px", height: "14px", color: "#fff" }}>
          <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 3c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7 3.134-7 7-7zm1 3.5h-2.5A3.5 3.5 0 007 12a3.5 3.5 0 003.5 3.5H13a.5.5 0 00.5-.5v-3H11v1.5h1v.5h-.5A2 2 0 019 12a2 2 0 012-2h2V8.5z"/>
        </svg>
      ),
    },
  ]

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
          width: 40px; height: 40px;
          border-radius: 10px;
          background: #fff;
          display: flex; align-items: center; justify-content: center;
          flex-shrink: 0; overflow: hidden;
        }
        .pfloat-logo img {
          width: 28px; height: 28px;
          object-fit: contain; display: block;
        }

        .pfloat-text {
          display: flex; flex-direction: column; gap: 1px; min-width: 0;
        }
        .pfloat-title {
          font-family: 'Oswald', sans-serif;
          font-size: 0.8rem; font-weight: 600;
          color: #ffffff; letter-spacing: 0.04em;
          white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .pfloat-sub {
          font-family: 'Lato', sans-serif;
          font-size: 0.68rem; color: rgba(255,255,255,0.55);
          white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }

        /* Divider */
        .pfloat-divider {
          width: 1px; height: 28px;
          background: rgba(255,255,255,0.15);
          flex-shrink: 0;
        }

        /* Delivery icons */
        .pfloat-delivery {
          display: flex; align-items: center; gap: 6px; flex-shrink: 0;
        }
        .pfloat-delivery-btn {
          width: 30px; height: 30px;
          border-radius: 50%;
          display: flex; align-items: center; justify-content: center;
          text-decoration: none; flex-shrink: 0;
          transition: transform 0.2s, opacity 0.2s;
          opacity: 0.85;
        }
        .pfloat-delivery-btn:hover { transform: scale(1.15); opacity: 1; }

        .pfloat-cta {
          font-family: 'Oswald', sans-serif;
          font-weight: 700; font-size: 0.72rem;
          text-transform: uppercase; letter-spacing: 0.08em;
          color: #fff; background: #C0392B;
          border: none; border-radius: 40px;
          padding: 10px 18px; cursor: pointer;
          text-decoration: none; display: inline-block;
          flex-shrink: 0;
          transition: background 0.2s, transform 0.15s;
          white-space: nowrap;
        }
        .pfloat-cta:hover { background: #a93226; transform: scale(1.04); }

        .pfloat-dismiss {
          width: 24px; height: 24px; border-radius: 50%;
          background: rgba(255,255,255,0.1); border: none;
          cursor: pointer; display: flex;
          align-items: center; justify-content: center;
          flex-shrink: 0; color: rgba(255,255,255,0.5);
          transition: background 0.2s, color 0.2s;
          padding: 0; margin-left: 2px;
        }
        .pfloat-dismiss:hover { background: rgba(255,255,255,0.2); color: #fff; }

        @media (max-width: 600px) {
          .pfloat-bar { bottom: 16px; padding: 8px 8px 8px 12px; gap: 8px; }
          .pfloat-title { font-size: 0.75rem; }
          .pfloat-sub   { display: none; }
          .pfloat-cta   { font-size: 0.68rem; padding: 9px 14px; }
          .pfloat-delivery { gap: 4px; }
          .pfloat-delivery-btn { width: 26px; height: 26px; }
        }
        @media (max-width: 420px) {
          .pfloat-divider { display: none; }
          .pfloat-delivery { display: none; }
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

        {/* Divider */}
        <div className="pfloat-divider"></div>

        {/* Delivery service icons */}
        <div className="pfloat-delivery">
          {deliveryServices.map(({ name, url, from, to, border, icon }) => (
            <a
              key={name}
              href={url}
              target="_blank"
              rel="noopener noreferrer"
              className="pfloat-delivery-btn"
              style={{
                background: `linear-gradient(135deg, ${from}, ${to})`,
                border: `1px solid ${border}80`,
              }}
              aria-label={name}
              title={name}
            >
              <span style={{ display: "flex", alignItems: "center", justifyContent: "center" }}>
                {icon}
              </span>
            </a>
          ))}
        </div>

        {/* Divider */}
        <div className="pfloat-divider"></div>

        {/* Direct order CTA */}
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