<?php global $currentLocale, $SITE_ICON, $SITE_NAME, $META_IMAGE;

function createDescription($string) {
  $string = strip_tags($string); // remove all HTML tags

  if (strlen($string) > 200) {
    $string = substr($string, 0, 197) . "..."; // limit to 200 characters and add "..."
  }

  return $string;
}

$SITE_DESCRIPTION = createDescription(_('Home Page About Us'));
?>
<meta name="theme-color" content="#F0F8FF">
<meta name="msapplication-TileColor" content="<?= $SITE_URL ?>/assets/images/<?= $SITE_ICON ?>">
<meta name="msapplication-TileIcon" content="#F0F8FF">
<link rel="manifetst" href="<?= $SITE_URL ?>/assets/manifest.json">

<meta itemprop="name" content="<?= $SITE_NAME ?>">
<meta name="description" content="<?= $SITE_DESCRIPTION ?>">
<meta itemprop="image" content="<?= $SITE_URL ?>/assets/images/<?= $META_IMAGE ?>">
<link rel="shortcut icon" href="<?= $SITE_URL ?>/assets/images/<?= $SITE_ICON ?>" type="image/x-icon">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $SITE_NAME ?>">
<meta name="twitter:description" content="<?= $SITE_DESCRIPTION ?>">
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
</script>
<script src="<?= $SITE_URL ?>/assets/scripts/footer.js" defer></script>
<script src="<?= $SITE_URL ?>/assets/scripts/header.js" defer></script>