import React, { useState, useEffect, useRef } from "react"

// ─── CONFIGURACIÓN — cambia solo estos valores ───────────────────────────────
const EMAILJS_PUBLIC_KEY  = "Et9iu2dz4an-CfbAk"
const EMAILJS_SERVICE_ID  = "service_xq04hfa"
const EMAILJS_TEMPLATE_ID = "template_bdkb5dz"
const RECAPTCHA_SITE_KEY  = "6LdxW-AsAAAAAIFAlAgMTkGn8pK8OLrbZ-sf7p_k"
// ─────────────────────────────────────────────────────────────────────────────

const INITIAL = {
  fullName:  "",
  phone:     "",
  email:     "",
  eventDate: "",
  eventTime: "",
  guests:    "",
  eventType: "",
  interested: "",
  fulfillment: "",
  address:   "",
  message:   "",
  honeypot:  "",
}

const EVENT_TYPES = [
  "Family Celebration",
  "Quinceañera",
  "Wedding",
  "Corporate Event",
  "Office Lunch",
  "Community Event",
  "Other",
]

const NOTICE_ERROR = "Catering orders require at least 24 hours' advance notice. Please choose a later date and time."

// Event Date + Event Time must be at least 24 hours in the future (visitor's local time)
function isInsideNoticeWindow(date, time) {
  if (!date || !time) return false
  const when = new Date(`${date}T${time}`)
  return isNaN(when.getTime()) || when.getTime() < Date.now() + 24 * 60 * 60 * 1000
}

function todayISO() {
  const d = new Date()
  const pad = n => String(n).padStart(2, "0")
  return `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}`
}

function getUtm() {
  const keys = ["utm_source", "utm_medium", "utm_campaign", "utm_term", "utm_content"]
  let saved = {}
  try { saved = JSON.parse(sessionStorage.getItem("lp_utm") || "{}") } catch (e) {}
  const qs = new URLSearchParams(window.location.search)
  const out = {}
  keys.forEach(k => { out[k] = qs.get(k) || saved[k] || "" })
  return out
}

function validate(fields) {
  const errors = {}
  if (!fields.fullName.trim())  errors.fullName  = "Full name is required."
  if (!fields.phone.trim())     errors.phone     = "Phone number is required."
  if (!fields.email.trim())     errors.email     = "Email address is required."
  else if (!/\S+@\S+\.\S+/.test(fields.email)) errors.email = "Enter a valid email."
  if (!fields.eventDate)        errors.eventDate = "Please select an event date."
  if (!fields.eventTime)        errors.eventTime = "Please select an event time."
  else if (fields.eventDate && isInsideNoticeWindow(fields.eventDate, fields.eventTime))
                                errors.eventTime = NOTICE_ERROR
  if (!fields.guests || isNaN(fields.guests) || Number(fields.guests) < 1)
                                errors.guests    = "Enter a valid number of guests."
  if (!fields.eventType)        errors.eventType = "Please select an event type."
  if (!fields.interested.trim()) errors.interested = "Tell us what you're interested in ordering."
  if (!fields.fulfillment)      errors.fulfillment = "Please choose pickup, delivery or not sure yet."
  return errors
}

