<template id="signature-card-template">
  <li class="signature-card" data-signature-src="">
    <button class="signature-card__top" preview-signature title="<?= _('Preview'); ?>">
      <img src="" alt="<?= _('Signature'); ?>" class="top__image">
    </button>
    <div class="signature-card__bottom">
      <div class="bottom__left">
        <button title="Edit" class="left__edit-btn" edit-signature title="<?= _('Edit'); ?>">
          <?php include('icons/edit.php'); ?>
          <span class="edit-btn__text"><?= _('Edit'); ?></span>
        </button>
      </div>
      <div class="bottom__right">
        <button class="right__btn btn_view" paper-preview-signature title="<?= _('Preview'); ?>"><?php include('icons/view.php'); ?></button>
        <button class="right__btn btn_share" share-signature title="<?= _('Share'); ?>"><?php include('icons/share.php'); ?></button>
        <a href="" class="right__btn btn_download" download-signature download="OnlineSignatures.net.png" title="<?= _('Download'); ?>"><?php include('icons/download.php'); ?></a>
      </div>
    </div>
  </li>
</template>