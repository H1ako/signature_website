<?php global $SITE_NAME, $SITE_URL; ?>
<ul class="socials">
  <li class="socials__social social_twitter">
    <a rel=nofollow href="http://www.twitter.com/share?url=<?= $SITE_URL ?>" target="_blank" class="social__wrapper" title="Twitter">
      <?php include('icons/twitter.php'); ?>
    </a>
  </li>
  <li class="socials__social social_telegram">
    <a rel=nofollow href="https://telegram.me/share/url?url=<?= $SITE_URL ?>" target="_blank" class="social__wrapper" title="Telegram">
      <?php include('icons/telegram.php'); ?>
    </a>
  </li>
  <li class="socials__social social_facebook">
    <a rel=nofollow href="https://www.facebook.com/sharer/sharer.php?u=<?= $SITE_URL ?>" target="_blank" class="social__wrapper" title="Facebook">
      <?php include('icons/facebook.php'); ?>
    </a>
  </li>
  <li class="socials__social social_whatsapp">
    <a rel=nofollow href="https://wa.me/?text=<?= $SITE_URL ?>" target="_blank" class="social__wrapper" title="Whatsapp">
      <?php include('icons/whatsapp.php'); ?>
    </a>
  </li>
  <li class="socials__social social_reddit">
    <a rel=nofollow href="https://www.reddit.com/submit?url=<?= $SITE_URL ?>&title=<?= urlencode($SITE_NAME) ?>" target="_blank" class="social__wrapper" title="Reddit">
      <?php include('icons/reddit.php'); ?>
    </a>
  </li>
</ul>