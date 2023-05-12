<?php

global $styles;


function drawBottomHeart() {
  global $textMostRightX, $textMostRightY, $curvesDraw, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textWidth, 'y' => $textMostRightY + 45],
    ['x' => $textWidth, 'y' => $textMostRightY + 60],
    ['x' => $textMostRightX, 'y' => $textMostRightY + 80],
    ['x' => $textMostRightX, 'y' => $textMostRightY - 60],
    ['x' => $textMostRightX, 'y' => $textMostRightY + 80],
    ['x' => $textWidth, 'y' => $textMostRightY + 80],
    ['x' => $textMostRightX, 'y' => $textMostRightY + 100],
    ['x' => $textMostRightX + 100, 'y' => $textMostRightY + 100],
    ['x' => $textMostRightX, 'y' => $textMostRightY],
  ];

  $curvesDraw->bezier($points);
}

function drawCurve() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $height, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX - $textWidth / 3, 'y' => $textMostRightY * 0.7],
    ['x' => $textMostLeftX - $textWidth, 'y' => $textMostRightY],
    ['x' => $textMostRightX - $textWidth / 1.5, 'y' => ($height - $textHeight) / 2 + $textHeight],
    ['x' => $textMostRightX - $textWidth / 1.5 + 20, 'y' => ($height - $textHeight) / 2 + $textHeight - 20],
  ];

  $curvesDraw->bezier($points);
}

