<?php
session_start();
$path = 'images/captcha.jpeg';

header('Content-type: image/jpeg');

$jpg_image = imagecreatefromjpeg($path);

//Text color
$colorArr = [
    imagecolorallocate($jpg_image, 0, 0, 255),
    imagecolorallocate($jpg_image, 153, 51, 255),
    imagecolorallocate($jpg_image, 51, 102, 0),
];
$keyColor1 = array_rand($colorArr, 1);
$keyColor2 = array_rand($colorArr, 1);
$keyColor3 = array_rand($colorArr, 1);
$keyColor4 = array_rand($colorArr, 1);

//Font
$fontArr = [
    'fonts/Comfortaa-VariableFont_wght.ttf',
    'fonts/DaysOne-Regular.ttf',
    'fonts/GoblinOne-Regular.ttf',
    'fonts/Pattaya-Regular.ttf'
];

$keyFont1 = array_rand($fontArr, 1);
$keyFont2 = array_rand($fontArr, 1);
$keyFont3 = array_rand($fontArr, 1);
$keyFont4 = array_rand($fontArr, 1);

//Angle
$angleArr = [
    10, 15, 20, 50
];

$angleKey1 = array_rand($angleArr);
$angleKey2 = array_rand($angleArr);
$angleKey3 = array_rand($angleArr);
$angleKey4 = array_rand($angleArr);

//size
$sizeArr = [
    30, 35, 25, 40
];
$sizeKey1 = array_rand($sizeArr);
$sizeKey2 = array_rand($sizeArr);
$sizeKey3 = array_rand($sizeArr);
$sizeKey4 = array_rand($sizeArr);

$captcha = uniqid();
$captcha = substr($captcha, -4);
$captcha = strtoupper($captcha);
$_SESSION['captcha'] = $captcha;

imagettftext($jpg_image, $sizeArr[$sizeKey1], $angleArr[$angleKey1], 50, 60, $colorArr[$keyColor1], $fontArr[$keyFont1], $captcha[0]);
imagettftext($jpg_image, $sizeArr[$sizeKey2], $angleArr[$angleKey2], 90, 60, $colorArr[$keyColor2], $fontArr[$keyFont2], $captcha[1]);
imagettftext($jpg_image, $sizeArr[$sizeKey3], $angleArr[$angleKey3], 120, 60, $colorArr[$keyColor3], $fontArr[$keyFont3], $captcha[2]);
imagettftext($jpg_image, $sizeArr[$sizeKey4], $angleArr[$angleKey4], 160, 60, $colorArr[$keyColor4], $fontArr[$keyFont4], $captcha[3]);

imagejpeg($jpg_image);

imagedestroy($jpg_image);
