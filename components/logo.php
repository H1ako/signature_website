<?php
global $currentLocale, $SITE_NAME;

$localeCode = $currentLocale['short_code'];
$homePageLink = $localeCode === 'en' ? '/' : "/$localeCode";
?>
<a class="logo" href="<?= $homePageLink ?>">
  <img class="logo__img" src="" alt="<?= $SITE_NAME ?>">
</a>