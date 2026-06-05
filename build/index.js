/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scripts/CateringForm.js"
/*!*************************************!*\
  !*** ./src/scripts/CateringForm.js ***!
  \*************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__);


// ─── CONFIGURACIÓN — cambia solo estos valores ───────────────────────────────

const EMAILJS_PUBLIC_KEY = "Et9iu2dz4an-CfbAk";
const EMAILJS_SERVICE_ID = "service_xq04hfa";
const EMAILJS_TEMPLATE_ID = "template_bdkb5dz";
const RECAPTCHA_SITE_KEY = "6LdxW-AsAAAAAIFAlAgMTkGn8pK8OLrbZ-sf7p_k";
// ─────────────────────────────────────────────────────────────────────────────

const INITIAL = {
  fullName: "",
  phone: "",
  email: "",
  eventDate: "",
  guests: "",
  eventType: "",
  message: "",
  honeypot: ""
};
const EVENT_TYPES = ["Quinceañera", "Wedding", "Birthday", "Corporate", "Community", "Other"];
function validate(fields) {
  const errors = {};
  if (!fields.fullName.trim()) errors.fullName = "Full name is required.";
  if (!fields.phone.trim()) errors.phone = "Phone number is required.";
  if (!fields.email.trim()) errors.email = "Email address is required.";else if (!/\S+@\S+\.\S+/.test(fields.email)) errors.email = "Enter a valid email.";
  if (!fields.eventDate) errors.eventDate = "Please select an event date.";
  if (!fields.guests || isNaN(fields.guests) || Number(fields.guests) < 1) errors.guests = "Enter a valid number of guests.";
  if (!fields.eventType) errors.eventType = "Please select an event type.";
  return errors;
}
function CateringForm() {
  const [fields, setFields] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(INITIAL);
  const [errors, setErrors] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)({});
  const [loading, setLoading] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [success, setSuccess] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [apiError, setApiError] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)("");
  const [captchaReady, setCaptchaReady] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [captchaError, setCaptchaError] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const recaptchaRef = (0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(null);
  const widgetIdRef = (0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(null);

  // ── Cargar EmailJS y reCAPTCHA via CDN ──────────────────────────────────
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    // EmailJS
    if (!window.emailjs) {
      const ejsScript = document.createElement("script");
      ejsScript.src = "https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js";
      ejsScript.onload = () => window.emailjs.init(EMAILJS_PUBLIC_KEY);
      document.head.appendChild(ejsScript);
    } else {
      window.emailjs.init(EMAILJS_PUBLIC_KEY);
    }

    // reCAPTCHA v2
    if (!window.grecaptcha) {
      const rcScript = document.createElement("script");
      rcScript.src = "https://www.google.com/recaptcha/api.js?render=explicit";
      rcScript.async = true;
      rcScript.defer = true;
      rcScript.onload = () => setCaptchaReady(true);
      document.head.appendChild(rcScript);
    } else {
      setCaptchaReady(true);
    }
  }, []);

  // ── Renderizar widget reCAPTCHA cuando esté listo ────────────────────────
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    if (captchaReady && recaptchaRef.current && widgetIdRef.current === null) {
      window.grecaptcha.ready(() => {
        if (recaptchaRef.current && widgetIdRef.current === null) {
          widgetIdRef.current = window.grecaptcha.render(recaptchaRef.current, {
            sitekey: RECAPTCHA_SITE_KEY,
            theme: "light",
            callback: () => setCaptchaError(false)
          });
        }
      });
    }
  }, [captchaReady]);
  function handleChange(e) {
    const {
      name,
      value
    } = e.target;
    setFields(prev => ({
      ...prev,
      [name]: value
    }));
    if (errors[name]) setErrors(prev => ({
      ...prev,
      [name]: ""
    }));
  }
  async function handleSubmit(e) {
    e.preventDefault();
    setApiError("");
    setCaptchaError(false);

    // Honeypot
    if (fields.honeypot) return;

    // Validación de campos
    const errs = validate(fields);
    if (Object.keys(errs).length) {
      setErrors(errs);
      return;
    }

    // Validación reCAPTCHA
    const captchaToken = window.grecaptcha?.getResponse(widgetIdRef.current);
    if (!captchaToken) {
      setCaptchaError(true);
      return;
    }
    setLoading(true);
    try {
      await window.emailjs.send(EMAILJS_SERVICE_ID, EMAILJS_TEMPLATE_ID, {
        from_name: fields.fullName,
        phone: fields.phone,
        email: fields.email,
        event_date: fields.eventDate,
        guests: fields.guests,
        event_type: fields.eventType,
        message: fields.message || "No additional message."
      });
      setSuccess(true);
      setFields(INITIAL);
      window.grecaptcha?.reset(widgetIdRef.current);
    } catch (err) {
      console.error("EmailJS error:", err);
      setApiError("Something went wrong. Please try again or call us directly.");
    } finally {
      setLoading(false);
    }
  }

  // ── ESTILOS ──────────────────────────────────────────────────────────────
  const card = {
    background: "#fff",
    border: "1px solid #e8e2d8",
    borderRadius: "4px",
    padding: "36px 32px",
    boxShadow: "0 4px 24px rgba(0,0,0,0.07)"
  };
  const label = {
    display: "block",
    fontFamily: "'Oswald', sans-serif",
    textTransform: "uppercase",
    letterSpacing: "0.09em",
    fontSize: "0.65rem",
    fontWeight: 600,
    color: "#444",
    marginBottom: "6px"
  };
  const inputStyle = hasError => ({
    width: "100%",
    padding: "10px 13px",
    fontSize: "0.85rem",
    color: "#1a1a1a",
    background: "#fdfcfb",
    border: `1px solid ${hasError ? "#C0392B" : "#ddd"}`,
    borderRadius: "3px",
    outline: "none",
    boxSizing: "border-box",
    transition: "border-color 0.2s",
    fontFamily: "inherit"
  });
  const errMsg = {
    fontSize: "0.72rem",
    color: "#C0392B",
    marginTop: "4px",
    display: "block"
  };
  const fieldWrap = {
    marginBottom: "16px"
  };

  // ── SUCCESS ──────────────────────────────────────────────────────────────
  if (success) {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
      style: {
        ...card,
        textAlign: "center",
        padding: "52px 32px"
      },
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        style: {
          width: "56px",
          height: "56px",
          borderRadius: "50%",
          background: "#f0faf0",
          border: "2px solid #2e7d32",
          display: "flex",
          alignItems: "center",
          justifyContent: "center",
          margin: "0 auto 20px"
        },
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
          width: "24",
          height: "24",
          viewBox: "0 0 24 24",
          fill: "none",
          stroke: "#2e7d32",
          strokeWidth: "2.5",
          strokeLinecap: "round",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("polyline", {
            points: "20 6 9 17 4 12"
          })
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("h3", {
        style: {
          fontFamily: "'Oswald', sans-serif",
          fontSize: "1.3rem",
          fontWeight: 700,
          color: "#1a1a1a",
          margin: "0 0 12px 0"
        },
        children: "Quote Request Received!"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
        style: {
          fontSize: "0.85rem",
          color: "#555",
          lineHeight: 1.75,
          margin: "0 0 24px 0"
        },
        children: "We'll review your request and get back to you within 24 hours."
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
        onClick: () => setSuccess(false),
        style: {
          fontFamily: "'Oswald', sans-serif",
          fontWeight: 600,
          textTransform: "uppercase",
          letterSpacing: "0.08em",
          fontSize: "0.72rem",
          padding: "9px 20px",
          borderRadius: "3px",
          border: "2px solid #C0392B",
          background: "transparent",
          color: "#C0392B",
          cursor: "pointer"
        },
        children: "Submit Another Request"
      })]
    });
  }

  // ── FORM ─────────────────────────────────────────────────────────────────
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
    style: card,
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("h3", {
      style: {
        fontFamily: "'Oswald', sans-serif",
        fontSize: "1.35rem",
        fontWeight: 700,
        color: "#1a1a1a",
        margin: "0 0 6px 0",
        lineHeight: 1.2
      },
      children: "Get Your Free Quote in 24 Hours"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
      style: {
        fontSize: "0.78rem",
        color: "#888",
        margin: "0 0 24px 0"
      },
      children: "Fill in the details below and we'll reach out shortly."
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
      style: {
        display: "none"
      },
      "aria-hidden": "true",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("input", {
        type: "text",
        name: "honeypot",
        tabIndex: -1,
        autoComplete: "off",
        value: fields.honeypot,
        onChange: handleChange
      })
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("form", {
      onSubmit: handleSubmit,
      noValidate: true,
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        style: fieldWrap,
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("label", {
          style: label,
          children: "Full Name *"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("input", {
          type: "text",
          name: "fullName",
          value: fields.fullName,
          onChange: handleChange,
          placeholder: "Maria Gonz\xE1lez",
          style: inputStyle(!!errors.fullName)
        }), errors.fullName && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
          style: errMsg,
          children: errors.fullName
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        style: {
          display: "grid",
          gridTemplateColumns: "1fr 1fr",
          gap: "14px"
        },
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
          style: fieldWrap,
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("label", {
            style: label,
            children: "Phone Number *"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("input", {
            type: "tel",
            name: "phone",
            value: fields.phone,
            onChange: handleChange,
            placeholder: "(267) 000-0000",
            style: inputStyle(!!errors.phone)
          }), errors.phone && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
            style: errMsg,
            children: errors.phone
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
          style: fieldWrap,
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("label", {
            style: label,
            children: "Email *"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("input", {
            type: "email",
            name: "email",
            value: fields.email,
            onChange: handleChange,
            placeholder: "you@email.com",
            style: inputStyle(!!errors.email)
          }), errors.email && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
            style: errMsg,
            children: errors.email
          })]
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        style: {
          display: "grid",
          gridTemplateColumns: "1fr 1fr",
          gap: "14px"
        },
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
          style: fieldWrap,
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("label", {
            style: label,
            children: "Event Date *"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("input", {
            type: "date",
            name: "eventDate",
            value: fields.eventDate,
            onChange: handleChange,
            style: inputStyle(!!errors.eventDate)
          }), errors.eventDate && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
            style: errMsg,
            children: errors.eventDate
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
          style: fieldWrap,
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("label", {
            style: label,
            children: "Number of Guests *"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("input", {
            type: "number",
            name: "guests",
            value: fields.guests,
            onChange: handleChange,
            placeholder: "50",
            min: "1",
            style: inputStyle(!!errors.guests)
          }), errors.guests && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
            style: errMsg,
            children: errors.guests
          })]
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        style: fieldWrap,
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("label", {
          style: label,
          children: "Event Type *"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("select", {
          name: "eventType",
          value: fields.eventType,
          onChange: handleChange,
          style: {
            ...inputStyle(!!errors.eventType),
            cursor: "pointer"
          },
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("option", {
            value: "",
            children: "Select event type\u2026"
          }), EVENT_TYPES.map(t => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("option", {
            value: t,
            children: t
          }, t))]
        }), errors.eventType && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
          style: errMsg,
          children: errors.eventType
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        style: fieldWrap,
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("label", {
          style: label,
          children: ["Tell Us About Your Event", " ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
            style: {
              fontWeight: 400,
              textTransform: "none",
              letterSpacing: 0
            },
            children: "(optional)"
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("textarea", {
          name: "message",
          value: fields.message,
          onChange: handleChange,
          rows: 3,
          placeholder: "Date, location, specific menu requests\u2026",
          style: {
            ...inputStyle(false),
            resize: "vertical",
            lineHeight: 1.6
          }
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        style: {
          marginBottom: "16px"
        },
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
          ref: recaptchaRef
        }), captchaError && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
          style: errMsg,
          children: "Please complete the CAPTCHA before submitting."
        })]
      }), apiError && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
        style: {
          background: "#fdf0f0",
          border: "1px solid #f5c6c6",
          borderRadius: "3px",
          padding: "10px 14px",
          fontSize: "0.8rem",
          color: "#C0392B",
          margin: "0 0 16px 0"
        },
        children: apiError
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
        type: "submit",
        disabled: loading,
        style: {
          width: "100%",
          fontFamily: "'Oswald', sans-serif",
          fontWeight: 700,
          textTransform: "uppercase",
          letterSpacing: "0.1em",
          fontSize: "0.8rem",
          padding: "14px 20px",
          borderRadius: "3px",
          border: "2px solid #C0392B",
          background: loading ? "#e8857a" : "#C0392B",
          color: "#fff",
          cursor: loading ? "not-allowed" : "pointer",
          transition: "background 0.2s"
        },
        children: loading ? "Sending…" : "Request My Catering Quote →"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
        style: {
          fontSize: "0.72rem",
          color: "#aaa",
          textAlign: "center",
          margin: "12px 0 0 0"
        },
        children: "We respond within 24 hours. No spam. No obligation."
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("p", {
        style: {
          fontSize: "0.78rem",
          color: "#666",
          textAlign: "center",
          margin: "10px 0 0 0"
        },
        children: ["Prefer WhatsApp?", " ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
          href: "https://wa.me/12673232669",
          target: "_blank",
          rel: "noopener",
          style: {
            color: "#25D366",
            fontWeight: 700,
            textDecoration: "none"
          },
          children: "\u2192 Message us at (267) 323-2669"
        })]
      })]
    })]
  });
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CateringForm);

/***/ },

