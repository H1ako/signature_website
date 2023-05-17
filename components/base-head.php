<?php global $currentLocale, $SITE_ICON, $SITE_NAME, $META_IMAGE, $SITE_URL;
?>
<meta name="theme-color" content="#F0F8FF">
<link rel="manifest" href="<?= $SITE_URL ?>/assets/manifest.json">

<link itemprop="mainEntityOfPage" href="<?= $SITE_URL ?>" />
<meta itemprop="author" content="@<?= $SITE_NAME ?>">
<meta itemprop="name" content="<?= $SITE_NAME ?>">
<meta itemprop="image" content="<?= $SITE_URL ?>/assets/images/<?= $META_IMAGE ?>">
<link rel="shortcut icon" href="<?= $SITE_URL ?>/assets/images/<?= $SITE_ICON ?>" type="image/x-icon">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $SITE_NAME ?>">
<meta name="twitter:creator" content="<?= $SITE_NAME ?>">
<meta name="twitter:image" content="<?= $SITE_URL ?>/assets/images/<?= $META_IMAGE ?>">

<meta property="og:locale" content="<?= $currentLocale['short_code']; ?>">
<meta property="og:type" content="website" />
<meta property="og:url" content="<?= $SITE_URL ?>"/>
<meta property="og:image" content="<?= $SITE_URL ?>/assets/images/<?= $META_IMAGE ?>"/>
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:description" content="<?= $SITE_DESCRIPTION ?>" />
<meta property="og:site_name" content="<?= $SITE_NAME ?>" />

<link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/global.css">
<script defer>
  const CURRENT_LOCALE = "<?= $currentLocale['short_code']; ?>"
  const HOST_URL = window.location.origin
  const SITE_URL = "<?= $SITE_URL ?>"
</script>
<!-- <script src="<?= $SITE_URL ?>/assets/scripts/service-worker.js" defer></script> -->
<script src="<?= $SITE_URL ?>/assets/scripts/pwa.js" defer></script>
<script src="<?= $SITE_URL ?>/assets/scripts/footer.js" defer></script>
<script src="<?= $SITE_URL ?>/assets/scripts/header.js" defer></script>