function drawStretchedCurve() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $height, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX - $textWidth / 3, 'y' => $textMostRightY * 0.7],
    ['x' => $textMostLeftX - $textWidth, 'y' => $textMostRightY],
    ['x' => $textMostRightX - $textWidth, 'y' => ($height - $textHeight) / 2 + $textHeight],
    ['x' => $textMostRightX - $textWidth + 20, 'y' => ($height - $textHeight) / 2 + $textHeight - 20],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve1() {
  global $textMostLeftX, $textMostLeftY, $textMostRightX, $textMostRightY, $curvesDraw, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX + 20, 'y' => $textMostRightY - 180],
    ['x' => $textMostRightX - 20, 'y' => $textMostRightY - 100],
    ['x' => $textMostRightX - 20, 'y' => $textMostRightY + 80],
    ['x' => $textMostRightX - 10, 'y' => $textMostRightY + 20],
    ['x' => $textMostRightX - 20, 'y' => $textMostRightY + 50],
    ['x' => $textMostRightX, 'y' => $textMostRightY + 65],
    ['x' => $textMostRightX, 'y' => $textMostRightY + 65],
    ['x' => $textMostRightX, 'y' => $textMostRightY + 65],
    ['x' => $textMostRightX, 'y' => $textMostRightY + 65],
    ['x' => $textMostRightX, 'y' => $textMostRightY + 65],
    ['x' => $textMostRightX - $textWidth / 5, 'y' => $textMostRightY + 45],
    ['x' => $textMostLeftX + $textWidth * -0.55, 'y' => $textMostRightY + 30],
    ['x' => $textMostLeftX + $textWidth / 3, 'y' => $textMostLeftY + 150],
    ['x' => $textMostLeftX - $textWidth / 4, 'y' => $textMostLeftY + 50],
    ['x' => $textMostLeftX + $textWidth / 4, 'y' => $textMostLeftY + 40],
    ['x' => $textMostLeftX + $textWidth / 4, 'y' => $textMostLeftY + 70],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve2() {
  global $textMostLeftX, $textMostLeftY, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth;

  $points = [
    ['x' => $textMostLeftX - $textWidth * 0.5, 'y' => $textMostLeftY + $textHeight * 0.2],
    ['x' => $textMostLeftX + $textWidth * 0.5, 'y' => $textMostLeftY - $textHeight * 0.15],
    ['x' => $textMostRightX + $textWidth * 0.5, 'y' => $textMostRightY + $textHeight * 0.2],
    ['x' => $textMostRightX + $textWidth * 0.5, 'y' => $textMostRightY + $textHeight * 0.2],
    ['x' => $textMostRightX + $textWidth * 0.1, 'y' => $textMostRightY + $textHeight * 0.19],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve3() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostLeftX + $textWidth * -0.55, 'y' => $textMostRightY + $textHeight * 0.3],
    ['x' => $textMostLeftX + $textWidth * -0.55, 'y' => $textMostRightY + $textHeight * 0.3],
    ['x' => $textMostRightX, 'y' => $textMostRightY + 40],
    ['x' => $textMostRightX + $textWidth * 0.25, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostRightX + $textWidth * 0.25, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostLeftX  + $textWidth * 0.1, 'y' => $textMostRightY + $textHeight * 0.6],
    ['x' => $textMostLeftX - $textWidth * 0.25, 'y' => $textMostRightY + $textHeight * 0.7],
    ['x' => $textMostLeftX - $textWidth * 0.25, 'y' => $textMostRightY + $textHeight * 0.7],
    ['x' => $textMostLeftX + $textWidth * 0.1, 'y' => $textMostRightY + $textHeight * 0.8],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight * 0.9],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight * 0.9],
    ['x' => $textMostLeftX + $textWidth * 0.3, 'y' => $textMostRightY + $textHeight],
    ['x' => $textMostLeftX + $textWidth * 0.3, 'y' => $textMostRightY + $textHeight * 0.9],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve4() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostLeftX + $textWidth * -0.55, 'y' => $textMostRightY + $textHeight * 0.1],
    ['x' => $textMostLeftX + $textWidth * -0.55, 'y' => $textMostRightY + $textHeight * 0.3],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight * 0.4],
    ['x' => $textMostRightX + $textWidth * 0.25, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostRightX + $textWidth * 0.25, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostLeftX  + $textWidth * 0.1, 'y' => $textMostRightY + $textHeight * 0.6],
    ['x' => $textMostLeftX + $textWidth * 0.5, 'y' => $textMostRightY + $textHeight * 0.7],
    ['x' => $textMostLeftX + $textWidth * 0.5, 'y' => $textMostRightY + $textHeight * 0.7],
    ['x' => $textMostLeftX + $textWidth, 'y' => $textMostRightY + $textHeight * 0.8],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve5() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX - $textWidth, 'y' => $textMostRightY + $textHeight / 1.75],
    ['x' => $textMostRightX - $textWidth, 'y' => $textMostRightY + $textHeight / 1.75],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight / 2],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight / 2],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight / 2],
    ['x' => $textMostLeftX + $textWidth / 7, 'y' => $textMostRightY + $textHeight / 1.5],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve6() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $textBoxBottomY;

  $points = [
    ['x' => $textMostRightX - $textWidth / 10, 'y' => $textBoxBottomY],
    ['x' => $textMostRightX + $textWidth / 10, 'y' => $textMostRightY - $textHeight * 1.5],
    ['x' => $textMostRightX + $textWidth / 2, 'y' => $textMostRightY + $textHeight / 3],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight / 2],
    ['x' => $textMostLeftX + $textWidth / 8, 'y' => $textBoxBottomY],
    ['x' => $textMostLeftX + $textWidth / 8, 'y' => $textBoxBottomY + $textHeight / 10],
    ['x' => $textMostLeftX + $textWidth / 8, 'y' => $textBoxBottomY + $textHeight / 10],
    ['x' => $textMostLeftX + $textWidth / 1.5, 'y' => $textBoxBottomY + 10],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve7() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $textBoxBottomY, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX + 140, 'y' => $textMostRightY - $textHeight * .85],
    ['x' => $textMostRightX + 10, 'y' => $textMostRightY - $textHeight * .85],
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX, 'y' => $textBoxBottomY],
  ];
  $secondPoints = [
    ['x' => $textMostRightX, 'y' => $textBoxBottomY],
    ['x' => $textMostRightX - $textWidth * 0.25, 'y' => $textBoxBottomY - $textHeight * 0.4],
    ['x' => $textMostLeftX, 'y' => $textBoxBottomY + $textHeight * 0.45],
    ['x' => $textMostLeftX - $textWidth * 0, 'y' => $textBoxBottomY - $textHeight * 0.15],
    ['x' => $textMostLeftX - $textWidth * 0.15, 'y' => $textBoxBottomY + $textHeight * 0.25],
    ['x' => $textMostLeftX, 'y' => $textBoxBottomY - $textHeight * 0.35],
    ['x' => $textMostLeftX + $textWidth * 0.15, 'y' => $textBoxBottomY + $textHeight * 0.25],
  ];
  
  $curvesDraw->bezier($points);
  $curvesDraw->bezier($secondPoints);
}