/***/ "./src/scripts/ExampleReactComponent.js"
/*!**********************************************!*\
  !*** ./src/scripts/ExampleReactComponent.js ***!
  \**********************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__);


function ExampleReactComponent() {
  const [clickCount, setClickCount] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(0);
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
    className: "bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-4 rounded-md",
    onClick: () => setClickCount(prev => prev + 1),
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("h1", {
      className: "text-xl",
      children: "Hello from React!"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("p", {
      className: "text-sm",
      children: ["You have clicked on this component", " ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
        className: "text-yellow-200 font-bold",
        children: clickCount
      }), " times."]
    })]
  });
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ExampleReactComponent);

/***/ },

/***/ "./src/scripts/FloatingOrderBar.js"
/*!*****************************************!*\
  !*** ./src/scripts/FloatingOrderBar.js ***!
  \*****************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__);


function FloatingOrderBar() {
  const [visible, setVisible] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [dismissed, setDismissed] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    const timer = setTimeout(() => {
      if (!dismissed) setVisible(true);
    }, 2000);
    return () => clearTimeout(timer);
  }, [dismissed]);
  if (dismissed) return null;
  const deliveryServices = [{
    name: "Uber Eats",
    url: "https://www.ubereats.com/store/los-potrillos-restaurant/8f90E8-GRHOnsfKh0Y7SQQ?diningMode=PICKUP",
    from: "#06C167",
    to: "#038a47",
    border: "#06C167",
    icon: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("img", {
      src: "https://cdn.simpleicons.org/ubereats/white",
      alt: "Uber Eats",
      style: {
        width: "14px",
        height: "14px",
        objectFit: "contain",
        display: "block"
      }
    })
  }, {
    name: "DoorDash",
    url: "https://www.doordash.com/store/los-potrillos-restaurant-philadelphia-520750/691091/?utm_source=mx_share",
    from: "#FF3008",
    to: "#cc2606",
    border: "#FF3008",
    icon: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("img", {
      src: "https://cdn.simpleicons.org/doordash/white",
      alt: "DoorDash",
      style: {
        width: "14px",
        height: "14px",
        objectFit: "contain",
        display: "block"
      }
    })
  }, {
    name: "Grubhub",
    url: "https://www.grubhub.com/restaurant/los-potrillos-restaurant-2617-e-venango-st-philadelphia/1939231?utm_source=grubhub_web&utm_medium=content_owned&utm_campaign=menushare&utm_content=share-link",
    from: "#F63440",
    to: "#c4101b",
    border: "#F63440",
    icon: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      viewBox: "0 0 24 24",
      fill: "currentColor",
      style: {
        width: "14px",
        height: "14px",
        color: "#fff"
      },
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 3c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7 3.134-7 7-7zm1 3.5h-2.5A3.5 3.5 0 007 12a3.5 3.5 0 003.5 3.5H13a.5.5 0 00.5-.5v-3H11v1.5h1v.5h-.5A2 2 0 019 12a2 2 0 012-2h2V8.5z"
      })
    })
  }, {
    name: "Menú",
    url: "https://fromtherestaurant.com/los-potrillos-restaurant/locations/",
    from: "#C0392B",
    to: "#a93226",
    border: "#C0392B",
    icon: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("svg", {
      viewBox: "5 6 52 52",
      fill: "currentColor",
      style: {
        width: "14px",
        height: "14px",
        color: "#fff"
      },
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("rect", {
        x: "16.8",
        y: "8",
        width: "2.6",
        height: "13",
        rx: "1.3"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("rect", {
        x: "20.7",
        y: "8",
        width: "2.6",
        height: "13",
        rx: "1.3"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("rect", {
        x: "24.6",
        y: "8",
        width: "2.6",
        height: "13",
        rx: "1.3"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("rect", {
        x: "16.8",
        y: "19",
        width: "10.4",
        height: "5",
        rx: "2.5"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("rect", {
        x: "20",
        y: "23",
        width: "4",
        height: "33",
        rx: "2"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M45 33 L45 12 Q45 8 42 8 Q40 11 40 21 L40 33 Z"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("rect", {
        x: "40",
        y: "31",
        width: "5",
        height: "25",
        rx: "2.5"
      })]
    })
  }];
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("style", {
      children: `
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
      `
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
      className: "pfloat-bar",
      role: "complementary",
      "aria-label": "Order pickup",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        className: "pfloat-logo",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("img", {
          src: "/wp-content/uploads/2026/05/Horses-_WB-Photoroom.png",
          alt: "Los Potrillos"
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        className: "pfloat-text",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
          className: "pfloat-title",
          children: "Los Potrillos Restaurant"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
          className: "pfloat-sub",
          children: "Order pickup \xB7 Port Richmond, Philadelphia"
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        className: "pfloat-divider"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        className: "pfloat-delivery",
        children: deliveryServices.map(({
          name,
          url,
          from,
          to,
          border,
          icon
        }) => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
          href: url,
          target: "_blank",
          rel: "noopener noreferrer",
          className: "pfloat-delivery-btn",
          style: {
            background: `linear-gradient(135deg, ${from}, ${to})`,
            border: `1px solid ${border}80`
          },
          "aria-label": name,
          title: name,
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
            style: {
              display: "flex",
              alignItems: "center",
              justifyContent: "center"
            },
            children: icon
          })
        }, name))
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        className: "pfloat-divider"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
        href: "https://los-potrillos-restaurant.cloveronline.com/menu/all",
        target: "_blank",
        rel: "noopener noreferrer",
        className: "pfloat-cta",
        children: "Order Now"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
        className: "pfloat-dismiss",
        onClick: () => {
          setVisible(false);
          setTimeout(() => setDismissed(true), 400);
        },
        "aria-label": "Close",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("svg", {
          width: "10",
          height: "10",
          viewBox: "0 0 24 24",
          fill: "none",
          stroke: "currentColor",
          strokeWidth: "2.5",
          strokeLinecap: "round",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("line", {
            x1: "18",
            y1: "6",
            x2: "6",
            y2: "18"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("line", {
            x1: "6",
            y1: "6",
            x2: "18",
            y2: "18"
          })]
        })
      })]
    })]
  });
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FloatingOrderBar);

/***/ },

