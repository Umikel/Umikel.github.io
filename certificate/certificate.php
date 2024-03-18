<?php
session_start();
require '../config.php';
require("fpdf/fpdf.php");


$note = "";

if (!isset($_SESSION['lemail'])) {
    header("Location: ./indigene.php");
    exit();
}
$email = $_SESSION['lemail'];
$sqq = "SELECT * FROM users WHERE email = '$email'";
$ast = mysqli_query($conn, $sqq);
if (mysqli_num_rows($ast) > 0) {
    $res = mysqli_fetch_assoc($ast);
    $suna = $res['first_name'];
    $suna1 = $res['last_name'];
    $pas = $res['passport'];
}

header("content-type: image/jpeg");
// converting from others format to jpeg
$imageFileType = strtolower(pathinfo($pas, PATHINFO_EXTENSION));


$image = imagecreatefromjpeg("images/certificate.jpg");
$color = imagecolorallocate($image, 0, 0, 0);
if ($imageFileType == 'png') {
    $ima = imagecreatefrompng($pas);
} elseif ($imageFileType == 'jpeg') {
    $ima = imagecreatefromjpeg($pas);
} elseif ($imageFileType == 'jpg') {
    $ima = imagecreatefromjpeg($pas);
}
$name = $suna . " " . $suna1;
$font =  "Rosemary/DroidSans.ttf";
$date = date('d F,Y');
$time = time();

$img = getimagesize($pas);
$width = $img[0];
$height = $img[1];
imagettftext($image, 10, 0, 720, 540, $color, $font, $date);
imagettftext($image, 20, 0, 390, 360, $color, $font, $name);
imagecopy($image, $ima, 20, 50, 0, 0, $width, $height);

imagejpeg($image, "images/$name.jpg");
imagedestroy($image);

$pdf = new FPDF();
$pdf->AddPage("L,A4");
$pdf->Image("images/$name.jpg", 0, 0, 290, 200);
ob_end_clean();
$pdf->Output();





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
