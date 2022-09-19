<?php

session_start();
// $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$captch=md5(rand());
$random_captcha = substr($captch,0,5);

// for($i = 0; $i < 5; $i++)
// {
//     $index = rand(0, strlen($characters) - 1);
//     $random_captcha .= $characters[$index];
// }

$_SESSION['captcha'] = $random_captcha;
$layer = imagecreatetruecolor(80,38);
$captcha_bg = imagecolorallocate($layer, 51, 51, 120); 
imagefill($layer, 0,0, $captcha_bg); //in case you want to give diff bg color and bydefualt it is black
$captcha_text_color = imagecolorallocate($layer, 255, 255, 255);
imagestring($layer, 14, 5, 5, $random_captcha, $captcha_text_color);
header('Content-Type:image/jpeg');
imagejpeg($layer);



?>