function drawBottomCurveLong7() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $textBoxBottomY, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX + 140, 'y' => $textMostRightY - $textHeight * .85],
    ['x' => $textMostRightX + 10, 'y' => $textMostRightY - $textHeight * .85],
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX, 'y' => $textBoxBottomY],
  ];
  $secondPoints = [
    ['x' => $textMostRightX, 'y' => $textBoxBottomY],
    ['x' => $textMostRightX - $textWidth * 0.25, 'y' => $textBoxBottomY - $textHeight * 0.4],
    ['x' => $textMostLeftX - $textWidth * 0.5, 'y' => $textBoxBottomY + $textHeight * 0.45],
    ['x' => $textMostLeftX - $textWidth * 0.5, 'y' => $textBoxBottomY - $textHeight * 0.15],
    ['x' => $textMostLeftX - $textWidth * 0.85, 'y' => $textBoxBottomY + $textHeight * 0.25],
    ['x' => $textMostLeftX - $textWidth * 0.25, 'y' => $textBoxBottomY - $textHeight * 0.75],
    ['x' => $textMostLeftX - $textWidth * 0.25, 'y' => $textBoxBottomY + $textHeight * 0.45],
  ];
  
  $curvesDraw->bezier($points);
  $curvesDraw->bezier($secondPoints);
}