/***/ "./src/scripts/Footer.js"
/*!*******************************!*\
  !*** ./src/scripts/Footer.js ***!
  \*******************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__);


function Footer() {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("style", {
      children: `
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
      `
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
      className: "pfooter",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        style: {
          background: "#f7f4f0",
          borderTop: "1px solid #ece8e2",
          padding: "40px 24px"
        },
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
          style: {
            maxWidth: "1180px",
            margin: "0 auto"
          },
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
            className: "pfooter-truck-inner",
            style: {
              display: "flex",
              alignItems: "center",
              gap: "32px"
            },
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("img", {
              src: "/wp-content/uploads/2026/05/FoodTruck-scaled.jpg",
              alt: "Los Potrillos Food Truck",
              className: "pfooter-truck-img",
              style: {
                width: "260px",
                height: "160px",
                objectFit: "cover",
                borderRadius: "8px",
                flexShrink: 0,
                background: "#e8e2da"
              }
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
                style: {
                  fontFamily: "'Oswald', sans-serif",
                  textTransform: "uppercase",
                  letterSpacing: "0.14em",
                  fontSize: "0.65rem",
                  fontWeight: 600,
                  color: "#C0392B",
                  marginBottom: "6px",
                  margin: "0 0 6px 0"
                },
                children: "Also catch us on the streets"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("h3", {
                style: {
                  fontFamily: "'Oswald', sans-serif",
                  fontSize: "1.35rem",
                  fontWeight: 600,
                  color: "#1a1a1a",
                  margin: "0 0 8px 0",
                  lineHeight: 1.25
                },
                children: "Find Our Food Truck Around Philadelphia"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
                style: {
                  fontSize: "0.85rem",
                  color: "#666",
                  margin: "0 0 12px 0",
                  lineHeight: 1.6
                },
                children: "We bring the Puebla flavor to events, festivals, and locations across the city."
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                href: "https://foodtruck.restaurantpotrillos.com/",
                target: "_blank",
                rel: "noopener noreferrer",
                className: "pfooter-truck-link",
                children: "Visit the Foodtruck \u2192"
              })]
            })]
          })
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        style: {
          background: "#C0392B",
          padding: "64px 24px",
          textAlign: "center"
        },
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
          style: {
            maxWidth: "700px",
            margin: "0 auto"
          },
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("h2", {
            style: {
              fontFamily: "'Oswald', sans-serif",
              fontSize: "clamp(1.6rem, 4vw, 2.4rem)",
              fontWeight: 700,
              color: "#fff",
              lineHeight: 1.2,
              margin: "0 0 32px 0",
              letterSpacing: "0.01em"
            },
            children: "Hungry Yet? Order Now \u2014 Or Plan Your Next Event With Us."
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
            className: "pfooter-cta-buttons",
            style: {
              display: "flex",
              justifyContent: "center",
              gap: "16px",
              flexWrap: "wrap"
            },
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
              href: "/https://los-potrillos-restaurant.cloveronline.com/menu/all",
              className: "pfooter-cta-primary",
              children: "Order Pickup Now \u2192"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
              href: "/contact",
              className: "pfooter-cta-secondary",
              children: "Get a Catering Quote \u2192"
            })]
          })]
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        style: {
          background: "#111111",
          padding: "60px 24px 0"
        },
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
          style: {
            maxWidth: "1180px",
            margin: "0 auto"
          },
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
            className: "pfooter-grid",
            style: {
              display: "grid",
              gridTemplateColumns: "1.4fr 1fr 1fr 1fr",
              gap: "40px",
              paddingBottom: "48px"
            },
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                href: "/",
                style: {
                  display: "inline-block",
                  marginBottom: "18px",
                  lineHeight: 0
                },
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("img", {
                  src: "/wp-content/uploads/2026/05/PotrillosNegativeBrandLogo-scaled.png",
                  alt: "Los Potrillos",
                  style: {
                    height: "52px",
                    width: "auto",
                    display: "block"
                  }
                })
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
                style: {
                  fontSize: "0.82rem",
                  color: "#b0b0b0",
                  lineHeight: 1.7,
                  margin: "0 0 10px 0"
                },
                children: "Authentic Puebla-style Mexican food, made fresh in Philadelphia."
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
                style: {
                  fontSize: "0.78rem",
                  color: "#666",
                  lineHeight: 1.6,
                  fontStyle: "italic",
                  margin: 0
                },
                children: "Family-owned. Family-run. Family-fed."
              })]
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
                className: "pfooter-col-heading",
                children: "Visit Us"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("address", {
                style: {
                  fontStyle: "normal"
                },
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("a", {
                  href: "https://maps.google.com/?q=2617+E+Venango+St+Philadelphia+PA",
                  target: "_blank",
                  rel: "noopener noreferrer",
                  className: "pfooter-col-link",
                  children: ["2617 E Venango St", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("br", {}), "Philadelphia, PA 19134"]
                })
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("p", {
                style: {
                  fontSize: "0.82rem",
                  color: "#b0b0b0",
                  lineHeight: 1.9,
                  margin: "12px 0 0 0"
                },
                children: ["Mon\u2013Sat: 10am \u2013 9pm", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("br", {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
                  style: {
                    color: "#666"
                  },
                  children: "Sunday: Closed"
                })]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                href: "tel:+12673232669",
                className: "pfooter-col-link",
                style: {
                  marginTop: "10px"
                },
                children: "(267) 323-2669"
              })]
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
                className: "pfooter-col-heading",
                children: "Explore"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("nav", {
                style: {
                  display: "flex",
                  flexDirection: "column"
                },
                children: [{
                  label: "Menu",
                  href: "/menu"
                }, {
                  label: "Catering",
                  href: "/contact"
                }, {
                  label: "Our Story",
                  href: "/our-story"
                }, {
                  label: "Careers",
                  href: "/careers"
                }, {
                  label: "Contact",
                  href: "/contact"
                }].map(({
                  label,
                  href
                }) => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                  href: href,
                  className: "pfooter-col-link",
                  children: label
                }, label))
              })]
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
                className: "pfooter-col-heading",
                children: "Follow Us"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
                className: "pfooter-social",
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                  href: "https://www.instagram.com/potrillosrestaurantphilly/",
                  target: "_blank",
                  rel: "noopener noreferrer",
                  "aria-label": "Instagram",
                  children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
                    width: "17",
                    height: "17",
                    viewBox: "0 0 24 24",
                    fill: "currentColor",
                    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
                      d: "M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                    })
                  })
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                  href: "https://www.facebook.com/lospotrillosrestaurantphilly",
                  target: "_blank",
                  rel: "noopener noreferrer",
                  "aria-label": "Facebook",
                  children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
                    width: "17",
                    height: "17",
                    viewBox: "0 0 24 24",
                    fill: "currentColor",
                    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
                      d: "M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                    })
                  })
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                  href: "https://www.tiktok.com/@lospotrillosrestaurant",
                  target: "_blank",
                  rel: "noopener noreferrer",
                  "aria-label": "TikTok",
                  children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
                    width: "17",
                    height: "17",
                    viewBox: "0 0 24 24",
                    fill: "currentColor",
                    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
                      d: "M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"
                    })
                  })
                })]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
                className: "pfooter-col-heading",
                style: {
                  marginBottom: "8px"
                },
                children: "Order Online"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                href: "https://los-potrillos-restaurant.cloveronline.com/menu/all",
                className: "pfooter-order-link",
                style: {
                  marginBottom: "18px",
                  display: "inline-flex"
                },
                children: "Order Pickup \u2192"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
                className: "pfooter-col-heading",
                style: {
                  marginTop: "16px",
                  marginBottom: "8px"
                },
                children: "Catering"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                href: "/contact",
                className: "pfooter-order-link",
                children: "Get a Quote \u2192"
              })]
            })]
          })
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
          style: {
            borderTop: "1px solid #222",
            padding: "18px 24px"
          },
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
            className: "pfooter-bottom-bar",
            style: {
              maxWidth: "1180px",
              margin: "0 auto",
              display: "flex",
              alignItems: "center",
              justifyContent: "space-between",
              gap: "12px"
            },
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
              style: {
                fontSize: "0.68rem",
                color: "#555",
                margin: 0
              },
              children: "\xA9 2026 Los Potrillos Restaurant Inc. All rights reserved."
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
              className: "pfooter-bottom-links",
              style: {
                display: "flex",
                gap: "18px"
              },
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                href: "/privacy-policy",
                className: "pfooter-bottom-link",
                children: "Privacy Policy"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                href: "/terms-conditions",
                className: "pfooter-bottom-link",
                children: "Terms & Conditions"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
                href: "#",
                className: "pfooter-bottom-link",
                children: "Site Map"
              })]
            })]
          })
        })]
      })]
    })]
  });
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Footer);

/***/ },

