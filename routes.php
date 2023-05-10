<?php
require_once __DIR__.'/settings.php';
require_once __DIR__.'/router.php';

global $LOCALES;

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
// get('/signature_website', 'views/index.php');
$locale = $LOCALES['en'];
putenv("LC_ALL=en");
setlocale(LC_ALL, 'en');

bindtextdomain('messages', './locale');
bind_textdomain_codeset("messages", "UTF-8");
textdomain('messages');

get('/signature_generator/%s/%s', function($locale, $path) use ($LOCALES) {
  if (!(array_key_exists($locale, $LOCALES))) return;

  $locale = $LOCALES[$locale];
  $localeCode = $locale['code'];
  $localeShortCode = $locale['short_code'];
  
  putenv("LC_ALL=$localeCode");
  setlocale(LC_ALL, $localeShortCode);
});

get('/signature_generator', 'views/index.php');
get('/signature_generator/%s', 'views/index.php');

get('/signature_generator/privacy-policy', 'views/privacy-policy.php');
get('/signature_generator/%s/privacy-policy', 'views/privacy-policy.php');


get('/signature_generator/api/get-signatures', function () {

  return false;
});

// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
// get('/user/$id', 'views/user');

// // Dynamic GET. Example with 2 variables
// // The $name will be available in full_name.php
// // The $last_name will be available in full_name.php
// // In the browser point to: localhost/user/X/Y
// get('/user/$name/$last_name', 'views/full_name.php');

// // Dynamic GET. Example with 2 variables with static
// // In the URL -> http://localhost/product/shoes/color/blue
// // The $type will be available in product.php
// // The $color will be available in product.php
// get('/product/$type/color/$color', 'product.php');

// // A route with a callback
// get('/callback', function(){
//   echo 'Callback executed';
// });

// // A route with a callback passing a variable
// // To run this route, in the browser type:
// // http://localhost/user/A
// get('/callback/$name', function($name){
//   echo "Callback executed. The name is $name";
// });

// // A route with a callback passing 2 variables
// // To run this route, in the browser type:
// // http://localhost/callback/A/B
// get('/callback/$name/$last_name', function($name, $last_name){
//   echo "Callback executed. The full name is $name $last_name";
// });

// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/signature_generator/404','views/404.php');
any('/signature_generator/%s/404','views/404.php');
