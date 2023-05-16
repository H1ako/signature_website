<?php global $CONTACT_EMAIL; ?>
<footer class="main-footer">
  <div class="main-footer__content">
    <a href="/privacy-policy" class="content__part part_link" title="<?= $localeReader->translate('Privacy Policy'); ?>">
      <?= $localeReader->translate('Privacy Policy'); ?>
    </a>
    <p class="content__part part_rights"><?= $localeReader->translate('2023 All Right Reserved'); ?></p>
    <button class="content__part part_contact-btn" title="<?= $localeReader->translate('Contact Us'); ?>">
      <?= $localeReader->translate('Contact Us'); ?>
    </button>
    <address class="content__part part_contact-address">
      <a href="mailto:<?= $CONTACT_EMAIL ?>" class="part__link" title="<?= $localeReader->translate('Email'); ?>"><?= $CONTACT_EMAIL ?></a>
    </address>
  </div>
</footer>