/***/ "./src/scripts/Navbar.js"
/*!*******************************!*\
  !*** ./src/scripts/Navbar.js ***!
  \*******************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__);


function Navbar() {
  const [scrolled, setScrolled] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [menuOpen, setMenuOpen] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    const link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = "https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap";
    document.head.appendChild(link);
    const onScroll = () => setScrolled(window.scrollY > 200);
    window.addEventListener("scroll", onScroll);
    return () => window.removeEventListener("scroll", onScroll);
  }, []);
  const navLinks = [{
    label: "Home",
    href: "/",
    external: false
  }, {
    label: "Menu",
    href: "https://los-potrillos-restaurant.cloveronline.com/menu/all",
    external: true
  }, {
    label: "Catering",
    href: "/catering",
    external: false
  }, {
    label: "Our Story",
    href: "/our-story",
    external: false
  }, {
    label: "Contact",
    href: "/contact",
    external: false
  }];
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("style", {
      children: `
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
      `
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
      className: "pnav",
      style: {
        position: "fixed",
        top: 0,
        left: 0,
        right: 0,
        zIndex: 1000,
        boxShadow: scrolled ? "0 2px 16px rgba(0,0,0,0.12)" : "none",
        transition: "box-shadow 0.35s ease"
      },
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        style: {
          background: "#f5f5f5",
          borderBottom: "1px solid #e0e0e0",
          padding: "10px 0"
        },
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
          style: {
            maxWidth: "1440px",
            margin: "0 auto",
            padding: "0 32px",
            display: "flex",
            alignItems: "center",
            justifyContent: "space-between",
            gap: "16px"
          },
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
            style: {
              display: "flex",
              alignItems: "center",
              gap: "20px",
              flexShrink: 0
            },
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("a", {
              href: "tel:+12673232669",
              className: "pnav-util-link",
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
                width: "11",
                height: "11",
                viewBox: "0 0 24 24",
                fill: "#C0392B",
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
                  d: "M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"
                })
              }), "(267) 323-2669"]
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("a", {
              href: "mailto:info@restaurantpotrillos.com",
              className: "pnav-util-link pnav-util-email",
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("svg", {
                width: "11",
                height: "11",
                viewBox: "0 0 24 24",
                fill: "none",
                stroke: "#C0392B",
                strokeWidth: "2",
                strokeLinecap: "round",
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
                  d: "M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("polyline", {
                  points: "22,6 12,13 2,6"
                })]
              }), "info@restaurantpotrillos.com"]
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("span", {
              className: "pnav-util-link",
              style: {
                cursor: "default"
              },
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
                width: "11",
                height: "11",
                viewBox: "0 0 24 24",
                fill: "#C0392B",
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
                  d: "M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"
                })
              }), "Mon \u2013 Sat \xA0 10am \u2013 9pm"]
            })]
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
            style: {
              display: "flex",
              justifyContent: "center",
              flex: 1
            },
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("a", {
              href: "https://maps.google.com/?q=2617+E+Venango+St+Philadelphia+PA",
              target: "_blank",
              rel: "noopener noreferrer",
              className: "pnav-util-link pnav-util-address",
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
                width: "11",
                height: "11",
                viewBox: "0 0 24 24",
                fill: "#C0392B",
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
                  d: "M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"
                })
              }), "2617 E Venango St, Philadelphia, PA"]
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
            style: {
              display: "flex",
              alignItems: "center",
              gap: "16px",
              flexShrink: 0
            },
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
              href: "https://www.tiktok.com/@lospotrillosrestaurant",
              target: "_blank",
              rel: "noopener noreferrer",
              "aria-label": "TikTok",
              className: "pnav-social-link",
              children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
                width: "14",
                height: "14",
                viewBox: "0 0 24 24",
                fill: "currentColor",
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
                  d: "M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"
                })
              })
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
              href: "https://www.instagram.com/potrillosrestaurantphilly/",
              target: "_blank",
              rel: "noopener noreferrer",
              "aria-label": "Instagram",
              className: "pnav-social-link",
              children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
                width: "14",
                height: "14",
                viewBox: "0 0 24 24",
                fill: "currentColor",
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
                  d: "M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                })
              })
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
              href: "https://www.facebook.com/lospotrillosrestaurantphilly",
              target: "_blank",
              rel: "noopener noreferrer",
              "aria-label": "Facebook",
              className: "pnav-social-link",
              children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
                width: "14",
                height: "14",
                viewBox: "0 0 24 24",
                fill: "currentColor",
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
                  d: "M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                })
              })
            })]
          })]
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        style: {
          background: "#ffffff",
          borderBottom: "1px solid #e8e8e8",
          padding: scrolled ? "10px 0" : "14px 0",
          transition: "padding 0.35s ease"
        },
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
          style: {
            maxWidth: "1440px",
            margin: "0 auto",
            padding: "0 32px",
            display: "flex",
            alignItems: "center",
            justifyContent: "space-between",
            gap: "16px"
          },
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("a", {
            href: "/",
            style: {
              flexShrink: 0,
              lineHeight: 0,
              display: "flex",
              flexDirection: "column",
              alignItems: "center",
              gap: "2px"
            },
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("img", {
              src: "/wp-content/uploads/2026/05/Horses-_WB-Photoroom.png",
              alt: "Los Potrillos \u2014 horses",
              style: {
                height: scrolled ? "24px" : "32px",
                width: "auto",
                transition: "height 0.35s ease",
                display: "block"
              }
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("img", {
              src: "/wp-content/uploads/2026/05/Los-Potrillos-_WB-scaled.png",
              alt: "Los Potrillos",
              style: {
                height: scrolled ? "28px" : "36px",
                width: "auto",
                transition: "height 0.35s ease",
                display: "block"
              }
            })]
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("nav", {
            className: "pnav-desktop-links",
            style: {
              display: "flex",
              alignItems: "center",
              gap: "30px"
            },
            children: navLinks.map(({
              label,
              href,
              external
            }) => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
              href: href,
              className: "pnav-link",
              ...(external ? {
                target: "_blank",
                rel: "noopener noreferrer"
              } : {}),
              children: label
            }, label))
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
            style: {
              display: "flex",
              alignItems: "center",
              gap: "10px",
              flexShrink: 0
            },
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
              href: "https://los-potrillos-restaurant.cloveronline.com/menu/all",
              className: "pnav-cta-primary",
              children: "Order Pickup"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
              href: "/contact",
              className: "pnav-cta-secondary",
              children: "Catering Quote"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
              onClick: () => setMenuOpen(o => !o),
              "aria-label": menuOpen ? "Close menu" : "Open menu",
              className: "pnav-hamburger",
              style: {
                display: "none",
                alignItems: "center",
                justifyContent: "center",
                background: "transparent",
                border: "none",
                cursor: "pointer",
                padding: "4px",
                color: "#1a1a1a",
                marginLeft: "4px"
              },
              children: menuOpen ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("svg", {
                width: "22",
                height: "22",
                viewBox: "0 0 24 24",
                fill: "none",
                stroke: "currentColor",
                strokeWidth: "2.5",
                strokeLinecap: "round",
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("line", {
                  x1: "18",
                  y1: "6",
                  x2: "6",
                  y2: "18"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("line", {
                  x1: "6",
                  y1: "6",
                  x2: "18",
                  y2: "18"
                })]
              }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("svg", {
                width: "22",
                height: "22",
                viewBox: "0 0 24 24",
                fill: "none",
                stroke: "currentColor",
                strokeWidth: "2.5",
                strokeLinecap: "round",
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("line", {
                  x1: "3",
                  y1: "7",
                  x2: "21",
                  y2: "7"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("line", {
                  x1: "3",
                  y1: "12",
                  x2: "21",
                  y2: "12"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("line", {
                  x1: "3",
                  y1: "17",
                  x2: "21",
                  y2: "17"
                })]
              })
            })]
          })]
        }), menuOpen && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
          className: "pnav-mobile-menu pnav-mobile-enter",
          style: {
            background: "#ffffff",
            borderTop: "1px solid #ebebeb",
            padding: "8px 24px 20px"
          },
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("nav", {
            style: {
              display: "flex",
              flexDirection: "column"
            },
            children: navLinks.map(({
              label,
              href,
              external
            }) => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
              href: href,
              onClick: () => setMenuOpen(false),
              ...(external ? {
                target: "_blank",
                rel: "noopener noreferrer"
              } : {}),
              style: {
                fontFamily: "'Oswald', sans-serif",
                textTransform: "uppercase",
                letterSpacing: "0.09em",
                fontSize: "0.88rem",
                fontWeight: 500,
                color: "#1a1a1a",
                textDecoration: "none",
                padding: "11px 0",
                borderBottom: "1px solid #f0f0f0",
                transition: "color 0.2s"
              },
              onMouseEnter: e => e.currentTarget.style.color = "#C0392B",
              onMouseLeave: e => e.currentTarget.style.color = "#1a1a1a",
              children: label
            }, label))
          })
        })]
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
      style: {
        height: scrolled ? "64px" : "120px",
        transition: "height 0.35s ease"
      }
    })]
  });
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Navbar);

/***/ },

