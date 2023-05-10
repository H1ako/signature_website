<?php
require_once __DIR__.'/settings.php';
require_once __DIR__.'/router.php';

get('/signature_generator/api/get-signatures', function () {
  $firstName = 'Nikita';
  $lastName = 'Sobolev';
  $middleName = 'Alexeyevich';
  
  include('script.php');
  return false;
});