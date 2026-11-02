<?php
/*
 * Template Name: Sitemap Template
 */

get_header();

/*
 * Sitemap sections — edit here.
 * Mirrors the links already used across header.php / Navbar.js / Footer.js.
 * 'external' => true opens in a new tab.
 */
$sitemap = [
  [
    'title' => 'Main Pages',
    'links' => [
      ['label' => 'Home',      'href' => '/'],
      ['label' => 'Menu',      'href' => '/menu'],
      ['label' => 'Catering',  'href' => '/catering'],
      ['label' => 'Our Story', 'href' => '/our-story'],
      ['label' => 'Contact',   'href' => '/contact'],
    ],
  ],
  [
    'title' => 'Order & Delivery',
    'links' => [
      ['label' => 'Order Pickup (Clover)', 'href' => 'https://los-potrillos-restaurant.cloveronline.com/menu/all', 'external' => true],
      ['label' => 'Food Truck',            'href' => 'https://foodtruck.restaurantpotrillos.com/', 'external' => true],
      ['label' => 'Uber Eats',             'href' => 'https://www.ubereats.com/store/los-potrillos-restaurant/8f90E8-GRHOnsfKh0Y7SQQ?diningMode=PICKUP', 'external' => true],
      ['label' => 'DoorDash',              'href' => 'https://www.doordash.com/store/los-potrillos-restaurant-philadelphia-520750/691091/?utm_source=mx_share', 'external' => true],
      ['label' => 'Grubhub',               'href' => 'https://www.grubhub.com/restaurant/los-potrillos-restaurant-2617-e-venango-st-philadelphia/1939231?utm_source=grubhub_web&utm_medium=content_owned&utm_campaign=menushare&utm_content=share-link', 'external' => true],
    ],
  ],
  [
    'title' => 'Legal',
    'links' => [
      ['label' => 'Privacy Policy',      'href' => '/privacy-policy'],
      ['label' => 'Terms & Conditions',  'href' => '/terms-conditions'],
    ],
  ],
  [
    'title' => 'Connect',
    'links' => [
      ['label' => 'Instagram',           'href' => 'https://www.instagram.com/potrillosrestaurantphilly/', 'external' => true],
      ['label' => 'Facebook',            'href' => 'https://www.facebook.com/lospotrillosrestaurantphilly', 'external' => true],
      ['label' => 'TikTok',              'href' => 'https://www.tiktok.com/@lospotrillosrestaurant', 'external' => true],
      ['label' => 'Google Business Profile', 'href' => 'https://www.google.com/maps/place/LOS+POTRILLOS+RESTAURANT/@39.9900503,-75.0937738,17z/data=!4m15!1m8!3m7!1s0x89c6c9d87bf20bf1:0x4d8435515dadc26b!2s2617+E+Venango+St,+Philadelphia,+PA+19134,+EE.+UU.!3b1!8m2!3d39.9900503!4d-75.0937738!16s%2Fg%2F11c164m9wv!3m5!1s0x89c6b7bc71190001:0xa44c7bbd8e214cdb!8m2!3d39.9900374!4d-75.0937434!16s%2Fg%2F11hbv7knck?hl=es-ES', 'external' => true],
    ],
  ],
];
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap');

.legal-hero {
  background: #f7f4f0;
  border-bottom: 1px solid #ece8e2;
  padding: 64px 24px 52px;
  text-align: center;
}
.sm-body {
  max-width: 1000px;
  margin: 0 auto;
  padding: 64px 24px 96px;
}
.sm-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 48px 56px;
}
.sm-col-title {
  font-family: 'Playfair Display', serif;
  font-size: 1.15rem; font-weight: 800;
  color: #1a1a1a; margin: 0 0 16px 0;
  letter-spacing: -0.01em;
  padding-bottom: 12px;
  border-bottom: 2px solid #C0392B;
}
.sm-links { list-style: none; margin: 0; padding: 0; }
.sm-links li { border-bottom: 1px solid #f0ebe4; }
.sm-links li:last-child { border-bottom: 0; }
.sm-links a {
  display: flex; align-items: center; justify-content: space-between; gap: 12px;
  font-family: 'Lato', sans-serif; font-size: 0.92rem; color: #444;
  text-decoration: none; padding: 12px 2px;
  transition: color 0.2s, padding-left 0.2s;
}
.sm-links a:hover { color: #C0392B; padding-left: 6px; }
.sm-links svg { width: 13px; height: 13px; color: #bbb; flex-shrink: 0; transition: color 0.2s; }
.sm-links a:hover svg { color: #C0392B; }

@media (max-width: 640px) {
  .sm-grid { grid-template-columns: 1fr; gap: 36px; }
}
</style>

<section class="legal-hero">
  <p style="font-family:'Oswald',sans-serif;text-transform:uppercase;letter-spacing:0.18em;font-size:0.62rem;font-weight:600;color:#C0392B;margin:0 0 14px 0;">Site Map</p>
  <h1 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.5vw,2.6rem);font-weight:800;color:#1a1a1a;margin:0 0 14px 0;letter-spacing:-0.01em;line-height:1.2;">
    Find Everything on Our Site
  </h1>
  <p style="font-family:'Lato',sans-serif;font-size:0.88rem;color:#888;margin:0;max-width:520px;margin-left:auto;margin-right:auto;line-height:1.7;">
    A full list of pages, ordering channels, and resources at Los Potrillos Restaurant.
  </p>
</section>

<div class="sm-body">
  <div class="sm-grid">
    <?php foreach ($sitemap as $section) : ?>
      <div>
        <h2 class="sm-col-title"><?php echo esc_html($section['title']); ?></h2>
        <ul class="sm-links">
          <?php foreach ($section['links'] as $link) : $external = !empty($link['external']); ?>
            <li>
              <a href="<?php echo esc_url($link['href']); ?>" <?php echo $external ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>>
                <?php echo esc_html($link['label']); ?>
                <?php if ($external) : ?>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><path d="M15 3h6v6"/><path d="M10 14L21 3"/>
                  </svg>
                <?php else : ?>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 6l6 6-6 6"/>
                  </svg>
                <?php endif; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php get_footer(); ?>