/***/ "./src/scripts/Person.js"
/*!*******************************!*\
  !*** ./src/scripts/Person.js ***!
  \*******************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class Person {
  constructor(name) {
    this.name = name;
    this.greet();
  }
  greet() {
    console.log(`Hello, my name is ${this.name}.`);
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Person);

/***/ },

/***/ "react"
/*!************************!*\
  !*** external "React" ***!
  \************************/
(module) {

module.exports = window["React"];

/***/ },

/***/ "react-dom/client"
/*!***************************!*\
  !*** external "ReactDOM" ***!
  \***************************/
(module) {

module.exports = window["ReactDOM"];

/***/ },

/***/ "react/jsx-runtime"
/*!**********************************!*\
  !*** external "ReactJSXRuntime" ***!
  \**********************************/
(module) {

module.exports = window["ReactJSXRuntime"];

/***/ }

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		if (!(moduleId in __webpack_modules__)) {
/******/ 			delete __webpack_module_cache__[moduleId];
/******/ 			var e = new Error("Cannot find module '" + moduleId + "'");
/******/ 			e.code = 'MODULE_NOT_FOUND';
/******/ 			throw e;
/******/ 		}
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scripts_Person__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scripts/Person */ "./src/scripts/Person.js");
/* harmony import */ var _scripts_ExampleReactComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scripts/ExampleReactComponent */ "./src/scripts/ExampleReactComponent.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react_dom_client__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react-dom/client */ "react-dom/client");
/* harmony import */ var react_dom_client__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react_dom_client__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _scripts_Navbar__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./scripts/Navbar */ "./src/scripts/Navbar.js");
/* harmony import */ var _scripts_Footer__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./scripts/Footer */ "./src/scripts/Footer.js");
/* harmony import */ var _scripts_CateringForm__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./scripts/CateringForm */ "./src/scripts/CateringForm.js");
/* harmony import */ var _scripts_FloatingOrderBar__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./scripts/FloatingOrderBar */ "./src/scripts/FloatingOrderBar.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__);









