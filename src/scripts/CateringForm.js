import React, { useState, useEffect, useRef } from "react"

// ─── CONFIGURACIÓN — cambia solo estos valores ───────────────────────────────
const EMAILJS_PUBLIC_KEY  = "YOUR_PUBLIC_KEY"
const EMAILJS_SERVICE_ID  = "YOUR_SERVICE_ID"
const EMAILJS_TEMPLATE_ID = "YOUR_TEMPLATE_ID"
const RECAPTCHA_SITE_KEY  = "YOUR_RECAPTCHA_SITE_KEY"
// ─────────────────────────────────────────────────────────────────────────────

const INITIAL = {
  fullName:  "",
  phone:     "",
  email:     "",
  eventDate: "",
  guests:    "",
  eventType: "",
  message:   "",
  honeypot:  "",
}

const EVENT_TYPES = [
  "Quinceañera",
  "Wedding",
  "Birthday",
  "Corporate",
  "Community",
  "Other",
]

function validate(fields) {
  const errors = {}
  if (!fields.fullName.trim())  errors.fullName  = "Full name is required."
  if (!fields.phone.trim())     errors.phone     = "Phone number is required."
  if (!fields.email.trim())     errors.email     = "Email address is required."
  else if (!/\S+@\S+\.\S+/.test(fields.email)) errors.email = "Enter a valid email."
  if (!fields.eventDate)        errors.eventDate = "Please select an event date."
  if (!fields.guests || isNaN(fields.guests) || Number(fields.guests) < 1)
                                errors.guests    = "Enter a valid number of guests."
  if (!fields.eventType)        errors.eventType = "Please select an event type."
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
      widgetIdRef.current = window.grecaptcha.render(recaptchaRef.current, {
        sitekey:  RECAPTCHA_SITE_KEY,
        theme:    "light",
        callback: () => setCaptchaError(false),
      })
    }
  }, [captchaReady])

  function handleChange(e) {
    const { name, value } = e.target
    setFields(prev => ({ ...prev, [name]: value }))
    if (errors[name]) setErrors(prev => ({ ...prev, [name]: "" }))
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
      await window.emailjs.send(
        EMAILJS_SERVICE_ID,
        EMAILJS_TEMPLATE_ID,
        {
          from_name:  fields.fullName,
          phone:      fields.phone,
          email:      fields.email,
          event_date: fields.eventDate,
          guests:     fields.guests,
          event_type: fields.eventType,
          message:    fields.message || "No additional message.",
        }
      )
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
    background:   "#fff",
    border:       "1px solid #e8e2d8",
    borderRadius: "4px",
    padding:      "36px 32px",
    boxShadow:    "0 4px 24px rgba(0,0,0,0.07)",
  }
  const label = {
    display:       "block",
    fontFamily:    "'Oswald', sans-serif",
    textTransform: "uppercase",
    letterSpacing: "0.09em",
    fontSize:      "0.65rem",
    fontWeight:    600,
    color:         "#444",
    marginBottom:  "6px",
  }
  const inputStyle = (hasError) => ({
    width:        "100%",
    padding:      "10px 13px",
    fontSize:     "0.85rem",
    color:        "#1a1a1a",
    background:   "#fdfcfb",
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
      <h3 style={{ fontFamily: "'Oswald', sans-serif", fontSize: "1.35rem", fontWeight: 700, color: "#1a1a1a", margin: "0 0 6px 0", lineHeight: 1.2 }}>
        Get Your Free Quote in 24 Hours
      </h3>
      <p style={{ fontSize: "0.78rem", color: "#888", margin: "0 0 24px 0" }}>
        Fill in the details below and we'll reach out shortly.
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
            <input type="date" name="eventDate" value={fields.eventDate}
              onChange={handleChange} style={inputStyle(!!errors.eventDate)} />
            {errors.eventDate && <span style={errMsg}>{errors.eventDate}</span>}
          </div>
          <div style={fieldWrap}>
            <label style={label}>Number of Guests *</label>
            <input type="number" name="guests" value={fields.guests}
              onChange={handleChange} placeholder="50" min="1"
              style={inputStyle(!!errors.guests)} />
            {errors.guests && <span style={errMsg}>{errors.guests}</span>}
          </div>
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
          <label style={label}>
            Tell Us About Your Event{" "}
            <span style={{ fontWeight: 400, textTransform: "none", letterSpacing: 0 }}>(optional)</span>
          </label>
          <textarea name="message" value={fields.message}
            onChange={handleChange} rows={3}
            placeholder="Date, location, specific menu requests…"
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
            border: "2px solid #C0392B",
            background: loading ? "#e8857a" : "#C0392B",
            color: "#fff", cursor: loading ? "not-allowed" : "pointer",
            transition: "background 0.2s",
          }}
        >
          {loading ? "Sending…" : "Request My Catering Quote →"}
        </button>

        <p style={{ fontSize: "0.72rem", color: "#aaa", textAlign: "center", margin: "12px 0 0 0" }}>
          We respond within 24 hours. No spam. No obligation.
        </p>

        <p style={{ fontSize: "0.78rem", color: "#666", textAlign: "center", margin: "10px 0 0 0" }}>
          Prefer WhatsApp?{" "}
          <a href="https://wa.me/12673232669" target="_blank" rel="noopener"
            style={{ color: "#25D366", fontWeight: 700, textDecoration: "none" }}>
            → Message us at (267) 323-2669
          </a>
        </p>

      </form>
    </div>
  )
}

export default CateringForm