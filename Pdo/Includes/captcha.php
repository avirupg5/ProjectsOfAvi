<?php
$image = @imagecreatetruecolor(120, 30) or die("Cannot Initialize new GD image stream");

// set background to white and allocate drawing colours
$background = imagecolorallocate($image, 173, 20, 178);
imagefill($image, 0, 0, $background);
$linecolor = imagecolorallocate($image, 204, 204, 255);
$textcolor = imagecolorallocate($image, 0x33, 0x33, 0x33);

// draw random lines on canvas
for($i=0; $i < 6; $i++) {
imagesetthickness($image, rand(1,3));
imageline($image, 0, rand(0,30), 120, rand(0,30), $linecolor);//image line use to genrate line between two givwn points;
}

session_start();

// add random digits to canvas
$digit = '';
for($x = 15; $x <= 95; $x +=20) {
$digit .= ($num = rand(0, 9));//rand(min value,max value) is randomly created function .-(concatination assignment)
imagechar($image, rand(3, 5), $x, rand(2, 14), $num, $textcolor);//(image, font,x axis,y axis,number to printed,text color)
}

// record digits in session variable
$_SESSION['digit'] = $digit;

// display image and clean up
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>