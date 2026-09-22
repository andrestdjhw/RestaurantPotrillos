<?php

function boilerplate_load_assets() {
  wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element', 'react-jsx-runtime'), '1.0', true);
  wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'));

  // Slow automatic zoom in/out on photo sections (Catering, Our Story)
  wp_add_inline_style('ourmaincss', '
    @keyframes site-kb {
      from { transform: scale(1) translate(0, 0); }
      to   { transform: scale(1.4) translate(-5%, -3%); }
    }
    .ct-hero-media img, .ct-event-card img, .os-hero-img img, .os-split-img img, .kb-img {
      animation: site-kb 11s ease-in-out infinite alternate;
    }
    .ct-event-card:nth-child(even) img { animation-delay: -5s; animation-direction: alternate-reverse; }
    @media (prefers-reduced-motion: reduce) {
      .ct-hero-media img, .ct-event-card img, .os-hero-img img, .os-split-img img, .kb-img { animation: none; }
    }
  ');

  // Agrega solo esta línea nueva:
  wp_localize_script('ourmainjs', 'themeData', array(
    'logoUrl' => get_theme_file_uri('/assets/logo.png'),
  ));
}

add_action('wp_enqueue_scripts', 'boilerplate_load_assets');

function boilerplate_add_support() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'boilerplate_add_support');

// ── Catering page SEO ───────────────────────────────────────────────
function boilerplate_is_catering() {
  return is_page_template('catering-template.php');
}

function boilerplate_catering_title($title) {
  if (boilerplate_is_catering()) {
    return 'Mexican Catering in Philadelphia | Los Potrillos Restaurant';
  }
  return $title;
}
add_filter('pre_get_document_title', 'boilerplate_catering_title');

function boilerplate_catering_meta() {
  if (boilerplate_is_catering()) {
    echo '<meta name="description" content="Authentic Puebla-style Mexican catering in Philadelphia for quinceañeras, weddings, office lunches and community events. Explore the menu and request a quote.">' . "\n";
  }
}
add_action('wp_head', 'boilerplate_catering_meta', 1);

// ── Tracking (GA4 / GTM dataLayer) + UTM capture ────────────────────
function boilerplate_tracking_script() { ?>
<script>
(function () {
  window.dataLayer = window.dataLayer || [];
  // Remember UTM parameters for the session so forms can attach them
  try {
    var qs = new URLSearchParams(window.location.search), saved = {};
    ['utm_source','utm_medium','utm_campaign','utm_term','utm_content'].forEach(function (k) {
      if (qs.get(k)) saved[k] = qs.get(k);
    });
    if (Object.keys(saved).length) sessionStorage.setItem('lp_utm', JSON.stringify(saved));
  } catch (e) {}
  document.addEventListener('click', function (e) {
    var a = e.target.closest('a');
    if (!a) return;
    var href = a.getAttribute('href') || '', ev = a.getAttribute('data-track');
    if (!ev && href.indexOf('tel:') === 0) ev = 'phone_click';
    if (!ev && href.indexOf('wa.me') !== -1) ev = 'whatsapp_click';
    if (ev) window.dataLayer.push({ event: ev });
  });
})();
</script>
<?php }
add_action('wp_footer', 'boilerplate_tracking_script');
