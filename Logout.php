<?php
include("config.php"); 
session_set_cookie_params(0, $path); 
session_start(); 

error_reporting(E_ERROR |  E_WARNING | E_PARSE | E_NOTICE);
ini_set('display error',1);  

$sidvalue = session_id(); 
echo "<br>session id was: " . $sidvalue . "<br"; 

$_SESSION = array(); 
session_destroy(); 
setcookie("PHPSESSID,", "", time()-3600, '/~vns25/IT202/', "", 0, 0); 

echo "Your session is terminated."; 

?>