function CateringForm() {
  const [fields,        setFields]        = useState(INITIAL)
  const [errors,        setErrors]        = useState({})
  const [loading,       setLoading]       = useState(false)
  const [success,       setSuccess]       = useState(false)
  const [apiError,      setApiError]      = useState("")
  const [captchaReady,  setCaptchaReady]  = useState(false)
  const [captchaError,  setCaptchaError]  = useState(false)
  const recaptchaRef  = useRef(null)
  const widgetIdRef   = useRef(null)

  // ── Cargar EmailJS y reCAPTCHA via CDN ──────────────────────────────────
  useEffect(() => {
    // EmailJS
    if (!window.emailjs) {
      const ejsScript = document.createElement("script")
      ejsScript.src = "https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"
      ejsScript.onload = () => window.emailjs.init(EMAILJS_PUBLIC_KEY)
      document.head.appendChild(ejsScript)
    } else {
      window.emailjs.init(EMAILJS_PUBLIC_KEY)
    }

    // reCAPTCHA v2
    if (!window.grecaptcha) {
      const rcScript = document.createElement("script")
      rcScript.src = "https://www.google.com/recaptcha/api.js?render=explicit"
      rcScript.async = true
      rcScript.defer = true
      rcScript.onload = () => setCaptchaReady(true)
      document.head.appendChild(rcScript)
    } else {
      setCaptchaReady(true)
    }
  }, [])

  // ── Renderizar widget reCAPTCHA cuando esté listo ────────────────────────
  useEffect(() => {
    if (captchaReady && recaptchaRef.current && widgetIdRef.current === null) {
      window.grecaptcha.ready(() => {
        if (recaptchaRef.current && widgetIdRef.current === null) {
          widgetIdRef.current = window.grecaptcha.render(recaptchaRef.current, {
            sitekey:  RECAPTCHA_SITE_KEY,
            theme:    "light",
            callback: () => setCaptchaError(false),
          })
        }
      })
    }
  }, [captchaReady])

  function handleChange(e) {
    const { name, value } = e.target
    setFields(prev => ({ ...prev, [name]: value }))
    if (errors[name]) setErrors(prev => ({ ...prev, [name]: "" }))
    if (name === "eventDate" && errors.eventTime) setErrors(prev => ({ ...prev, eventTime: "" }))
  }

  async function handleSubmit(e) {
    e.preventDefault()
    setApiError("")
    setCaptchaError(false)

    // Honeypot
    if (fields.honeypot) return

    // Validación de campos
    const errs = validate(fields)
    if (Object.keys(errs).length) {
      setErrors(errs)
      return
    }

    // Validación reCAPTCHA
    const captchaToken = window.grecaptcha?.getResponse(widgetIdRef.current)
    if (!captchaToken) {
      setCaptchaError(true)
      return
    }

    setLoading(true)
    try {
      const utm = getUtm()
      const sourceUrl = window.location.href
      const utmText = Object.entries(utm).filter(([, v]) => v).map(([k, v]) => `${k}=${v}`).join(", ")
      const address = fields.fulfillment === "Delivery" ? fields.address : ""
      const notes = fields.message || "None."
      const body = [
        `Name: ${fields.fullName}`,
        `Phone: ${fields.phone}`,
        `Email: ${fields.email}`,
        `Event Date: ${fields.eventDate}`,
        `Event Time: ${fields.eventTime}`,
        `Guest Count: ${fields.guests}`,
        `Event Type: ${fields.eventType}`,
        `Pickup/Delivery: ${fields.fulfillment}`,
        `Event Address: ${address || "N/A"}`,
        `Menu Interests: ${fields.interested}`,
        `Additional Notes: ${notes}`,
        `Source URL: ${sourceUrl}`,
        `UTM: ${utmText || "None"}`,
      ].join("\n")

      await window.emailjs.send(
        EMAILJS_SERVICE_ID,
        EMAILJS_TEMPLATE_ID,
        {
          subject:         `NEW CATERING REQUEST - ${fields.fullName} - ${fields.eventDate}`,
          from_name:       fields.fullName,
          phone:           fields.phone,
          email:           fields.email,
          event_date:      fields.eventDate,
          event_time:      fields.eventTime,
          guests:          fields.guests,
          event_type:      fields.eventType,
          fulfillment:     fields.fulfillment,
          event_address:   address,
          menu_interests:  fields.interested,
          notes,
          source_url:      sourceUrl,
          ...utm,
          // Full ordered body: works even if the EmailJS template only prints {{message}}
          message:         body,
        }
      )
      window.dataLayer = window.dataLayer || []
      window.dataLayer.push({ event: "catering_form_submit" })
      setSuccess(true)
      setFields(INITIAL)
      window.grecaptcha?.reset(widgetIdRef.current)
    } catch (err) {
      console.error("EmailJS error:", err)
      setApiError("Something went wrong. Please try again or call us directly.")
    } finally {
      setLoading(false)
    }
  }

  // ── ESTILOS ──────────────────────────────────────────────────────────────
  const card = {
    background:   "#f1eadb",
    border:       "1px solid #e6dcc9",
    borderRadius: "6px",
    padding:      "32px 30px",
    boxShadow:    "0 10px 30px rgba(42,15,8,0.10)",
  }
  const label = {
    display:       "block",
    fontFamily:    "'Oswald', sans-serif",
    textTransform: "uppercase",
    letterSpacing: "0.09em",
    fontSize:      "0.68rem",
    fontWeight:    600,
    color:         "#2a0f08",
    marginBottom:  "6px",
  }
  const inputStyle = (hasError) => ({
    width:        "100%",
    padding:      "10px 13px",
    fontSize:     "0.85rem",
    color:        "#1a1a1a",
    background:   "#fff",
    border:       `1px solid ${hasError ? "#C0392B" : "#ddd"}`,
    borderRadius: "3px",
    outline:      "none",
    boxSizing:    "border-box",
    transition:   "border-color 0.2s",
    fontFamily:   "inherit",
  })
  const errMsg   = { fontSize: "0.72rem", color: "#C0392B", marginTop: "4px", display: "block" }
  const fieldWrap = { marginBottom: "16px" }

  // ── SUCCESS ──────────────────────────────────────────────────────────────
  if (success) {
    return (
      <div style={{ ...card, textAlign: "center", padding: "52px 32px" }}>
        <div style={{
          width: "56px", height: "56px", borderRadius: "50%",
          background: "#f0faf0", border: "2px solid #2e7d32",
          display: "flex", alignItems: "center", justifyContent: "center",
          margin: "0 auto 20px",
        }}>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="#2e7d32" strokeWidth="2.5" strokeLinecap="round">
            <polyline points="20 6 9 17 4 12"/>
          </svg>
        </div>
        <h3 style={{ fontFamily: "'Oswald', sans-serif", fontSize: "1.3rem", fontWeight: 700, color: "#1a1a1a", margin: "0 0 12px 0" }}>
          Quote Request Received!
        </h3>
        <p style={{ fontSize: "0.85rem", color: "#555", lineHeight: 1.75, margin: "0 0 24px 0" }}>
          We'll review your request and get back to you within 24 hours.
        </p>
        <button
          onClick={() => setSuccess(false)}
          style={{
            fontFamily: "'Oswald', sans-serif", fontWeight: 600,
            textTransform: "uppercase", letterSpacing: "0.08em",
            fontSize: "0.72rem", padding: "9px 20px", borderRadius: "3px",
            border: "2px solid #C0392B", background: "transparent", color: "#C0392B",
            cursor: "pointer",
          }}
        >
          Submit Another Request
        </button>
      </div>
    )
  }

  // ── FORM ─────────────────────────────────────────────────────────────────
  return (
    <div style={card}>
      <p style={{ fontFamily: "'Oswald', sans-serif", textTransform: "uppercase", letterSpacing: "0.2em", fontSize: "0.72rem", fontWeight: 600, color: "#a9741f", margin: "0 0 10px 0" }}>
        Request Your Catering Quote
      </p>
      <h3 style={{ fontFamily: "'Playfair Display', serif", fontSize: "1.9rem", fontWeight: 800, color: "#2a0f08", margin: "0 0 10px 0", lineHeight: 1.15 }}>
        Tell Us About Your Event.
      </h3>
      <p style={{ fontSize: "0.95rem", color: "#3a2a24", lineHeight: 1.55, margin: "0 0 24px 0" }}>
        Fill in the details below and we'll reach out to review your menu interests and confirm your catering request.{" "}
        <strong>Catering requires at least 24 hours' advance notice.</strong>
      </p>

      {/* Honeypot */}
      <div style={{ display: "none" }} aria-hidden="true">
        <input type="text" name="honeypot" tabIndex={-1} autoComplete="off"
          value={fields.honeypot} onChange={handleChange} />
      </div>

      <form onSubmit={handleSubmit} noValidate>

        <div style={fieldWrap}>
          <label style={label}>Full Name *</label>
          <input type="text" name="fullName" value={fields.fullName}
            onChange={handleChange} placeholder="Maria González"
            style={inputStyle(!!errors.fullName)} />
          {errors.fullName && <span style={errMsg}>{errors.fullName}</span>}
        </div>

        <div style={{ display: "grid", gridTemplateColumns: "1fr 1fr", gap: "14px" }}>
          <div style={fieldWrap}>
            <label style={label}>Phone Number *</label>
            <input type="tel" name="phone" value={fields.phone}
              onChange={handleChange} placeholder="(267) 000-0000"
              style={inputStyle(!!errors.phone)} />
            {errors.phone && <span style={errMsg}>{errors.phone}</span>}
          </div>
          <div style={fieldWrap}>
            <label style={label}>Email *</label>
            <input type="email" name="email" value={fields.email}
              onChange={handleChange} placeholder="you@email.com"
              style={inputStyle(!!errors.email)} />
            {errors.email && <span style={errMsg}>{errors.email}</span>}
          </div>
        </div>

        <div style={{ display: "grid", gridTemplateColumns: "1fr 1fr", gap: "14px" }}>
          <div style={fieldWrap}>
            <label style={label}>Event Date *</label>
            <input type="date" name="eventDate" value={fields.eventDate} min={todayISO()}
              onChange={handleChange} style={inputStyle(!!errors.eventDate)} />
            {errors.eventDate && <span style={errMsg}>{errors.eventDate}</span>}
          </div>
          <div style={fieldWrap}>
            <label style={label}>Event Time *</label>
            <input type="time" name="eventTime" value={fields.eventTime}
              onChange={handleChange} style={inputStyle(!!errors.eventTime)} />
          </div>
        </div>
        {errors.eventTime && <span style={{ ...errMsg, margin: "-8px 0 16px" }}>{errors.eventTime}</span>}

        <div style={fieldWrap}>
          <label style={label}>Number of Guests *</label>
          <input type="number" name="guests" value={fields.guests}
            onChange={handleChange} placeholder="50" min="1"
            style={inputStyle(!!errors.guests)} />
          {errors.guests && <span style={errMsg}>{errors.guests}</span>}
        </div>

        <div style={fieldWrap}>
          <label style={label}>Event Type *</label>
          <select name="eventType" value={fields.eventType}
            onChange={handleChange}
            style={{ ...inputStyle(!!errors.eventType), cursor: "pointer" }}>
            <option value="">Select event type…</option>
            {EVENT_TYPES.map(t => <option key={t} value={t}>{t}</option>)}
          </select>
          {errors.eventType && <span style={errMsg}>{errors.eventType}</span>}
        </div>

        <div style={fieldWrap}>
          <label style={label}>What are you interested in ordering? *</label>
          <textarea name="interested" value={fields.interested}
            onChange={handleChange} rows={3}
            placeholder="Tell us which menu items you're interested in, quantities, meat choices, or anything else you have in mind."
            style={{ ...inputStyle(!!errors.interested), resize: "vertical", lineHeight: 1.6 }} />
          {errors.interested && <span style={errMsg}>{errors.interested}</span>}
        </div>

        <div style={fieldWrap}>
          <label style={label}>How would you like the food? *</label>
          <div style={{ display: "flex", flexWrap: "wrap", gap: "8px 22px", marginTop: "4px" }}>
            {["Pickup", "Delivery", "Not sure yet"].map(opt => (
              <label key={opt} style={{ display: "flex", alignItems: "center", gap: "8px", fontSize: "0.88rem", color: "#2a0f08", cursor: "pointer" }}>
                <input type="radio" name="fulfillment" value={opt}
                  checked={fields.fulfillment === opt} onChange={handleChange}
                  style={{ accentColor: "#b71c1c", width: "16px", height: "16px", margin: 0 }} />
                {opt}
              </label>
            ))}
          </div>
          {errors.fulfillment && <span style={errMsg}>{errors.fulfillment}</span>}
        </div>

        {fields.fulfillment === "Delivery" && (
          <div style={fieldWrap}>
            <label style={label}>
              Event Address{" "}
              <span style={{ fontWeight: 400, textTransform: "none", letterSpacing: 0, color: "#7a6d64" }}>(catering delivery is quoted separately)</span>
            </label>
            <input type="text" name="address" value={fields.address}
              onChange={handleChange} placeholder="Street address, city, zip code"
              style={inputStyle(false)} />
          </div>
        )}

        <div style={fieldWrap}>
          <label style={label}>
            Anything else we should know?{" "}
            <span style={{ fontWeight: 400, textTransform: "none", letterSpacing: 0, color: "#7a6d64" }}>(optional)</span>
          </label>
          <textarea name="message" value={fields.message}
            onChange={handleChange} rows={3}
            placeholder="Dietary needs, timing, setup questions, etc."
            style={{ ...inputStyle(false), resize: "vertical", lineHeight: 1.6 }} />
        </div>

        {/* reCAPTCHA v2 */}
        <div style={{ marginBottom: "16px" }}>
          <div ref={recaptchaRef}></div>
          {captchaError && (
            <span style={errMsg}>Please complete the CAPTCHA before submitting.</span>
          )}
        </div>

        {apiError && (
          <p style={{
            background: "#fdf0f0", border: "1px solid #f5c6c6",
            borderRadius: "3px", padding: "10px 14px",
            fontSize: "0.8rem", color: "#C0392B", margin: "0 0 16px 0",
          }}>
            {apiError}
          </p>
        )}

        <button
          type="submit"
          disabled={loading}
          style={{
            width: "100%",
            fontFamily: "'Oswald', sans-serif", fontWeight: 700,
            textTransform: "uppercase", letterSpacing: "0.1em",
            fontSize: "0.8rem", padding: "14px 20px", borderRadius: "3px",
            border: "2px solid #b71c1c",
            background: loading ? "#d98a84" : "#b71c1c",
            color: "#fff", cursor: loading ? "not-allowed" : "pointer",
            transition: "background 0.2s",
          }}
        >
          {loading ? "Sending…" : "Request My Catering Quote  →"}
        </button>

        <p style={{ fontSize: "0.78rem", color: "#5a4d46", margin: "14px 0 6px 0" }}>
          Please submit your request at least 24 hours before your event. No spam. No obligation.
        </p>
        <p style={{ fontSize: "0.74rem", color: "#7a6d64", lineHeight: 1.55, margin: "0 0 16px 0" }}>
          Submitting this form does not confirm your order. Catering orders require at least 24 hours' advance notice. Our team will contact you to review your menu selections, quantities, availability, fulfillment, final pricing and payment.
        </p>

        <p style={{ display: "flex", alignItems: "flex-start", gap: "10px", fontSize: "0.88rem", color: "#2a0f08", margin: "0 0 8px 0" }}>
          <svg width="22" height="22" viewBox="0 0 24 24" fill="#b71c1c" style={{ flexShrink: 0 }}>
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
          </svg>
          <span>
            Prefer to talk now? Call us at{" "}
            <a href="tel:+12673232669" style={{ color: "#b71c1c", fontWeight: 700, textDecoration: "none" }}>(267) 323-2669</a>
          </span>
        </p>
        <p style={{ display: "flex", alignItems: "flex-start", gap: "10px", fontSize: "0.88rem", color: "#2a0f08", margin: 0 }}>
          <svg width="22" height="22" viewBox="0 0 24 24" fill="#1f8f4a" style={{ flexShrink: 0 }}>
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
          </svg>
          <span>
            WhatsApp: Message us at{" "}
            <a href="https://wa.me/12673232669" target="_blank" rel="noopener" style={{ color: "#1f8f4a", fontWeight: 700, textDecoration: "none" }}>(267) 323-2669</a>
          </span>
        </p>

      </form>
    </div>
  )
}

export default CateringForm