const person1 = new _scripts_Person__WEBPACK_IMPORTED_MODULE_0__["default"]("Brad");
if (document.querySelector("#render-react-example-here")) {
  const root = react_dom_client__WEBPACK_IMPORTED_MODULE_3___default().createRoot(document.querySelector("#render-react-example-here"));
  root.render(/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)(_scripts_ExampleReactComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {}));
}
if (document.querySelector("#render-navbar-here")) {
  const root = react_dom_client__WEBPACK_IMPORTED_MODULE_3___default().createRoot(document.querySelector("#render-navbar-here"));
  root.render(/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)(_scripts_Navbar__WEBPACK_IMPORTED_MODULE_4__["default"], {}));
}
if (document.querySelector("#render-footer-here")) {
  const root = react_dom_client__WEBPACK_IMPORTED_MODULE_3___default().createRoot(document.querySelector("#render-footer-here"));
  root.render(/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)(_scripts_Footer__WEBPACK_IMPORTED_MODULE_5__["default"], {}));
}
if (document.querySelector("#render-catering-form-here")) {
  const root = react_dom_client__WEBPACK_IMPORTED_MODULE_3___default().createRoot(document.querySelector("#render-catering-form-here"));
  root.render(/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)(_scripts_CateringForm__WEBPACK_IMPORTED_MODULE_6__["default"], {}));
}
if (document.querySelector("#render-floating-bar-here")) {
  const root = react_dom_client__WEBPACK_IMPORTED_MODULE_3___default().createRoot(document.querySelector("#render-floating-bar-here"));
  root.render(/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)(_scripts_FloatingOrderBar__WEBPACK_IMPORTED_MODULE_7__["default"], {}));
}
})();

/******/ })()
;
//# sourceMappingURL=index.js.map