<?php
session_start();
$width = 75; 
$height = 25; 
$im = imagecreate($width, $height);
$bg = imagecolorallocate($im, 0, 0, 0);
$len = 4; 
$chars = '123456789ABCDEFGHJKMNPXYZ'; 
$string = '';
for ($i = 0; $i < $len; $i++) {
    $pos = rand(0, strlen($chars) - 1);
    $string .= $chars{$pos};
}
$_SESSION['kodecap'] = $string;
$bgR = mt_rand(100, 200);
$bgG = mt_rand(100, 200);
$bgB = mt_rand(100, 200);
$noise_color = imagecolorallocate($im, abs(255 - $bgR), abs(255 - $bgG), abs(255 - $bgB));
for ($i = 0; $i < ($width * $height) / 3; $i++) {
    imagefilledellipse($im, mt_rand(0, $width), mt_rand(0, $height), 3, rand(2, 5), $noise_color);
}
$text_color = imagecolorallocate($im, 240, 240, 240);
$rand_x = rand(0, $width - 50);
$rand_y = rand(0, $height - 15);
imagestring($im, 12, $rand_x, $rand_y, $string, $text_color);
header("Content-type: image/png");
imagepng($im);
?> 