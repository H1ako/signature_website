<?php
require_once __DIR__.'/settings.php';
require_once __DIR__.'/admin-settings.php';
require_once __DIR__.'/router.php';

get('/signature_generator/api/get-signatures', function () {
  if (!array_key_exists('first-name', $_GET) || !array_key_exists('first-name', $_GET)) return false;
  $firstName = ucfirst($_GET['first-name']);
  $lastName = ucfirst($_GET['last-name']);
  $middleName = isset($_GET['middle-name']) ? ucfirst($_GET['middle-name']) : '';
  $randomIndex = isset($_GET['random-index']) ?? random_int(1, 9999);
  $page = $_GET['page'] ?? 1;
  $signaturesPerPage = 1;
  include('script.php');
  
  $images = [];
  for ($i=($page - 1) * $signaturesPerPage; $i < $page * $signaturesPerPage; $i++) {
    $image = getImageFromStyle($i);
    $imageLink = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());
    $images = [...$images, $imageLink];
    $image->destroy();
  }
  $data = [
    'signatures' => $images,
    'randomIndex' => $randomIndex
  ];
  print_r(json_encode($data));

  return false;
});