function drawBottomCurve8() {
  global $textMostLeftX, $textMostLeftY, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight * 0.7],
    ['x' => $textMostRightX + $textWidth * 0.5, 'y' => $textMostRightY - $textHeight * 1.2],
    ['x' => $textMostRightX + $textHeight * 0.05, 'y' => $textMostRightY - $textHeight * 1.2],
    ['x' => $textMostRightX - $textHeight * 0.6, 'y' => $textMostRightY - $textHeight * 0.1],
    ['x' => $textMostRightX + $textHeight * 0.85, 'y' => $textMostRightY - $textHeight * 0.1],
    ['x' => $textMostRightX + $textHeight * 0.5, 'y' => $textMostRightY - $textHeight * 0.2],
    ['x' => $textMostRightX + $textHeight * 0.5, 'y' => $textMostRightY - $textHeight * 0.3],
    ['x' => $textMostRightX + $textHeight * 0.5, 'y' => $textMostRightY + $textHeight * 0.1],
    ['x' => $textMostLeftX + $textWidth * 0.5, 'y' => $textMostRightY - $textHeight * 0.2],
    ['x' => $textMostLeftX + $textWidth * 0.2, 'y' => $textMostLeftY + $textHeight * 0.1],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve9() {
  global $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX + $textWidth * 0.1, 'y' => $textMostRightY],
    ['x' => $textMostRightX + $textWidth * 0.1, 'y' => $textMostRightY - $textHeight * 0.2],
    ['x' => $textMostRightX - $textWidth * 0.1, 'y' => $textMostRightY - $textHeight * 0.7],
    ['x' => $textMostRightX - $textWidth * 0.2, 'y' => $textMostRightY - $textHeight * 0.7],
    ['x' => $textMostRightX - $textWidth * 0.5, 'y' => $textMostRightY - $textHeight * 0.7],
    ['x' => $textMostRightX - $textWidth * 0.7, 'y' => $textMostRightY - $textHeight * 0.6],
    ['x' => $textMostRightX - $textWidth * 0.8, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostRightX - $textWidth * 0.8, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostRightX - $textWidth * 0.4, 'y' => $textMostRightY + $textHeight * 0.3],
    ['x' => $textMostRightX - $textWidth * 0.1, 'y' => $textMostRightY + $textHeight * 0.2],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight * 0.2],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight * 0.25],
    ['x' => $textMostRightX + 100, 'y' => $textMostRightY + $textHeight * 0.2],
    ['x' => $textMostRightX + 100, 'y' => $textMostRightY + $textHeight * 0.4],
    ['x' => $textMostRightX + 80, 'y' => $textMostRightY + $textHeight * 0.4],
  ];

  $points2 = [
    ['x' => $textMostRightX - $textWidth * 0.4 + $textWidth * 0.1, 'y' => $textMostRightY - $textHeight * 0.2],
    ['x' => $textMostRightX - $textWidth * 0.4 - $textWidth * 0.1, 'y' => $textMostRightY - $textHeight * 0.7],
    ['x' => $textMostRightX - $textWidth * 0.4 - $textWidth * 0.2, 'y' => $textMostRightY - $textHeight * 0.7],
    ['x' => $textMostRightX - $textWidth * 0.4 - $textWidth * 0.5, 'y' => $textMostRightY - $textHeight * 0.7],
    ['x' => $textMostRightX - $textWidth * 0.4 - $textWidth * 0.7, 'y' => $textMostRightY - $textHeight * 0.6],
    ['x' => $textMostRightX - $textWidth * 0.4 - $textWidth * 0.8, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostRightX - $textWidth * 0.4 - $textWidth * 0.8, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostRightX - $textWidth * 0.4, 'y' => $textMostRightY + $textHeight * 0.3],
    ['x' => $textMostRightX - $textWidth * 0.1, 'y' => $textMostRightY + $textHeight * 0.2],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight * 0.25],
  ];

  $curvesDraw->bezier($points);
  $curvesDraw->bezier($points2);
}

