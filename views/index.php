<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signature Generator</title>
  <?php include_once('components/base-head.php'); ?>
  <link rel="stylesheet" href="assets/styles/css/index.css">
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
    <ul class="generated-signatures__list">
      <li class="list__signature">
        <div class="signature__top">
          <img src="" alt="Signature" class="top__image">
        </div>
        <div class="signature__bottom">
          <div class="bottom__left">
            <button class="left__edit-btn">
              <?php include('icons/edit.php'); ?>
              <span class="edit-btn__text">Edit</span>
            </button>
          </div>
          <div class="bottom__right">
            <button class="right__btn btn_view"><?php include('icons/view.php'); ?></button>
            <button class="right__btn btn_share"><?php include('icons/share.php'); ?></button>
            <button class="right__btn btn_download"><?php include('icons/download.php'); ?></button>
          </div>
        </div>
      </li>
    </ul>
  </section>
</main>
<?php include('components/footer.php'); ?>
<?php include('components/socials-modal.php'); ?>
</body>
</html>