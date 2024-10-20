<?php
// Function to add Google Tag Manager script to head of each site
function add_gtm_script() {
  // Get current site's domain
  $domain = $_SERVER['HTTP_HOST'];
  // Set default tracking ID
  $tracking_id = 'G-XXXXXXXXXXX'; // GLOBAL
  // Map country suffixes to tracking IDs
  $country_track_ids = array(
    'fr' => 'G-XXXXXXXXXXX', // FRANCE
    'br' => 'G-XXXXXXXXXXX', // BRAZIL
    'es' => 'G-XXXXXXXXXXX', // SPAIN
  );
  // Extract country suffix from domain
  $parts = explode('.', $domain);
  $suffix = $parts[0];
  // If country suffix is mapped to a tracking ID, use it
  if (array_key_exists($suffix, $country_track_ids)) {
    $tracking_id = $country_track_ids[$suffix];
  }
  // Output Google Tag Manager script with appropriate tracking ID
  echo "<!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','$tracking_id');</script>
        <!-- End Google Tag Manager -->";
}
add_action( 'wp_head', 'add_gtm_script' );