function drawBottomCurve10() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostLeftX - $textWidth * 0.1, 'y' => $textMostRightY],
    ['x' => $textMostLeftX - $textWidth * 0.1, 'y' => $textMostRightY + $textHeight * 0.1],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve11() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX + 50, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostRightX + 100, 'y' => $textMostRightY + $textHeight * 0.8],
    ['x' => $textMostRightX + 110, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostRightX + 110, 'y' => $textMostRightY + $textHeight * 0.2],
    ['x' => $textMostRightX, 'y' => $textMostRightY + $textHeight * 0.2],
    ['x' => $textMostLeftX - $textWidth * 0.1, 'y' => $textMostRightY + $textHeight * 0.6],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve12() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX + $textWidth * 0.5 , 'y' => $textMostRightY + $textHeight * 0.025],
    ['x' => $textMostRightX + $textWidth * 0.5 , 'y' => $textMostRightY + $textHeight * 0.025],
    ['x' => $textMostLeftX - $textWidth * 1.3, 'y' => $textMostRightY + $textHeight * 1],
    ['x' => $textMostLeftX - $textWidth * 1.3, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostRightX - $textWidth * 0.4, 'y' => $textMostRightY + $textHeight * 0.15],
    ['x' => $textMostRightX - $textWidth * 0.4 + 20, 'y' => $textMostRightY + $textHeight * 0.15 + 5],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve13() {
  global $textMostLeftX, $textMostLeftY, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX - $textWidth * 0.6, 'y' => $textMostRightY - $textHeight * 0.6],
    ['x' => $textMostRightX + $textWidth * 0.5, 'y' => $textMostRightY - $textHeight * 0.6],
    ['x' => $textMostRightX, 'y' => $textMostRightY - $textHeight * 0.1],
    ['x' => $textMostRightX - $textWidth * 0.1, 'y' => $textMostRightY - $textHeight * 0.1],
    ['x' => $textMostRightX - $textWidth * 0.1, 'y' => $textMostRightY - $textHeight * 0.1],
    ['x' => $textMostRightX - $textWidth * 0.1, 'y' => $textMostRightY - $textHeight * 0.1],
    ['x' => $textMostRightX - $textWidth * 0.1, 'y' => $textMostRightY - $textHeight * 0.1],
    ['x' => $textMostRightX, 'y' => $textMostRightY - $textHeight * 0.1],
    ['x' => $textMostRightX + $textWidth * 0.6, 'y' => $textMostRightY + $textHeight * 0.4],
    ['x' => $textMostRightX + $textWidth * 0.6, 'y' => $textMostRightY + $textHeight * 0.5],
    ['x' => $textMostRightX - $textWidth * 0.6, 'y' => $textMostRightY + $textHeight * 0.3],
    ['x' => $textMostRightX - $textWidth * 0.3, 'y' => $textMostRightY + $textHeight * 0.3],
    ['x' => $textMostRightX - $textWidth * 3, 'y' => $textMostRightY + $textHeight * 0.3],
    ['x' => $textMostRightX - $textWidth * 3, 'y' => $textMostRightY + $textHeight * 0.35],
    ['x' => $textMostRightX + $textWidth * 0.8, 'y' => $textMostRightY + $textHeight * 0.1],
    ['x' => $textMostRightX + $textWidth * 0.8, 'y' => $textMostRightY + $textHeight * 0.1],
    ['x' => $textMostRightX + $textWidth * 0.8, 'y' => $textMostRightY + $textHeight * 0.6],
    ['x' => $textMostLeftX - $textWidth * 0.4, 'y' => $textMostLeftY + $textHeight * 0.1],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve14() {
  global $textMostLeftX, $textMostLeftY, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostLeftX - $textWidth * 0.7, 'y' => $textMostLeftY + $textHeight * 0.2],
    ['x' => $textMostLeftX - $textWidth * 0.7, 'y' => $textMostLeftY + $textHeight * 0.4],
    ['x' => $textMostLeftX - $textWidth * 0.5, 'y' => $textMostLeftY + $textHeight * 0.8],
    ['x' => $textMostLeftX - $textWidth * 0.2, 'y' => $textMostLeftY - $textHeight * 0.3],
    ['x' => $textMostLeftX + $textWidth * 0.3, 'y' => $textMostLeftY - $textHeight * 0.8],
    ['x' => $textMostLeftX + $textWidth * 0.55, 'y' => $textMostLeftY - $textHeight * 0.7],
    ['x' => $textMostLeftX + $textWidth * 0.5, 'y' => $textMostLeftY - $textHeight * 0.3],
    ['x' => $textMostLeftX + $textWidth * 0.3, 'y' => $textMostLeftY - $textHeight * 0.3],
    ['x' => $textMostLeftX + $textWidth * 0.2, 'y' => $textMostLeftY + $textHeight * 0.1],
    ['x' => $textMostLeftX - $textWidth * 0.85, 'y' => $textMostLeftY - $textHeight * 0.3],
    ['x' => $textMostLeftX + $textWidth * 0.8, 'y' => $textMostLeftY - $textHeight * 0.35],
    ['x' => $textMostLeftX + $textWidth * 0.8, 'y' => $textMostLeftY - $textHeight * 0.35 + 5],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve15() {
  global $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX + $textWidth * 0.1, 'y' => $textMostRightY - $textHeight * 0.15],
    ['x' => $textMostRightX + $textWidth * 0.2, 'y' => $textMostRightY - $textHeight * 0.10],
    ['x' => $textMostRightX + $textWidth * 0.2, 'y' => $textMostRightY + $textHeight * 0.3],
    ['x' => $textMostRightX - $textWidth * 0.5, 'y' => $textMostRightY + $textHeight],
    ['x' => $textMostRightX - $textWidth * 1.5, 'y' => $textMostRightY + $textHeight * 0.4],
    ['x' => $textMostRightX - $textWidth * 0.5, 'y' => $textMostRightY + $textHeight * 0.4],
    ['x' => $textMostRightX - $textWidth * 0.25, 'y' => $textMostRightY],
    ['x' => $textMostRightX + $textWidth * 0.35, 'y' => $textMostRightY + $textHeight * 0.2],
    ['x' => $textMostRightX + $textWidth * 0.05, 'y' => $textMostRightY + $textHeight * 0.2 + 40],
  ];

  $curvesDraw->bezier($points);
}

