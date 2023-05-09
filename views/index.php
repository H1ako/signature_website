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
  <section class="main-content__about">
    <h2 class="about__heading">About <b>Us</b></h2>
    <div class="about__block">
      <img src="<?= $SITE_URL ?>/assets/images/land.jpg" alt="" class="block__img">
      <div class="block__description big-text">
        <p>
          Также как перспективное планирование обеспечивает широкому кругу (специалистов) участие в формировании переосмысления внешнеэкономических политик. Однозначно, многие известные личности представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом и должны быть обнародованы. Предварительные выводы неутешительны: сплочённость команды профессионалов создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса новых принципов формирования материально-технической и кадровой базы. С учётом сложившейся международной обстановки, курс на социально-ориентированный национальный проект создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса как самодостаточных, так и внешне зависимых Также как перспективное планирование обеспечивает широкому кругу (специалистов) участие в формировании переосмысления внешнеэкономических политик. Однозначно, многие известные личности представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом и должны быть обнародованы. Предварительные выводы неутешительны: сплочённость команды профессионалов создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса новых принципов формирования материально-технической и кадровой базы. С учётом сложившейся международной обстановки, курс на социально-ориентированный национальный проект создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса как самодостаточных, так и внешне зависимых Также как перспективное планирование обеспечивает широкому кругу (специалистов) участие в формировании переосмысления внешнеэкономических политик. Однозначно, многие известные личности представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом и должны быть обнародованы. Предварительные выводы неутешительны: сплочённость команды профессионалов создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса новых принципов формирования материально-технической и кадровой базы. С учётом сложившейся международной обстановки, курс на социально-ориентированный национальный проект создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса как самодостаточных, так и внешне зависимых Также как перспективное планирование обеспечивает широкому кругу (специалистов) участие в формировании переосмысления внешнеэкономических политик. Однозначно, многие известные личности представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом и должны быть обнародованы. Предварительные выводы неутешительны: сплочённость команды профессионалов создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса новых принципов формирования материально-технической и кадровой базы. С учётом сложившейся международной обстановки, курс на социально-ориентированный национальный проект создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса как самодостаточных, так и внешне зависимых 
        </p>
      </div>
    </div>
  </section>
</main>
<?php include('components/footer.php'); ?>
<?php include('components/socials-modal.php'); ?>
<?php include('components/preview-lightbox.php'); ?>
<?php include('components/go-top.php'); ?>
</body>
</html>