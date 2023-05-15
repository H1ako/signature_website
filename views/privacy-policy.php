<?php global $SITE_URL; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="twitter:title" content="<?= _('Privacy Policy Page Title'); ?>">
  <meta property="og:title" content="<?= _('Privacy Policy Page Title'); ?>" />
  <meta name="description" content="<?= _('Privacy Policy Page Meta Description') ?>">
  <meta name="og:description" content="<?= _('Privacy Policy Page Meta Description') ?>">
  <meta name="twitter:description" content="<?= _('Privacy Policy Page Meta Description') ?>">
  <title><?= _('Privacy Policy Page Title'); ?></title>
  <?php include_once('components/base-head.php'); ?>
  <link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/privacy-policy.css">
</head>
<body>
<?php include_once('components/header.php'); ?>
<main class="main-content">
  <section class="main-content__titles">
    <h1 class="titles__subtitle"><?= _('Signature Generator'); ?></h1>
    <h2 class="titles__title"><?= _('Privacy Policy'); ?></h2>
  </section>
  <section class="main-content__socials">
    <?php include_once('components/socials.php'); ?>    
  </section>
  <section class="main-content__description big-text">
    <?= _('Privacy Policy Page Big Text'); ?>
  </section>
</main>
<?php include_once('components/footer.php'); ?>
</body>
</html>