function drawBottomCurve16() {
  global $textMostLeftX, $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth, $thickness;

  $points = [
    ['x' => $textMostRightX, 'y' => $textMostRightY],
    ['x' => $textMostRightX + $textWidth * 0.3, 'y' => $textMostRightY - $textHeight * 0.20],
    ['x' => $textMostRightX - $textWidth * 0.8, 'y' => $textMostRightY - $textHeight * 0.4],
    ['x' => $textMostRightX - $textWidth * 0.6, 'y' => $textMostRightY - $textHeight * 0.4],
    ['x' => $textMostRightX - $textWidth * 1, 'y' => $textMostRightY - $textHeight * 0.1],
    ['x' => $textMostLeftX + $textWidth * 0.3, 'y' => $textMostRightY - $textHeight * 0.15],
    ['x' => $textMostRightX + $textWidth * 0.9, 'y' => $textMostRightY + $textHeight * 0.2],
    ['x' => $textMostRightX + $textWidth * 0.9, 'y' => $textMostRightY + $textHeight * 0.25],
    ['x' => $textMostRightX - $textWidth * 0.5, 'y' => $textMostRightY + $textHeight * 0.4],
    ['x' => $textMostLeftX - $textWidth * 0.1, 'y' => $textMostRightY + $textHeight * 0.3],
    ['x' => $textMostLeftX - $textWidth * 0.9, 'y' => $textMostRightY + $textHeight * 0.45],
    ['x' => $textMostLeftX, 'y' => $textMostRightY + $textHeight * 0.45],
    ['x' => $textMostLeftX + $textWidth * 0.4, 'y' => $textMostRightY + $textHeight * 0.45],
  ];

  $curvesDraw->bezier($points);
}

function drawRightLine() {
  global $textMostRightX, $textMostRightY, $curvesDraw, $textHeight, $textWidth;

  $points = [
    ['x' => $textMostRightX + $textWidth / 10, 'y' => $textMostRightY - $textHeight / 10],
    ['x' => $textMostRightX + $textWidth / 7.5, 'y' => $textMostRightY - $textHeight / 8],
    ['x' => $textMostRightX + $textWidth / 7.5, 'y' => $textMostRightY - $textHeight / 6],
    ['x' => $textMostRightX + $textWidth / 5, 'y' => $textMostRightY - $textHeight / 5],
  ];

  $curvesDraw->bezier($points);
}

function drawTopCurve() {
  global $textMostLeftX, $textMostRightX, $curvesDraw, $textY, $textHeight, $textWidth;

  $y = $textY - $textHeight / 2.5;

  $points = [
    ['x' => $textMostLeftX - $textWidth / 20, 'y' => $y],
    ['x' => $textMostLeftX, 'y' => $y - $textHeight / 5],
    ['x' => $textMostRightX, 'y' => $y - $textHeight / 5],
    ['x' => $textMostRightX + $textWidth / 20, 'y' => $y],
  ];

  $curvesDraw->bezier($points);
}

