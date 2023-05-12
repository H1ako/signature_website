<?php
require_once __DIR__.'/settings.php';
require_once __DIR__.'/router.php';

get('/signature_generator/api/get-signatures', function () {
  if (!array_key_exists('first-name', $_GET) || !array_key_exists('first-name', $_GET)) return false;
  $firstName = $_GET['first-name'];
  $page = $_GET['page'] ?? 1;
  $signaturesPerPage = 1;
  $lastName = $_GET['last-name'];
  $middleName = $_GET['middle-name'] ?? '';
  include('script.php');
  
  $images = [];
  for ($i=($page - 1) * $signaturesPerPage; $i < $page * $signaturesPerPage; $i++) {
    $image = getImageFromStyle($i);
    $imageLink = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());
    $images = [...$images, $imageLink];
    $image->destroy();
  }
  print_r(json_encode($images));

  return false;
});