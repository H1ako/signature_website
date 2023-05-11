<?php
require_once __DIR__.'/settings.php';
require_once __DIR__.'/router.php';

get('/signature_generator/api/get-signatures', function () {
  if (!array_key_exists('first-name', $_GET) || !array_key_exists('first-name', $_GET)) return false;
  $firstName = $_GET['first-name'];
  $lastName = $_GET['last-name'];
  $middleName = $_GET['middle-name'] ?? '';
  include('script.php');
  
  $images = [];
  for ($i=0; $i < 3; $i++) {
    $image = getImageFromStyle(3);
    $imageLink = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());
    $images = [...$images, $imageLink];
    $image->destroy();
  }
  print_r(json_encode($images));

  return false;
});