function drawTopSun() {
  global $image, $textMostRightX, $textMostTopY;

  $overlay = new \Imagick();
  $currentPath = getcwd();
  $overlay->readImage("$currentPath/assets/images/sun.png");
  $overlayWidth = $overlay->getImageWidth();
  $overlayHeight = $overlay->getImageHeight();
  $degrees = -20;
  $overlay->rotateImage('none', $degrees);

  $x = round($textMostRightX - $overlayWidth / 2 - ($overlayHeight * cos(deg2rad($degrees)) / 2));
  $y = round($textMostTopY - $overlayHeight - ($overlayHeight * sin(deg2rad($degrees)) / 4) - 20);

  $image->compositeImage($overlay, \Imagick::COMPOSITE_DEFAULT, $x, $y);
}

function _getStyle($font, $text_style, $curves_style, $angle=0, $font_size=240) {
  return [
    'text_style' => $text_style,
    'font' => $font,
    'draw_styles' => $curves_style,
    'font_size' => $font_size,
    'angle' => $angle,
  ];
}

function addCurveStyle1() {
  drawBottomCurve8();
}

function addCurveStyle2() {
  drawBottomCurve2();
  drawRightLine();
}

function addCurveStyle3() {
  drawTopSun();
  drawBottomCurveLong7();
  drawRightLine();
}

function addCurveStyle4() {
  drawBottomCurve6();
}

function addCurveStyle5() {
  drawBottomCurve5();
  drawRightLine();
}

function addCurveStyle6() {
  drawBottomCurve5();
  drawTopCurve();
}

function addCurveStyle7() {
  drawBottomCurve4();
  drawRightLine();
}

function addCurveStyle8() {
  drawBottomCurve3();
}

function addCurveStyle9() {
  drawBottomCurve7();
  drawRightLine();
}

function addCurveStyle10() {
  drawStretchedCurve();
  drawRightLine();
}

function addCurveStyle11() {
  drawCurve();
  drawTopCurve();
}

function addCurveStyle12() {
  drawBottomHeart();
}

function addCurveStyle13() {
  drawBottomCurve9();
}

function addCurveStyle14() {
  drawBottomCurve10();
  drawRightLine();
}

function addCurveStyle15() {
  drawBottomCurve11();
}

function addCurveStyle16() {
  drawBottomCurve12();
}

function addCurveStyle17() {
  drawBottomCurve13();
}

function addCurveStyle18() {
  drawBottomCurve14();
}

function addCurveStyle19() {
  drawBottomCurve15();
  drawRightLine();
}

function addCurveStyle20() {
  drawBottomCurve16();
}

$firstLetterOfFirstName = strlen($firstName) > 0 ? $firstName[0] : '';
$firstLetterOfLastName = strlen($lastName) > 0 ? $lastName[0] : '';
$firstLetterOfmiddleName = strlen($middleName) > 0 ? $middleName[0] : '';
$shortestPartOfTheName = strlen($firstName) < strlen($lastName) ? $firstName : $lastName;
$longestPartFfTheName = $shortestPartOfTheName == $firstName ? $lastName : $firstName;
$shortestPartOfTheName_lowercase = strtolower($shortestPartOfTheName);

$textStyle1 = "$firstLetterOfLastName$firstName"; // SNikita
$textStyle2 = "$firstLetterOfFirstName$lastName"; // NSobolev
$textStyle3 = "$firstLetterOfLastName$firstLetterOfmiddleName$firstName"; // SANikita
$textStyle4 = "$firstLetterOfFirstName$firstLetterOfmiddleName$lastName"; // NASobolev
$textStyle5 = "$lastName"; // Sobolev
$textStyle6 = "$firstName"; // Nikita
$textStyle7 = "    $shortestPartOfTheName_lowercase\n$longestPartFfTheName"; //     nikita \n Sobolev
$textStyle2Short = substr($textStyle2, 0, 4); // NSob

