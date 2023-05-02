<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signature Generator</title>
</head>
<body>
<?php include_once('components/header.php'); ?>
<main class="main-content">
  <section class="main-content__face">
    <span class="face__left">
      <h1 class="left__title">Signature Generator</h1>
      <h2 class="left__subtitle">Generate your own unique signature or draw it by yourself</h2>
    </span>
    <span class="face__right">
      <?php include_once('components/generator-form.php'); ?>
    </span>
  </section>
  <section class="main-content__socials">
    <?php include_once('components/socials.php'); ?>
  </section>
  <section class="main-content__advertisement">
    <?php include_once('components/advertisement.php'); ?>
  </section>
  <section class="main-content__editor">
    <h2 class="content__heading">Create your own Signature</h2>
    <?php include_once('components/editor.php'); ?>
  </section>
  <section class="main-content__advertisement">
    <?php include_once('components/advertisement.php'); ?>
  </section>
  <section class="main-content__generated-signatures">
    <ul class="generated-signatures__list">
      <li class="list__signature">
        <div class="signature__top">
          <img src="" alt="Signature" class="top__image">
        </div>
        <div class="signature__bottom">
          <div class="bottom__left">
            <button class="left__edit-btn">
              <?php include_once('icons/edit.php'); ?>
              <span class="edit-btn__text">Edit</span>
            </button>
          </div>
          <div class="bottom__right">
            <button class="right__btn btn_view"><?php include_once('icons/view.php'); ?></button>
            <button class="right__btn btn_share"><?php include_once('icons/share.php'); ?></button>
            <button class="right__btn btn_download"><?php include_once('icons/download.php'); ?></button>
          </div>
        </div>
      </li>
    </ul>
  </section>
</main>
<?php include_once('components/footer.php'); ?>
<?php include_once('components/socials-modal.php'); ?>
</body>
</html>