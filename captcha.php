<?php 
session_set_cookie_params(0, "/~vns25/IT202/", "web.njit.edu"); 
session_start(); 


$font = 'font.ttf';  
$font2 = 'font2.ttf'; 

header('Content-type: image/png');

$im = imagecreatetruecolor(350,120); 

$black =  imagecolorallocate($im, 0, 0, 0);
$yellow = imagecolorallocate($im, 255,255,0); 

$red = imagecolorallocate($im, 255, 0, 0);
$blue = imagecolorallocate($im, 0,0,255); 


imagefilledrectangle($im, 20, 15, 320, 100, $yellow); 


$text1 = substr(str_shuffle(md5(time())), 0, 2); 
$_SESSION["captcha"] = $text1; 

imagettftext( $im, 20, 45, 60, 60, $red, $font, $text1); 

$text2 = substr(str_shuffle(md5(time())), 0, 2); 
$_SESSION["captcha"] = $text2; 
imagettftext( $im, 20, -45, 180, 70, $black, $font, $text2); 


 
for( $count=0; $count<7; $count++ ) 
{
imageline($im,mt_rand(0,250),
 mt_rand(0,75),
 mt_rand(0,250),
 mt_rand(0,75),
 $blue
 );
}


$captcha_text = $text1."".$text2; 
$_SESSION["captcha"] = $captcha_text; 
imagettftext( $im, 10, 0, 30, 90, $black, $font2, $captcha_text); 

$id = session_id(); 
$text3 = "session ID: "."".$id; 
imagettftext( $im, 10, 0, 30, 100, $black, $font2, $text3); 

imagepng($im);
imagedestroy($im);

?>



