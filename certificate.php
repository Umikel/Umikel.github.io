<?php

header("content-type: image/jpeg");
$image = imagecreatefromjpeg("certificate.jpg");
$ima = imagecreatefromjpeg("new.jpg");
$color = imagecolorallocate($image, 0, 0, 0);
$name = "Kabiru Abdullahi ali";
$font =  "Rosemary/DroidSans.ttf";
$date = date('d F,Y');
$out = $name . '.jpg';
imagettftext($image, 10, 0, 720, 540, $color, $font, $date);
imagettftext($image, 20, 0, 390, 360, $color, $font, $name);
imagecopy($image, $ima, 20, 50, 0, 0, 150, 200);

imagejpeg($image);
imagedestroy($image);





// $filename = "certificate.jpg";
// $handle = fopen($filename, "rb");
// $contents = fread($handle, filesize($filename));
// $date = date('d F,Y');

// fclose($handle);

// header("content-type: image/jpeg");

// echo $contents;


// $font = "Rosemary/DroidSans.ttf";
// $ig = imagecreatefromjpeg("certificate.jpg");
// //name
// $name = "kabiru abdullahi";
// $out = $name . '.jpg';
// $mess = 'this is certi:' . time();
// $textco = imagecolorallocate($ig, 0, 0, 0);
// imagefttext($ig, 60, 40, 1600, 1200, $textco, $font, ucwords($name));
// imagejpeg($ig, $out);
// imagedestroy($ig);