$fonts = [
  [
    'path' => 'assets/fonts/Allison_Script.otf',
    'thickness_index' => 60
  ],
  [
    'path' => 'assets/fonts/Creattion_Demo.otf',
    'thickness_index' => 60
  ],
  [
    'path' => 'assets/fonts/aerotis.regular.otf',
    'thickness_index' => 60
  ],
  [
    'path' => 'assets/fonts/funky-signature.regular.otf',
    'thickness_index' => 60 // 1
  ],
  [
    'path' => 'assets/fonts/holimount.regular.otf',
    'thickness_index' => 60
  ],
  [
    'path' => 'assets/fonts/Southam.otf',
    'thickness_index' => 60
  ],
  [
    'path' => 'assets/fonts/honeymoon-avenue-script.regular.otf',
    'thickness_index' => 120 // 1
  ],
  [
    'path' => 'assets/fonts/AdindaMelia.otf',
    'thickness_index' => 25 // 1
  ],
  [
    'path' => 'assets/fonts/AlfridaSignature.ttf',
    'thickness_index' => 30 // 1
  ],
  [
    'path' => 'assets/fonts/ArtySignature.otf',
    'thickness_index' => 60 // 1
  ],
  [
    'path' => 'assets/fonts/Centhiny.otf',
    'thickness_index' => 35 // 1
  ],
  [
    'path' => 'assets/fonts/Geovana.otf',
    'thickness_index' => 30 // 1
  ],
  [
    'path' => 'assets/fonts/HighSummit.otf',
    'thickness_index' => 45 // 1
  ],
  [
    'path' => 'assets/fonts/Humaira.otf',
    'thickness_index' => 40 // 1
  ],
  [
    'path' => 'assets/fonts/MrsSaintDelafield-Regular.ttf',
    'thickness_index' => 50 // 1
  ],
  [
    'path' => 'assets/fonts/Radith.otf',
    'thickness_index' => 30 // 1
  ],
  [
    'path' => 'assets/fonts/Rathie.otf',
    'thickness_index' => 120 // 1
  ],
  [
    'path' => 'assets/fonts/Somelove.otf',
    'thickness_index' => 45 // 1
  ],
  [
    'path' => 'assets/fonts/SouthTown.otf',
    'thickness_index' => 50 // 1
  ],
  [
    'path' => 'assets/fonts/Thesignature.otf',
    'thickness_index' => 50 // 1
  ],
];

$preStyles = [
  _getStyle([], $textStyle1, 'addCurveStyle1', -15),
  _getStyle([], $textStyle7, 'addCurveStyle2', -15),
  _getStyle([], $textStyle4, 'addCurveStyle3', -15, 120),
  _getStyle([], $textStyle1, 'addCurveStyle4', -15),
  _getStyle([], $textStyle1, 'addCurveStyle5'),
  _getStyle([], $textStyle5, 'addCurveStyle6'),
  _getStyle([], $textStyle5, 'addCurveStyle7'),
  _getStyle([], $textStyle3, 'addCurveStyle8'),
  _getStyle([], $textStyle1, 'addCurveStyle9'),
  _getStyle([], $textStyle4, 'addCurveStyle10'),
  _getStyle([], $textStyle3, 'addCurveStyle11'),
  _getStyle([], $textStyle6, 'addCurveStyle12'),
  _getStyle([], $textStyle4, 'addCurveStyle13'),
  _getStyle([], $textStyle4, 'addCurveStyle14'),
  _getStyle([], $textStyle5, 'addCurveStyle15'),
  _getStyle([], $textStyle3, 'addCurveStyle16', -15),
  _getStyle([], $textStyle2Short, 'addCurveStyle17'),
  _getStyle([], $textStyle1, 'addCurveStyle18', -15),
  _getStyle([], $textStyle2, 'addCurveStyle19', -15),
  _getStyle([], $textStyle4, 'addCurveStyle20'),
];
$styles = [];
$fontI = 0;
foreach ($preStyles as $preStyle) {
  for ($j=0; $j < 3; $j++) {
    $font = $fonts[$fontI];
    $preStyle['font'] = $font;

    $styles = [
      ...$styles,
      $preStyle
    ];

    $fontI = $fontI + 2 > count($fonts) ? 0 : $fontI + 1;
  }
}