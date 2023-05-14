<dialog class="socials-modal">
  <div class="socials-modal__content">
    <section class="content__titles">
      <h3 class="titles__title"><?= _('Share'); ?></h3>
      <h4 class="titles__subtitle"><?= _('By sharing you’re automatically accepting our rules and terms'); ?></h4>
    </section>
    <section class="content__links">
      <?php include('components/socials.php'); ?>
      <div class="links__url">
        <input type="text" readonly class="url__link" id="socials-modal-link" title="<?= _('Share link'); ?>">
        <button class="url__copy" copy-share-link>
          <?php include('icons/copy.php') ?>
          <span class="copy__text"><?= _('Copy'); ?></span>
        </button>
      </div>
    </section>
  </div>
</dialog>