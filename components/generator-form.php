<form action="/" method="GET" class="generator-form" id="generator-form">
  <div class="generator-form__field">
    <p class="field__title"><?= _('First Name'); ?></p>
    <input require type="text" class="field__input" name="first-name" title="<?= _('First Name'); ?>">
  </div>
  <div class="generator-form__field">
    <p class="field__title"><?= _('Last Name'); ?></p>
    <input require type="text" class="field__input" name="last-name" title="<?= _('Last Name'); ?>">
  </div>
  <div class="generator-form__field">
    <p class="field__title"><?= _('Middle Name'); ?></p>
    <input type="text" class="field__input" name="middle-name" title="<?= _('Middle Name'); ?>">
  </div>
  <button type="submit" class="generator-form__submit" title="<?= _('Generate'); ?>"><?= _('Generate'); ?></button>
</form>