<?php global $SITE_URL; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signature Generator</title>
  <?php include_once('components/base-head.php'); ?>
  <link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/index.css">
  
  <script async defer src="https://cdn.jsdelivr.net/npm/transliteration@2.1.8/dist/browser/bundle.umd.min.js"></script>
  <script src="assets/scripts/socials-modal.js" defer></script>
  <script src="assets/scripts/editor.js" defer></script>
  <script src="assets/scripts/index.js" defer></script>
</head>
<body>
<?php include_once('components/header.php'); ?>
<main class="main-content">
  <section class="main-content__face">
    <span class="face__left">
      <h1 class="left__title">Signature Generator</h1>
      <h2 class="left__subtitle">Generate your own unique signature or <b>draw</b> it by yourself</h2>
    </span>
    <span class="face__right">
      <?php include('components/generator-form.php'); ?>
    </span>
  </section>
  <section class="main-content__socials">
    <?php include('components/socials.php'); ?>
  </section>
  <section class="main-content__advertisement">
    <?php include('components/advertisement.php'); ?>
  </section>
  <section class="main-content__editor">
    <h2 class="editor__heading">Create your own <b>Signature</b></h2>
    <?php include('components/editor.php'); ?>
  </section>
  <section class="main-content__advertisement">
    <?php include('components/advertisement.php'); ?>
  </section>
  <section class="main-content__generated-signatures">
    <ul class="generated-signatures__list" id="signatures-list">
      <?php include('components/signature-card.php'); ?>
      <?php include('components/signature-card.php'); ?>
      <?php include('components/signature-card.php'); ?>
      <?php include('components/signature-card.php'); ?>
      <?php include('components/signature-card.php'); ?>
      <?php include('components/signature-card.php'); ?>
    </ul>
  </section>
</main>
<?php include('components/footer.php'); ?>
<?php include('components/socials-modal.php'); ?>
</body>
</html>