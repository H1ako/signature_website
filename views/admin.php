<?php global $SITE_URL; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
  <link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/admin.css">
</head>
<body>
  <h1 class="heading">Privacy Policy Editors</h1>
  <div class="privacy-editors">
    <div class="editor">
      <h3 class="editor__heading">en</h3>
      <div id="en-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">ru</h3>
      <div id="ru-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">ua</h3>
      <div id="ua-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">es</h3>
      <div id="es-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">fr</h3>
      <div id="fr-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">pl</h3>
      <div id="pl-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">pt</h3>
      <div id="pt-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">vi</h3>
      <div id="vi-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">tr</h3>
      <div id="tr-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">de</h3>
      <div id="de-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">it</h3>
      <div id="it-privacy-editor"></div>
    </div>
  </div>
  <h1 class="heading">About Us Editors</h1>
  <div class="about-us-editors">
    <div class="editor">
      <h3 class="editor__heading">en</h3>
      <div id="en-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">ru</h3>
      <div id="ru-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">ua</h3>
      <div id="ua-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">es</h3>
      <div id="es-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">fr</h3>
      <div id="fr-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">pl</h3>
      <div id="pl-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">pt</h3>
      <div id="pt-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">vi</h3>
      <div id="vi-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">tr</h3>
      <div id="tr-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">de</h3>
      <div id="de-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">it</h3>
      <div id="it-about-us-editor"></div>
    </div>
  </div>
  <button class="save-button">Save Changes</button>
  <script src="<?= $SITE_URL ?>/assets/scripts/admin.js"></script>
  <script>
    editorAboutUs_en.setData('')
    editorAboutUs_ru.setData('')
    editorAboutUs_ua.setData('')
    editorAboutUs_es.setData('')
    editorAboutUs_fr.setData('')
    editorAboutUs_pl.setData('')
    editorAboutUs_pt.setData('')
    editorAboutUs_vi.setData('')
    editorAboutUs_tr.setData('')
    editorAboutUs_de.setData('')
    editorAboutUs_it.setData('')
    editorPrivacy_en.setData('')
    editorPrivacy_ru.setData('')
    editorPrivacy_ua.setData('')
    editorPrivacy_es.setData('')
    editorPrivacy_fr.setData('')
    editorPrivacy_pl.setData('')
    editorPrivacy_pt.setData('')
    editorPrivacy_vi.setData('')
    editorPrivacy_tr.setData('')
    editorPrivacy_de.setData('')
    editorPrivacy_it.setData('')
  </script>
</body>
</html>