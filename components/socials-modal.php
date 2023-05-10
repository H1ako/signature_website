<dialog class="socials-modal">
  <div class="socials-modal__content">
    <section class="content__titles">
      <h3 class="titles__title"><?= _('Share'); ?></h3>
      <h4 class="titles__subtitle"><?= _('By sharing you’re automatically accepting our rules and terms'); ?></h4>
    </section>
    <section class="content__links">
      <?php include('components/socials.php'); ?>
      <input type="text" readonly class="links__link" id="socials-modal-link" title="<?= _('Share link'); ?>">
    </section>
  </div>
</dialog>