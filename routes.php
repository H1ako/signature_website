<?php
require_once __DIR__.'/settings.php';
require_once __DIR__.'/admin-settings.php';
require_once __DIR__.'/router.php';
require_once __DIR__.'/libs/streams.php';
require_once __DIR__.'/libs/gettext.php';

global $LOCALES, $SITE_URL;


$currentLocale = $LOCALES['en'];
$currentLocaleShortCode = $currentLocale['short_code'];

$streamer = new FileReader;
$streamer->FileReader(__DIR__.'/locale/en/LC_MESSAGES/messages.mo');
$localeReader = new gettext_reader;
$localeReader->gettext_reader($streamer);

// ##################################################
// ##################################################
// ##################################################

get('/signature_generator/%s/%s', function($locale, $path) use ($LOCALES) {
  if (!(array_key_exists($locale, $LOCALES))) return;
  
  global $currentLocale, $localeReader;
  
  $currentLocale = $LOCALES[$locale];
  $localeShortCode = $currentLocale['short_code'];

  $streamer = new FileReader;
  $streamer->FileReader(__DIR__."/locale/$localeShortCode/LC_MESSAGES/messages.mo");
  $localeReader = new gettext_reader;
  $localeReader->gettext_reader($streamer);
});
get('/signature_generator/admin','views/admin.php');

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