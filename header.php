<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
      // Google Consent Mode v2 default — set before any analytics/ads tag loads
      // (GTM, GA, Meta Pixel, etc.), so those tags respect the visitor's choice
      // from the first request. Safe to keep even before GTM is installed.
      (function () {
        window.dataLayer = window.dataLayer || [];
        function gtag() { window.dataLayer.push(arguments); }
        var saved = null;
        try { saved = window.localStorage.getItem('lp_cookie_consent'); } catch (e) {}
        var granted = saved === 'accepted';
        gtag('consent', 'default', {
          ad_storage:         granted ? 'granted' : 'denied',
          analytics_storage:  granted ? 'granted' : 'denied',
          ad_user_data:       granted ? 'granted' : 'denied',
          ad_personalization: granted ? 'granted' : 'denied',
          wait_for_update:    500,
        });
      })();
    </script>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="render-navbar-here"></div>
    <div id="render-floating-bar-here"></div>
    <div id="render-cookie-consent-here"></div>