<?php

$width;
$height;
$textWidth;
$textHeight;
$textMostTopY;
$textMostRightX;
$textMostRightY;
$textMostLeftX;
$textMostLeftY;
$textBoxBottomY;
$image;
$textDraw;
$curvesDraw;
$thickness;

$styles;
$fonts;

include_once('draw-styles.php');

// echo '<pre>';
// print_r($styles);
// echo '</pre>';
// exit();

function getImageFromStyle($styleIndex) {
  global $image, $textDraw, $curvesDraw, $styles, $textWidth, $textHeight, $width, $height, $thickness, $textBoxBottomY, $textMostTopY, $textMostRightX, $textMostRightY, $textMostLeftX, $textMostLeftY;
  
  if (!array_key_exists($styleIndex, $styles)) return false;

  $style = $styles[$styleIndex];
  $font = $style['font'];
  $text = $style['text_style'];
  $fontSize = $style['font_size'];
  $angle = $style['angle'];
  $drawStyles = $style['draw_styles'];
  $thickness = max(1, round($fontSize / $font['thickness_index']));
  $bgColor = new ImagickPixel('white');

  $image = new \Imagick();

  $textDraw = new \ImagickDraw();
  setupTextDraw($textDraw, $font['path'], $fontSize);
  $textMetrics = $image->queryFontMetrics($textDraw, $text);
  $textWidth = $textMetrics['textWidth'];
  $textHeight = $textMetrics['textHeight'];
  
  $width = round($textWidth * 2.5);
  $height = round($textHeight * 2.5);
  $image->newImage($width, $height, $bgColor);
  $image->setImageFormat('png');

  $textX = round(($width - $textWidth) / 2);
  $textY = round(($height - $textHeight) / 2 + $fontSize);
  $textBoxBottomY = $textMetrics['boundingBox']['y2'] / 2 + $textY;
  $textMostTopY = $textY;
  $image->annotateImage($textDraw, $textX, $textY, 0, $text);

  $textMostRightX = floor($textWidth + $textX - $thickness / 2);
  $textMostRightY = null;
  $textMostLeftX = round($textX - $thickness / 2);
  $textMostLeftY = null;

  for($y=$textY - $textHeight; $y < $textY + $textHeight / 2; $y++) {
    $mostRightColorByY = $image->getImagePixelColor($textMostRightX, $y);
    $isDifferentWithBg = !($bgColor->isPixelSimilar($mostRightColorByY, 0));
    if ($isDifferentWithBg) {
      $textMostRightY = $y;
    }
    
    $mostLeftColorByY = $image->getImagePixelColor($textMostLeftX, $y);
    $isDifferentWithBg = !($bgColor->isPixelSimilar($mostLeftColorByY, 0));
    if ($isDifferentWithBg) {
      $textMostLeftY = $y;
    }
    
    if ($textMostRightY !== null && $textMostLeftY !== null) break;
  }
  
  $curvesDraw = new \ImagickDraw();
  setupCurvesDraw($curvesDraw, $thickness);

  $drawStyles();
  $image->drawImage($curvesDraw);
  if ($angle) {
    $image->rotateImage('white', $angle);
  }
  $image->trimImage(0);

  $curvesDraw->destroy();
  $textDraw->destroy();

  return $image;
}

function setupTextDraw($draw, $font, $fontSize) {
  $draw->setFillColor('black');
  $draw->setTextInterlineSpacing(-$fontSize / 1.25);
  $draw->setFontSize($fontSize);
  $draw->setFont($font);
}

function setupCurvesDraw($draw, $thickness) {
  $draw->setFillColor('transparent');
  $draw->setStrokeOpacity(1);
  $draw->setStrokeColor('black');
  $draw->setStrokeAntialias(true);
  $draw->setStrokeLinecap(\imagick::LINECAP_ROUND);
  $draw->setStrokeLinejoin(\imagick::LINEJOIN_ROUND);
  $draw->setStrokeMiterLimit(2);
  $draw->setStrokeAntialias(true);
  $draw->setStrokeWidth($thickness);
}

// $images = [];
// for ($i=0; $i < 2; $i++) {
//   $image = getImageFromStyle(3, 'Nikita', 'Sobolev', 'Alexeyevich');
//   $imageLink = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());

//   $images = [...$images, $imageLink];
//   $image->destroy();
// }
$images = getImageFromStyle(0);
header("Content-Type: image/png");
echo $images;

// print_r(json_encode($images));