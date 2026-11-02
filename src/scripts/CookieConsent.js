import React, { useState, useEffect } from "react"

const STORAGE_KEY = "lp_cookie_consent" // "accepted" | "declined"

function pushConsent(granted) {
  window.dataLayer = window.dataLayer || []
  // Google Consent Mode v2 shape — harmless today, ready for when GTM/GA is installed.
  window.dataLayer.push({
    event: "cookie_consent_update",
    consent: granted ? "granted" : "denied",
    ad_storage:          granted ? "granted" : "denied",
    analytics_storage:   granted ? "granted" : "denied",
    ad_user_data:        granted ? "granted" : "denied",
    ad_personalization:  granted ? "granted" : "denied",
  })
}

function CookieConsent() {
  const [visible, setVisible] = useState(false)
  const [closing, setClosing] = useState(false)

  useEffect(() => {
    const link = document.createElement("link")
    link.rel  = "stylesheet"
    link.href = "https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap"
    document.head.appendChild(link)

    let saved = ""
    try { saved = window.localStorage.getItem(STORAGE_KEY) || "" } catch (e) {}

    if (!saved) {
      const timer = setTimeout(() => setVisible(true), 600)
      return () => clearTimeout(timer)
    }
  }, [])

  // Reopened from the footer's "Cookie Settings" link, regardless of a saved choice.
  useEffect(() => {
    const onOpenSettings = () => {
      setClosing(false)
      setVisible(true)
    }
    window.addEventListener("lp-open-cookie-settings", onOpenSettings)
    return () => window.removeEventListener("lp-open-cookie-settings", onOpenSettings)
  }, [])

  useEffect(() => {
    window.dispatchEvent(new CustomEvent("lp-cookie-banner", { detail: { visible: visible && !closing } }))
  }, [visible, closing])

  function choose(accepted) {
    try { window.localStorage.setItem(STORAGE_KEY, accepted ? "accepted" : "declined") } catch (e) {}
    pushConsent(accepted)
    setClosing(true)
    setTimeout(() => setVisible(false), 350)
  }

  if (!visible) return null

  return (
    <>
      <style>{`
        .pcookie-bar {
          position: fixed;
          left: 0; right: 0; bottom: 0;
          z-index: 9998;
          background: #1a0800;
          border-top: 3px solid #C0392B;
          box-shadow: 0 -8px 28px rgba(0,0,0,0.22);
          padding: 18px 24px;
          transform: translateY(${closing ? "120%" : "0"});
          opacity: ${closing ? "0" : "1"};
          transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease;
        }
        .pcookie-inner {
          max-width: 1180px;
          margin: 0 auto;
          display: flex;
          align-items: center;
          justify-content: space-between;
          gap: 24px;
          flex-wrap: wrap;
        }
        .pcookie-text {
          font-family: 'Lato', sans-serif;
          font-size: 0.85rem;
          line-height: 1.6;
          color: rgba(255,255,255,0.82);
          margin: 0;
          flex: 1 1 320px;
          min-width: 0;
        }
        .pcookie-text a {
          color: #fff;
          text-decoration: underline;
          text-underline-offset: 2px;
          font-weight: 700;
        }
        .pcookie-actions {
          display: flex;
          align-items: center;
          gap: 10px;
          flex-shrink: 0;
          flex-wrap: wrap;
        }
        .pcookie-btn {
          font-family: 'Oswald', sans-serif;
          font-weight: 700;
          text-transform: uppercase;
          letter-spacing: 0.08em;
          font-size: 0.72rem;
          padding: 11px 20px;
          border-radius: 3px;
          cursor: pointer;
          white-space: nowrap;
          transition: background 0.2s, color 0.2s, border-color 0.2s, transform 0.15s;
        }
        .pcookie-btn:hover { transform: translateY(-1px); }
        .pcookie-btn-accept {
          border: 2px solid #C0392B;
          background: #C0392B;
          color: #fff;
        }
        .pcookie-btn-accept:hover { background: #a93226; border-color: #a93226; }
        .pcookie-btn-decline {
          border: 2px solid rgba(255,255,255,0.4);
          background: transparent;
          color: rgba(255,255,255,0.85);
        }
        .pcookie-btn-decline:hover { border-color: #fff; color: #fff; }

        @media (max-width: 640px) {
          .pcookie-bar { padding: 16px 18px; }
          .pcookie-inner { gap: 14px; }
          .pcookie-actions { width: 100%; }
          .pcookie-btn { flex: 1 1 auto; text-align: center; }
        }
      `}</style>

      <div className="pcookie-bar" role="dialog" aria-label="Cookie notice">
        <div className="pcookie-inner">
          <p className="pcookie-text">
            We use cookies to improve your experience on our site and understand how it's used.
            By clicking "Accept", you agree to our use of cookies. Read our{" "}
            <a href="/privacy-policy">Privacy Policy</a> to learn more.
          </p>
          <div className="pcookie-actions">
            <button type="button" className="pcookie-btn pcookie-btn-decline" onClick={() => choose(false)}>
              Decline
            </button>
            <button type="button" className="pcookie-btn pcookie-btn-accept" onClick={() => choose(true)}>
              Accept
            </button>
          </div>
        </div>
      </div>
    </>
  )
}

export default CookieConsent
