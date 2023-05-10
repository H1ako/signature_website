<?php
require_once __DIR__.'/settings.php';
require_once __DIR__.'/router.php';

global $LOCALES;


$locale = $LOCALES['en'];
putenv("LC_ALL=en");
setlocale(LC_ALL, 'en');

bindtextdomain('messages', './locale');
bind_textdomain_codeset("messages", "UTF-8");
textdomain('messages');

// ##################################################
// ##################################################
// ##################################################

get('/signature_generator/%s/%s', function($locale, $path) use ($LOCALES) {
  if (!(array_key_exists($locale, $LOCALES))) return;

  $locale = $LOCALES[$locale];
  $localeCode = $locale['code'];
  $localeShortCode = $locale['short_code'];
  
  putenv("LC_ALL=$localeCode");
  setlocale(LC_ALL, $localeShortCode);
});

get('/signature_generator', 'views/index.php');
get('/signature_generator/privacy-policy', 'views/privacy-policy.php');
any('/signature_generator/404','views/404.php');

get('/signature_generator/%s', 'views/index.php');
get('/signature_generator/%s/privacy-policy', 'views/privacy-policy.php');
any('/signature_generator/%s/404','views/404.php');

// ##################################################
// ##################################################
// ##################################################

include_once('views/404.php');
exit;